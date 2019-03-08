function calcul(){
	var S = document.CAL.sexe;
	var P = document.CAL.poids;
	var T = document.CAL.taille;
	var A = document.CAL.age;
	var act = document.CAL.activités;
	var calorie;
	if (isNaN(P.value)== true || isNaN(T.value)== true || isNaN(A.value)== true || P.value=="" || T.value=="" || A.value==""){
		var error = document.getElementById('return');
		error.innerHTML = "Veuillez remplir tous les champs correctement !";
		error.style.color = 'red';

	}else{
		if (S.value=="homme"){

			calorie = ((13.707 * P.value)+(492.3 * T.value/100))-(6.673 * A.value)+77.607;
			
		}else if(S.value=="femme"){

			calorie = ((9.740 * P.value)+(172.9 * T.value/100))-(4.737 * A.value)+667.051;

		}
		if (act.value=="Sédentaire") {
			calorie = calorie*1.375;
		}
		if (act.value=="Activité physique légère") {
			calorie = calorie*1.56;
		}
		if (act.value=="Activité physique modérée") {
			calorie = calorie*1.64;
		}
		if (act.value=="Activité physique intense") {
			calorie = calorie*1.82;
		}
		var calo = document.getElementById('return');
		calo.innerHTML = "La quantité de calorie a consommer par jour est de :  " + calorie.toFixed(2) + " Kcal";
		calo.style.color = 'green';
	}
	if(calorie <1500){
		var repas=document.getElementById('repas');
		repas.innerHTML ="Un repas Type pour vous !"
		var plat = document.getElementById('plat');
		plat.innerHTML ="Pour le petit dejeuner: Un yaourt et des cereales // Pour le dejeuner: Viande/poisson, legumes/feculents et un fruit // Pour le Diner: Viande/poisson, legumes.";
		
	}
	if(calorie >=1500 && calorie <2000){
		var repas=document.getElementById('repas');
		repas.innerHTML ="Un repas Type pour vous !"
		var plat = document.getElementById('plat');
		plat.innerHTML ="Pour le petit dejeuner: fromage blanc 0%, une tranche de pain complet,jus de fruit // Pour le dejeuner: salade de tomate-basilic, pavé de saumon, legumes, un petit bol de riz, fromage, un fruit // Pour le Diner:  un bol de potage, une pomme de terre,filet de dinde, petits pois-carottes, une pomme.";
		
	}
	if(calorie >=2000 && calorie <=3000){
		var repas=document.getElementById('repas');
		repas.innerHTML ="Un repas Type pour vous !"
		var plat = document.getElementById('plat');
		plat.innerHTML ="Pour le petit dejeuner: Thé au citron, Pommes, Biscuits tailleFine/Gerblé 100% céréales complètes // Pour le dejeuner: Steaks haché 5%, Champignon/Oignon à la poêle, Riz Thai cuit, 1/2 Avocat, yaourt soja // Pour le Diner: Saumon sauvage, Lentilles cuites, Quinoa cuit, Brocoli, yaourt fromage blanc.";
		
	}
	if(calorie >3000){
		var repas=document.getElementById('repas');
		repas.innerHTML ="Un repas type pour vous !"
		var plat = document.getElementById('plat');
		plat.innerHTML ="Pour le petit dejeuner: Pan cake et flocon d’avoine, 2 oeufs, 3 blanc d’oeuf, 1 yaourt au fruits, banane, thé vert // Pour le dejeuner: Riz basmati ou thaï, blanc de poulet ou thon, colin, légumes // Pour le Diner: Viande/poisson, legumes.";
		
	}
}

function calcul_IMC(){
	var S = document.IMC.sexe;
	var P = document.IMC.poids;
	var T = document.IMC.taille;
	var A = document.IMC.age;

	if (isNaN(P.value)== true || isNaN(T.value)== true || isNaN(A.value)== true || P.value=="" || T.value=="" || A.value==""){
		var error = document.getElementById('return');
		error.innerHTML = "Veuillez remplir tous les champs correctement !";
		error.style.color = 'red';
		Alert = document.getElementById('etat');
		Alert.innerHTML = "" ;
		var pi = document.getElementById('pi');
		pi.innerHTML = "" ;

	}else{
		var IMC =(P.value / Math.pow(T.value/100,2));
		var A;

		if(IMC < 16) A="Vous etes donc en Anorixie ou Denutrition !";
		if(IMC > 16 && IMC < 18.5) A="Vous etre donc trop Maigre !";
		if(IMC >= 18.5 && IMC < 25) A="Vous avez une corpulence Normale !";
		if(IMC >= 25 && IMC < 30) A="Vous etes donc en Surpoids !";
		if(IMC >= 30 && IMC < 35) A="Vous etes donc en Obesité modérée !";
		if(IMC >= 35 && IMC <= 40) A="Vous etes donc en Obésité élevé !";
		if(IMC > 40) A="Vous etes donc en Obésité Morbide ou Massive !";


		if (S.value == "homme"){

			var PI = T.value - 100 -((T.value-150)/4);

		}else{
			var PI = T.value - 100 -((T.value-150)/2.5);
		}
		
		var Imc = document.getElementById('return');
		Imc.innerHTML = "Votre Indice de Masse Corporel est de : " + IMC.toFixed(2) + " Kg/m² ";
		Imc.style.color = 'green';
		Alert = document.getElementById('etat');
		Alert.innerHTML = A ;
		var pi = document.getElementById('pi');
		pi.innerHTML = "Votre poids ideal est de : " + PI.toFixed(1) + " Kg " ;
	}
}