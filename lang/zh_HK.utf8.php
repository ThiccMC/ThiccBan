<?php

class zh_HK {
    public function __construct() {
        $this->version = 1;
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = "歡迎來到{server}的封禁名單!";
        $array["index.welcome.sub"] = "這裡記錄了我們的所有玩家的懲罰記錄!";

        $array["title.index"] = '首頁';
        $array["title.bans"] = '封禁';
        $array["title.mutes"] = '禁言';
        $array["title.warnings"] = '警告';
        $array["title.kicks"] = '踢出';
        $array["title.player-history"] = "{name} 最近的懲罰";
        $array["title.staff-history"] = "最近被{name}處理的懲罰";


        $array["generic.ban"] = "封禁";
        $array["generic.mute"] = "禁言";
        $array["generic.warn"] = "警告";
        $array["generic.kick"] = "踢出";

        $array["generic.banned"] = "已封禁";
        $array["generic.muted"] = "已禁言";
        $array["generic.warned"] = "已警告";
        $array["generic.kicked"] = "已踢出";

        $array["generic.banned.by"] = $array["generic.banned"] . " 懲罰者";
        $array["generic.muted.by"] = $array["generic.muted"] . " 懲罰者";
        $array["generic.warned.by"] = $array["generic.warned"] . " 懲罰者";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " 懲罰者";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "永久";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "類型";
        $array["generic.active"] = "有效";
        $array["generic.inactive"] = "無效";
        $array["generic.expired"] = "已過期";
        $array["generic.player-name"] = "玩家ID";

        $array["page.expired.ban"] = '(已解封)';
        $array["page.expired.ban-by"] = '(解封者為 {name})';
        $array["page.expired.mute"] = '(已解封)';
        $array["page.expired.mute-by"] = '(解封者為 {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "懲罰者";
        $array["table.reason"] = "原因";
        $array["table.date"] = "處理日期";
        $array["table.expires"] = "過期時間";
        $array["table.received-warning"] = "收到警告";

        $array["table.server.name"] = "適用服務器";
        $array["table.server.scope"] = "服務器範圍";
        $array["table.server.origin"] = "處理服務器";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "頁數";

        $array["action.check"] = "查找";
        $array["action.return"] = "返回 {origin}";

        $array["error.missing-args"] = "缺少參數.";
        $array["error.name.unseen"] = "{name}從未加入過服務器.";
        $array["error.name.invalid"] = "無效名稱.";
        $array["history.error.uuid.no-result"] = "没有懲罰找到";
        $array["info.error.id.no-result"] = "錯誤: {type}在數據庫中未找到.";
    }
}
