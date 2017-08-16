<?php

$config = include 'config.php';

$mysqli = new mysqli(
    $config->host,
    $config->username,
    $config->password,
    $config->database,
    $config->port
);

$mysqli->set_charset('utf8');

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
