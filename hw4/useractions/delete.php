<?php
require_once "../registration/db/db.php";
require_once "../components/helpers.php";

$login = test_input($_GET['del']);
$query = "DELETE FROM users WHERE `login`='$login'";
$mysqli->query($query);

header("location:javascript://history.go(-1)");
