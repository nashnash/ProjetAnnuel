<?php
include "header.php";

?>
<section align="center">
<h2>Bienvenue <?php echo $user['username'];  ?> </h2>
<?php
if(!empty($user['avatar']))
{
?>
<img src="users/avatars/<?php echo $user['avatar']; ?>" width="200px"/>
<?php
} 
if($user['id_compte'] == $_SESSION['id_user'])
{
?>

<?php
}
?>
<br><br><a class="btn btn-primary" href="editionprofil.php">Editer mon profil</a><br><br>
  <form action ="deco.php" method="post">
    <input type="submit" name="Déconnexion" class="btn btn-primary" value="Déconnexion"/>

    </form><br>
    

	</section>
	<?php include "footer.php"; ?>
</body>

</html>

<?php

if(isset($erreur))
{
	echo $erreur;
}

?>