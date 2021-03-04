<?php
session_start();
//dostop za neprijavljene uporabnike
$allow = ['/crypto/index.php', '/crypto/login.php', '/crypto/register.php', '/crypto/login_check.php'];

if(!isset($_SESSION['user_id']) && (!in_array($_SERVER['REQUEST_URI'], $allow))) {
    header("Location: login.php");
    die();
}

function getFullName($user_id) {
    require "database.php";
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);

    $user = $stmt->fetch();

    return $user['first_name'].' '.$user['last_name'];
}

function admin() {
    return $_SESSION['admin'];
}

function adminOnly() {
    if(!isset($_SESSION['admin']) || ($_SESSION['admin'] != 1)) {
        header("Location: index.php");
        die();
    }
}

?>