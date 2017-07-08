<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

    <title>Homework 1</title>
</head>
<body>

<?php
    echo "<h2>Задание #1</h2>";
    $name = "Бессмертный Джа";
    $age = 190;
    echo "Меня зовут <b>$name</b>";
    echo "<br>";
    echo "Мне $age лет";
    echo "<br>";
    echo "\"!|/\\'\"/";

    echo "<h2>Задание #2</h2>";
    $total = 80;
    $byPencil = 40;
    $byMarker = 23;
    $byPaint = $total - $byMarker - $byPencil;
    echo "На школьной выставке $total рисунков. Из них $byPencil выполнены карандашами, $byMarker фломастерами, 
          остальные красками. Сколько рисунков выполнены красками?";
    echo "<br>";
    echo "Количество рисунков выполненных красками = $total - $byMarker - $byPencil = $byPaint";

    echo "<h2>Задание #3</h2>";
    define("CONST", 777, true);
    if (defined("CONST") == true) echo "Константа CONST объявлена и равна " . constant("CONST");

    echo "<h2>Задание #4</h2>";
    echo "Сколько вам лет? ";
    echo "<input class=\"input-group mb-2 mr-sm-2 mb-sm-0\" id=\"ageInput\" type=\"text\" onkeyup=\"task4(this.value)\">";
    echo "<span class=\"h5\" id='result'>...</span>";

    echo "<h2>Задание #5</h2>";

    $day = rand(1,7);

    switch ($day) {
        case 1:
            $dayName = "Понедельник";
            break;
        case 2:
            $dayName = "Вторник";
            break;
        case 3:
            $dayName = "Среда";
            break;
        case 4:
            $dayName = "Четверг";
            break;
        case 5:
            $dayName = "Пятница";
            break;
        case 6:
            $dayName = "Cуббота";
            break;
        case 7:
            $dayName = "Воскресенье";
            break;
    }

    $dayType = ($day > 0 && $day < 6) ? "рабочий" : "выходной";
    echo "<span class=\"h5\">День номер $day это $dayName, $dayType.</span>";

    echo "<h2>Задание #6</h2>";

    $bmw = [
        'name' => 'bmw',
        'model' => 'X5',
        'speed' => 220,
        'doors' => 5,
        'year' => 2015
    ];

    $toyota = [
        'name' => 'toyota',
        'model' => 'Camry',
        'speed' => 180,
        'doors' => 4,
        'year' => 2016
    ];

    $volvo = [
        'name' => 'volvo',
        'model' => 'S40',
        'speed' => 210,
        'doors' => 4,
        'year' => 2017
    ];

    $cars = [$bmw, $toyota, $volvo];

    foreach ($cars as $item) {
        $carName = $item['name'];
        echo "CAR: <b>$carName</b>" . "<br>";
        echo $item['model'] . " " . $item['speed'] . " " . $item['doors'] . " " . $item['year'] . "<br>";
    }

    echo "<h2>Задание #7</h2>";

    echo "<table class='table table-bordered'>";

    for ( $i = 1; $i <= 10; $i++ ) {
        echo "<tr>";

            for ( $j = 1; $j <= 10; $j++ ) {
                $num = $i * $j;

                if ($i == 1 || $j == 1) {
                    echo "<td><b>$num</b></td>";
                } else {
                    if ($num % 2 == 0) {
                        echo "<td>($num)</td>";
                    } else {
                        echo "<td>[$num]</td>";
                    }


                }
            }

        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Задание #8</h2>";
    $str = "Много много много слов убежало от слонов.";
    echo $str . "<br>";
    $arr = explode(" ", $str);
    print_r($arr);
    $i = count($arr);
    echo "<br>";
    $str2 = join("%", $arr);
    print_r($str2);


?>

</body>
<script>
    function task4(age) {
        var result = document.getElementById("result");
        var ageInput = document.getElementById("ageInput");
        age = parseInt(age);

        if (isNaN(age)) {
            ageInput.value = '';
            result.innerText = '...';
            return;
        }

        if (age <= 0) {
            result.innerText = "Неизвестный возраст";
        } else {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    result.innerText = this.responseText;
                }
            };
            xhr.open("GET", "task4.php?age=" + age, true);
            xhr.send();
        }
    }
</script>
</html>
