<?php

$file = fopen('orders/orders.txt', "w+");

$output = htmlspecialchars(implode(" || ", $_POST) . PHP_EOL);

echo $output;

fwrite($file, $output);
