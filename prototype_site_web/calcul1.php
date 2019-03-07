<?php
	require "header.php";
?>
<section align="center">
	<script src="calcul.js"></script>
	<h3>Connaitre son Indice de masse corporel et son poids ideal :</h3>

<div class="container" style="max-width: 500px;">

	<form name="IMC" action="" class="form-horizontal" role="form">
	<div class="form-group">
	<label class="col-sm-3 control-label">Vous êtes</label>
	<div class="col-sm-9">
		<input type="radio" name="sexe" value="homme" checked="checked" >Homme</input>
		<input type="radio" name="sexe" value="femme">Femme</input>
	</div>
</div>

		<div class="form-group">
		 <label for="poids" class="col-sm-3 control-label">Votre poids(en Kg)
		 </label>
		
		<div class="col-sm-9">
		<input type="text" name="poids" class="form-control">
		</input>
		</div>
		</div>


		<div class="form-group">
		<label for="taille" class="col-sm-3 control-label">Votre Taille(en Cm)
		</label>
		
		<div class="col-sm-9">
		<input type="text" name="taille" class="form-control"></input>
		</div>
		</div>

		<div class="form-group">
        <label for="age" class="col-sm-3 control-label">Votre Age
        </label>
    	<div class="col-sm-9">
        <input type="text" name="age" class="form-control">
        </input>
    	</div>
    	</div>

		<input type="button" class="btn btn-primary" value="calculer IMC & Poids ideal" onclick="calcul_IMC()"/>
	</form>

		<br><h4 style='color:orange' class="color" id="imc" ></h4>
		<br><h4 style='color:orange' class="color" id="etat" ></h4>
		<br><h4 style='color:green' id="pi" ></h4>
</section>

<?php
	require "footer.php"; 
?>
