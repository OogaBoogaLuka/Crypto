<?php
    include_once "session.php";
    include_once "database.php";

    $id = $_POST['id']; //katero valuto urejam

    $title = $_POST['title'];
    $description = $_POST['description'];
    $current_price = floatval($_POST['current_price']);

    $target_dir = "slike/";
    $random = date('YmdHisu');
    $target_file = $target_dir . $random . basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //preveri ali ima datoteka dejansko velikost
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
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
    if (!empty($title)) {  

        if($uploadOk == 1){
        
            if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                //zapiše se v bazo
                $query = "UPDATE cryptocurrencies SET title=?, description=?, current_price=?, logo=? WHERE id=?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$title,$description,$current_price,$target_file,$id]);

                 header("Location: cryptocurrency.php?id=".$id);
                die();
            } else {
                header("Location: cryptocurrency_edit.php?id=$id");
                die();
           }  
        }  
        else {
            $query = "UPDATE cryptocurrencies SET title=?, description=?, current_price=? WHERE id=?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$title,$description,$current_price,$id]);

                 header("Location: cryptocurrency.php?id=".$id);
                die();
    }   
    }
    else {
        header("Location: cryptocurrency_add.php");
        die();
    }

?>