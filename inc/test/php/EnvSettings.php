<?php

class EnvSettings extends Settings {
    public function __construct() {
        parent::__construct();
        $this->host = getenv("MYSQL_HOST");
        $this->database = getenv("MYSQL_DATABASE");
        $this->username = getenv("MYSQL_USERNAME");
        $this->password = getenv("MYSQL_PASSWORD");
        $this->table_prefix = getenv("LITEBANS_TABLE_PREFIX");
        $this->error_throw = true;

        $this->init_tables();
    }
}
