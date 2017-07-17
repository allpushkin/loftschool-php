<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <style>
        body {
            padding: 10px;
        }

        .table {
            width: auto;
        }

        td, tr {
            text-align: center;
        }

    </style>
    <title>Homework2</title>
</head>
<body>
<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "functions.php";

echo "<h2>Задание 1</h2>";
$array = ["Эники", "Беники", "Ели", "Варенники"];
echo task1($array, true);
task1($array, false);

echo "<h2>Задание 2</h2>";
$array = [10, 20, 1];
echo task2($array, "*");

echo "<h2>Задание 3</h2>";
echo task3("+", 10, 20, 1, 9);

echo "<h2>Задание 4</h2>";
echo task4(7, 7);
echo task4(7, -1);
echo "<br>";
echo task4(7, "three");

echo "<h2>Задание 5</h2>";
task5("Коту скоро сорок суток");

echo "<h2>Задание 6</h2>";
echo date("d.m.Y H:i");
echo "<br>";
echo strtotime("24.02.2016 00:00:00");

echo "<h2>Задание 7</h2>";
echo task7("Карл у Клары украл Кораллы");
echo "<br>";
echo task72("Две бутылки лимонада");

echo "<h2>Задание 8</h2>";
echo task8("RX packets:950381 errors:0 dropped:0 overruns:0 frame:)0.");
echo "<br>";
echo task8("RX packets:950381 errors:0 dropped:0 overruns:0 frame:0.");

echo "<h2>Задание 9</h2>";
createfile("test.txt");
echo "<br>";
writeToFile("test.txt", "Hello world!");
echo "<br>";
task9("test.txt");

echo "<h2>Задание 10</h2>";
createfile("anothertest.txt");
echo "<br>";
writeToFile("anothertest.txt", "Hello again!");
?>
</body>
</html>
