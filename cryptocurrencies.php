<?php
    include_once "header.php";
?>

<br />
<h1>Kripto valute</h1>

<br />

<?php

    include_once "database.php";
    $query = "SELECT * FROM cryptocurrencies";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    while($row = $stmt->fetch()) {
        echo $row['title'].' - '.$row['current_price'];
        echo '<br />';
    }

?>

<br />

<a href="cryptocurrency_add.php" class="btn btn-primary">Dodaj valuto</a>

<?php
    include_once "footer.php";
?>