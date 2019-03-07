<!DOCTYPE html>

<html>
<link rel="stylesheet" href="footercss.css">

<body>
	<h1>Formulaire de contact</h1>
<form action="verifcontact.php" method="post">
  <div >
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="email" name="email" placeholder="Adresse mail" required>
    <select name="sujet">
    	<option value="Question">Question</option>
    	<option value="Commentaire">Commentaire</option>
    	<option value="Requête">Requête</option>
    </select><br>
  </div>
  <div>
    <textarea name="message" type="text" id="" placeholder="Message">
    </textarea>
  </div>  
  <input type="submit" value="Submit" name="formcontact">
</form>
</body>
</html>




