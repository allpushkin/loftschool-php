<?php
try {
    $pdo = new PDO("mysql:host=localhost:8889;dbname=hamburgers", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $date = time();
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
    $home = filter_input(INPUT_POST, 'home', FILTER_SANITIZE_STRING);
    $part = filter_input(INPUT_POST, 'part', FILTER_SANITIZE_STRING);
    $appt = filter_input(INPUT_POST, 'appt', FILTER_SANITIZE_STRING);
    $floor = filter_input(INPUT_POST, 'floor', FILTER_SANITIZE_STRING);

    $adress = $street . " " . $home . " Корпус: {$part} " . "Квартира: {$appt} " . "Этаж: {$floor}";

    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);
    $payment = $payment === "nalik" ? "Наличные" : "Картой";
    $callback = filter_input(INPUT_POST, 'callback', FILTER_SANITIZE_STRING);
    $callback = $callback != "notcall" ? "Перезвонить" : "Не звонить";

    $insert_order = $pdo->prepare("insert into orders (name, phone, email, adress, payment, callback, comment, date) values ('$name', '$phone', '$email', '$adress', '$payment', '$callback', '$comment', NOW())");
    $insert_order->execute();
} catch (Exception $e) {
    echo 'Message: ' .$e->getMessage();
}

echo "Ваш заказ успешно размещен";
