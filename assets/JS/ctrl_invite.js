
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE invite

//REGEX
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
var regNom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regPrenom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
// Messages erreurs
var vide = "Le champs n'est pas rempli";
var long = "La saisie est trop longue";
var saisie = "La saisie est incorrecte";

// Contrôle sur le change de l'input
// champs email
$('#invEmail').blur(function () {
    if ($('#invEmail').val().length === 0) {      
        $('#alertParEmail').text(vide);
    } 
    else if($('#invEmail').val().length > 60){
        $('#alertParEmail').text(long);     
    }
    else if (regMail.test($('#invEmail').val()) == false) {
        $('#alertParEmail').text(saisie);
    }     
    else {
        $('#alertParEmail').html('&nbsp');       
    }
});
// champs nom
$('#invNom').blur(function () {
    if ($('#invNom').val().length === 0) {      
        $('#alertParNom').text(vide);
    } 
    else if($('#invNom').val().length > 60){
        $('#alertParNom').text(long);     
    }
    else if (regNom.test($('#invNom').val()) == false) {
        $('#alertParNom').text(saisie);
    }     
    else {
        $('#alertParNom').html('&nbsp');       
    }
});
// champs prénom
$('#invPrenom').blur(function () {
    if ($('#invPrenom').val().length === 0) {      
        $('#alertParPrenom').text(vide);
    } 
    else if($('#invPrenom').val().length > 60){
        $('#alertParPrenom').text(long);     
    }
    else if (regPrenom.test($('#invPrenom').val()) == false) {
        $('#alertParPrenom').text(saisie);
    }     
    else {
        $('#alertParPrenom').html('&nbsp');       
    }
});


// Controle sur envoi du formulaire
$("#form_creatInvite").submit(function(event){

// Champs email
    if ($('#invEmail').val().length === 0) {
        event.preventDefault();
        $('#alertParEmail').text(vide);
    }
    else if ($('#invEmail').val().length > 60) {
        event.preventDefault();
        $('#alertParEmail').text(long);
    }
    else if (regMail.test($('#invEmail').val()) == false) {
        event.preventDefault();
        $('#alertParEmail').text(saisie);
    }
    else {
        $('#alertParEmail').html('&nbsp');
    }
// champs nom
    if ($('#invNom').val().length === 0) {
        event.preventDefault();
        $('#alertParNom').text(vide);
    }
    else if ($('#invNom').val().length > 60) {
        event.preventDefault();
        $('#alertParNom').text(long);
    }
    else if (regNom.test($('#invNom').val()) == false) {
        event.preventDefault();
        $('#alertParNom').text(saisie);
    }
    else {
        $('#alertParNom').html('&nbsp');
    }
// champs prénom
    if ($('#invPrenom').val().length === 0) {
        event.preventDefault();
        $('#alertParPrenom').text(vide);
    }
    else if ($('#invPrenom').val().length > 60) {
        event.preventDefault();
        $('#alertParPrenom').text(long);
    }
    else if (regPrenom.test($('#invPrenom').val()) == false) {
        event.preventDefault();
        $('#alertParPrenom').text(saisie);
    }
    else {
        $('#alertParPrenom').html('&nbsp');
    }
      
});

});




