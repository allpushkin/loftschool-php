<?php
$config = include 'db/config.php';

$mysqli = new mysqli(
    $config->host,
    $config->username,
    $config->password,
    $config->database,
    $config->port
);

$mysqli->set_charset('utf8');

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registration</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../starter-template.css" rel="stylesheet">
    </head>
    <body>
        <h3>Fill in the registration data:</h3>
        <form method="post">
            <input placeholder="Name"></input><br>
            <input placeholder="Age"></input><br>
            <input placeholder="Name"></input><br>
            <textarea placeholder="Description..."></textarea><br>
            <button type="submit">Submit</button>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>