<?php

class es_ES {
    public function __construct() {
        $this->version = 1;
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = "Bienvenido a la lista de sanciones de {server}.";
        $array["index.welcome.sub"] = "Aqui encontraras una lista de todas las sanciones.";

        $array["title.index"] = 'Inicio';
        $array["title.bans"] = 'Baneos';
        $array["title.mutes"] = 'Muteos';
        $array["title.warnings"] = 'Warns';
        $array["title.kicks"] = 'Kickeos';
        $array["title.player-history"] = "Sanciones recientes de {name}";
        $array["title.staff-history"] = "Sanciones recientes por {name}";


        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Mute";
        $array["generic.warn"] = "Warning";
        $array["generic.kick"] = "Kick";

        $array["generic.banned"] = "Baneado";
        $array["generic.muted"] = "Muteado";
        $array["generic.warned"] = "Warneado";
        $array["generic.kicked"] = "Kickeado";

        $array["generic.banned.by"] = $array["generic.banned"] . " Por";
        $array["generic.muted.by"] = $array["generic.muted"] . " Por";
        $array["generic.warned.by"] = $array["generic.warned"] . " Por";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " Por";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Permanent";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "Tipo";
        $array["generic.active"] = "Activo";
        $array["generic.inactive"] = "Inactivo";
        $array["generic.expired"] = "Expirado";
        $array["generic.expired.kick"] = "N/A";
        $array["generic.player-name"] = "Jugador";

        $array["page.expired.ban"] = '(Desbaneado)';
        $array["page.expired.ban-by"] = '(Desbaneado por {name})';
        $array["page.expired.mute"] = '(Desmuteado)';
        $array["page.expired.mute-by"] = '(Desmuteado por {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Moderador";
        $array["table.reason"] = "Razón";
        $array["table.date"] = "Fecha";
        $array["table.expires"] = "Expira";
        $array["table.received-warning"] = "Warning recibido";

        $array["table.server.name"] = "Servidor";
        $array["table.server.scope"] = "Servidor Scope";
        $array["table.server.origin"] = "Servidor de origen";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Página";

        $array["action.check"] = "Revisar";
        $array["action.return"] = "Regresar a {origin}";

        $array["error.missing-args"] = "Faltan argumentos.";
        $array["error.name.unseen"] = "{name} No ha entrado al servidor.";
        $array["error.name.invalid"] = "Nombre invalido.";
        $array["history.error.uuid.no-result"] = "No se encontraron sanciones.";
        $array["info.error.id.no-result"] = "Error: {type} No encontrado en la base de datos.";
    }
}
