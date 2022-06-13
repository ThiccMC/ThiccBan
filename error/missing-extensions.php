<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>litebans-php - Missing Extensions</title>
    <link href="../inc/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h2>Missing Extensions</h2><br>
        <div class="text-warning">
            <?php
            $problems = array();
            foreach(array("pdo_mysql", "intl") as $ext) {
                if (!extension_loaded($ext)) {
                    $problems[] = "- <a class=\"text-danger\">$ext</a>";
                }
            }
            if (count($problems) > 0) {
                echo("The following PHP extensions are required by litebans-php but were not found:<br>");
                echo(implode("<br>", $problems));
                $phpini = php_ini_loaded_file();

                echo "These extensions can be enabled in php.ini.<br><br>";
                echo "php.ini location: <a class=\"text-info\">" . $phpini . "</a><br>";
                echo "List of currently loaded extensions:";
                echo(implode(', ', get_loaded_extensions()));
            }
            ?>
        </div>
        <br>
        <a href="../" class="btn btn-default">Try Again</a>
    </div>
</div>
</body>
</html>
