<?php
    include_once "header.php";
    include_once "database.php";

    $id = (int) $_GET['id'];

    $query = "SELECT * FROM cryptocurrencies WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    if ($stmt->rowCount() != 1) {
        header("Location: index.php");
        die();
    }

    $crypto = $stmt->fetch();
?>



<section class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="<?php echo $crypto['logo']; ?>" alt="" />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0"><?php echo $crypto['title'];?></h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0"><?php echo $crypto['description'];?></p>
        <div class="crypto_price">Trenutna cena: <span><?php echo $crypto['current_price'];?></span></div>
        <div class="crypto_rating">Trenutna ocena: <span><?php echo round($crypto['rating'],1);?></span></div>
    </div>
</section>

<div class="container d-flex justify-content-center mt-20">
    <div class="row">
        <div class="col-md-12">
            <div class="stars">
                <form action="rate_insert.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $crypto['id'];?>" />
                    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                    <label class="star star-1" for="star-1"></label> <br />
                    <input type="submit" value="glasuj " class="btn btn-primary" />
                </form>
            </div>
        </div>
    </div>
</div>

<div class="komentarji" id="komentarji">
    <div class="obrazec">
        <form action="comment_insert.php" method="post">
            <input type="hidden" name="id" value="<?php echo $crypto['id'];?>"/>
            <textarea name="content" rows="5" cols="25"></textarea> <br />
            <input type="submit" value="Komentiraj" class="btn btn-primary" />
        </form>
    </div>
    <div class="seznam">
        <?php
            $query = "SELECT * FROM comments WHERE cryptocurrency_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$id]);
        
            while ($row = $stmt->fetch()) {
                ?>
                <div class="komentar">
                    <div class="oseba"><?php echo getFullName($row['user_id']).' ('.date('j. n. Y H:i',strtotime($row['date_add']));?>)</div>
                    <div class="vsebina"><?php echo $row['content'];?></div>
                </div><?php
            }
        
        ?>
        
    </div>
</div>

<br />
<a href="cryptocurrency_delete.php?id=<?php echo $crypto['id'];?>" class="btn btn-primary"
    onclick="return confirm('Prepričani?')">Izbriši</a>

<a href="cryptocurrency_edit.php?id=<?php echo $crypto['id'];?>" class="btn btn-primary">Uredi</a>

<?php
    include_once "footer.php";
?>