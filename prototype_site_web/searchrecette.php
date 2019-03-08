<?php
ob_start();
require "header.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="lesrecette.css">
</head>
<body>
	

	<?php 
	if(isset($_POST['searchrecette']) AND !empty($_POST['searchrecette'])){
		$searchrecette= htmlspecialchars($_POST['searchrecette']);
		$rect= $bdd->query('SELECT * FROM recettes where nom LIKE "%'.$searchrecette.'%" ORDER BY id_recettes ASC');?>
		<div>
			<table class="table">
				<tr>
					<td><th><p align="center">Resultat pour '<?php echo $searchrecette ?>' </p></th><td>

					</tr>
				</table></div>
				<div class="container" style="max-width: 1250px;">

					<?php
					if($rect->rowCount()>0) { 
						while ($r2 = $rect->fetch()){ ?>



						<a href="recettechoisi.php?id=<?php echo $r2['id_recettes'] ?>" class="btn btn-success">
							<div class="container" align="center" style="max-width: 1000px;" >
								<section align ="center"><table class="table">

									
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
											<td class="col-sm-3"><img src="img/<?php echo $r2['photo']?>" width="100px"/></td> 
											<td class="col-sm-3" style="font-size: 16px;" ><?php echo $r2['nom'];?></td> 
											<td class="col-sm-3"  style="font-size: 16px;" ><?php echo $r2['ingredients'];?></td>
											<td class="col-sm-3" style="font-size: 16px;" ><?php echo $r2['difficulty'];?></td>
										</tr> 
									</tbody> 
								</table></section></div></a><br><br>
								
								<?php
							} } else{ echo '<font color="red">Cette recette existe pas ! <br><br>';

							?>
						
							<?php
						} }else{
							header('Location: affichage.php');
							exit();
						}
						?></div>
						<?php 
						require "footer.php"; 
						?>
					</body>
					</html>