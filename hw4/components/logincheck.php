<?php
session_start();
if ($_SESSION['logedin'] != 1) {
    header("location:../registration/logout.php");
}
