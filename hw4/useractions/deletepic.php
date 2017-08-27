<?php
require_once "../components/helpers.php";
require_once "../registration/db/db.php";

$picture = test_input($_POST['name']);
$tmp = explode(".", $picture);
$fileType = end($tmp);
$fileExtensions = ['jpeg','jpg','png'];

$file ='pictures/' . $picture;
$path = realpath($file);
$path = dirname($file, 1);

if ($path === "pictures" && in_array($fileType, $fileExtensions) && $picture != "default.jpg") {
    unlink($file);
    $query = "UPDATE users SET picture='' WHERE picture='$file'";
    $mysqli->query($query);
    echo "Файл успешно удален!";
} else {
    echo "Ты не прав!";
};