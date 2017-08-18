<?php
session_start();
if ($_SESSION['logedin'] != 1) {
    header("location:../registration/logout.php");
}
$login = $_SESSION['login'];
require_once "db/db.php";

if (isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];
    $fileExtension = strtolower(end(explode(".", $fileName)));
    $fileExtensions = ['jpeg','jpg','png'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName  = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $errors = [];

    if (! in_array($fileExtension, $fileExtensions)) {
        $errors = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 200000) {
        $errors = "This file is more than 2000. Sorry, it has to be less than or equal to 2MB";
    }

    if (empty($errors)) {
        $fileName = $login . "." . $fileExtension;
        $uploadPath = "pictures/" . $fileName;
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        $query = "UPDATE users SET picture='$uploadPath' WHERE login='$login'";
        $mysqli->query($query);

        if ($didUpload) {
            //echo "The file " . basename($fileName) . " has been uploaded";
        } else {
            //echo "An error occurred somewhere. Try again or contact the admin";
        }
    } else {
        foreach ($errors as $error) {
            //echo $error . "These are the errors" . "\n";
        }
    }
}

header("location:personal.php");
