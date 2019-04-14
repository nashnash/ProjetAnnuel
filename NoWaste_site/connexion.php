<?php
require "header.php";
require_once __DIR__ .'/validation.php';
require_once __DIR__ .'/formulaire.php';
require_once __DIR__ .'/database.php';
 ?>

<body class="stretched">

<!-- Content
    ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                <ul class="tab-nav tab-nav2 center clearfix">
                    <li class="inline-block"><a href="#tab-login">Connexion</a></li>

                </ul>

                <div class="tab-container">

                    <div class="tab-content clearfix" id="tab-login">
                        <div class="card nobottommargin">
                            <div class="card-body" style="padding: 40px;">
                                <form id="login-form" name="login-form" class="nobottommargin" method="post">

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




                            </div>
                        </div>
                    </div>

                </div>

            </div>




</section><!-- #content end -->


</body>


<?php require "footer.php"; ?>
