<?php

class ja_JP {
    public function __construct() {
        $this->version = 0;
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = 'ようこそ！ {server} の BANリストへ';
        $array["index.welcome.sub"] = 'ここには全ての処罰が公開されています';

        $array["title.index"] = 'ホーム';
        $array["title.bans"] = 'BAN';
        $array["title.mutes"] = 'ミュート';
        $array["title.warnings"] = '警告';
        $array["title.kicks"] = 'キック';

        $array["page.permanent.ban"] = '無期限BAN';
        $array["page.permanent.mute"] = '無期限ミュート';
        $array["page.permanent.warning"] = '無期限';
        $array["page.expired.ban"] = '(解除済み)';
        $array["page.expired.ban-by"] = '({name}によって解除されました)';
        $array["page.expired.mute"] = '(解除済み)';
        $array["page.expired.mute-by"] = '({name}によって解除されました)';
        $array["page.expired.warning"] = '(期限が終わりました)';

        $array["check.username"] = "プレイヤー";
        $array["action.check"] = "検索";
        $array["table.pager.number"] = "ページ";

        $array["error.name.unseen"] = "このプレイヤーはサーバーに参加していません";

        $array["title.staff-history"] = "最近の発行:";
        $array["title.player-history"] = "最近の処罰:";
        $array["history.type"] = "タイプ";

        $array["history.error.uuid.no-result"] = "処罰データはありません";
        $array["action.return"] = "戻る";

        $array["table.received-warning"] = "受け取った警告";

        // Errors which are only accessible from invalid user input or removed pages.
        $array["error.name.invalid"] = "プレイヤー名が無効です";
        $array["history.error.uuid.required"] = "引数がありません (uuid).";
        $array["info.error.type-id.required"] = "引数がありません (type, id).";
        $array["info.error.type.invalid"] = "無効なページタイプが要求されました";
        $array["info.error.id.invalid"] = "無効なID";
        $array["info.error.id.no-result"] = "エラー: ";

    }
}
