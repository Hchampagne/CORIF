
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE CONNEXION

//REGEX
var regLogin = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;

// champ login  
$('#invConn_nom').blur(function () {
    if ($('#invConn_nom').val().length === 0) {      
        $('#alertInvConnNom').text("Le champs n'est pas rempli");
    } 
    else if($('#invConn_nom').val().length > 100){
        $('#alertInvConnNom').text("La saisie est trop longue");     
    }
    else if ((regLogin.test($('#invConn_nom').val()) == false) || (regMail.test($('#invConn_nom').val() == false))){
        $('#alertInvConnNom').text("La saisie est incorrecte");
    } else {
        $('#alertInvConnNom').html('&nbsp');
    }
});

// champ mot de passe 
$('#invConn_email').blur(function () {
    if ($('#invConn_email').val().length === 0) {      
        $('#alertInvConnEmail').text("Le champs n'est pas rempli");
    } 
    else if($('#invConn_email').val().length > 60){
        $('#alertInvConnEmail').text("Votre saisie est trop longue");      
    }
    else if (regMail.test($('#invConn_email').val()) == false) {
        $('#alertInvConnEmail').text("La saisie est incorrecte");
    }     
    else {
        $('#alertInvConnEmail').html('&nbsp');       
    }
});

$("#form_connexionJeu").submit(function(event){
    
    if($('#invConn_nom').val().length === 0){
        $('#alertInvConnNom').text("Le champs n'est pas rempli");
        event.preventDefault();
    }
    else if($('#invConn_nom').val().length > 100){
        $('#alertInvConnNom').text("La saisie est trop longue");
        event.preventDefault();
    }
    else if((regLogin.test($('#invConn_nom').val()) == false) || (regMail.test($('#invConn_nom').val() == false))){
        $('#alertInvConnNom').text("La saisie est incorrecte");
        event.preventDefault();
    }else{
        $('#alertInvConnNom').html('&nbsp');
    }
    
    if($('#invConn_email').val().length === 0){
        $('#alertInvConnEmail').text("Le champs n'est pas rempli");
        event.preventDefault();
    }
    else if($('#invConn_email').val().length > 60){
        $('#alertInvConnEmail').text("Votre saisie est trop longue");
        event.preventDefault();
    }
    else if (regMdp.test($('#invConn_email').val()) == false){
        $('#alertInvConnEmail').text("La saisie est incorrecte");
        event.preventDefault();
    }else{
        $('#alertInvConnEmail').html('&nbsp'); 
    }
});

});




