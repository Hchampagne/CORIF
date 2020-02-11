
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE CONNEXION

//REGEX
var regLogin = /^[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*$/;
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
var regMdp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;


// champ login  
$('#con_login').blur(function () {
    if ($('#con_login').val().length === 0) {      
        $('#alertConLogin').text("Le champs n'est pas rempli");
    } 
    else if($('#con_login').val().length > 100){
        $('#alertConLogin').text("La saisie est trop longue");     
    }
    else if ((regLogin.test($('#con_login').val()) == false) || (regMail.test($('#con_login').val() == false))){
        $('#alertConLogin').text("La saisie est incorrecte");
    } else {
        $('#alertConLogin').html('&nbsp');
    }
});

// champ mot de passe 
$('#con_password').blur(function () {
    if ($('#con_password').val().length === 0) {      
        $('#alertConMdp').text("Le champs n'est pas rempli");
    } 
    else if($('#con_password').val().length > 60){
        $('#alertConMdp').text("Votre saisie est trop longue");      
    }
    else if (regMdp.test($('#con_password').val()) == false) {
        $('#alertConMdp').text("La saisie est incorrecte");
    }     
    else {
        $('#alertConMdp').html('&nbsp');       
    }
});

$("#form_connexion").submit(function(event){
    
    if($('#con_login').val().length === 0){
        $('#alertConLogin').text("Le champs n'est pas rempli");
        event.preventDefault();
    }
    else if($('#con_login').val().length > 100){
        $('#alertConLogin').text("La saisie est trop longue");
        event.preventDefault();
    }
    else if((regLogin.test($('#con_login').val()) == false) || (regMail.test($('#con_login').val() == false))){
        $('#alertConLogin').text("La saisie est incorrecte");
        event.preventDefault();
    }else{
        $('#alertConLogin').html('&nbsp');
    }
    
    if($('#con_password').val().length === 0){
        $('#alertConMdp').text("Le champs n'est pas rempli");
        event.preventDefault();
    }
    else if($('#con_password').val().length > 60){
        $('#alertConMdp').text("Votre saisie est trop longue");
        event.preventDefault();
    }
    else if (regMdp.test($('#con_password').val()) == false){
        $('#alertConMdp').text("La saisie est incorrecte");
        event.preventDefault();
    }else{
        $('#alertConMdp').html('&nbsp'); 
    }
});

});




