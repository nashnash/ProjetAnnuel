<?php
include_once "header.php";
?>
<?php  if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){

	$supprime = (int) $_GET['supprime'];
	$req = $bdd->prepare('DELETE FROM users where id_compte = ?');
	$req->execute(array($supprime));
}?>
<?php  if(isset($_GET['photo']) AND !empty($_GET['photo'])){

	$photo = (int) $_GET['photo'];
	$req = $bdd->prepare("UPDATE users SET avatar='default.png' where id_compte = ?");
	$req->execute(array($photo));
}?>
<?php  if(isset($_GET['supprime_recettes']) AND !empty($_GET['supprime_recettes'])){

	$supprime_recettes = (int) $_GET['supprime_recettes'];
	$req = $bdd->prepare('DELETE FROM recettes where id_recettes = ?');
	$req->execute(array($supprime_recettes));
}?>
<?php  if(isset($_GET['photo_recette']) AND !empty($_GET['photo_recette'])){

	$photo_recette = (int) $_GET['photo_recette'];
	$req = $bdd->prepare("UPDATE recettes SET photo='defaultplat.jpg' where id_recettes = ?");
	$req->execute(array($photo_recette));
}?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="backOffice.css">
</head>
<body style="background-color: #ECF4F8">
	<section align="center" class="premier">

		<h2 >Utilisateurs</h2>
		<form method="GET">
			<input type="search" name="searchuser" placeholder="recherche..."/>
			<input class="btn btn-primary" type="submit" placeholder="valider"/>
		</form>
		<br><br>
		<ul >
			<?php 
			if(isset($_GET['searchuser']) AND !empty($_GET['searchuser'])){
				$searchuser= htmlspecialchars($_GET['searchuser']);
				$user= $bdd->query('SELECT id_compte,username,email,avatar FROM users where username LIKE "%'.$searchuser.'%" ORDER BY id_compte ASC');?>
				<?php
				if($user->rowCount()>0) { 
					while ($u2 = $user->fetch()){ ?>
					<div class="container" style="max-width: 1000px;"> 
						<table class="table table-bordered" style="background-color: #0999E6"> 
							
							<thead> 
								<tr> 
									<td  class="col-sm-2">Username</th>
										<td  class="col-sm-4">Email</td> 
										<td  class="col-sm-1">Photo</td> 
										<td class="col-sm-2">Suppression</td> 
										<td class="col-sm-2">Reinitialisation</td> 
									</tr> 
								</thead> 
								<tbody > 
									<tr> 
										<td>
											<?php echo $u2['username']?>
										</td> 
										<td>
											<?php echo $u2['email'];?>                 	
										</td> 
										<td>
											<img src="users/avatars/<?php echo $u2['avatar']; ?>" width="50px"/>
										</td>
										<td>
											<a href="BackOfficeUser.php?supprime=<?=  $u2['id_compte'] ?>"><button class="btn btn-danger">Supprimer utilisateur </button></a>
											
										</td> 
										<td>
											<a href="BackOfficeUser.php?photo=<?=  $u2['id_compte'] ?>"><button class="btn btn-primary">Reinitialisé la photo</button></a> 
											
										</td>
									</tr> 
								</tbody> 
							</table></div>

							<?php
						} }else{ echo 'Aucun resultat !<br><br>';
						echo '-------------------------- <br><br>'; 	 
						?>

						<?php
					} }
					?><br><br>
					<?php
					$users = $bdd->query('SELECT id_compte,username,email,avatar FROM users ORDER BY id_compte DESC LIMIT 3');
					while ($u = $users->fetch()){
						?>
						<div class="container" style="max-width: 1000px;"> 
							<table class="table table-bordered" style="background-color: #0999E6"> 
								
								<thead> 
									<tr> 
										<td  class="col-sm-1">Username</th>
											<td  class="col-sm-4">Email</td> 
											<td  class="col-sm-1">Photo</td> 
											<td class="col-sm-2">Suppression</td> 
											<td class="col-sm-2">Reinitialisation</td> 
										</tr> 
									</thead> 
									<tbody> 
										<tr> 
											<td>
												<?php echo $u['username']?>
											</td> 
											<td>
												<?php echo $u['email'];?>                 	
											</td> 
											<td>
												<img src="users/avatars/<?php echo $u['avatar']; ?>" width="50px"/>
											</td>
											<td>
												<a href="BackOfficeUser.php?supprime=<?=  $u['id_compte'] ?>"><button class="btn btn-danger">Supprimer utilisateur </button>
												</a>
												
											</td> 
											<td>
												<a href="BackOfficeUser.php?photo=<?=  $u['id_compte'] ?>"><button class="btn btn-primary">Reinitialisé la photo</button>
												</a> 
												
											</td>
										</tr> 
									</tbody> 
								</table></div>
								<?php
							}
							?>
						</ul>
					</section>
					<section align="center" class="deuxieme">
						<h2 >Recettes</h2>
						<form method="GET">
							<input type="search" name="searchrecette" placeholder="recherche..."/>
							<input class="btn btn-primary" type="submit" placeholder="valider"/>
						</form>
						<br><br>
						<ul >
							<?php 
							if(isset($_GET['searchrecette']) AND !empty($_GET['searchrecette'])){
								$searchrecette= htmlspecialchars($_GET['searchrecette']);
								$rect= $bdd->query('SELECT id_recettes,nom,photo FROM recettes where nom LIKE "%'.$searchrecette.'%" ORDER BY id_recettes ASC');?>
								<?php
								if($rect->rowCount()>0) { 
									while ($r2 = $rect->fetch()){ ?>

									<div class="container" style="max-width: 1000px;">
										<table class="table table-bordered" style="background-color: #0999E6"> 
											
											<thead> 
												<tr> 
													<td class="col-sm-3">Nom Recette</td> 
													<td class="col-sm-3">Image</td>
													<td class="col-sm-3">Suppression</td> 
													<td class="col-sm-2">Reinitialisation</td> 
												</tr> 
											</thead> 
											<tbody> 
												<tr> 
													<td><?php echo $r2['nom'];?></td> 
													<td><img src="img/<?php echo $r2['photo']; ?>" width="100px"/></td>
													<td>
														<a href="BackOfficeUser.php?supprime_recettes=<?=  $r2['id_recettes'] ?>">
															<button class="btn btn-danger">Supprimer recette </button></a></td> 
															<td>
																<a href="BackOfficeUser.php?photo_recette=<?=  $r2['id_recettes'] ?>"><button class="btn btn-primary">Reinitialisé la photo</button>
																</a> 
																
															</td>
														</tr> 
													</tbody> 
												</table></div>
												<?php
											} }else{ echo 'Cette recette existe pas ! <br><br>';
											echo '-------------------------- <br><br>'; 
											?>
											<?php
										} }
										?>
										<?php 
										$recette = $bdd->query('SELECT id_recettes,nom,photo FROM recettes ORDER BY id_recettes DESC LIMIT 3'); 
										while ($r = $recette->fetch()){
											?>
											<div class="container" style="max-width: 1000px;">
												<table class="table table-bordered" style="background-color: #0999E6"> 
													
													<thead> 
														<tr> 
															<td class="col-sm-1">Nom Recette</td> 
															<td class="col-sm-1">Image</td>
															<td class="col-sm-1">Suppression</td> 
															<td class="col-sm-2">Reinitialisation</td> 
														</tr> 
													</thead> 
													<tbody> 
														<tr> 
															<td><?php echo $r['nom'];?></td> 
															<td><img src="img/<?php echo $r['photo']; ?>" width="100px"/></td>
															<td>
																<a href="BackOfficeUser.php?supprime_recettes=<?=  $r['id_recettes'] ?>">
																	<button class="btn btn-danger">Supprimer recette </button></a></td> 
																	<td>
																		<a href="BackOfficeUser.php?photo_recette=<?=  $r['id_recettes'] ?>"><button class="btn btn-primary">Reinitialisé la photo</button>
																		</a> 
																		
																	</td>
																</tr> 
															</tbody> 
															</table></div>				<?php
														}
														?><br>
														<a href="add_recette.php"><button class="btn btn-primary">ajouter une recette</button></a>
													</ul>
												</section>
												<?php 
												include_once "footer.php";
												?>
											</body>
											</html>