<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

proceedOrder();

function proceedOrder()
{
    try {
        $pdo = new PDO("mysql:host=localhost:8889;dbname=hamburgers-vp1", "root", "root");
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

        // Получаем из базы заказы по полю email
        $query = "select * from users where email = '{$email}'";
        $select_from_users = $pdo->prepare($query);
        $select_from_users->execute();
        $result = $select_from_users->fetchAll();
        $first_order = false;

        // Проверяем есть ли такой email уже заказывал, то прибавляем 1 к его заказам и меняем дату
        // если нет, тогда создаем его запись
        if ($result) {
            $user =$result[0];
            $user_id = $user['user_id'];
            $order = $user['orders'] + 1;
            $query = "UPDATE users SET orders = '$order' WHERE user_id = '$user_id'";
            $add_order = $pdo->prepare($query);
            $add_order->execute();
            $query = "UPDATE users SET last_order = NOW() WHERE user_id = '$user_id'";
            $add_order = $pdo->prepare($query);
            $add_order->execute();
        } else {
            $orders = 1;
            $query = "insert into users (name, email, orders, last_order) values ('$name', '$email', '$orders', NOW())";
            $insert_user = $pdo->prepare($query);
            $insert_user->execute();
            global $first_order;
            $first_order = true;
        }

        $insert_order = $pdo->prepare("insert into orders (name, phone, adress, callback, payment, comment, date) values ('$name', '$phone', '$adress', '$callback', '$payment', '$comment', NOW())");

        if ($insert_order->execute()) {
            echo "Ваш заказ успешно размещен";
            $order_id = $pdo->prepare("SELECT MAX(id) FROM orders WHERE name = '$name' AND phone='$phone' AND adress='$adress'");
            $order_id->execute();
            $order_id = $order_id->fetchColumn();
            $order_number = $pdo->prepare("SELECT orders FROM users WHERE email = '$email'");
            $order_number->execute();
            $order_number = $order_number->fetchColumn();

            // Отпроавляем письмо
            $to      = $email;
            $subject = 'Ваш заказ успешно размещен.';
            $message = "Уважаемый {$name}, Ваш заказ № {$order_id} успешно размещен!\n";
            $message .= "Заказ будет доставлен по адресу: {$adress}.\n";

            if ($first_order) {
                $message .= "Спасибо за ваш первый заказ!";
            } else {
                $message .= "Спасибо, это ваш {$order_number} заказ!\n";
            }

            echo $message;
            mail($to, $subject, $message);
        }
    } catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
}
