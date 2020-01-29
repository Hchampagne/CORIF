
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE CONNEXION

//REGEX
var regLogin = /^[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*$/;
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
var regMdp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;


// champ login  
$('#con_login').blur(function () {
    if ($('#con_login').val() == '') {      
        $('#alertConLogin').text("Le champs n'est pas rempli");
    } else if ((regLogin.test($('#con_login').val()) == false) || (regMail.test($('#con_login').val() == false))){
        $('#alertConLogin').text("La saisie est incorrecte");
    } else {
        $('#alertConLogin').html('&nbsp');
    }
});

// champ mot de passe 
$('#con_password').blur(function () {
    if ($('#con_password').val() == '') {      
        $('#alertConMdp').text("Le champs n'est pas rempli");
    } else if (regMdp.test($('#con_password').val()) == false) {
        $('#alertConMdp').text("La saisie est incorrecte");
    }     
    else {
        $('#alertConMdp').html('&nbsp');       
    }
});

//controle doublons login (ajax) inscription
$('#login_submit').submit(function () {
     
    $.post({
        url: "./../Ajax/connexion",
        data: {
            verifLogin : $("#con_login").val(),
            verifMdp : $("#con_password").val(),          
        },
        success: function (data) {
          switch(data){
            case "2" :
                break;
            
            case "1" :
                event.preventDefault();
                $("#alertConMdp").text("Le mot de passe est erroné !");
                break;

            case "0" :
                event.preventDefault();
                $('#alertConLogin').text("Vous n'êtes pas enregistré");
                $('#alertConMdp').text("Vous n'êtes pas enregistré");
          }
        }
    });
});



});




