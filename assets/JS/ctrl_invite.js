
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE invite

//REGEX
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
var regNom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
// Messages erreurs
var vide = "Le champs n'est pas rempli";
var long = "La saisie est trop longue";
var saisie = "La saisie est incorrecte";

// champs nom 
$('#inv_nom').blur(function () {
    if ($('#inv_nom').val().length === 0) {      
        $('#alertInvNom').text(vide);
    } 
    else if($('#inv_nom').val().length > 100){
        $('#alertInvNom').text(long);
        event.preventDefault();
    }
    else if ((regNom.test($('#inv_nom').val()) == false) || (regMail.test($('#inv_nom').val() == false))){
        $('#alertInvNom').text(saisie);
    } else {
        $('#alertInvNom').html('&nbsp');
    }
});

// champs email
$('#inv_mail').blur(function () {
    if ($('#inv_mail').val().length === 0) {      
        $('#alertInvMail').text(vide);
    } 
    else if($('#inv_mail').val().length > 60){
        $('#alertInvMail').text(long);
        event.preventDefault();
    }
    else if (regMail.test($('#inv_mail').val()) == false) {
        $('#alertInvMail').text(saisie);
    }     
    else {
        $('#alertInvMail').html('&nbsp');       
    }
});

$("#form_invite").submit(function(event){
    
    if($('#inv_nom').val().length === 0){
        $('#alertInvNom').text(vide);
        event.preventDefault();
    }
    else if($('#inv_nom').val().length > 100){
        $('#alertInvNom').text(long);
        event.preventDefault();
    }
    else if((regNom.test($('#inv_nom').val()) == false)){
        $('#alertInvNom').text(saisie);
        event.preventDefault();
    }else{
        $('#alertInvNom').html('&nbsp');
    }
    
    if($('#inv_mail').val().length === 0){
        $('#alertInvMail').text(vide);
        event.preventDefault();
    }
    else if($('#inv_mail').val().length > 60){
        $('#alertInvMail').text("Votre saisie est trop longue");
        event.preventDefault();
    }
    else if (regMail.test($('#inv_mail').val()) == false){
        $('#alertInvMail').text(saisie);
        event.preventDefault();
    }else{
        $('#alertInvMail').html('&nbsp'); 
    }
});

});




