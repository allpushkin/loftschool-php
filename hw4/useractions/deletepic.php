<?php
require_once "../components/helpers.php";
require_once "../registration/db/db.php";

$picture = test_input($_GET['del']);
$file ='pictures/' . $picture;
unlink($file);
$query = "UPDATE users SET picture='' WHERE picture='$file'";
$mysqli->query($query);

header("location:javascript://history.go(-1)");
