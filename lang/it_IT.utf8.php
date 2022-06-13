<?php

class it_IT {
    public function __construct() {
        $this->version = 2;
        $array = array();
        $this->array = &$array;

        $array["index.welcome.main"] = "Benvenuto sulla lista ban di {server}";
        $array["index.welcome.sub"] = "Qui è dove sono elencate tutte le punizioni effettuate";

        $array["title.index"] = 'Home';
        $array["title.bans"] = 'Bans';
        $array["title.mutes"] = 'Mutes';
        $array["title.warnings"] = 'Warnings';
        $array["title.kicks"] = 'Kicks';
        $array["title.player-history"] = "Le punizioni recenti di {name}";
        $array["title.staff-history"] = "Le punizioni recenti date da {name}";


        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Mute";
        $array["generic.warn"] = "Warning";
        $array["generic.kick"] = "Kick";

        $array["generic.unban"] = "Unban";
        $array["generic.unmute"] = "Unmute";

        $array["generic.banned"] = "Bannato";
        $array["generic.muted"] = "Mutato";
        $array["generic.warned"] = "Warnato";
        $array["generic.kicked"] = "Kickato";

        $array["generic.unbanned"] = "Sbannato";
        $array["generic.unmuted"] = "Smutato";

        $array["generic.banned.by"] = $array["generic.banned"] . " da";
        $array["generic.muted.by"] = $array["generic.muted"] . " da";
        $array["generic.warned.by"] = $array["generic.warned"] . " da";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " da";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Permanente";
        $array["generic.permanent.ban"] = $array["generic.ban"] . ' ' . $array['generic.permanent'];
        $array["generic.permanent.mute"] = $array["generic.mute"] . ' ' . $array['generic.permanent'];

        $array["generic.type"] = "Tipo";
        $array["generic.active"] = "Attivo";
        $array["generic.inactive"] = "Inattivo";
        $array["generic.expired"] = "Scaduto";
        $array["generic.expired.kick"] = "Non applicabile";
        $array["generic.player-name"] = "Player";

        $array["page.expired.ban"] = '(' . $array["generic.unbanned"] . ')';
        $array["page.expired.ban-by"] = '(' . $array["generic.unbanned"] . ' da {name})';
        $array["page.expired.mute"] = '(' . $array["generic.unmuted"] . ')';
        $array["page.expired.mute-by"] = '(' . $array["generic.unmuted"] . ' da {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Staffer";
        $array["table.reason"] = "Motivazione";
        $array["table.reason.unban"] = $array["generic.unban"] . " con " . $array["table.reason"];
        $array["table.reason.unmute"] = $array["generic.unmute"] . " con " . $array["table.reason"];
        $array["table.date"] = "Data";
        $array["table.expires"] = "Scadenza";
        $array["table.received-warning"] = "Warn ricevuto";


        $array["table.server.name"] = "Server";
        $array["table.server.scope"] = "Server";
        $array["table.server.origin"] = "Server di origine";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Pagina";

        $array["action.check"] = "Controlla";
        $array["action.return"] = "Ritorna al {origin}";

        $array["error.missing-args"] = "Mancano gli argomenti per la ricerca.";
        $array["error.name.unseen"] = "{name} Non è mai entrato.";
        $array["error.name.invalid"] = "Nome non valido.";
        $array["history.error.uuid.no-result"] = "Non sono state trovate punizioni.";
        $array["info.error.id.no-result"] = "Errore: {type} non trovato nel database.";
    }
}
