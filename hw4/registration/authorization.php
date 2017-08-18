<?php

session_start();
require_once "db/db.php";
require_once "../components/helpers.php";

$login = htmlspecialchars($_POST['login']);

$check_user_login = $mysqli->query("SELECT * FROM users WHERE login = '$login'");

$user_corr_pass = $mysqli->query("SELECT * FROM users WHERE login = '$login'");
$user_corr_pass = $user_corr_pass->fetch_array();

$correct = password_verify($_POST['password'], $user_corr_pass['password']);

if ($correct && $check_user_login) {
    $_SESSION['logedin'] = 1;
    $_SESSION['login'] = $login;
    $_SESSION['username'] = $user_corr_pass['name'];
    header("Location:../useractions/personal.php");
} else {
    $_SESSION['error'] = 'Неверный ввод';
    header("location:../index.php");
}
