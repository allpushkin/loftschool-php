<?php
session_start();
$login = $_SESSION['login'];
require_once "../components/helpers.php";
require_once "db/db.php";
if (isset($_POST['description'])) {
    $description = test_input_description($_POST['description']);
    $query = "UPDATE users SET description='$description' WHERE login='$login'";
    $mysqli->query($query);
}

header("location:personal.php");
