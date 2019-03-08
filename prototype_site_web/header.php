<?php
    session_start();
    require "conf.php";

    if (!empty($_SESSION["id_user"])) {

        $query = $bdd->prepare("SELECT * FROM users WHERE id_compte = :id_compte");
        $query->execute([
            "id_compte" => $_SESSION["id_user"]
        ]);

        $user = $query->fetch(PDO::FETCH_ASSOC);

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" description="ceci est la description">
    <title>Cuisine Vie</title>
    <link rel="icon" type="img/png" href="img/logo-site.png" /> <!--favicon du site-->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="test.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #ECF4F8">
	<header>
		<div class="container-fluid head">
    
            <div align="center" class="container">
               <!-- <h1 class= "titre">Cuisine vie</h1>-->
                <div class="row">

            <a href="index.php">    <img src="img/logo-site.png" alt="Cuisine Vie" width="200px"><br> </a>
                <img src="img/barre.PNG"><img src="img/barre.PNG">

                <nav class="row">
                    <ul>

                        <a href="index.php" class="btn btn-success">Accueil</a>
                        <a href ="add_recette.php" class="btn btn-success">Ajouter recette</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                            Conseil Santé<span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="calcul.php">Nombre de calories / jour</a></li>
                                <li><a href="calcul2.php">IMC et Poids idéal</a></li>
                            </ul>
                        </div>
                        <a href ="affichage.php" class="btn btn-success">Nos recettes</a>
                        <?php
/*
                            echo "<pre>";
                            print_r($_SESSION);
                            echo "</pre>";


                            echo "<pre>";
                            print_r($user);
                            echo "</pre>";
*/

                            if (empty($_SESSION["id_user"]))  {
                                echo '
                                <a href="inscription.php" class="btn btn-success">S\'inscrire</a>
                                <a href="verifconnexion.php" class="btn btn-success">Se connecter</a>';


                            }
                             else {
                                echo '   <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Profil de '.$user["username"].'<span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                <li><a href="profil.php">Consulter votre profil</a></li>
                                <li><a href="deco.php">Se Déconnecter</a></li>
                            </ul>
                        </div>';

                        if($_SESSION["id_user"] == '27'){
                                echo '<a href="backofficeuser.php" class="btn btn-success">Back office</a>';

                            }
                            }
                            
                        ?>
                        
                        
                    </ul>
                    <img src="img/barre.PNG"><img src="img/barre.PNG">
                </nav>
                
                </div>
            </div>
        </div>
	</header>
    <?php
    if (isset($erreur))
                {
                    echo '<font color="red">'.$erreur."</font"; 
                }
                ?>
