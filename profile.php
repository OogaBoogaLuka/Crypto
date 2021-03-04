<?php 
    include_once "header.php";
    include_once "database.php";

    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    $user = $stmt->fetch();
?>

<section class="page-section">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Uredi svoje podatke</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form action="user_update.php" method="post" enctype="multipart/form-data">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Ime</label>
                            <input class="form-control" type="text" name="first_name" placeholder="vnesite ime"
                                required="required" value="<?php echo $user['first_name'];?>"/> <br />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Opis</label>
                            <textarea name="description" placeholder="Vnesi opis" rows="5">
                            <?php echo $user['description'];?>
                            </textarea> <br />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Priimek</label>
                            <input class="form-control" type="text" name="last_name" placeholder="vnesite priimek"
                                required="required" value="<?php echo $user['last_name'];?>"/> <br />
                        </div>
                    </div>
                    
                    <br />
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton"
                            type="submit">Pošlji</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Uredi svoj avatar</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <div>
            <?php
                if(!empty($user['avatar'])) {
                    echo '<img src="'.$user['avatar'].'" alt="slika" width="150px" />';
                }
            ?>
        </div>

        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form action="user_avatar.php" method="post" enctype="multipart/form-data">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Avatar</label>
                            <input class="form-control" type="file" name="avatar" placeholder="Izberi datoteko"
                                required="required" /> <br />
                        </div>
                    </div>                
                    <br />
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton"
                            type="submit">Pošlji</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Spremeni geslo</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form action="user_change_pass.php" method="post">

                <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Geslo</label>
                            <input class="form-control" type="password" name="pass" placeholder="vnesite geslo"
                                required="required" /> <br />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Ponovi geslo</label>
                            <input class="form-control" type="password" name="pass2" placeholder="ponovno vnesite geslo"
                                required="required" /> <br />
                        </div>
                    </div>            
                    <br />
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton"
                            type="submit">Pošlji</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    include_once "footer.php";
?>