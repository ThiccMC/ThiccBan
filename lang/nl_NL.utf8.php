<?php

class nl_NL {
    public function __construct() {
        $this->version = 0;
        $array = array();
        $this->array = &$array;
        $array["index.welcome1"] = "Welkom op {server}'s Ban Lijst.";
        $array["index.welcome.sub"] = 'Hier staan al onze uitgedeelde straffen.';

        $array["title.index"] = 'Home';
        $array["title.bans"] = 'Bans';
        $array["title.mutes"] = 'Mutes';
        $array["title.warnings"] = 'Waarschuwingen';
        $array["title.kicks"] = 'Kicks';

        $array["page.permanent.ban"] = 'Permanente Ban';
        $array["page.permanent.mute"] = 'Permanente Mute';
        $array["page.permanent.warning"] = 'Permanent';
        $array["page.expired.ban"] = '(Unbanned)';
        $array["page.expired.ban-by"] = '(Unbanned door {name})';
        $array["page.expired.mute"] = '(Unmuted)';
        $array["page.expired.mute-by"] = '(Unmuted door {name})';
        $array["page.expired.warning"] = '(Verlopen)';

        $array["check.username"] = "Player";
        $array["action.check"] = "Check";
        $array["table.pager.number"] = "Pagina";

        $array["error.name.unseen"] = "heeft niet eerder deelgenomen.";

        $array["title.staff-history"] = "Recente straffen door ";
        $array["title.player-history"] = "Recente straffen voor ";
        $array["history.type"] = "Type";

        $array["history.error.uuid.no-result"] = "Geen straffen gevonden.";
        $array["action.return"] = "Terug naar";

        $array["table.received-warning"] = "Waarschuwing ontvangen";

        // Errors which are only accessible from invalid user input or removed pages.
        $array["error.name.invalid"] = "Ongeldige naam.";
        $array["history.error.uuid.required"] = "Missende parameter (uuid).";
        $array["info.error.type-id.required"] = "Missende parameter (type, id).";
        $array["info.error.type.invalid"] = "Ongebekende pagina type opgevraagd.";
        $array["info.error.id.invalid"] = "Ongeldig ID";
        $array["info.error.id.no-result"] = "Error: ";

    }
}
