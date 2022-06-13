<?php

class Database {
    public static $TRUE = "1", $FALSE = "0";

    public function __construct(Settings $settings, $connect, $verify) {
        if ($connect) {
            $this->connect($settings, $verify);
        } else {
            $this->conn = null;
        }
    }

    function connect(Settings $cfg, $verify = true) {
        $this->active_query = "";

        if ($cfg->driver === "pgsql") {
            Database::$TRUE = "B'1'";
            Database::$FALSE = "B'0'";
        }

        if (!$cfg->show_inactive_bans) {
            $this->active_query = self::append_query($this->active_query, "active=" . Database::$TRUE);
        }

        if (!$cfg->show_silent_bans) {
            $this->active_query = self::append_query($this->active_query, "silent=" . Database::$FALSE);
        }

        $this->verify = $verify;
        $driver = $cfg->driver;
        $host = $cfg->host;
        $port = $cfg->port;
        $database = $cfg->database;
        $username = $cfg->username;
        $password = $cfg->password;
        if ($username === "" && $password === "") {
            redirect("error/unconfigured.php");
        }

        $dsn = "$driver:dbname=$database;host=$host;port=$port";
        if ($driver === 'mysql') {
            $dsn .= ';charset=utf8';
        }

        $options = array(
            PDO::ATTR_TIMEOUT            => 5,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        );

        try {
            $this->conn = new PDO($dsn, $username, $password, $options);

            if (!$cfg->header_show_totals && $verify) {
                $st = $this->conn->query("SELECT * FROM " . $cfg->table['config'] . " LIMIT 1;");
                $st->fetch();
                $st->closeCursor();
            }
        } catch (PDOException $e) {
            $this->handle_error($cfg, $e);
        }
        if ($driver === 'pgsql') {
            $this->conn->exec("SET NAMES 'UTF8';");
        }
    }

    static function append_query($existing, $new) {
        if ($existing !== "") {
            return "$existing AND $new";
        }
        return "WHERE $new";
    }

    /**
     * @param $cfg Settings
     * @param $e Exception
     * @throws Exception
     */
    function handle_error(Settings $cfg, Exception $e) {
        if ($cfg->error_throw) throw $e;

        $message = $e->getMessage();
        if ($cfg->error_pages) {
            if (strstr($message, "Access denied for user")) {
                if ($cfg->error_reporting) {
                    redirect("error/access-denied.php?error=" . base64_encode($message));
                } else {
                    redirect("error/access-denied.php");
                }
            }
            if (strstr($message, "Base table or view not found:")) {
                try {
                    $st = $this->conn->query("SELECT * FROM " . $cfg->table['bans'] . " LIMIT 1;");
                    $st->fetch();
                    $st->closeCursor();
                } catch (PDOException $e) {
                    redirect("error/tables-not-found.php");
                }
                redirect("error/outdated-plugin.php");
            }
            if (strstr($message, "Unknown column")) {
                redirect("error/outdated-plugin.php");
            }
        }
        if ($cfg->error_reporting) {
            die("Database error: $message");
        }
        die("Database error");
    }
}
