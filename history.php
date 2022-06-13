<?php
require_once './inc/page.php';

class History {
    /**
     * Appends all rows from $table matching $uuid to $array
     * @param Page $page
     * @param array $array
     * @param string $type
     * @param string $uuid
     * @param string $field
     */
    static function push($page, &$array, $type, $uuid, $field, $before, $after) {
        $table = $page->settings->table[$type]; // Not user input
        $select = $page->get_selection($table); // Not user input
        $limit = $page->settings->limit_per_page; // Not user input

        if ($after > 0) {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        $st = $page->conn->prepare("SELECT $select FROM $table WHERE $field=:uuid AND time > :after AND time < :before ORDER BY time $order LIMIT :limit");
        $st->bindParam(":uuid", $uuid, PDO::PARAM_STR);
        $st->bindParam(":limit", $limit, PDO::PARAM_INT);
        $st->bindParam(":before", $before, PDO::PARAM_INT);
        $st->bindParam(":after", $after, PDO::PARAM_INT);

        if ($st->execute()) {
            while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
                $row['__table__'] = $type;
                $array[] = $row;
            }
        }
        $st->closeCursor();
    }

    /**
     * usort() function for rows in the database, descending order (latest first)
     * @param PDORow $a
     * @param PDORow $b
     * @return int
     */
    static function cmp_row_date_desc($a, $b) {
        $a = $a['time'];
        $b = $b['time'];
        if ($a === $b) {
            return 0;
        }
        return ($a < $b) ? 1 : -1;
    }

    /**
     * usort() function for rows in the database, ascending order (oldest first)
     * @param PDORow $a
     * @param PDORow $b
     * @return int
     */
    static function cmp_row_date_asc($a, $b) {
        $a = $a['time'];
        $b = $b['time'];
        if ($a === $b) {
            return 0;
        }
        return ($a > $b) ? 1 : -1;
    }
}

$page = new Page("history");

$args = $page->args;

count($args) > 0 && is_string($args[0]) or die($page->t("error.missing-args"));

//$staffhistory = (count($args) >= 2 && $args[1] === "1");
$staffhistory=false;

$arg0 = $args[0];
if (strstr($arg0, ":issued")) {
    $staffhistory=true;
    $arg0 = substr($arg0, 0, -strlen(":issued"));
}
$uuid = $page->uuid_dashify($arg0);
$name = $page->get_name($uuid);

$name !== null or die(str_replace("{name}", $name, $page->t("error.name.unseen")));

if ($staffhistory) {
    $page->title = $page->t("title.staff-history");
} else {
    $page->title = $page->t("title.player-history");
}
$page->title = str_replace("{name}", $name, $page->title);


$page->print_title();
$page->print_header();

$from = null;
$from_title = null;
$from_href = null;

if (isset($_GET['from'])) {
    // sanitize $_GET['from']
    $info = $page->type_info($_GET['from']);
    if ($info['type'] !== null) {
        $from_title = $info['title'];
        $from = lcfirst($from_title);
        $from_href = $page->link($info['page']);
    }
}

// PHP's PHP_INT_MAX is platform-dependent... As if int64 isn't a type under 32-bit operating systems
//$before = PHP_INT_MAX;
$before = "9223372036854775807";
$after = 0;

if (isset($_GET['before']) && is_string($_GET['before'])) {
    if (filter_var($_GET['before'], FILTER_VALIDATE_FLOAT)) {
        $before = $_GET['before'];
    }
}

if (isset($_GET['after']) && is_string($_GET['after'])) {
    if (filter_var($_GET['after'], FILTER_VALIDATE_FLOAT)) {
        $after = $_GET['after'];
    }
}

try {
    $all = array();

    $field = "uuid"; // Safe user input (constants only)
    if ($staffhistory) {
        $field = "banned_by_uuid";
    }

    // Not user input
    $t = $page->settings->table;
    $t_bans = $t['bans'];
    $t_mutes = $t['mutes'];
    $t_warnings = $t['warnings'];
    $t_kicks = $t['kicks'];

    $total = 0;

    $count_st = $page->conn->prepare("SELECT 
        (SELECT COUNT(*) FROM $t_bans WHERE $field=:uuid0) +
        (SELECT COUNT(*) FROM $t_mutes WHERE $field=:uuid1) +
        (SELECT COUNT(*) FROM $t_warnings WHERE $field=:uuid2) +
        (SELECT COUNT(*) FROM $t_kicks WHERE $field=:uuid3)
    ");
    for ($i = 0; $i <= 3; $i++) $count_st->bindParam(":uuid$i", $uuid, PDO::PARAM_STR);

    if ($count_st->execute() && ($row = $count_st->fetch(PDO::FETCH_NUM)) !== null) {
        $total = $row[0];
    }
    $count_st->closeCursor();

    History::push($page, $all, 'bans', $uuid, $field, $before, $after);
    History::push($page, $all, 'mutes', $uuid, $field, $before, $after);
    History::push($page, $all, 'warnings', $uuid, $field, $before, $after);
    History::push($page, $all, 'kicks', $uuid, $field, $before, $after);

    $limit = $page->settings->limit_per_page;

    if ($after > 0) {
        usort($all, array("History", "cmp_row_date_asc"));
        // trim all entries beyond shown, then proper sort.
        // trim must be done in ascending order (oldest first), otherwise semantics change
        $trim = array();
        $i = 0;
        foreach ($all as $row) {
            $i++;
            if ($i > $limit) break;
            $trim[] = $row;
        }
        $all = $trim;
    }
    usort($all, array("History", "cmp_row_date_desc"));
    $bc = $page->settings->info_badge_classes;

    if (!empty($all)) {
        $page->table_begin();

        $i = 0;
        foreach ($all as $row) {
            $i++;

            if ($i > $limit) break;

            $dateStart = $row['time'];
            if ($dateStart < $before) {
                $before = $dateStart;
            }
            if ($dateStart > $after) {
                $after = $dateStart;
            }

            $type = $row['__table__'];

            $page->set_info($page->type_info($type));

            $player_name = $page->get_name($row['uuid']);

            $label_type = $page->type;
            $label_name = $page->t("generic." . $label_type);
            $label = "<span class='$bc litebans-label-history litebans-label-$label_type'>$label_name</span>";

            $page->print_table_rows($row, array(
                "type"          => $label,
                "player"        => $page->get_avatar($player_name, $row['uuid']),
                "executor"      => $page->get_avatar($page->get_banner_name($row), $row['banned_by_uuid']),
                "reason"        => $page->clean($row['reason']),
                "date"          => $page->millis_to_date($row['time']),
                "expires"       => $page->expiry($row),
                "server.name"   => $page->server($row),
                "server.origin" => $page->server($row, "server_origin"),
            ));
        }

        $page->table_end();

        // print pager
        if ($page->settings->show_pager) {
            $page->name = "history";
            $target = null;
            $uuid = $page->uuid_undashify($uuid);

            if ($staffhistory) {
//                $args .= "&staffhistory=1";
//                $args .= ":issued";
                $uuid .= ":issued";
            }
            $args = "?uuid=$uuid";

            if ($page->settings->simple_urls) {
                $target = $page->name . "/" . $uuid;
                $args = "";
            }

            $prevargs = $args;

            $args .= "&before=$before";

            if ($page->page > 2) {
                $prevargs .= "&after=$after";
            }

            if ($from !== null) {
                $args .= "&from=$from";
                $prevargs .= "&from=$from";
            }


            $page->print_pager($total, $args, $prevargs, $target, false);
        }
    } else {
        echo $page->t("history.error.uuid.no-result") . "<br>";
    }

    if ($from_href !== null) {
        $btnlabel = str_replace("{origin}", $from_title, $page->t("action.return"));
        echo "<br><a class=\"btn btn-primary\" href=\"$from_href\">$btnlabel</a> ";
    }

    $page->print_footer();
} catch (PDOException $ex) {
    $page->db->handle_error($page->settings, $ex);
}
