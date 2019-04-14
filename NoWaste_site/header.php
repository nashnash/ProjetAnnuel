
<?php

require_once __DIR__ .'/database.php';
require_once __DIR__ .'/validation.php';
require_once __DIR__ .'/formulaire.php';



?>
<!DOCTYPE html>
<html  lang="fr-FR">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="NoWaste" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>FightFoodWaste | Ensemble évitons le gaspillage</title>

    <style>
        #top-header-buttons {
            float: right;
            margin: 33px 0;
            -webkit-transition: margin .4s ease;
            -o-transition: margin .4s ease;
            transition: margin .4s ease;
        }

        #header.sticky-header #top-header-buttons { margin: 13px 0; }

        #top-header-buttons a { margin: 0 0 0 15px; }

        #top-header-buttons a:not(.button) { color: #FFF; }
        #top-header-buttons a:not(.button):hover { color: #DDD; }

        #header.sticky-header #top-header-buttons a:not(.button) { color: #1ABC9C; }
        #header.sticky-header #top-header-buttons a:not(.button):hover { color: #111; }

        .device-md #top-header-buttons {
            position: absolute;
            top: 0;
            left: auto;
            right: 15px;
        }
    </style>

</head>

<header id="header" class="transparent-header full-header" data-sticky-class="not-dark" style="background-color: #7a0012">

    <div id="">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo-dark.png" alt="Canvas Logo"></a>
                <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <div id="top-account" class="dropdown">
                <a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i>Compte</a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item tleft" href="#">Profile</a>
                    <a class="dropdown-item tleft" href="#">Messages <span class="badge badge-pill badge-secondary fright" style="margin-top: 3px;">5</span></a>
                    <a class="dropdown-item tleft" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item tleft" href="#">Logout <i class="icon-signout"></i></a>
                </ul>
            </div>

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="dark">

                <ul>
                    <li class="current"><a href="index.php"><div>Accueil</div></a>

                    <li><a href="#"><div>Qui sommes-nous ?</div></a>
                        <ul>
                            <li><a href="concept.php"><div><i class="icon-stack"></i>Concept</div></a>

                            </li>


                            <li><a href="equipe.php"><div><i class="icon-envelope-alt"></i>Présentation de l'équipe</div></a>

                            </li>

                        </ul>
                    </li>

                    <li><a href="#"><div>Support / FAQ</div></a>
                        <ul>
                            <li><a href="FAQ.php"><div><i class="icon-stack"></i>Question / Réponse</div></a>

                            </li>


                            <li><a href="contact.php"><div><i class="icon-envelope-alt"></i>Contactez service client</div></a>

                            </li>

                        </ul>
                    </li>



                    <li class="mega-menu"><a href="contact.php"><div>Contactez-nous</div></a>

                    </li>



                </ul>

                <div id="top-header-buttons" class="d-none d-md-block">
                    <a href="connexion.php" class="button button-3d button-small button-rounded">Se connecter</a>
                    <a href="inscription.php" class="button button-3d button-small button-rounded">Inscrivez-vous</a>

                </div>

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->
