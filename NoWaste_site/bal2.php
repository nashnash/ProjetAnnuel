<?php
require "header.php";
require_once __DIR__ .'/validation.php';
require_once __DIR__ .'/formulaire.php';
require_once __DIR__ .'/database.php';
?>

<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                <ul class="tab-nav tab-nav2 center clearfix">

            <li class="inline-block"><a href="#tab-register">Inscription</a></li>
</ul>
<div class="tab-container">
                    <div class="tab-register clearfix" id="tab-register">
                        <div class="card nobottommargin">
                            <div class="card-body" style="padding: 40px;">
                            <form id="login-form" name="login-form" class="nobottommargin" method="post">
                                <h3>Se crée un compte</h3>

                                <?php

                                //$db = new Nowaste\Database();
                                $val = new Validateur($_POST);
                                //if($_POST)
                                //{
                                    $regles = array(
                                        'prenom' => array(
                                            'minlength' =>3
                                        ),
                                        'email' => array(
                                            'email' =>true

                                        ),
                                        'password' => array(
                                            'password' => true
                                        ),
                                        'password2' => array(
                                            'password' => true
                                        )
                                    );
                                 $val->check($regles);
                                    $form = new Form($val);
                                    echo $form->create('test');
                                ?>
                                <!--<form id="register-form" name="register-form" class="nobottommargin" method="post">-->
                                <h4>Vous êtes un : </h4>
                                    <input type="radio" name="type" value="1" checked="1"> <a>Bénévole</a>
                                    <input type="radio" name="type" value="2"> <a>Particulier</a>
                                    <input type="radio" name="type" value="3"> <a>Commerçant</a>
                                    <br>
                                    <br>
                                    <div class="col_full">
                                        <?php
                                        echo $form->input('prenom', ' Prénom');
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('nom', ' Nom', ['type' => 'text','id' => 'register-form-lname', 'name'=>"nom", 'class' => "form-control"]);
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('email', ' email', ['type' => 'email']);
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('password', 'Mot de Passe', ['type' => 'password']);
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('password2', 'Valider votre Mot de passe', ['type' => 'password']);
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('rue', 'Entrez votre adresse postale', ['type' => 'text']);
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('numero', 'Entrez votre numero adresse', ['type' => 'number']);
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('ville', 'Votre ville', ['type' => 'text']);
                                        ?>
                                    </div>

                                    <div class="col_full">
                                        <?php
                                        echo $form->input('code_postale', 'Votre Code Postale', ['type' => 'number']);
                                        ?>
                                     </div>

                                    <div class="col_full nobottommargin">
                                        <?php
                                    echo $form->end('Valider');
                                    ?>
                                        <!--<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">S'inscrire maintenant</button> -->
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
