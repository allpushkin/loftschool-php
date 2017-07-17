<?php
/**
 * File Doc Comment
 * @category MyClass
 * @package  MyPackage
 * @author   Mikhail Chirkov <chirkovv.ma@yandex.ru>
 * @license  GNU General Public License
 * @link     https://github.com/campside
 * @PHP      7.0.0
 */

declare(strict_types=1);

function task1($array, $oneLine = false)
{
    if ($oneLine) {
        $line = "";
        foreach ($array as $value) {
            $line .= $value . " ";
        }
        return trim($line);
    } else {
        foreach ($array as $value) {
            echo "<p>" . $value . "<p>";
        }
    }
}

function task2($array, $oper)
{
    foreach ($array as $element) {
        $type = gettype($element);
        if ($type !== "integer" && $type !== "double") {
            return "Неверный тип элемента массива.";
        }
    }

    if (count($array) <= 1) {
        return "Нужно передать хотя бы 2 аргумента.";
    }

    if ($oper !== "+" && $oper !== "-" && $oper !== "/" && $oper !== "*") {
        return "Неверное арифметиеское действие.";
    } elseif ($oper == "+") {
        $action = function ($a, $b) {
            return $a + $b;
        };
    } elseif ($oper == "-") {
        $action = function ($a, $b) {
            return $a - $b;
        };
    } elseif ($oper == "/") {
        $action = function ($a, $b) {
            return $a / $b;
        };
    } elseif ($oper == "*") {
        $action = function ($a, $b) {
            return $a * $b;
        };
    }

    $result = array_shift($array);

    foreach ($array as $element) {
        $result = $action($result, $element);
    }

    return $result;
}

function task3()
{
    $allArgs = func_get_args();
    $array = array_splice($allArgs, 1);
    $operand = func_get_arg(0);
    $num = task2($array, $operand);
    return $num;
}

function task4($a, $b)
{
    $typeA = gettype($a);
    $typeB = gettype($b);

    if ($typeA !== "integer" || $typeB !== "integer") {
        return "Аргументы функции должны быть целыми числами.";
    } elseif ($a <= 0 || $b <= 0) {
        return "Оба числа должны быть больше 0";
    }

    echo "<table class='table table-bordered'>";

    for ($i = 1; $i <= $a; $i++) {
        echo "<tr>";

        for ($j = 1; $j <= $b; $j++) {
            $num = $i * $j;

            if ($i == 1 || $j == 1) {
                echo "<td><b>$num</b></td>";
            } else {
                echo "<td>$num</td>";
            }
        }

        echo "</tr>";
    }

    echo "</table>";
}

function task5($string)
{

    function utf8reverse($s)
    {
        preg_match_all('/./us', $s, $ar);
        return join('', array_reverse($ar[0]));
    }

    function result($value)
    {
        if ($value) {
            echo "- это палиндром!";
        } else {
            echo "- это не палиндром.";
        }
    }

    echo "\"$string\" ";

    $string = trim($string);
    $string = mb_strtolower($string);
    $string = str_replace(" ", "", $string);
    $stringRev = utf8reverse($string);

    if ($stringRev == $string) {
        echo result(true);
    } else {
        echo result(false);
    }

}

function task7($string)
{
    return str_replace("К",  "", $string);
}

function task72($string)
{
    return str_replace("Две", "Три", $string);
}

function createfile($name)
{
    try {
        fopen($name, "w+");
        echo "Файл с именем $name успешно создан.";
    } catch (Exception $e) {
        echo "В процессе работы возникло исключение " . $e -> getMessage();
    }
}

function writeToFile($name, $string)
{
    $file = fopen($name, "w+") or die("Всё сломалось!");
    fwrite($file, $string);
    echo "Запись в файл успешно произведена.";
    fclose($file);
}

function task9($name)
{
    echo file_get_contents($name);
}

function hasSmile($string)
{
    preg_match("/[:][)]/", $string, $out);
    if ($out) {
        return $out[0];
    } else {
        return false;
    }
}

function task8($string)
{

    if (hasSmile($string)) {
        return hasSmile($string);
    }

    preg_match("/packets:[0-9]+/", $string, $out);
    $packages = explode(":", $out[0])[1];
    if ($packages > 1000) {
        return "Сеть есть!";
    } else {
        return "Сети нет!";
    }
}