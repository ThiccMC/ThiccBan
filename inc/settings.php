<?php

class Settings {
    public function __construct() {
        // Web interface language. Languages are stored in the "lang/" directory.
        $this->lang = 'en_US.utf8';

        // Database information
        $this->host = '';
        $this->port = 3306;

        $this->database = '';

        $this->username = '';
        $this->password = '';

        // If you set a table prefix in config.yml, set it here as well
        $this->table_prefix = "litebans_";

        // Supported drivers: mysql, pgsql
        $this->driver = 'mysql';

        // Server name, shown on the main page and on the header
        $this->name = 'ThiccMC';

        // Clicking on the header name will send you to this address.
        // $this->name_link = 'https://example.com';
        $this->name_link = '/';

        // Show server scope column?
        $this->show_server_scope = false;

        // Show server origin column?
        $this->show_server_origin = false;

        // Show server scope column in info.php?
        $this->info_show_server_scope = false;

        // Show server origin column in info.php?
        $this->info_show_server_origin = true;

        // Show inactive bans? Removed bans will show (Unbanned), mutes will show (Unmuted), warnings will show (Expired).
        $this->show_inactive_bans = true;

        // Show silent bans?
        $this->show_silent_bans = true;

        // https://secure.php.net/manual/en/timezones.php
        // Example: "Europe/London"
        $this->timezone = "UTC";

        // The date format can be changed here.
        // https://unicode-org.github.io/icu/userguide/format_parse/datetime/#date-field-symbol-table
        // Example output of default format: July 2, 2015, 09:19
        $this->date_format = 'MMMM d, yyyy, HH:mm';

        // Amount of bans/mutes/warnings to show on each page
        $this->limit_per_page = 10;

        // The server console will be identified by any of these names.
        // It will be given a standard name and avatar image.
        $this->console_aliases = array(
            "CONSOLE", "Console",
        );
        $this->console_name = "Console";
        $this->console_image = "inc/img/console.png";

        // Avatar images for all players will be fetched from this URL.
        // Examples:
        // 'https://cravatar.eu/avatar/{uuid}/25'
        // 'https://crafatar.com/avatars/{uuid}?size=25'
        // 'https://minotar.net/avatar/{uuid}/25'
        $this->avatar_source = 'https://cravatar.eu/avatar/{uuid}/25';

        // `avatar_source_offline_mode` controls where avatars for offline-mode players are fetched from.
        // Crafatar no longer supports names, so it cannot be used as an offline-mode player-name avatar source as of 2018-02-16 (https://crafatar.com/#meta-usernames)
        $this->avatar_source_offline_mode = 'https://minotar.net/avatar/{name}/25';

        // If enabled, names will be shown below avatars instead of being shown next to them.
        $this->avatar_names_below = true;

        // Enable simple URLs?
        // This will convert URLs like "example.com/punishments/bans.php" to "example.com/punishments/bans/"
        // It will also simplify URL parameters: "example.com/punishments/info.php?type=mute&id=94" -> "example.com/punishments/info/mute/94/"
        // Your web server must be configured correctly to allow this to work, otherwise you will get a 404 error.
        // Web server configuration: https://gitlab.com/ruany/litebans-php/-/wikis/Simple-URLs
        $this->simple_urls = false;

        // Here you can customize colors for the Bootstrap 4 theme that you are using.
        // Bootstrap 4 themes have four sets of colors: primary, secondary, light and dark.
        // Navbar classes: navbar-light, navbar-dark, bg-primary, bg-secondary, bg-light, bg-dark
        // Badge (label) classes: badge, badge-pill, badge-primary, badge-secondary, badge-light, badge-dark
        $this->navbar_classes = 'navbar-dark bg-primary';
        $this->badge_classes = 'badge-pill badge-secondary';
        $this->info_badge_classes = 'badge';

        // If enabled, the total amount of bans, mutes, warnings, and kicks will be shown next to the buttons in the header.
        $this->header_show_totals = true;

        // Show pager? This allows users to page through the list of bans.
        $this->show_pager = true;

        // Enable PHP error reporting.
        $this->error_reporting = true;

        // Enable error pages.
        $this->error_pages = true;

        $this->date_month_translations = null;

        // If your system locale doesn't automatically translate month names, you can set them manually here.
        // Change "if (false)" to "if (true)" for this to take effect.
        // X=>Y, X is replaced with Y. E.g. "January"=>"Januari"
        if (false) {
            $this->date_month_translations = array(
                "January"   => "Month 1",
                "February"  => "Month 2",
                "March"     => "Month 3",
                "April"     => "Month 4",
                "May"       => "Month 5",
                "June"      => "Month 6",
                "July"      => "Month 7",
                "August"    => "Month 8",
                "September" => "Month 9",
                "October"   => "Month 10",
                "November"  => "Month 11",
                "December"  => "Month 12",
            );
        }

        /**** End of configuration ****/

        if ($this->error_reporting) {
            error_reporting(E_ALL);
            ini_set("display_errors", 1);
        }

        $this->error_throw = false;

        date_default_timezone_set($this->timezone);

        $this->init_tables();
    }

    protected function init_tables() {
        $this->table = array();
        foreach (array('bans', 'mutes', 'warnings', 'kicks', 'history', 'servers', 'config') as $t) {
            $this->table[$t] = $this->table_prefix . $t;
        }
    }
}
