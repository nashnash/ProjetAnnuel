<?php require "header.php"; ?>

<body class="stretched">


<!-- Content
    ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                <ul class="tab-nav tab-nav2 center clearfix">
                    <li class="inline-block"><a href="#tab-login">Connexion</a></li>
                    <li class="inline-block"><a href="#tab-register">Inscription</a></li>
                </ul>

                <div class="tab-container">

                    <div class="tab-content clearfix" id="tab-login">
                        <div class="card nobottommargin">
                            <div class="card-body" style="padding: 40px;">
                                <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">

                                    <h3>Connectez vous à votre compte</h3>

                                    <div class="col_full">
                                        <label for="login-form-username">Login:</label>
                                        <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="login-form-password">Mot de passe:</label>
                                        <input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
                                    </div>

                                    <div class="col_full nobottommargin">
                                        <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Connexion</button>
                                        <a href="#" class="fright">Mot de passe oublié ?</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content clearfix" id="tab-register">
                        <div class="card nobottommargin">
                            <div class="card-body" style="padding: 40px;">
                                <h3>Se crée un compte</h3>

                                <form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

                                    <div class="col_full">
                                        <label for="register-form-name">Nom:</label>
                                        <input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-email">Adresse mail:</label>
                                        <input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-username">Choisissez un login:</label>
                                        <input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-phone">Téléphone:</label>
                                        <input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-password">Password:</label>
                                        <input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-repassword">Re-tapez votre mot de passe:</label>
                                        <input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
                                    </div>

                                    <div class="col_full nobottommargin">
                                        <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">S'inscrire maintenant</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->


</body>


<?php require "footer.php"; ?>
