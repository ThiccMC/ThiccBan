<?php

class fr_FR {
    public function __construct() {
        $this->version = 1;
        $array = array();
        $this->array = &$array;
		
        $array["index.welcome.main"] = "Bienvenue sur la liste des bans de {server}.";
        $array["index.welcome.sub"] = "C'est ici où toutes les sanctions sont listés.";

        $array["title.index"] = 'Home';
        $array["title.bans"] = 'Bans';
        $array["title.mutes"] = 'Mutes';
        $array["title.warnings"] = 'Alertes';
        $array["title.kicks"] = 'Kicks';
        $array["title.player-history"] = "Sanctions récentes pour {name}";
        $array["title.staff-history"] = "Sanctions récentes par {name}";


        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Mute";
        $array["generic.warn"] = "Alerte";
        $array["generic.kick"] = "Kick";

        $array["generic.banned"] = "Banni";
        $array["generic.muted"] = "Mute";
        $array["generic.warned"] = "Alerté";
        $array["generic.kicked"] = "Expulsé";

        $array["generic.banned.by"] = $array["generic.banned"] . " par";
        $array["generic.muted.by"] = $array["generic.muted"] . " par";
        $array["generic.warned.by"] = $array["generic.warned"] . " par";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " par";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];
		
        $array["generic.permanent"] = "Permanent";
        $array["generic.permanent.ban"] = $array['generic.ban'] . ' ' . $array["generic.permanent"];
        $array["generic.permanent.mute"] = $array["generic.mute"] . ' ' . $array['generic.permanent'];

        $array["generic.type"] = "Type";
        $array["generic.active"] = "Actif";
        $array["generic.inactive"] = "Inactif";
        $array["generic.expired"] = "Expiré";
        $array["generic.permanent"] = "Définitif";
        $array["generic.player-name"] = "Joueur";

        $array["page.expired.ban"] = '(Débanni)';
        $array["page.expired.ban-by"] = '(Débanni par {name})';
        $array["page.expired.mute"] = '(Démute)';
        $array["page.expired.mute-by"] = '(Démute par {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Modérateur";
        $array["table.reason"] = "Raison";
        $array["table.date"] = "Date";
        $array["table.expires"] = "Expire";
        $array["table.received-warning"] = "Alerte reçu";

        $array["table.server.name"] = "Serveur";
        $array["table.server.scope"] = "Serveur concerné";
        $array["table.server.origin"] = "Serveur d'origine";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Page";

        $array["action.check"] = "Vérifier";
        $array["action.return"] = "Returner à {origin}";

        $array["error.missing-args"] = "Il manque des arguments.";
        $array["error.name.unseen"] = "{name} ne s'est jamais connecter avant.";
        $array["error.name.invalid"] = "Nom invalide.";
        $array["history.error.uuid.no-result"] = "Aucune sanction trouvé.";
        $array["info.error.id.no-result"] = "Erreur: {type} introuvable dans la base de données.";
    }
}
