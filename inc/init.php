<?php

function redirect($url, $showtext = true) {
    if ($showtext === true) {
        echo "<a href=\"$url\">Redirecting...</a>";
    }
    die("<script data-cfasync=\"false\" type=\"text/javascript\">document.location=\"$url\";</script>");
}

if (!extension_loaded("pdo_mysql") || !extension_loaded("intl")) {
    redirect("error/missing-extensions.php");
}
