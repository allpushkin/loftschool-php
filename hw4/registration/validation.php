<?php
require_once "../components/helpers.php";
require_once "db/db.php";

$login_err = $password_err = $password2_err = "";
$login = $password = $password2 = "";
$login_ok = $pass_ok = false;
$age = $_POST['age'];
$min_len = 6;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login"])) {
        $login_err = "Login is required";
    } else {
        $login = test_input($_POST["login"]);
        $login_err = "";

        if (strlen($login) < 4) {
            echo "Login must have not less than 4 letters";
        } else {
            $login_err = "";
            // @codingStandardsIgnoreStart
            $check_user_login = $mysqli->query("SELECT id from users WHERE login = '$login'");
            // @codingStandardsIgnoreEnd
            if ($check_user_login->num_rows) {
                echo "Already Exists";
            } else {
                $login_ok = true;

                if (empty($_POST["password"]) || empty($_POST["password2"])) {
                    if (empty($_POST["password"])) {
                        $password_err = "Password is required";
                        echo $password_err;
                    }

                    if (empty($_POST["password2"])) {
                        $password2_err = "Repeat password is required";
                        echo $password2_err;
                    }
                } elseif ($_POST["password"] != $_POST["password2"]) {
                    $password_err = $password2_err = "Passwords are not equal!";
                } elseif (strlen($_POST["password"]) < $min_len || strlen($_POST["password2"]) < $min_len) {
                    if (strlen($password) < $min_len) {
                        $password_err = "Password must have not less than 6 letters";
                        echo $password_err;
                    }

                    if (strlen($password2) < $min_len) {
                        $password_err = "Password must have not less than 6 letters";
                        echo $password_err;
                    }
                } else {
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $pass_ok = true;
                }
            }
        }
    }

    $name = test_input($_POST['name']);

    if ($pass_ok && $login_ok) {
        $query = "INSERT INTO users (`login`, `password`, `name`, `age`, `date`) 
                  VALUES ('$login', '$password', '$name', '$age', Now())";
        if ($mysqli->query($query)) {
            echo "Регистрация прошла успешно!";
        } else {
            echo "Там короче что-то пошло не так...";
        }
    } else {
        echo "pass: " . $pass_ok;
        echo "login: " . $login_ok;
    }

    $mysqli->close();
}
