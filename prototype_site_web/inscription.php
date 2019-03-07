<?php
ob_start();
	include "header.php"; 

	if(isset($_POST['forminscription']))
	{

			
			$username = htmlspecialchars($_POST['username']);
			$mail = htmlspecialchars($_POST['email']);
			$mdp = sha1($_POST['password']);
			$mdp2 = sha1($_POST['password2']);
			$type = htmlspecialchars($_POST['type']);
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);

		$to=$mail; // Pour celui qui recevra l'email
		$from = 'cuisinevie@outlook.fr'; // Celui qui envoie l'email
		$subject='Inscription cuisine vie';
		//$message="Bonjour ".$nom."\n"."Votre inscription a bien été prise en compte. L'équipe de CuisineVie vous souhaite la bienvenue :)";
		$headers= "Content-type:text/html;charset='UTF-8' ";
		$headers.="From: ".$from;

		mail($to, $subject, " <h1 align='center'> Bonjour " .$prenom. "</h1> <br> Votre inscription est bien prise en compte :) ", $headers);
		

		if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']))
		{

		
			
			$reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
			$requsername = $bdd->prepare("SELECT * FROM users WHERE username = ?");

			$reqmail->execute(array($mail));
			$mailexist = $reqmail->rowCount();
			$requsername->execute(array($username));
			$usernameexist = $requsername->rowCount();



			if($mailexist ==0)
			{
				if($usernameexist ==0)
				{

				if($mdp == $mdp2)
				{
					$insertmbr= $bdd->prepare("INSERT INTO users(nom,prenom,username,email,type,password,avatar) VALUES(?,?,?,?,?,?,?)");
					
					$insertmbr->execute(array($nom, $prenom, $username, $mail, $type, $mdp,"default.png"));
					
					header('Location: http://cuisinevie.fr/verifconnexion.php');
					exit();
					
				}
				else
				{
					$erreur = "Vos mots de passe ne correspondent pas !";
				}
			}else
			{
				$erreur ="Pseudo déjà utilisé !";
			}

			}
			else
			{
				$erreur = "Adresse mail déja utilisée";

			}
		}
		else
		{
			$erreur = "Tous les champs doivent être complétes !";
		}

	} 
?>	
<div align="center">
	<h2> Page d'inscription</h2>
	<br><br>

    <div class="container" style="max-width: 600px;">
		<form class="form-horizontal" action ="" method="post" autocomplete="false">

			<div class="form-group">
			    <label class="control-label col-sm-3" for="pwd">Nom</label>
			    <div class="col-sm-9"> 
			      <input onblur="check()" id="nom" class="form-control" type="text" name="nom" placeholder="Votre nom" >
			    </div>
		  	</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="pwd">Prénom</label>
				<div class="col-sm-9"> 
					<input onblur="check()" id="prenom" class="form-control" type="text" name="prenom" placeholder="Votre prénom" >
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="pwd">Pseudo</label>
				<div class="col-sm-9"> 
				  	<input onblur="check()" id="pseudo" class="form-control" type="text" name="username" placeholder="Pseudo" value="<?php if(isset($username)) { echo $username; } ?>" >
				</div>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-3" for="email">Email</label>
			    <div class="col-sm-9">
			      <input onblur="check()" id="mail" type="email" class="form-control" name="email" placeholder="Adresse email" value="<?php if(isset($mail)) { echo $mail; } ?>">
			    </div>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-3" for="pwd">Mot de passe</label>
			    <div class="col-sm-9"> 
			      <input onblur="check()" type="password" name="password" class="form-control" id="pwd" placeholder="Mot de passe">
			    </div>
			</div>

			<div class="form-group">
			    <label class="control-label col-sm-3" for="pwd">Confirmation du mot de passe</label>
			    <div class="col-sm-9"> 
			      <input class="form-control" type="password" name="password2" placeholder="Confirmer le mont de passe">
			    </div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-8">
					<div class="checkbox">
						<label><input type="checkbox"> Remember me</label>
					</div>
				</div>
			</div>

			<input type="radio" name="type" value="1" checked="1"> Homme</input>
			<input type="radio" name="type" value="2"> Femme</input>*

			<br><br>

			<div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-8">
			      <button type="submit" class="btn btn-primary" value="Inscription" name="forminscription" class="btn btn-default">Valider</button>
			      <br>
			      <p>Un mail de confirmation va vous être envoyé. Si le mail ne se trouve pas dans votre boîte principale, veuillez vérifier votre dossier spam.</p>
			    </div>
			</div>

		</form>


				<?php 
				if (isset($erreur))
				{
					echo '<font color="red">'.$erreur."</font";
				}

				?>
			
			<br><br><br>

		</div>
	</div>
		<script src="inscriptionVerifJs.js"></script>
</body>
</html>
	
<?php include('footer.php') ?>

