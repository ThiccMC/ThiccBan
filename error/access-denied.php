<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>litebans-php - Database Error</title>
    <link href="../inc/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h2>Connection Error</h2><br>

        <div class="text-warning">
            The web interface was unable to connect to the database using the configuration provided.
            <br>
            Connection failed: Access denied
            <br>
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if (strlen($error) <= 1024) {
                    $error = base64_decode($error, true);

                    if ($error !== false) {
                        // sanitize user input
                        $error = htmlspecialchars($error, ENT_QUOTES);

                        echo $error;
                    }
                }
            }
            ?>
        </div>
        <br>
        <a href="../" class="btn btn-default">Try Again</a>
    </div>
</div>
</body>
</html>
