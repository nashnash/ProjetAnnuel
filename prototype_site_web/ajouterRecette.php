<?php
	session_start();
	require "conf.php";


 	$query = $bdd->prepare("INSERT INTO recettes
 							(nom, ingredients, difficulty, realisation,photo)
 							VALUES (:nom, :ingredients, :difficulty, :realisation, :photo)");

 	$query->execute([
 		"nom"=> $_POST["recette"],
 		"ingredients"=> $_POST["ingredients"],
 		"difficulty"=> $_POST["difficulty"],
 		"realisation"=> $_POST["realisation"],
 		"photo"=>$_POST["photo"]
 	]);

 	header("Location: affichage.php");

?>