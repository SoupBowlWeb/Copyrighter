<?php
include 'vendor/autoload.php';
use Copyrighter\Copyrighter;
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Copyrighter</title>
    <style type="text/css">
        body {
            font-family: "Arial Black", arial-black;
            text-align: center;
        }

        h1 {
            font-weight: normal;
            font-size: 6em;
            padding: 120px 0 0 0;
            font-family: inherit;
        }
        p {
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <h1>Copyrighter</h1>
    <p><?php Copyrighter::show(); ?></p>
</body>
</html>