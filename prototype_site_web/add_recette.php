<?php
ob_start(); // -Enclenche la temporisation de sortie , Nous permet d'effectuer les redirections
require "header.php";

if(isset($_SESSION['id_user']))
{

	if(isset($_POST['go_recette']))
	{

		if(isset($_FILES['photo']) AND !empty($_FILES['avatar']['name']))
		{
    $taillemax = 2097152; //taille de 2mo 
    $extensionvalides = array('jpg', 'jpeg','png','gif');
    if($_FILES['photo']['size'] <= $taillemax) //si la taille est < ou = a 2 mo 
    {
    	$extensionupload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'),1));
    	//strrchr renvoie l'extension avec le point (« . »).
		//substr(chaine,1) ignore le premier caractère de chaine.
		//strtolower met l'extension en minuscules.

    	if(in_array($extensionupload, $extensionvalides)) // on regarde dans le tableau extensionvalide si la variable extensionupload y est.
    	{
        $chemin = "img/".$_SESSION['id_user'].$_POST["recette"].".".$extensionupload; //chemin pour mettre l'image dans notre dossier
        $resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$chemin);

        if($resultat)
        {

        	$query = $bdd->prepare("INSERT INTO recettes
        		(nom, ingredients, difficulty, realisation,photo)
        		VALUES (:nom, :ingredients, :difficulty, :realisation, :photo)");

        	$query->execute(array(
        		"nom"=> htmlspecialchars($_POST["recette"]),
        		"ingredients"=> htmlspecialchars($_POST["ingredients"]),
        		"difficulty"=> $_POST["difficulty"],
        		"realisation"=> htmlspecialchars($_POST["realisation"]),
        		'photo' =>$_SESSION['id_user'].$_POST["recette"].".".$extensionupload));

        	header("Location: affichage.php");
        	exit();
        	
        }
        else
        {
        	$msg ="Erreur";
        }
    }
    else
    {
    	$msg ="Votre photo doit être au format jpg / jpeg / pgn / gif ";
    }
}
else
{
	$msg ="Votre photo ne doit pas dépasser 2Mo";
}

}else{
	$query = $bdd->prepare("INSERT INTO recettes
		(nom, ingredients, difficulty, realisation,photo)
		VALUES (:nom, :ingredients, :difficulty, :realisation, :photo)");

	$query->execute(array(
		"nom"=> htmlspecialchars($_POST["recette"]),
		"ingredients"=> htmlspecialchars($_POST["ingredients"]),
		"difficulty"=> $_POST["difficulty"],
		"realisation"=> htmlspecialchars($_POST["realisation"]),
		'photo' =>"defaultplat.jpg"));

	header("Location: affichage.php");
	exit();

}

}
?>

<div align="center">
	<script src="jsingredients.js"></script>
	<h2>Ajouter vos meilleurs recettes</h2>
</div>
<div class="container" style="max-width: 500px;">
	<br>

	<form class="form-horizontal" name="AI" action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-3 " for="recette">Nom de la recette:</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="recette" placeholder="nom de la recette" required="">
			</div></div>
			<div class="form-group">
				<label class="col-sm-3 " for="Difficulté">Difficulté:</label>
				<div class="col-sm-9">
					<select class="form-control" name="difficulty">
						<option value="easy">facile</option>
						<option value="medium">intermediaire</option>
						<option value="hard">difficile</option>
					</select>
				</div></div>

				<div class="form-group">
					<label class="col-sm-3 " for="ingredients">Ingrédients:</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ingredient" placeholder="les Ingrédients" onFocus="javascript:this.value=''" id="required">
					</div></div>
					<input class="btn btn-primary" type="button" onclick="add_ingredient()" value="ajouter Ingrédients" ></input><br><br>

					<div class="form-group">
						<label class="col-sm-3 " for="liste">Liste des Ingredients</label>
						<div class="col-sm-9">
							<textarea id="tab" class="form-control" type="text" name="ingredients" placeholder="Ingrédients" readonly=""></textarea>
						</div></div>
						<div class="form-group">
							<label class="col-sm-3 " for="realisation">Réalisation</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="realisation" required=""></textarea>
							</div></div>

							<div class="form-group">
								<label class="col-sm-3" for="photo">Photo de recette</label>
								<div class="col-sm-9">
									<input  type="file" name="photo"/>
								</div>
							</div>

							
							<br><br>
							<button type="submit" class="btn btn-primary" name="go_recette" value="valider">Ajouter</button>
						</form><br><br></div>
						<div align="center">
					<?php
					if (isset($msg))
					{
						echo '<font color="red">'.$msg."</font"; 
					}
					?>
				</div>
					


					<?php 
					include "footer.php"; 
				}

				else {

					$erreur = "Erreur, il vous faut un compte pour ajouter des recettes !"; 

					?>

					<br>
					<div align="center">
					<?php
					
					if (isset($erreur))
					{
						echo '<font color="red">'.$erreur."</font"; 
					}
					include "footer.php";
				} 
				?>
				<div align="center">