<?php

class da_DK {
    public function __construct() {
        $this->version = 0;
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = "Velkommen Til {server}'s Ban Liste.";
        $array["index.welcome.sub"] = 'Her er all dine afstraffelser listed.';

        $array["title.index"] = 'Hjem';
        $array["title.bans"] = 'Forbud';
        $array["title.mutes"] = 'Dæmpelser';
        $array["title.warnings"] = 'Advarelser';
        $array["title.kicks"] = 'Spark';

        $array["page.permanent.ban"] = 'Permanent Forbud';
        $array["page.permanent.mute"] = 'Permanent Dæmpelse';
        $array["page.permanent.warning"] = 'Permanent';
        $array["page.expired.ban"] = '(Forbud Ophævet)';
        $array["page.expired.ban-by"] = '(Forbud Ophævet af {name})';
        $array["page.expired.mute"] = '(Dæmpelse Fjernet)';
        $array["page.expired.mute-by"] = '(Dæmpelse Fjernet af {name})';
        $array["page.expired.warning"] = '(Udløbet)';

        $array["check.username"] = "Spiller";
        $array["action.check"] = "Tjek";
        $array["table.pager.number"] = "Side";

        $array["error.name.unseen"] = "har ikke været på serveren.";

        $array["title.staff-history"] = "Seneste Straffe af ";
        $array["title.player-history"] = "Senseste for ";
        $array["history.type"] = "Type";

        $array["history.error.uuid.no-result"] = "Ingen straf fundet.";
        $array["action.return"] = "Retuner til";

        $array["table.received-warning"] = "Modtog Advarelse";

        // Errors which are only accessible from invalid user input or removed pages.
        $array["error.name.invalid"] = "Ugyldigt Navn.";
        $array["history.error.uuid.required"] = "Mangler argumenter (uuid).";
        $array["info.error.type-id.required"] = "Mangler argumenter (type, id).";
        $array["info.error.type.invalid"] = "Ukendt side type anmodet.";
        $array["info.error.id.invalid"] = "Ugyldigt ID";
        $array["info.error.id.no-result"] = "Fejl: ";

    }
}
