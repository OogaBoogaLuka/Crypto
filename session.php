<?php
session_start();
//dostop za neprijavljene uporabnike
$allow = ['/crypto/index.php', '/crypto/login.php', '/crypto/register.php', '/crypto/login_check.php'];

if(!isset($_SESSION['user_id']) && (!in_array($_SERVER['REQUEST_URI'], $allow))) {
    header("Location: login.php");
    die();
}

?>