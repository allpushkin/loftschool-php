<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "db/db.php";

$loginErr = $passwordErr = $password2Err = "";
$login = $password = $password2 = "";
$loginOk = $PassOk = false;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login"])) {
        $loginErr = "Login is required";
    } else {
        $login = test_input($_POST["login"]);
        $loginErr = "";

        if (strlen($login) < 4) {
            $loginErr = "Login must have not less than 4 letters";
        } else {
            $loginErr = "";
            $query = 'SELECT * FROM users';
            $checkUserLogin = $mysqli->query("SELECT id from users WHERE login = '$login'");
            if ($checkUserLogin->num_rows) {
                $loginErr = "Already Exists";
            } else {
                $loginOk = true;
            }
        }
    }

    if (empty($_POST["password"]) || empty($_POST["password2"])) {
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        }

        if (empty($_POST["password2"])) {
            $password2Err = "Repeat password is required";
        }
    } elseif ($_POST["password"] != $_POST["password2"]) {
        $passwordErr = $password2Err = "Passwords are not equal!";
    } elseif (strlen($_POST["password"]) < 8 || strlen($_POST["password2"]) < 8) {
        if (strlen($password) < 8) {
            $passwordErr = "Password must have not less than 8 letters";
        }

        if (strlen($password2) < 8) {
            $passwordErr = "Password must have not less than 8 letters";
        }
    } else {
        $PassOk = true;
    }

    if ($PassOk & $loginOk) {
    } else {
        $_POST = [];
    }

    print_r($_POST);
}
