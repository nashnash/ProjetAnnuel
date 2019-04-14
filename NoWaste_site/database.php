<?php

ini_set('display_errors', 1);

require_once __DIR__.'/databaseManager.php';

$bdd = DatabaseManager::getManager();
/*$sql = 'INSERT INTO user(nom, prenom, email, role, ville, rue, numero, code_postale, IDcentre, IDsociety) VALUES (?,?,?,?,?,?,?,?,?,?)';
$affectedRows = $db->exec($sql, ['seck','daniel', 'daniel-viet@hotmail.fr', 1 ,'Gonesse','avenue docteur broquet',27,95500, 1, 1]);*/

//echo $affectedRows;

	if(isset($_POST['forminscription']))
	{
		$mail = htmlspecialchars($_POST['email']);
		$mdp = hash('sha256', $_POST['password']);
		$mdp2 = hash('sha256', $_POST['password2']);
		$type = htmlspecialchars($_POST['type']);
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$adresse = htmlspecialchars($_POST['rue']);
		$num_rue = htmlspecialchars($_POST['numero']);
		$ville = htmlspecialchars($_POST['ville']);
		$code_postale = htmlspecialchars($_POST['code_postale']);

		if(!empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['rue']) AND !empty($_POST['numero']) AND !empty($_POST['ville']) AND !empty($_POST['code_postale']))
		{

			$mailexist = $bdd->exec("SELECT email FROM user WHERE email = ?", [$mail]);

			//$reqmail->execute(array($mail));
			//$mailexist = $reqmail->rowCount();
			//$requsername->execute(array($username));
			//$usernameexist = $requsername->rowCount();
			if($mailexist ==0)
			{

				if($mdp == $mdp2)
				{
					$sql = 'INSERT INTO user(nom,prenom,email,role,rue,numero,ville,code_postale,password) VALUES(?,?,?,?,?,?,?,?,?)';

					$insertInto = $bdd -> exec($sql, [$nom, $prenom, $mail, $type,$adresse, $num_rue, $ville, $code_postale, $mdp]);

					header('Location:connexion.php');
					exit();
				}
				else
				{

				}

			}
	}
}

?>
