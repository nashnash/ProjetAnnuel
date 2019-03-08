function add_ingredient(){
	var contenu = document.AI.ingredient;
	var table = document.getElementById("tab");
	var error = 0;
	if(contenu.value==""){
		alert("Veuillez rentrer un ingredient");
		error = 1;
	}
	else if(table.value.indexOf(contenu.value)!= -1){

		alert("Vous avez déja rentré cet ingrédient");
		error = 1;
	}
	if(table.value=="" && error == 0){
		var inter ="";
		table.innerHTML = table.innerHTML + inter + contenu.value;
	}else if(error == 0){
		var inter =",";
		table.innerHTML = table.innerHTML + inter + contenu.value;
	} 

}