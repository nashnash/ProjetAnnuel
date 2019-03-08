<?php
ob_start();
include "header.php";

if(isset($_POST['formconnexion']))
{	
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	
	if(!empty($mailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
		$requser->execute(array($mailconnect,$mdpconnect));
		$userexist = $requser-> rowcount();
		if($userexist ==1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id_user'] = $userinfo['id_compte'];
			$_SESSION['username'] = $userinfo['username'];
			$_SESSION['email'] = $userinfo['email'];
			header('Location: profil.php');
			exit();
	
		}
		else
		{
			$erreur = " Mauvais Mail ou mot de passe :/"; 
		}

	}
	else
	{
		$erreur = " Tous les champs doivent être complétés !";
	}
}

 ?>

<body>
	<div align="center">
		<h2>Page de Connexion</h2><br><br>
		<form class="form-inline" action ="verifconnexion.php" method="post" autocomplete="false">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input class="form-control" type="email" name="mailconnect" placeholder="Mail">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input class="form-control" type="password" name="mdpconnect" placeholder="Mot de passe...">
  </div><br><br>

  <br><br>
  <button type="submit" name="formconnexion" value="Se connecter !" class="btn btn-primary">Se Connecter</button>
</form>


		
		<br><br>
	</div>
	<?php include "footer.php" ?>
</body>
</html>