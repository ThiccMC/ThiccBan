<?php
// Translated by serflash (Alternative version), The creator of the project SimpleCraft.
// Перевел serflash (Альтернативая версия), Основатель проекта SimpleCraft.
// Поправил CXMorgan
// Corrected by CXMorgan

class ru_RU {
    public function __construct() {
        $this->version = 2;
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = "{server} | Бан-лист";
        $array["index.welcome.sub"] = "Добро пожаловать";

        $array["title.index"] = 'Главная';
        $array["title.bans"] = 'Баны';
        $array["title.mutes"] = 'Муты';
        $array["title.warnings"] = 'Варны';
        $array["title.kicks"] = 'Кикнутые';
        $array["title.player-history"] = "Недавние наказания игрока {name}";
        $array["title.staff-history"] = "Недавние наказания администратора {name}";


        $array["generic.ban"] = "Бан";
        $array["generic.mute"] = "Мут";
        $array["generic.warn"] = "Варн";
        $array["generic.kick"] = "Кик";

        $array["generic.unban"] = "Разбан";
        $array["generic.unmute"] = "Размут";

        $array["generic.banned"] = "Забанен";
        $array["generic.muted"] = "Заткнут";
        $array["generic.warned"] = "Предупрежден";
        $array["generic.kicked"] = "Кикнут";

        $array["generic.unbanned"] = "Разбанен";
        $array["generic.unmuted"] = "Размучен";

        $array["generic.banned.by"] = $array["generic.banned"] . " ";
        $array["generic.muted.by"] = $array["generic.muted"] . " ";
        $array["generic.warned.by"] = $array["generic.warned"] . " ";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " ";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Вечный";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "Тип";
        $array["generic.active"] = "Активный";
        $array["generic.inactive"] = "Неактивный";
        $array["generic.expired"] = "Недействителен";
        $array["generic.expired.kick"] = "Недействителен";
        $array["generic.player-name"] = "Игрок";

        $array["page.expired.ban"] = '(Разбанен)';
        $array["page.expired.ban-by"] = '(Разбанил {name})';
        $array["page.expired.mute"] = '(Снял мут)';
        $array["page.expired.mute-by"] = '(Снял мут {name})';
        $array["page.expired.warning"] = '!' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Администратор";
        $array["table.reason"] = "Причина";
        $array["table.date"] = "Дата";
        $array["table.expires"] = "Истекает";
        $array["table.received-warning"] = "Получено предупреждение";

        $array["table.server.name"] = "Сервер";
        $array["table.server.scope"] = "Место сервера";
        $array["table.server.origin"] = "Сервер выдачи";
        $array["table.server.global"] = "Глобально";
        $array["table.pager.number"] = "Стр.";

        $array["action.check"] = "Проверить";
        $array["action.return"] = "Вернутся в {origin}";

        $array["error.missing-args"] = "Отсутствуют аргументы.";
        $array["error.name.unseen"] = "{name} ранее не играл.";
        $array["error.name.invalid"] = "Неверный игрок.";
        $array["history.error.uuid.no-result"] = "Не имеет нарушений.";
        $array["info.error.id.no-result"] = "Ошибка: {type} не найден в базе данных.";
    }
}
