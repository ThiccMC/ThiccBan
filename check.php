<?php
require_once './inc/page.php';

class Check {
    public function run($name, $from) {
        $page = new Page("check", false);

        $column = "name"; // Safe user input (constants only)

        // validate user input
        if ($page->is_uuid($name) && preg_match("/^[0-9a-zA-Z-]{32,36}$/", $name)) {
            $column = "uuid";
            $name = $page->uuid_dashify($name);
        } else if (strlen($name) > 16 || !preg_match("/^[0-9a-zA-Z_]{1,16}$/", $name)) {
            $this->println($page->t("error.name.invalid"));
            return;
        }
        $table = $page->settings->table['history']; // Not user input

        try {
            $stmt = $page->conn->prepare("SELECT name,uuid FROM $table WHERE $column=:val ORDER BY date DESC LIMIT 1");
            $stmt->bindParam(':val', $name, PDO::PARAM_STR);
            if ($stmt->execute()) {
                if ($row = $stmt->fetch()) {
                    $name = $row['name'];
                    $uuid = $row['uuid'];
                }
            }
            $stmt->closeCursor();

            // sanitize $_POST['table'] ($from)
            $info = $page->type_info($from);
            $type = $info['type'];

            if (!isset($uuid)) {
                if (filter_var($name, FILTER_VALIDATE_FLOAT)) {
                    echo "<br>";
                    redirect($page->link("info.php?id=$name&type=$type"));
                    return;
                }
                $name = htmlspecialchars($name, ENT_QUOTES);
                $this->println(str_replace("{name}", $name, $page->t("error.name.unseen")));
                return;
            }
            $uuid = $page->uuid_undashify($uuid);
            $href = "history.php?uuid=$uuid";

            if ($type !== null) {
                $href .= "&from=$type";
            }

            echo "<br>";
            redirect($page->link($href));
        } catch (PDOException $ex) {
            $page->db->handle_error($page->settings, $ex);
        }
    }

    function println($line) {
        echo "<br>$line<br>";
    }
}

if (isset($_GET['name'], $_GET['table']) && is_string($_GET['name']) && is_string($_GET['table'])) {
    $check = new Check();
    $check->run($_GET['name'], $_GET['table']);
}
