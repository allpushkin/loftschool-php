<?php
require_once "config.php";
$stmt = $mysqli->prepare("UPDATE orders SET proceeded = '1' WHERE id = ?");
$stmt->bind_param("s", $id);
$id = $_GET['id'];
$stmt->execute();
header("Location:done.php");