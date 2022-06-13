<?php
require_once './inc/page.php';

abstract class Info {
    /**
     * @param $row PDO::PDORow
     * @param $page Page
     */
    public function __construct($row, $player_name, $page) {
        $this->row = $row;
        $this->page = $page;
        $this->table = $page->table;
        $this->player_name = $player_name;
    }

    static function create($row, $player_name, $page, $type) {
        switch ($type) {
            case "ban":
                return new BanInfo($row, $player_name, $page);
            case "mute":
                return new MuteInfo($row, $player_name, $page);
            case "warn":
                return new WarnInfo($row, $player_name, $page);
            case "kick":
                return new KickInfo($row, $player_name, $page);
        }
        return null;
    }

    function name() {
        return $this->page->t("generic." . $this->page->type);
    }

    function permanent() {
        return ((int)$this->row['until']) <= 0;
    }

    function punished_avatar() {
        return $this->page->get_avatar($this->player_name, $this->row['uuid'], true, $this->history_link($this->player_name, $this->row['uuid']), $name_left = false);
    }

    function history_link($name, $uuid, $args = "") {
        $uuid = $this->page->uuid_undashify($uuid);
        $href = $this->page->link("history.php?uuid=$uuid$args");
        return "<a href=\"$href\">$name</a>";
    }

    function moderator_avatar() {
        $row = $this->row;
        $banner_name = $this->page->get_banner_name($row);
        return $this->page->get_avatar($banner_name, $row['banned_by_uuid'], true, $this->history_link($banner_name, $row['banned_by_uuid'], ':issued'), $name_left = false);
    }

    function get_info() {
        $settings = $this->page->settings;
        $table = array(
            'table.player'        => function (Info $info) { return $info->punished_avatar(); },
            'table.executor'      => function (Info $info) { return $info->moderator_avatar(); },
            'table.reason'        => function (Info $info) { return $info->page->clean($info->row['reason']); },
            'table.date'          => function (Info $info) { return $info->page->millis_to_date($info->row['time']); },
            'table.expires'       => function (Info $info) { return $info->page->expiry($info->row); },
            'table.server.scope'  => function (Info $info) { return $info->page->server($info->row); },
            'table.server.origin' => function (Info $info) { return $info->page->server($info->row, "server_origin"); },
        );
        if (!$settings->info_show_server_scope) unset($table['table.server.scope']);
        if (!$settings->info_show_server_origin) unset($table['table.server.origin']);
        return $table;
    }
}

//-
class BanInfo extends Info {
    function get_info() {
        $array = parent::get_info();
        if ($this->page->active($this->row) === false) {
            $array["table.reason.unban"] = function (Info $info) { return $info->page->clean($info->row['removed_by_reason']); };
        }
        return $array;
    }
}
class MuteInfo extends Info {
    function get_info() {
        $array = parent::get_info();
        if ($this->page->active($this->row) === false) {
            $array["table.reason.unmute"] = function (Info $info) { return $info->page->clean($info->row['removed_by_reason']); };
        }
        return $array;
    }
}
class WarnInfo extends Info {}
//+

class KickInfo extends Info {
    function get_info() {
        $array = parent::get_info();
        unset($array['table.expires']); // kicks do not expire
        return $array;
    }
}

// check if info.php is requested, otherwise it's included
//if ((substr($_SERVER['SCRIPT_NAME'], -strlen("info.php"))) !== "info.php" && ((substr($_SERVER['SCRIPT_NAME'], -strlen("index.php"))) !== "index.php")) {
//    return;
//}

$page = new Page("info");
$args = $page->args;

count($args) >= 2 && is_string($args[0]) && is_string($args[1]) or die($page->t("error.missing-args"));

$type = $args[0];
$id = $args[1];

$page->set_info($page->type_info($type));

($page->type !== null) or die("Unknown page type requested");

filter_var($id, FILTER_VALIDATE_INT) or die("Invalid ID");

$id = (int)$id;

// Safe user input (constants only)
$type = $page->type;
$table = $page->table;

$select = $page->get_selection($table); // Not user input

$st = $page->conn->prepare("SELECT $select FROM $table WHERE id=:id LIMIT 1");
$st->bindParam(":id", $id, PDO::PARAM_INT);

if ($st->execute()) {
    ($row = $st->fetch()) or die(str_replace("{type}", $type, $page->t("info.error.id.no-result")));
    $st->closeCursor();

    $player_name = $page->get_name($row['uuid']);

    ($player_name !== null) or die(str_replace("{name}", $player_name, $page->t("error.name.unseen")));

    $info = Info::create($row, $player_name, $page, $type);

    $name = $page->t("generic.$type");
    $permanent = $info->permanent();

    $page->name = $page->title = "$name #$id";
    $page->print_title();

    $header = $page->name;
    $badges = "";
    $bc = $page->settings->info_badge_classes;

    if (!($info instanceof KickInfo)) {
        $active = $page->active($row);
        $ipban = $page->active($row, 'ipban');
        if ($ipban === true) {
            $idx = null;
            if ($info instanceof BanInfo) {
                $idx = "generic.ipban";
            } else if ($info instanceof MuteInfo) {
                $idx = "generic.ipmute";
            }
            if ($idx !== null) {
                $badges .= "<span class='$bc litebans-label-info litebans-label-ipban'>" . $page->t($idx) . "</span>";
            }
        }
        if ($active === true) {
            $badges .= "<span class='$bc litebans-label-info litebans-label-active'>" . $page->t("generic.active") . "</span>";
            if ($permanent) {
                $badges .= "<span class='$bc litebans-label-info litebans-label-permanent'>" . $page->t("generic.permanent") . "</span>";
            }
        } else {
            if ($page->is_expired($row)) {
                $badges .= "<span class='$bc litebans-label-info litebans-label-expired'>" . $page->t("generic.expired") . "</span>";
            } else {
                $badges .= "<span class='$bc litebans-label-info litebans-label-inactive'>" . $page->t("generic.inactive") . "</span>";
            }
        }
    }
    $page->print_header(true, $header . "<div class=\"noalign-w litebans-label-container\">$badges</div>");

    $map = $info->get_info($row, $player_name);

    $page->table_begin();

    foreach ($map as $key => $val) {
        $key = $page->t($key);
        $val = $val($info);
        echo "<tr><td>$key</td><td>$val</td></tr>";
    }

    $page->table_end(false);

    $page->print_footer();
}
