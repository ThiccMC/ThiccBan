<?php
require_once './inc/page.php';

$page = new Page("warnings");

$page->print_title();
$page->print_header();

$page->print_check_form();

$page->table_begin();

$rows = $page->run_query();
foreach ($rows as $row) {
    $player_name = $page->get_name($row['uuid']);
    if ($player_name === null) continue;

    $page->print_table_rows($row, array(
        "player"           => $page->get_avatar($player_name, $row['uuid']),
        "executor"         => $page->get_avatar($page->get_banner_name($row), $row['banned_by_uuid']),
        "reason"           => $page->clean($row['reason']),
        "expires"          => $page->expiry($row),
        "received-warning" => (($page->active($row, 'warned') === true) ? "1" : "0"),
        "server.name"      => $page->server($row),
        "server.origin"    => $page->server($row, "server_origin"),
    ));
}
$page->table_end();
$page->print_pager();

$page->print_footer();
