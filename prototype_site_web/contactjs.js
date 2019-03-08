//Aller chercher modal
var modal = document.getElementById('myModal');

//Pour obtenir le bouton qui ouvre modal
var btn = document.getElementById('myBtn');

//Pour obtenir l'élément qui ferme modal
var span = document.getElementsByClassName("close")[0];

//Quand l'user clique sur le bouton, ouvrir modal.
btn.onclick = function() {
	modal.style.display = "block";
}

//Quand l'user clique sur le span (x), fermer modal.
span.onclick = function() {
	modal.style.display = "none";
}

//Quand l'user clique en dehors de modal, fermer.
window.onclick = function(event) {
	if (event.target != modal) {
		modal.style.display = "none";
	}
}