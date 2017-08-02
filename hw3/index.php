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

</body>
</html>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "functions.php";

echo "<h2>Задание 1</h2>";

homework3Task1("./data.xml");

echo "<h2>Задание 2</h2>";

homework3Task2([[["One", "Two"], ["Three", "Four"], ["Five", "Six"]], ["Seven", "Eight"]]);


echo "<h2>Задание 4</h2>";

$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";

homework3Task4($url);