<?php
            include_once "header.php";
            ?>

<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Registracija</h2>
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
                <form action="user_insert.php" method="post">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Ime</label>
                            <input class="form-control" type="text" name="first_name" placeholder="vnesite ime"
                                required="required" /> <br />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Priimek</label>
                            <input class="form-control" type="text" name="last_name" placeholder="vnesite priimek"
                                required="required" /> <br />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>E-pošta</label>
                            <input class="form-control" type="email" name="email" placeholder="vnesite e-pošto"
                                required="required" /> <br />
                        </div>
                    </div>
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
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Pošlji</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
            include_once "footer.php";
            ?>