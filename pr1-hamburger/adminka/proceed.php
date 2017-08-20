<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "UPDATE `orders` SET `proceeded`='1' WHERE id='$id'");
header("Location:done.php");
