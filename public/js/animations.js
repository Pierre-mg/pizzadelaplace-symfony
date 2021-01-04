//Disparition du header pour la page Mentions légales et erreur 404  :
 
let header = document.querySelector('header');
let error = document.querySelector('#error');
let legalMentions = document.querySelector('#legal-mentions');

if (error || legalMentions) {
    header.style.display = "none";
}

