<?php

/**
 * @param $data
 */

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

    $totalPrice = floatval($xml -> Items -> Item[0] -> USPrice)
        + floatval($xml -> Items -> Item[1] -> USPrice);
    echo "Sum: $ {$totalPrice}";

}

function homework3Task2($data)
{
    echo "<pre>";
    $JSON = json_encode($data);
    echo $JSON;
    echo "</pre>";
}

function homework3Task4($url)
{
    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result=curl_exec($ch);
    curl_close($ch);
    echo json_encode($result);
}