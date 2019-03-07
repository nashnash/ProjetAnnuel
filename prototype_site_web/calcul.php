<?php 
	include "header.php"; 
?>
		<section>
			<div align="center">
			<script src="calculcal.js"></script>
			<h1 class="black">En savoir plus sur son corps</h1>
			<h4>Savoir les calories necessaire journalier :</h4>
		</div>
			<div class="container" style="max-width: 500px;">
		<form name="CAL" action="" class="form-horizontal" role="form">
	
			<div class="form-group">
		<label class="col-sm-3 control-label">Vous êtes </label>
		<div class="col-sm-9">
		<input type="radio" name="sexe" value="homme" checked="checked" >Homme</input>
		<input type="radio" name="sexe" value="femme" >Femme</input>
		</div>
		</div>

		<div class="form-group">
		<label for="poids" class="col-sm-3 control-label">Votre poids (en kg):</label>
		 <div class="col-sm-9">
		 <input id="poids" class="form-control" type="text" name="poids"></input>
		 </div>
		 </div>

		<div class="form-group">
		 <label for="taille" class="col-sm-3 control-label">Votre taille (en cm):</label> 
		<div class="col-sm-9">
		<input id="taille" class="form-control" type="text" name="taille"></input>
		</div>
		</div>

		<div class="form-group">
		<label for="age" class="col-sm-3 control-label">Votre âge </label>
		 <div class="col-sm-9">  
			        <input id="age" class="form-control" type="text" name="age"></input>
		</div>
		</div>

		<div class="form-group">
		<label for="taille" class="col-sm-3 control-label">Votre activité physique : </label>
		
		<div class="col-sm-9">
		<input type="radio" name="activités" value="Sédentaire" checked="checked" >Sédentaire (faible dépense sportive)</input><br><br>
		<input type="radio" name="activités" value="Activité physique légère"  >Activité physique légère (si vous vous entraînez 1 à 3 fois par semaine)</input><br><br>
		<input type="radio" name="activités" value="Activité physique modérée"  >Activité physique modérée (si vous vous entraînez 4 à 6 fois par semaine)</input><br><br>
		<input type="radio" name="activités" value="Activité physique intense"  >Activité physique intense (si vous vous entraînez plus de 6 fois par semaine)</input><br><br>
	</div></div>
		
		<input type="reset" class="btn btn-primary"  value="calculer" onclick="calcul()"/>
	
	</form>
</div>
		<div class="container" style="max-width: 750px;">
		<br><h4 align="center" id="return" ></h4><br>
		<h3 align="center" id="repas"></h3><br>
		<p align="justify" id="plat" style="font-size: 16px;"></p><br>
		<div>
</section>

<?php include "footer.php" ?>


