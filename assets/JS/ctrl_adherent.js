
$(document).ready(function () {
    /****************************************/ 
    /****  AJOUT / MODIFICATION ADHERENT ****/  
    /****************************************/

//REGEX
var regNom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regPrenom = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regOrganisme = /^[A-Za-zéèçàäëï]+([\s-][A-Za-zéèçàäëï]+)*$/;
var regLogin = /^[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*$/;
var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
// message erreurs
var vide = "Le champs n'est pas rempli .";
var long = "Votre saisie est trop longue .";
var saisie = "La saisie est incorrecte";

//champs nom                                                                                                                         
$('#adh_nom').blur(function () {
    if ($('#adh_nom').val().length === 0) {
        $('#alertAdhNom').text(vide);
    } 
    else if ($('#adh_nom').val().length > 50) {
        $('#alertAdhNom').text(long);
    } 
    else if (regNom.test($('#adh_nom').val()) == false) {
        $('#alertAdhNom').text(saisie);
    } else {
        $('#alertAdhNom').html('&nbsp');
    }
});

//champs prenom   
$('#adh_prenom').blur(function () {
    if ($('#adh_prenom').val().length === 0) {
        $('#alertAdhPrenom').text(vide);
    } 
    else if ($('#adh_prenom').val().length > 50) {
        $('#alertAdhPrenom').text(long);
    } 
    else if (regPrenom.test($('#adh_prenom').val()) == false) {
        $('#alertAdhPrenom').text(saisie);
    } else {
        $('#alertAdhPrenom').html('&nbsp');
    }
});

//champs organisme   
$('#adh_organisme').blur(function () {
    if ($('#adh_organisme').val().length === 0) {
        $('#alertAdhOrganisme').text(vide);
    } 
    else if ($('#adh_organisme').val().length >50) {
        $('#alertAdhOrganisme').text(long);
    } 
    else if (regOrganisme.test($('#adh_organisme').val()) == false) {
        $('#alertAdhOrganisme').text(saisie);
    } else {
        $('#alertAdhOrganisme').html('&nbsp');
    }
});

// champs email  
$('#adh_email').blur(function () {
    if ($('#adh_email').val().length === 0) {
        $('#alertAdhEmail').text(vide);
    } 
    else if ($('#adh_email').val().length > 150) {
        $('#alertAdhEmail').text(long);
    } 
    else if (regMail.test($('#adh_email').val()) == false) {
        $('#alertAdhEmail').text(saisie);
    } else {
        $('#alertAdhEmail').html('&nbsp');
    }
});

// champs login  
$('#adh_login').blur(function () {
    if ($('#adh_login').val().length === 0) {
        $('#alertAdhLogin').text(vide);
    } 
    else if ($('#adh_login').val().length > 100) {
        $('#alertAdhLogin').text(vide);
    } 
    else if (regLogin.test($('#adh_login').val()) == false) {
        $('#alertAdhLogin').text(saisie);
    } else {
        $('#alertAdhLogin').html('&nbsp');
    }
});




/*****************/
/* REQUETES AJAX */
/*****************/

//controle doublons email (ajax) ajout
$('#adh_email').change(function () {
    $.post({
        url: "../../Ajax/doublon" ,
        data: {
            verifRef: $("#adh_email").val(),
            verifChamps: "adh_email",
            verifTable: "adherent",
        },
        success: function (data) {
            if (data == 1) {
                $("#alertAdhEmail").text("Dèjà utilisé");
            } else {
                $("#alertAdhEmail").html('&nbsp');
            }
        }
    });
});

//controle doublons login (ajax) ajout
$('#adh_login').change(function () {
    $.post({
        url: "../../Ajax/doublon",
        data: {
            verifRef: $("#adh_login").val(),
            verifChamps: "adh_login",
            verifTable: "adherent",
         },
        success: function (data) {
            if (data == 1) {
                $("#alertAdhLogin").text("Dèjà utilisé");
            } else {
                $("#alertAdhLogin").html('&nbsp');
             }
        }
    });
});        


/***********************************************/
/**************  AJOUT ADHERENT  ***************/
/***********************************************/
$("#form_ajoutAdherent").submit(function(event){

// champs nom
    if ($('#adh_nom').val().length === 0) {
        $('#alertAdhNom').text(vide);
        event.preventDefault();
    } 
    else if ($('#adh_nom').val().length > 50 ) {
        $('#alertAdhNom').text(long);
        event.preventDefault();
    }
    else if (regNom.test($('#adh_nom').val()) == false) {
        $('#alertAdhNom').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhNom').html('&nbsp');
    }

//champs prenom   
    if ($('#adh_prenom').val().length === 0) {
        $('#alertAdhPrenom').text(vide);
        event.preventDefault();
    } 
    else if ($('#adh_prenom').val().length > 50) {
        $('#alertAdhPrenom').text(long);
        event.preventDefault();
    } 
    else if (regPrenom.test($('#adh_prenom').val()) == false) {
        $('#alertAdhPrenom').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhPrenom').html('&nbsp');
    }

   
 //champ organisme   
    if ($('#adh_organisme').val().length === 0 ) {
        $('#alertAdhOrganisme').text(vide);
        event.preventDefault();
    } 
    else if ($('#adh_organisme').val().length > 50 ) {
        $('#alertAdhOrganisme').text(long);
        event.preventDefault();
    } 
    else if (regOrganisme.test($('#adh_organisme').val()) == false) {
        $('#alertAdhOrganisme').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhOrganisme').html('&nbsp');
    }

// champs email  
    if ($('#adh_email').val().length === 0) {
        $('#alertAdhEmail').text(vide);
        event.preventDefault();
    } 
    else if ($('#adh_email').val().length > 150) {
        $('#alertAdhEmail').text(long);
        event.preventDefault();
    } 
    else if (regMail.test($('#adh_email').val()) == false) {
        $('#alertAdhEmail').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhEmail').html('&nbsp');

    }

// champs login  
    if ($('#adh_login').val().length === 0) {
        $('#alertAdhLogin').text(vide);
        event.preventDefault();
    } 
    else if ($('#adh_login').val().length > 100) {
        $('#alertAdhLogin').text(vide);
        event.preventDefault();
    } 
    else if (regLogin.test($('#adh_login').val()) == false) {
        $('#alertAdhLogin').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhLogin').html('&nbsp');

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


/***********************************************/
/***********  MODIFICATION ADHERENT  ***********/
/***********************************************/

$("#form_modifAdherent").submit(function (event) {

    // champs nom
    if ($('#adh_nom').val().length === 0) {
        $('#alertAdhNom').text(vide);
        event.preventDefault();
    } else if ($('#adh_nom').val().length > 50) {
        $('#alertAdhNom').text(long);
        event.preventDefault();
    } else if (regNom.test($('#adh_nom').val()) == false) {
        $('#alertAdhNom').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhNom').html('&nbsp');
    }

    //champs prenom   
    if ($('#adh_prenom').val().length === 0) {
        $('#alertAdhPrenom').text(vide);
        event.preventDefault();
    } else if ($('#adh_prenom').val().length > 50) {
        $('#alertAdhPrenom').text(long);
        event.preventDefault();
    } else if (regPrenom.test($('#adh_prenom').val()) == false) {
        $('#alertAdhPrenom').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhPrenom').html('&nbsp');
    }

    //champ organisme   
    if ($('#adh_organisme').val().length === 0) {
        $('#alertAdhOrganisme').text(vide);
        event.preventDefault();
    } else if ($('#adh_organisme').val().length > 50) {
        $('#alertAdhOrganisme').text(long);
        event.preventDefault();
    } else if (regOrganisme.test($('#adh_organisme').val()) == false) {
        $('#alertAdhOrganisme').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhOrganisme').html('&nbsp');
    }

    // champs email  
    if ($('#adh_email').val().length === 0) {
        $('#alertAdhEmail').text(vide);
        event.preventDefault();
    } else if ($('#adh_email').val().length > 150) {
        $('#alertAdhEmail').text(long);
        event.preventDefault();
    } else if (regMail.test($('#adh_email').val()) == false) {
        $('#alertAdhEmail').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhEmail').html('&nbsp');

    }

    // champs login  
    if ($('#adh_login').val().length === 0) {
        $('#alertAdhLogin').text(vide);
        event.preventDefault();
    } else if ($('#adh_login').val().length > 100) {
        $('#alertAdhLogin').text(vide);
        event.preventDefault();
    } else if (regLogin.test($('#adh_login').val()) == false) {
        $('#alertAdhLogin').text(saisie);
        event.preventDefault();
    } else {
        $('#alertAdhLogin').html('&nbsp');

    }

    // champs mot de passe 
    if ($('#ins_mdp').val().length === 0) {
        $('#alertMdp').text(vide);
        event.preventDefault();
    } else if ($('#ins_mdp').val().length > 60) {
        $('#alertMdp').text(long);
        event.preventDefault();
    } else if (regMdp.test($('#ins_mdp').val()) == false) {
        $('#alertMdp').text(saisie);
        event.preventDefault();
    } else {
        $('#alertMdp').html('&nbsp');
    }
});

});


