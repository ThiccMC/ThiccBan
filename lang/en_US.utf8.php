<?php

class en_US {
    public function __construct() {
        $this->version = 2;
        $array = array();
        $this->array = &$array;

        $array["index.welcome.main"] = "Welcome to {server}'s Ban List.";
        $array["index.welcome.sub"] = "Here is where all of the punishments are listed.";

        $array["title.index"] = 'Home';
        $array["title.bans"] = 'Bans';
        $array["title.mutes"] = 'Mutes';
        $array["title.warnings"] = 'Warnings';
        $array["title.kicks"] = 'Kicks';
        $array["title.player-history"] = "Recent Punishments for {name}";
        $array["title.staff-history"] = "Recent Punishments by {name}";


        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Mute";
        $array["generic.warn"] = "Warning";
        $array["generic.kick"] = "Kick";

        $array["generic.unban"] = "Unban";
        $array["generic.unmute"] = "Unmute";

        $array["generic.banned"] = "Banned";
        $array["generic.muted"] = "Muted";
        $array["generic.warned"] = "Warned";
        $array["generic.kicked"] = "Kicked";

        $array["generic.unbanned"] = "Unbanned";
        $array["generic.unmuted"] = "Unmuted";

        $array["generic.banned.by"] = $array["generic.banned"] . " By";
        $array["generic.muted.by"] = $array["generic.muted"] . " By";
        $array["generic.warned.by"] = $array["generic.warned"] . " By";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " By";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Permanent";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "Type";
        $array["generic.active"] = "Active";
        $array["generic.inactive"] = "Inactive";
        $array["generic.expired"] = "Expired";
        $array["generic.expired.kick"] = "N/A";
        $array["generic.player-name"] = "Player";

        $array["page.expired.ban"] = '(' . $array["generic.unbanned"] . ')';
        $array["page.expired.ban-by"] = '(' . $array["generic.unbanned"] . ' by {name})';
        $array["page.expired.mute"] = '(' . $array["generic.unmuted"] . ')';
        $array["page.expired.mute-by"] = '(' . $array["generic.unmuted"] . ' by {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Moderator";
        $array["table.reason"] = "Reason";
        $array["table.reason.unban"] = $array["generic.unban"] . " " . $array["table.reason"];
        $array["table.reason.unmute"] = $array["generic.unmute"] . " " . $array["table.reason"];
        $array["table.date"] = "Date";
        $array["table.expires"] = "Expires";
        $array["table.received-warning"] = "Received Warning";


        $array["table.server.name"] = "Server";
        $array["table.server.scope"] = "Server Scope";
        $array["table.server.origin"] = "Origin Server";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Page";

        $array["action.check"] = "Check";
        $array["action.return"] = "Return to {origin}";

        $array["error.missing-args"] = "Missing arguments.";
        $array["error.name.unseen"] = "{name} has not joined before.";
        $array["error.name.invalid"] = "Invalid name.";
        $array["history.error.uuid.no-result"] = "No punishments found.";
        $array["info.error.id.no-result"] = "Error: {type} not found in database.";
    }
}
