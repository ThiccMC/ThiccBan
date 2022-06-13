<?php

class hu_HU {
    public function __construct() {
        $this->version = 1;
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = "Üdvözlünk a {server} büntetés listáján!";
        $array["index.welcome.sub"] = "Itt minden büntetést megtekinthetsz.";

        $array["title.index"] = 'Főoldal';
        $array["title.bans"] = 'Kitiltások';
        $array["title.mutes"] = 'Némítások';
        $array["title.warnings"] = 'Figyelmeztetések';
        $array["title.kicks"] = 'Kickek';
        $array["title.player-history"] = "{name} legutóbbi büntetései";
        $array["title.staff-history"] = "{name} által kiosztott büntetések";


        $array["generic.ban"] = "Kitiltás";
        $array["generic.mute"] = "Némítás";
        $array["generic.warn"] = "Figyelmeztetés";
        $array["generic.kick"] = "Kick";

        $array["generic.banned"] = "Kitiltotta";
        $array["generic.muted"] = "Némította";
        $array["generic.warned"] = "Figyelmeztette";
        $array["generic.kicked"] = "Kickkelte";

        $array["generic.banned.by"] = $array["generic.banned"] . " ";
        $array["generic.muted.by"] = $array["generic.muted"] . " ";
        $array["generic.warned.by"] = $array["generic.warned"] . " ";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " ";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Soha";
        $array["generic.permanent.ban"] = $array['generic.permanent'];
        $array["generic.permanent.mute"] = $array['generic.permanent'];


        $array["generic.type"] = "Típus";
        $array["generic.active"] = "Aktív";
        $array["generic.inactive"] = "Inaktív";
        $array["generic.expired"] = "Lejárt";
        $array["generic.player-name"] = "Játékos";

        $array["page.expired.ban"] = '(Feloldva)';
        $array["page.expired.ban-by"] = '(Feloldva {name})';
        $array["page.expired.mute"] = '(Feloldva)';
        $array["page.expired.mute-by"] = '(Feloldva {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Moderátor";
        $array["table.reason"] = "Indok";
        $array["table.date"] = "Dátum";
        $array["table.expires"] = "Lejár";
        $array["table.received-warning"] = "Figyelmeztetések";

        $array["table.server.name"] = "Szerver";
        $array["table.server.scope"] = "Szerver korlátozás";
        $array["table.server.origin"] = "Eredeti szerver";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Oldal";

        $array["action.check"] = "Ellenőrzés";
        $array["action.return"] = "Vissza";

        $array["error.missing-args"] = "Hiányzó paraméterek.";
        $array["error.name.unseen"] = "Nem található egy játékos sem {name} névvel.";
        $array["error.name.invalid"] = "Hibás név.";
        $array["history.error.uuid.no-result"] = "Nem található büntetés.";
        $array["info.error.id.no-result"] = "Hiba: {type}, nem található az adatbázisban.";
    }
}
