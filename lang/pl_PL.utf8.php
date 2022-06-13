<?php

class pl_PL {
    public function __construct() {
        $this->version = 1;
        $array = array();
        $this->array = &$array;

        $array["index.welcome.main"] = "Witaj na liście banów {server}.";
        $array["index.welcome.sub"] = "Tutaj jest lista wszystkich kar naszego serwera.";

        $array["title.index"] = 'Strona Główna';
        $array["title.bans"] = 'Bany';
        $array["title.mutes"] = "Mute'y";
        $array["title.warnings"] = 'Warny';
        $array["title.kicks"] = 'Kicki';
        $array["title.player-history"] = "Ostatnie kary dla {name}";
        $array["title.staff-history"] = "Ostatnie kary przez {name}";


        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Mute";
        $array["generic.warn"] = "Warn";
        $array["generic.kick"] = "Kick";

        $array["generic.banned"] = "Zbanowany";
        $array["generic.muted"] = "Wyciszony";
        $array["generic.warned"] = "Ostrzeżony";
        $array["generic.kicked"] = "Wyrzucony";

        $array["generic.banned.by"] = $array["generic.banned"] . " przez";
        $array["generic.muted.by"] = $array["generic.muted"] . " przez";
        $array["generic.warned.by"] = $array["generic.warned"] . " przez";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " przez";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Na zawsze";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "Typ";
        $array["generic.active"] = "Aktywny";
        $array["generic.inactive"] = "Nieaktywny";
        $array["generic.expired"] = "Wygasł";
        $array["generic.player-name"] = "Gracz";

        $array["page.expired.ban"] = '(Odbanowany)';
        $array["page.expired.ban-by"] = '(Odbanowany przez {name})';
        $array["page.expired.mute"] = '(Odwyciszony)';
        $array["page.expired.mute-by"] = '(Odwyciszony przez {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Moderator";
        $array["table.reason"] = "Powód";
        $array["table.date"] = "Data";
        $array["table.expires"] = "Wygasa";
        $array["table.received-warning"] = "Otrzymał ostrzeżenie";

        $array["table.server.name"] = "Serwer";
        $array["table.server.scope"] = "Zakres serwera";
        $array["table.server.origin"] = "Pochodzący z serwera";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Strona";

        $array["action.check"] = "Sprawdź";
        $array["action.return"] = "Powróć do {origin}";

        $array["error.missing-args"] = "Brakujące argumenty.";
        $array["error.name.unseen"] = "{name} nie dołączył nigdy na serwer.";
        $array["error.name.invalid"] = "Zły nick.";
        $array["history.error.uuid.no-result"] = "Nie znaleziono kar.";
        $array["info.error.id.no-result"] = "Błąd: {type} nie znaleziony w bazie danych.";
    }
}
