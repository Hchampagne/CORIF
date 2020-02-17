
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




$("#form_creatInvite").submit(function(event){
    
    
});


});




