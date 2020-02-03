
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE resetPassword

//REGEX
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;

// Messages erreurs
var vide = "Le champs n'est pas rempli";
var long = "La saisie est trop longue";
var saisie = "La saisie est incorrecte";



// champs email
$('#res_mail').blur(function () {
    if ($('#res_mail').val().length === 0) {      
        $('#alertResMail').text(vide);
    } 
    else if($('#res_mail').val().length > 150){
        $('#alertResMail').text(long);
        event.preventDefault();
    }
    else if (regMail.test($('#res_mail').val()) == false) {
        $('#alertResMail').text(saisie);
    }     
    else {
        $('#alertResMail').html('&nbsp');       
    }
});

$("#form_resetPassword").submit(function(event){
       
    if($('#res_mail').val().length === 0){
        $('#alertResMail').text(vide);
        event.preventDefault();
    }
    else if($('#res_mail').val().length > 150){
        $('#alertResMail').text("Votre saisie est trop longue");
        event.preventDefault();
    }
    else if (regMail.test($('#res_mail').val()) == false){
        $('#alertResMail').text(saisie);
        event.preventDefault();
    }else{
        $('#alertResMail').html('&nbsp'); 
    }
});

});




