<?php

require_once '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$config = require 'mailer-config.php';

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = $config->host;
$mail->SMTPAuth = true;
$mail->Username = $config->username;
$mail->Password = $config->password;
$mail->SMTPSecure = 'SSL';
$mail->PORT = $config->port;
$mail->setFrom($config->username, 'Гамбургеры');
$mail->addReplyTo($config->username, 'Гамбургеры');
$mail->addAddress('testboxyand@yandex.ru');
$mail->Subject = "Ваш заказ успешно размещен.";
$mail->Body = "Уважаемый";

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}