<?php
	if(isset($_POST['forminscription'])){
		$name=$_POST['username'];
		$email=$_POST['email'];

		$to=$email; // Pour celui qui recevra l'email
		$from = 'cuisinevie@outlook.fr' // Celui qui envoie l'email
		$subject='Inscription cuisine vie';
		$message="Bonjour ".$name."\n"."Votre inscription a bien été prise en compte. L'équipe de CuisineVie vous souhaite la bienvenue :)"
		$headers="From: ".$from;

		mail($to, $subject, $message, $headers);
		
	}
?>