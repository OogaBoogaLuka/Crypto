<?php
    include_once "header.php";
?>

<br />

<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Kripto valute</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <?php

            include_once "database.php";
            $query = "SELECT * FROM cryptocurrencies";

            $stmt = $pdo->prepare($query);
            $stmt->execute();
            while($row = $stmt->fetch()) {
                ?>
                <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto">
                    <a href="cryptocurrency.php?id=<?php echo $row['id']; ?>">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><?php
                            echo $row['current_price'];
                        ?></div>
                    </div>
                    <img class="img-fluid" src="<?php echo $row['logo']; ?>" alt="" width="" />
                    <h3 class="justify-content-center row align-items-center"><?php echo $row['title']; ?></h3>
                </div>
            </div>
            <?php
            }

            ?>
        </div>
    </div>
</section>

<br />
<?php if(admin()) {
    echo '<a href="cryptocurrency_add.php" class="btn btn-primary">Dodaj valuto</a>';
}
?>


<?php
    include_once "footer.php";
?>