<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

function test_input($data)
{
    $data = substr($data, 0, 20);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
