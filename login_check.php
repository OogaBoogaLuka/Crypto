<?php

    include_once "database.php";

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if(!empty($email) && !empty($pass)) {
        $query = "SELECT * FROM users WHERE email =?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);

        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch(); //user['first_name'], user['last_name'], user['id'], $user['pass']...

            if(password_verify($pass, $user['pass'])) {

                header("Location: index.php");
                die();
            }
        }
    }
    header("Location: login.php");
    die();
?>