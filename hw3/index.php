<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework 3</title>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once "functions.php";

    echo "<h2>Задание 1</h2>";

    homework3Task1("./data.xml");

    echo "<h2>Задание 2</h2>";

    homework3Task2([[["1", "2"], ["3", "4"], ["5", "6"]], ["7", "8"]]);

    echo "<h2>Задание 3</h2>";

    homework3Task3(50);

    echo "<h2>Задание 4</h2>";

    $url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=Main%20Page";

    homework3Task4($url);
    ?>

</body>
</html>
