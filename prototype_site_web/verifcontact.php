<?php 
include 'header.php';

if(isset($_POST['formcontact'])){
	$mail = htmlspecialchars($_POST['email']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$message = htmlspecialchars($_POST['message']);
	$sujet = htmlspecialchars($_POST['sujet']);
$message .=  "<hr> Expéditeur : ".$nom." ".$prenom."<br> Mail : ".$mail."<br> Sujet : ".$sujet;
$to='cuisinevie@outlook.fr';
$from = $mail;
$headers = "Content-type:text/html;charset='UTF-8'"; //parametre d'encodage.
mail($to, $sujet, $message, $headers);

echo "<h1 align ='center'> Votre message à bien été transmis ! <h1>";
}else{
	echo "Erreur";
}

//include 'footer.php';
?>