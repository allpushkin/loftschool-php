<?php

function homework3Task1($data)
{
    $xml = simplexml_load_file($data);
    echo "<b>{$xml -> Address[0] -> attributes()} to:</b>" . "<br>";
    echo "<b>Имя: </b>" . $xml -> Address[0] -> Name . "<br>";
    echo "<b>Адресс: </b>" . $xml -> Address[0] -> Country . ", "
        . $xml -> Address[0] -> State
        . ", " . $xml -> Address[0] -> City . ", "
        . $xml -> Address[0] -> Street . "<br>";
    echo "<b>Индекс: </b>" . $xml -> Address[0] -> Zip . "<br>";

    echo "<br>";

    // Копипаста, по-хорошему можно оформить в виде отдельной функции
    echo "<b>{$xml -> Address[1] -> attributes()} to:</b> " . "<br>";
    echo "<b>Имя: </b>" . $xml -> Address[1] -> Name . "<br>";
    echo "<b>Адресс: </b>" . $xml -> Address[1] -> Country . ", "
        . $xml -> Address[1] -> State
        . ", " . $xml -> Address[1] -> City . ", "
        . $xml -> Address[1] -> Street . "<br>";
    echo "<b>Индекс: </b>" . $xml -> Address[1] -> Zip . "<br>";

    echo "<br>";

    echo "<b>Notes:</b> {$xml -> DeliveryNotes}";

    echo "<br>";
    echo "<br>";

    echo "<b>Order positions:</b>". "<br>";

    $count = 1;
    foreach($xml->Items->children() as $items) {

        // Тут конечно по-хорошему нужно выводить таблицу
        echo $count++ . ") ";
        echo $items -> attributes() . " : "
            . $items -> ProductName . " || <i>qty:</i> "
            . $items -> Quantity . " || $ "
            . $items -> USPrice;
        echo "<br>";
    }

    echo "<br>";

    $totalPrice = floatval($xml -> Items -> Item[0] -> USPrice)
        + floatval($xml -> Items -> Item[1] -> USPrice);
    echo "<b>Sum:</b> $ {$totalPrice}";

}

function homework3Task2($data)
{
    $JSON = json_encode($data);
    file_put_contents('output.json', $JSON);

    $content = file_get_contents('output.json');

    if (rand(1,2) != 1)
    {
        $temp = json_decode($content);
        array_push($temp, [1,2,3,]);
        $JSON2 = json_encode($temp);
        file_put_contents('output2.json', $JSON2);
    } else {
        file_put_contents('output2.json', $JSON);
    }

    $json1 = json_decode(file_get_contents('output.json'), true);
    $json2 = json_decode(file_get_contents('output2.json'), true);

    unlink('output.json');
    unlink('output2.json');

}

function homework3Task3($value)
{
    $arr = [];
    $i = 0;

    while ($i < $value) {
        array_push($arr, rand(1, 100));
        $i++;
    }

    $fp = fopen('file.csv', 'r+');
    fputcsv($fp, $arr, ",");
    fclose($fp);

    $fp = fopen('file.csv', "r");
    $csv_data = fgetcsv($fp, 0, ",");
    $sum = array_sum($csv_data);
    fclose($fp);

    echo "Сумма $value случайных элементов массива равна: $sum";

}


function homework3Task4($url)
{
    $json = file_get_contents($url);
    $data = json_decode($json);

    echo "<pre>";
    print_r($data->query->pages);

    print_r($data);
    echo "</pre>";
}