<?php

class pt_PT {
    public function __construct() {
        $this->version = 1;
        $array = array();
        $this->array = &$array;

        $array["index.welcome.main"] = "Bem-vindo à lista de punições de {server}";
        $array["index.welcome.sub"] = "Aqui estão listadas todas as nossas punições.";

        $array["title.index"] = 'Inicio';
        $array["title.bans"] = 'Banimentos';
        $array["title.mutes"] = 'Silenciamentos';
        $array["title.warnings"] = 'Avisos';
        $array["title.kicks"] = 'Expulções';
        $array["title.player-history"] = "Punições recentes para {name}";
        $array["title.staff-history"] = "Punições recentes por {name}";


        $array["generic.ban"] = "Banimento";
        $array["generic.mute"] = "Silenciamentos";
        $array["generic.warn"] = "Aviso";
        $array["generic.kick"] = "Expulção";

        $array["generic.banned"] = "Banido";
        $array["generic.muted"] = "Silenciado";
        $array["generic.warned"] = "Avisado";
        $array["generic.kicked"] = "Expulso";

        $array["generic.banned.by"] = $array["generic.banned"] . " Por";
        $array["generic.muted.by"] = $array["generic.muted"] . " Por";
        $array["generic.warned.by"] = $array["generic.warned"] . " Por";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " Por";

        $array["generic.ipban"] = $array["generic.banned"] . " Por IP";
        $array["generic.ipmute"] = $array["generic.muted"] . " Por IP";

        $array["generic.permanent"] = "Permanente";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.banned"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.muted"];

        $array["generic.type"] = "Tipo";
        $array["generic.active"] = "Ativo";
        $array["generic.inactive"] = "Inativo";
        $array["generic.expired"] = "Expirado";
        $array["generic.expired.kick"] = "N/A";
        $array["generic.player-name"] = "Jogador";

        $array["page.expired.ban"] = '(Desbanido)';
        $array["page.expired.ban-by"] = '(Desbanido por {name})';
        $array["page.expired.mute"] = '(Dessilenciado)';
        $array["page.expired.mute-by"] = '(Dessilenciado por {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Moderador";
        $array["table.reason"] = "Motivo";
        $array["table.date"] = "Data";
        $array["table.expires"] = "Expira";
        $array["table.received-warning"] = "Aviso Recebido";

        $array["table.server.name"] = "Servidor";
        $array["table.server.scope"] = "Servidor de Efeito";
        $array["table.server.origin"] = "Servidor de Origem";
        $array["table.server.global"] = "Todos";
        $array["table.pager.number"] = "Página";

        $array["action.check"] = "Verificar";
        $array["action.return"] = "Voltar para {origin}";

        $array["error.missing-args"] = "Argumentos em falta.";
        $array["error.name.unseen"] = "{name} nunca entrou no servidor.";
        $array["error.name.invalid"] = "Nome inválido.";
        $array["history.error.uuid.no-result"] = "Nenhuma punição encontrada.";
        $array["info.error.id.no-result"] = "Erro: {type} não encontrado na base de dados.";
    }
}
