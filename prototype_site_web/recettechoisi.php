<?php
require "header.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="lesrecette.css">
</head>
<body>
	<div class="container" style="max-width: 1250px;">
		<?php 
		if(isset($_GET['id']) AND !empty($_GET['id'])){

			$lesrecettes=$_GET['id'];
			$req = $bdd->prepare('SELECT * FROM recettes where id_recettes = "'.$lesrecettes.'"');
			$req->execute(array($lesrecettes));
			while ($affiche = $req->fetch()){?> <!-- $affiche possede les valeurs envoyer par la recette -->
			<table class="table">
				<tr>
					<h1 class="titreR" align="center"><?php echo $affiche['nom'];?></h1>
				</tr></table>
				<br>
				<table class="table">
					<tr>
						<td><img class="col-sm-10" width="500px" src="img/<?php echo $affiche['photo']?>" /></td>
						<td>
							<h2 align="center">Les Ingrédients</h2><br>
							<p align="center"><?php echo $affiche['ingredients'];?></p><br><br>
							<h2 align="center">Difficulté</h2>
							<p align="center"><?php echo $affiche['difficulty'];?></p>
						</td>
						<tr>
						</table>
						<br>
						<table class="table">
							<tr>
								<h2 align="center">Comment réaliser cette recette</h2>
								<br>
								<p align="center"><?php echo $affiche['realisation'];?></p>
							</tr>
						</table></div>
						<?php

					}
				}?>
			</div>
			<?php

			include "footer.php";
			?>