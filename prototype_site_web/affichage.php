<?php
require "header.php"; 
?>

<?php
$query = $bdd->prepare('SELECT * FROM recettes limit 10');
$query->execute();
$allrecettes = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="lesrecette.css">
</head>
<body>


	<div>
		<table class="table">
			<tr>
				<td><th><p align="center">Nos Dernieres Recettes</p></th><td>

				</tr>
			</table>
		</div>
		<div class="container" style="max-width: 1250px;">
			<div align="center">
				<form  method="POST" action="searchrecette"> 
					<input class="form-control" type="search" name="searchrecette" placeholder="recherche..."/><br>
					<input class="btn btn-primary" type="submit" placeholder="valider"/>
				</form><br><br>
			</div><br><br>
			

				<?php 
				foreach ($allrecettes as $key => $recette) {
					?>
					
					<a href="recettechoisi.php?id=<?php echo $recette['id_recettes'] ?>" class="btn btn-success">
					<div class="container" align="center" style="max-width: 1000px;" >
					<section align ="center">
						<table class="table">

                 <section align ="center">
         <thead> 
                 <tr> 
                 <td>Image</td>
                 <td>Recette</td> 
                 <td>Ingredients</td>
                 <td>Difficulte</td> 
                 </tr> 
         </thead> 
         <tbody> 
                 <tr> 
                 <td class="col-sm-3"><img src="img/<?php echo $recette['photo']?>" width="100px"/></td> 
                 <td class="col-sm-3"  ><?php echo $recette['nom'];?></td> 
                 <td class="col-sm-3"  ><?php echo $recette['ingredients'];?></td>
                 <td class="col-sm-3"  ><?php echo $recette['difficulty'];?></td>
                 </tr> 
        </tbody></section> 
</table>
</section></div></a><br><br>


					<?php
					
				}
				?>
				
			
			
		</div>

		<?php 
		require "footer.php"; 
		?>

	</body>
	</html>
