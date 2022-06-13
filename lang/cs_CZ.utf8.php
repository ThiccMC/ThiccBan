<?php

class cs_CZ {
    public function __construct() {
        $this->version = 2;
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = 'Vítej na {server}.';
        $array["index.welcome.sub"] = 'Zde nalezneš vypsány všechny své tresty.';

        $array["title.index"] = 'Úvod';
        $array["index.welcome.main"] = "Vítejte na {server} BanListu.";
        $array["index.welcome.sub"] = "Naleznete zde vypsány všechny své tresty.";

        $array["title.index"] = 'Domů';
        $array["title.bans"] = 'Bany';
        $array["title.mutes"] = 'Umlčení';
        $array["title.warnings"] = 'Varování';
        $array["title.kicks"] = 'Vyhození';
        $array["title.player-history"] = "Nedávné tresty pro {name}";
        $array["title.staff-history"] = "Nedávné tresty od {name}";


        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Umlčení";
        $array["generic.warn"] = "Varování";
        $array["generic.kick"] = "Vyhození";

        $array["generic.unban"] = "unbanu";
        $array["generic.unmute"] = "zrušení umlčení";

        $array["generic.banned"] = "Zabanován/a";
        $array["generic.muted"] = "Umlčen/a";
        $array["generic.warned"] = "Varován/a";
        $array["generic.kicked"] = "Vyhozen/a";

        $array["generic.unbanned"] = "Odbanován/a";
        $array["generic.unmuted"] = "Umlčení zrušeno";

        $array["generic.banned.by"] = $array["generic.banned"] . " od";
        $array["generic.muted.by"] = $array["generic.muted"] . " od";
        $array["generic.warned.by"] = $array["generic.warned"] . " od";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " od";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Permanent";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "Typ";
        $array["generic.active"] = "Aktivní";
        $array["generic.inactive"] = "Neaktivní";
        $array["generic.expired"] = "Vypršelo";
        $array["generic.expired.kick"] = "Neznámé";
        $array["generic.player-name"] = "Hráč";

        $array["page.expired.ban"] = '(' . $array["generic.unbanned"] . ')';
        $array["page.expired.ban-by"] = '(' . $array["generic.unbanned"] . ' od {name})';
        $array["page.expired.mute"] = '(' . $array["generic.unmuted"] . ')';
        $array["page.expired.mute-by"] = '(' . $array["generic.unmuted"] . ' od {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Moderátor";
        $array["table.reason"] = "Důvod";
        $array["table.reason.unban"] = $array["table.reason"] . " " . $array["generic.unban"];
        $array["table.reason.unmute"] = $array["table.reason"] . " " . $array["generic.unmute"];
        $array["table.date"] = "Datum";
        $array["table.expires"] = "Vyprší";
        $array["table.received-warning"] = "Poslední Varování";


        $array["table.server.name"] = "Servery";
        $array["table.server.scope"] = "Platí pro servery";
        $array["table.server.origin"] = "Uděleno na serveru";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Stránka";

        $array["action.check"] = "Vyhledat";
        $array["action.return"] = "Zpět na {origin}";

        $array["error.missing-args"] = "Chybí argumenty.";
        $array["error.name.unseen"] = "{name} se ještě nikdy nepřipojil/a.";
        $array["error.name.invalid"] = "Neplatné jméno.";
        $array["history.error.uuid.no-result"] = "Nenalezeny žádné tresty.";
        $array["info.error.id.no-result"] = "Chyba: {type} nebyl nalezen žádný záznam/y v databázi.";
    }
}
