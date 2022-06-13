<?php

class zh_CN {
    public function __construct() {
        $this->version = 2;
        $array = array();
        $this->array = &$array;

        $array["index.welcome.main"] = "欢迎来到 {server} 封禁列表.";
        $array["index.welcome.sub"] = "这里列出了本服所有的惩罚列表.";

        $array["title.index"] = '主页';
        $array["title.bans"] = '封禁处理';
        $array["title.mutes"] = '禁言处理';
        $array["title.warnings"] = '警告处理';
        $array["title.kicks"] = '踢出处理';
        $array["title.player-history"] = "最近处罚于 {name}";
        $array["title.staff-history"] = "最近处罚于 {name}";


        $array["generic.ban"] = "封禁";
        $array["generic.mute"] = "禁言";
        $array["generic.warn"] = "警告";
        $array["generic.kick"] = "踢出";

        $array["generic.unban"] = "解除封禁";
        $array["generic.unmute"] = "解除禁言";

        $array["generic.banned"] = "封禁";
        $array["generic.muted"] = "禁言";
        $array["generic.warned"] = "警告";
        $array["generic.kicked"] = "踢出";

        $array["generic.unbanned"] = "解除封禁";
        $array["generic.unmuted"] = "解除禁言";

        $array["generic.banned.by"] = $array["generic.banned"] . " 于";
        $array["generic.muted.by"] = $array["generic.muted"] . " 于";
        $array["generic.warned.by"] = $array["generic.warned"] . " 于";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " 于";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "永久";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "类型";
        $array["generic.active"] = "生效中";
        $array["generic.inactive"] = "已失效";
        $array["generic.expired"] = "已过期";
        $array["generic.expired.kick"] = "N/A";
        $array["generic.player-name"] = "玩家";

        $array["page.expired.ban"] = '(' . $array["generic.unbanned"] . ')';
        $array["page.expired.ban-by"] = '(' . $array["generic.unbanned"] . ' 处理者: {name})';
        $array["page.expired.mute"] = '(' . $array["generic.unmuted"] . ')';
        $array["page.expired.mute-by"] = '(' . $array["generic.unmuted"] . ' 处理者: {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "处理者";
        $array["table.reason"] = "原因";
        $array["table.reason.unban"] = $array["generic.unban"] . " " . $array["table.reason"];
        $array["table.reason.unmute"] = $array["generic.unmute"] . " " . $array["table.reason"];
        $array["table.date"] = "处理日期";
        $array["table.expires"] = "过期时间";
        $array["table.received-warning"] = "收到的警告";


        $array["table.server.name"] = "服务器";
        $array["table.server.scope"] = "服务器范围";
        $array["table.server.origin"] = "处理服务器";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "页";

        $array["action.check"] = "搜索处罚结果";
        $array["action.return"] = "返回 {origin}";

        $array["error.missing-args"] = "参数丢失.";
        $array["error.name.unseen"] = "{name} 未加入过服务器.";
        $array["error.name.invalid"] = "未知名称.";
        $array["history.error.uuid.no-result"] = "未发现处罚结果.";
        $array["info.error.id.no-result"] = "错误: {type} 丢失于数据库.";
    }
}
