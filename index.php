<?php
require_once './inc/page.php';

$page = new Page("index",false);

if ($page->settings->simple_urls && count($_GET) !== 0) {
    $target = $page->get_requested_page();

    if ($target !== "index" && strlen($target) <= 16 && preg_match("/^[a-z]+$/", $target)) {
        $local_script = "./${target}.php";
        if (file_exists($local_script)) {
            require_once $local_script;
            return;
        }
    }
}
$page->header->print_header();

$page->print_title();
?>
<br>
<div class="container">
    <div class="jumbotron">
        <div class="litebans-index litebans-index-main">
            <h2><?php echo str_replace("{server}", $page->settings->name, $page->t("index.welcome.main")); ?></h2>
        </div>

        <div class="litebans-index litebans-index-sub"><p><?php echo $page->t("index.welcome.sub"); ?></p></div>
    </div>
</div>
<?php $page->print_footer(false); ?>
