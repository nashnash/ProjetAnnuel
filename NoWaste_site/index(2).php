<?php
require_once __DIR__.'/validation.php';
require_once __DIR__.'/formulaire.php';
require_once __DIR__.'/databasetest.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" description="ceci est la description">
    <title>No Waste</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
$db = new Nowaste\Database();
	?>



	<header>
<?php
	$val = new Validateur($_POST);
	//if($_POST)
	//{
		$regles = array(
		'prenom' => array(
			'minlength' =>3
		),
		'email' => array(
			'email' =>true

		),
		'password' => array(
			'password' => true
		),
		'password2' => array(
			'password' => true
		)
	);
		//}



			 $val->check($regles); ?>


	<?php


	/*if($val->getErrors()) {
		echo '<div class="alert alert-danger">';
		foreach ($val->getErrors() as $error) {
			echo '<strong>'.$error.'</strong>'.'<br>';
		}
		echo '</div>';
	}*/


	$form = new Form($val);

	echo $form->create('test');
	?>


	<!--<h4>Vous êtes un : </h4>
	<input type="radio" name="type" value="1" checked="1"> Bénévole</input>
	<input type="radio" name="type" value="2"> Particulier</input>
	<input type="radio" name="type" value="3"> Commerçant</input>
			<br><br>
	<?php
	echo $form->input('prenom', ' Prénom',['type' => 'text', 'id' => 'register-form-fname', 'name'=>"register-form-fname", 'class' => "form-control"]);
	echo $form->input('nom', ' Nom', ['type' => 'text','id' => 'register-form-lname', 'name'=>"register-form-lname", 'class' => "form-control"]);
	echo $form->input('email', ' email', ['type' => 'email', 'id' => 'register-form-email', 'name'=>"register-form-email", 'class' => "form-control"]);
	echo $form->input('password', 'Mot de Passe', ['type' => 'password','id' => 'register-form-password', 'name'=>"register-form-password", 'class' => "form-control" ]);
	echo $form->input('password2', 'Valider votre Mot de passe', ['type' => 'password', 'id' => 'register-form-repassword', 'name'=>"register-form-repassword", 'class' => "form-control"]);

	echo $form->input('rue', 'Entrez votre adresse postale', ['type' => 'text','id' => 'register-form-rue', 'name'=>"register-form-rue", 'class' => "form-control"]);

	echo $form->input('numero', 'Entrez votre numero', ['type' => 'number','id' => 'register-form-num', 'name'=>"register-form-num", 'class' => "form-control"]);

	echo $form->input('ville', 'Votre ville', ['type' => 'text','id' => 'register-form-city', 'name'=>"register-form-city", 'class' => "form-control"]);
	echo $form->input('code_postale', 'Votre Code Postale', ['type' => 'number','id' => 'register-form-postale', 'name'=>"register-form-postale", 'class' => "form-control"]);


	echo $form->end('Valider');

	?>


	<!-<form method="post">
		<label>Prénom</label>
		<input type="text" name="prenom" placeholder="Entrez votre Prénom" class="form-control"><br>
		<label>Nom</label>
		<input type="text" name="nom" placeholder="Entrez votre Nom" class="form-control"><br>
		<label>E-mail</label>
		<input type="text" name="email" placeholder="Votre Email" class="form-control"><br>
		<label>Mot de passe</label>
		<input type="text" name="password" placeholder="Mot de Passe" class="form-control"><br>
		<button type="submit" class="btn btn-primary">Envoyer</button>
	</form><br>-->
</div>


	<?php

	//var_dump($val->getErrors());  ?>
