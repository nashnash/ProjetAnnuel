
function check(){

		/*var baliseNom = document.getElementById('nom');
		var nom = baliseNom.value;

		if(nom.length <= 1 ){
			surligne(baliseNom);
		}  */ 
var baliseNom = document.getElementById('nom');
var balisePrenom = document.getElementById('prenom');
var balisePseudo = document.getElementById('pseudo');
var baliseMail = document.getElementById('mail');
var baliseMdp = document.getElementById('pwd');
clearInput(baliseMdp);
clearInput(baliseMail);
clearInput(balisePseudo);
clearInput(balisePrenom);
clearInput(baliseNom);
var errors = 0;

if(!checkLogin(baliseNom.value)){
	 	displayError(baliseNom,'2 caractères minimum');
	 	errors += 1;
	 }
if(!checkLogin(balisePrenom.value)){
	displayError(balisePrenom,'2 caractères minimum');
	errors += 1;
}
if(!checkLogin(balisePseudo.value)){
	displayError(balisePseudo,'2 caractères minimum');
	errors += 1;
}
if(!checkEmail(baliseMail.value)){
	displayError(baliseMail,'Email Incorrect');
	errors += 1;
}
 if(!checkPassword(baliseMdp.value)){
	 	displayError(baliseMdp,'8 caractères minimum');
	 	errors += 1;
	 }



}

/*function surligne(champ)
{
   
      champ.style.backgroundColor = "#fba";
   
}*/

function clearInput(input){
		input.style.borderColor = '';
		var parent = input.parentNode;
		var elements = parent.getElementsByTagName('p');
		if (elements.length > 0){
			parent.removeChild(elements[0]);//Pour supp le p
		}
	}

	function displayError(input,message){
   			input.style.borderColor = 'red';
	 		var error = document.createElement('p');
	 		error.innerHTML = message;
	 		error.style.color = 'red';
			var parent = input.parentNode; //pour recuperer le parent "div"
			parent.appendChild(error);
	}
	function checkLogin(log){
		return log.length > 1;
	}

	 function checkEmail(email){ 
   	
   	
   	return email.indexOf('@') && email.indexOf('.')  != -1;//index va chercher @ dans l'email. pas 0 car index0
   
}

function checkPassword(pwd){
		return pwd.length >= 8
			
	

}