<?php
ob_start();
include "header.php";

if(isset($_SESSION['id_user']))
{
	if(isset($_POST['formedition']))
	{

	$username = htmlspecialchars($_POST['newusername']);
			$mail = htmlspecialchars($_POST['newmail']);

	$requser = $bdd->prepare("SELECT * FROM users WHERE id_compte = ?");
	$requser->execute(array($_SESSION['id_user']));
	$user = $requser->fetch();


	$reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
	$requsername = $bdd->prepare("SELECT * FROM users WHERE username = ?");

			$reqmail->execute(array($mail));
			$mailexist = $reqmail->rowCount();
			$requsername->execute(array($username));
			$usernameexist = $requsername->rowCount();


			
				

	if(isset($_POST['newusername']) AND !empty($_POST['newusername']) AND $_POST['newusername'] != $user['username'])
	{
		if($usernameexist ==0)
			{

		$newpseudo = htmlspecialchars($_POST['newusername']);
		$insertpseudo = $bdd->prepare("UPDATE users SET username = ? WHERE id_compte = ?");
		$insertpseudo->execute(array($newpseudo, $_SESSION['id_user']));

		header('Location: http://cuisinevie.fr/profil.php');
		exit();
			}
		else
		{
			$msg="Un compte possède déjà ce Pseudo";
		}
	}

	if(isset($_POST['newmail']) AND $_POST['newmail'] != $user['email'] AND !empty($_POST['newmail']) )
	{
		if($mailexist ==0)
				{

		$newmail = htmlspecialchars($_POST['newmail']);
		$insertmail = $bdd->prepare("UPDATE users SET email = ? WHERE id_compte = ?");
		$insertmail->execute(array($newmail, $_SESSION['id_user']));

		$msg ="Les mises à jours on été effectuées, vous pouvez retourner sur votre profil";
				}
		else
		{
			$msg="Un compte possède déjà ce mail";
		}
	}

	if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
	{
		$mdp1 = sha1($_POST['newmdp1']);
		$mdp2 = sha1($_POST['newmdp2']);

		if($mdp1 == $mdp2)
		{
			$insertmdp = $bdd->prepare("UPDATE users SET password = ? WHERE id_compte = ?");
			$insertmdp->execute(array($mdp1, $_SESSION['id_user']));
			header('Location: http://cuisinevie.fr/profil.php');
			exit();
		}
		else
		{
			$msg ="Mots de passe différents !";

		}
	}

	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
	{
		$taillemax = 2097152; //taille de 2mo 
		$extensionvalides = array('jpg', 'jpeg','png','gif');
		if($_FILES['avatar']['size'] <= $taillemax) //si la taille est < ou = a 2 mo 
		{
			$extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
			if(in_array($extensionupload, $extensionvalides))
			{
				$chemin = "users/avatars/".$_SESSION['id_user'].".".$extensionupload; //chemin pour mettre l'image dans notre dossier
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);

				if($resultat)
				{
					$updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id_compte = :id_compte');
					$updateavatar->execute(array(
						'avatar' =>$_SESSION['id_user'].".".$extensionupload,
						'id_compte' => $_SESSION['id_user']));
					header('Location: http://cuisinevie.fr/profil.php');
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

	}

}


}

?>
	<section>
	<div align="center">
		<h2> Edition de mon profil </h2>
	</div>

		<div class="container" style="max-width: 500px;">
		<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

		
			<div class="form-group">
				<label class="col-sm-3 control-label">Votre Pseudo
			         </label>
			<div class="col-sm-9">
			<input  class="form-control" type="text" name="newusername" placeholder="pseudo" value="<?php echo $user['username']; ?>"
			/>

		</div></div>
			

			<div class="form-group">
				<label class="col-sm-3 control-label">Votre Email</label>
			<div class="col-sm-9">
			<input class="form-control" type="email" name="newmail" placeholder="mail" value="<?php echo $user['email']; ?> "/>
			</div>
			</div>
			

			<div class="form-group">
				<label class="col-sm-3 control-label">Mot de passe</label>
			<div class="col-sm-9">
			<input  class="form-control" type="password" name="newmdp1" placeholder="Changer de mot de passe"/>
			</div></div>


			<div class="form-group">
				<label class="col-sm-3 control-label">Mot de passe</label>
			<div class="col-sm-9">
			<input  class="form-control" type="password" name="newmdp2" placeholder="Confirmation changement"/>
			</div>
		</div>
			

			<div class="form-group">
				<label class="col-sm-3 control-label">Image de profil</label>
			<div class="col-sm-9">
			<input type="file" name="avatar"/>
			</div>
			</div>

			<div align="center">

			<a class="btn btn-primary" href="profil.php?id=<?php echo $_SESSION['id_user']; ?>">Retouner sur mon profil</a><br><br>
			
			
			<input name="formedition" type="submit" class="btn btn-primary" value="Mettre à jour mon profil" /><br><br></div>
			
		</form>

		<div align="center">
		<?php
		

		if (isset($msg))
		{
			echo '<font color="red">'.$msg."</font";
		}
?>
</div>

		</section></div>
<?php

 include ('footer.php');		


?>
