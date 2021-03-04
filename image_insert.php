<?php
    include_once "session.php";
    adminOnly();
    include_once "database.php";

    $title = $_POST['title'];
    $id = (int)$_POST['id'];

    $target_dir = "imagesCC/";
    $random = date('YmdHisu');
    $target_file = $target_dir . $random . basename($_FILES["url"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //preveri ali ima datoteka dejansko velikost
    $check = getimagesize($_FILES["url"]["tmp_name"]);
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
        
        if (move_uploaded_file($_FILES["url"]["tmp_name"], $target_file)) {
            //zapiše se v bazo
            $query = "INSERT INTO images(title, url, cryptocurrency_id, user_id) 
            VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$title,$target_file,$cryptocurrency_id,$_SESSION['user_id']]);

             header("Location: cryptocurrency.php?id=$id");
            die();
        } else {
            header("Location: cryptocurrency.php?id=$id");
            die();
        }       
    }
    else {
        header("Location: cryptocurrency.php?id=$id");
        die();
    }

?>