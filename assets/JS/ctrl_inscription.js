
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE ENREGISTREMENT

//REGEX
var regNom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regPrenom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regOrganisme = /^[A-Za-zéèçàäëï]+([\s-][A-Za-zéèçàäëï]+)*$/;
var regLogin = /^[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*$/;
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
var regMdp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
// message erreurs
var vide = "Le champs n'est pas rempli .";
var long = "Votre saisie est trop longue .";
var saisie = "La saisie est incorrecte";

//champs nom                                                                                                                         
$('#ins_nom').blur(function () {
    if ($('#ins_nom').val().length === 0) {
        $('#alertNom').text(vide);
    } 
    else if ($('#ins_nom').val().length > 50) {
        $('#alertNom').text(long);
    } 
    else if (regNom.test($('#ins_nom').val()) == false) {
        $('#alertNom').text(saisie);
    } else {
        $('#alertNom').html('&nbsp');
    }
});

//champs prenom   
$('#ins_prenom').blur(function () {
    if ($('#ins_prenom').val().length === 0) {
        $('#alertPrenom').text(vide);
    } 
    else if ($('#ins_prenom').val().length > 50) {
        $('#alertPrenom').text(long);
    } 
    else if (regPrenom.test($('#ins_prenom').val()) == false) {
        $('#alertPrenom').text(saisie);
    } else {
        $('#alertPrenom').html('&nbsp');
    }
});

//champs organisme   
$('#ins_organisme').blur(function () {
    if ($('#ins_organisme').val().length === 0) {
        $('#alertOrganisme').text(vide);
    } 
    else if ($('#ins_organisme').val().length >50) {
        $('#alertOrganisme').text(long);
    } 
    else if (regOrganisme.test($('#ins_organisme').val()) == false) {
        $('#alertOrganisme').text(saisie);
    } else {
        $('#alertOrganisme').html('&nbsp');
    }
});

// champs email  
$('#ins_email').blur(function () {
    if ($('#ins_email').val().length === 0) {
        $('#alertEmail').text(vide);
    } 
    else if ($('#ins_email').val().length > 150) {
        $('#alertEmail').text(long);
    } 
    else if (regMail.test($('#ins_email').val()) == false) {
        $('#alertEmail').text(saisie);
    } else {
        $('#alertEmail').html('&nbsp');

    }
});

// champs login  
$('#ins_login').blur(function () {
    if ($('#ins_login').val().length === 0) {
        $('#alertLogin').text(vide);
    } 
    else if ($('#ins_login').val().length > 100) {
        $('#alertLogin').text(vide);
    } 
    else if (regLogin.test($('#ins_login').val()) == false) {
        $('#alertLogin').text(saisie);
    } else {
        $('#alertLogin').html('&nbsp');

    }
});

// champs mot de passe 
$('#ins_mdp').blur(function () {
    if ($('#ins_mdp').val().length === 0) {
        $('#alertMdp').text(vide);
    } 
    else if ($('#ins_mdp').val().length > 60) {
        $('#alertMdp').text(long);
    } 
    else if (regMdp.test($('#ins_mdp').val()) == false) {
        $('#alertMdp').text(saisie);
    }     
    else {
        $('#alertMdp').html('&nbsp');
    }
});

// champs verif mot de passe 
$('#ins_mdpverif').blur(function () {
    if ($('#ins_mdp').val() != $('#ins_mdpverif').val()) {
        $('#alertmdpVerif').text("Vérification du mot de passe incorrecte")
    } else {
        $('#alertmdpVerif').html('&nbsp');
    }
});

$("#form_inscription").submit(function(event){

// champs nom
    if ($('#ins_nom').val().length === 0) {
        $('#alertNom').text(vide);
        event.preventDefault();
    } 
    else if ($('#ins_nom').val().length > 50 ) {
        $('#alertNom').text(long);
        event.preventDefault();
    }
    else if (regNom.test($('#ins_nom').val()) == false) {
        $('#alertNom').text(saisie);
        event.preventDefault();
    } else {
        $('#alertNom').html('&nbsp');
    }

//champs prenom   
    if ($('#ins_prenom').val().length === 0) {
        $('#alertPrenom').text(vide);
        event.preventDefault();
    } 
    else if ($('#ins_prenom').val().length > 50) {
        $('#alertPrenom').text(long);
        event.preventDefault();
    } 
    else if (regPrenom.test($('#ins_prenom').val()) == false) {
        $('#alertPrenom').text(saisie);
        event.preventDefault();
    } else {
        $('#alertPrenom').html('&nbsp');
    }

   
 //champ organisme   
    if ($('#ins_organisme').val().length === 0 ) {
        $('#alertOrganisme').text(vide);
        event.preventDefault();
    } 
    else if ($('#ins_organisme').val().length > 50 ) {
        $('#alertOrganisme').text(long);
        event.preventDefault();
    } 
    else if (regOrganisme.test($('#ins_organisme').val()) == false) {
        $('#alertOrganisme').text(saisie);
        event.preventDefault();
    } else {
        $('#alertOrganisme').html('&nbsp');
    }

// champs email  
    if ($('#ins_email').val().length === 0) {
        $('#alertEmail').text(vide);
        event.preventDefault();
    } 
    else if ($('#ins_email').val().length > 150) {
        $('#alertEmail').text(long);
        event.preventDefault();
    } 
    else if (regMail.test($('#ins_email').val()) == false) {
        $('#alertEmail').text(saisie);
        event.preventDefault();
    } else {
        $('#alertEmail').html('&nbsp');

    }

// champs login  
    if ($('#ins_login').val().length === 0) {
        $('#alertLogin').text(vide);
        event.preventDefault();
    } 
    else if ($('#ins_login').val().length > 100) {
        $('#alertLogin').text(vide);
        event.preventDefault();
    } 
    else if (regLogin.test($('#ins_login').val()) == false) {
        $('#alertLogin').text(saisie);
        event.preventDefault();
    } else {
        $('#alertLogin').html('&nbsp');

    }

// champs mot de passe 
    if ($('#ins_mdp').val().length === 0) {
        $('#alertMdp').text(vide);
        event.preventDefault();
    } 
    else if ($('#ins_mdp').val().length > 60) {
        $('#alertMdp').text(long);
        event.preventDefault();
    } 
    else if (regMdp.test($('#ins_mdp').val()) == false) {
        $('#alertMdp').text(saisie);
        event.preventDefault();
    }     
    else {
        $('#alertMdp').html('&nbsp');
    }
    
});

/*****************/
/* REQUETES AJAX */
/*****************/

//controle doublons email (ajax) inscription
$('#ins_email').change(function () {
    $.post({
         url: "./../Ajax/doublon",
         data:
        {
            verifRef: $("#ins_email").val(),
            verifChamps: "adh_email",
            verifTable: "adherent",
        },
        success: function (data) {
             if (data == 1) {
                $("#alertEmail").text("dèjà utilisé");
            } else {
                $("#alertEmail").html('&nbsp');
            }
        }
    });
});

//controle doublons login (ajax) inscription
$('#ins_login').change(function () {
    $.post({
        url: "./../Ajax/doublon",
        data:
        {
            verifRef: $("#ins_login").val(),
            verifChamps: "adh_login",
            verifTable: "adherent",
        },
        success: function (data) {
            if (data == 1) {
                $("#alertLogin").text("dèjà utilisé");
            } else {
                 $("#alertLogin").html('&nbsp');
             }
        }
    });
});





/*********************/
/* auto active modal */
/*********************/

// inscriptionConfModal
$('#inscriptionConfModal').modal('show')

});


