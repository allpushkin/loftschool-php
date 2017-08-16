<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "UPDATE `hamburgers`.`orders` SET `proceeded`='1' WHERE id=$id");
header("Location:index.php");
