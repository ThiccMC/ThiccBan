<?php

class sk_SK {
    public function __construct() {
        $this->version = 1;
        $array = array();
        $this->array = &$array;

        $array["index.welcome.main"] = "Vitajte na {server} BanListu.";
        $array["index.welcome.sub"] = "Nájdete tu vypísané všetky svoje tresty.";

        $array["title.index"] = 'Domov';
        $array["title.bans"] = 'Bany';
        $array["title.mutes"] = 'Umlčanie';
        $array["title.warnings"] = 'Varovanie';
        $array["title.kicks"] = 'Vyhodenie';
        $array["title.player-history"] = "Nedávne tresty pre hráča {name}";
        $array["title.staff-history"] = "Nedávne tresty od operátora {name}";


        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Umlčanie";
        $array["generic.warn"] = "Varovanie";
        $array["generic.kick"] = "Vyhodenie";

        $array["generic.banned"] = "Udelil(a)";
        $array["generic.muted"] = "Udelil(a)";
        $array["generic.warned"] = "Udelil(a)";
        $array["generic.kicked"] = "Udelil(a)";

        $array["generic.banned.by"] = $array["generic.banned"] . " ";
        $array["generic.muted.by"] = $array["generic.muted"] . " ";
        $array["generic.warned.by"] = $array["generic.warned"] . " ";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " ";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Permanentný";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "Typ";
        $array["generic.active"] = "Aktivny";
        $array["generic.inactive"] = "Neaktívni";
        $array["generic.expired"] = "Vypršalo";
        $array["generic.player-name"] = "Hráč(ka)";

        $array["page.expired.ban"] = '(Vypršalo)';
        $array["page.expired.ban-by"] = '(Zrušeny od operátora {name})';
        $array["page.expired.mute"] = '(Vypršalo)';
        $array["page.expired.mute-by"] = '(Zrušeno od operátora {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Udelil(a)";
        $array["table.reason"] = "Dôvod";
        $array["table.date"] = "Dátum";
        $array["table.expires"] = "Vypršalo";
        $array["table.received-warning"] = "Posledné varovanie";

        $array["table.server.name"] = "Server";
        $array["table.server.scope"] = "Platí pre servery";
        $array["table.server.origin"] = "Udelené na serveri";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Stránka";

        $array["action.check"] = "Vyhľadať";
        $array["action.return"] = "Späť na{origin}";

        $array["error.missing-args"] = "Chýbaju argumenty.";
        $array["error.name.unseen"] = "{name} sa ešte nepripojil(a).";
        $array["error.name.invalid"] = "Neplatné meno.";
        $array["history.error.uuid.no-result"] = "Neboli nájdené žiadne tresty.";
        $array["info.error.id.no-result"] = "Chyba: {type} nebol(a) najdený(a) v databáze.";
    }
}
