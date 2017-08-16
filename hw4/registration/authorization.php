<?php

require_once "db/db.php";
require_once "../components/helpers.php";

$login = htmlspecialchars($_POST['login']);

$check_user_login = $mysqli->query("SELECT * FROM users WHERE login = '$login'");

$user_corr_pass = $mysqli->query("SELECT password FROM users WHERE login = '$login'");
$user_corr_pass = $user_corr_pass->fetch_array();
$user_corr_pass = $user_corr_pass['password'];

$correct = password_verify($_POST['password'], $user_corr_pass);

if ($correct && $check_user_login) {
    echo "Correct";
    $_SESSION['logedin'] = 1;
} else {
    echo "Incorrect";
}
