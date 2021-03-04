<?php
    include_once "session.php";
    include_once "database.php";


    $id = $_SESSION['user_id'];

    $target_dir = "avatars/";
    $random = date('YmdHisu');
    $target_file = $target_dir . $random . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //preveri ali ima datoteka dejansko velikost
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }


    // Check file size max 5MB
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $uploadOk = 0;
        }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    //preverim ali so podatki polni
    if ($uploadOk == 1) {  
        
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            //zapiše se v bazo
            $query = "UPDATE users SET avatar = ? WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$target_file,$id]);

             header("Location: profile.php");
            die();
        } else {
            header("Location: profile.php");
            die();
        }       
    }
    else {
        header("Location: profile.php");
        die();
    }

?>