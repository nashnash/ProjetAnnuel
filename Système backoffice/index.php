<?php
require_once __DIR__.'/validation.php';
require_once __DIR__.'/formulaire.php';
require_once __DIR__.'/database.php';
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
	

<body style="background-color: #ECF4F8">
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
			'password' =>6
		)
	);
		//}

	?>

			<?php $val->check($regles); ?>
		
		

<div style="width:80%; margin:0 auto;">
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
	echo $form->input('prenom', ' Prénom');
	echo $form->input('nom', ' Nom');
	echo $form->input('email', ' email');
	echo $form->input('password', 'Mot de Passe');
	echo $form->end('Valider'); 

	?>


	<!--<form method="post">
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

	//var_dump($val->getErrors()); ?>
