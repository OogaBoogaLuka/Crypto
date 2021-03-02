<?php
    include_once "session.php";
    include_once "database.php";

    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM comments WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $crypto = $stmt->fetch();
    $crypto_id=$crypto['cryptocurrency_id'];
    
    $query = "DELETE FROM comments WHERE id = ? AND user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id, $user_id]);

    header("Location: cryptocurrency.php?id=$crypto_id#komentarji");
    die();

?>