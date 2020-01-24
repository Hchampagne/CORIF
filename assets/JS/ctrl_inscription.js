
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


//champ nom                                                                                                                         
$('#ins_nom').blur(function () {
    if ($('#ins_nom').val() == '') {
        $('#alertNom').text("Le champs n'est pas rempli");
    } else if (regNom.test($('#ins_nom').val()) == false) {
        $('#alertNom').text("La saisie est incorrecte");
    } else {
        $('#alertNom').html('&nbsp');
    }
});

//champ prenom   
$('#ins_prenom').blur(function () {
    if ($('#ins_prenom').val() == '') {
        $('#alertPrenom').text("Le champs n'est pas rempli");
    } else if (regPrenom.test($('#ins_prenom').val()) == false) {
        $('#alertPrenom').text("La sasie est incorrecte");
    } else {
        $('#alertPrenom').html('&nbsp');
    }
});

//champ organisme   
$('#ins_organisme').blur(function () {
    if ($('#ins_organisme').val() == '') {
        $('#alertOrganisme').text("Le champs n'est pas rempli");
    } else if (regOrganisme.test($('#ins_organisme').val()) == false) {
        $('#alertOrganisme').text("La sasie est incorrecte");
    } else {
        $('#alertOrganisme').html('&nbsp');
    }
});

// champ email  
$('#ins_email').blur(function () {
    if ($('#ins_email').val() == '') {
        $('#alertEmail').text("Le champs n'est pas rempli");
    } else if (regMail.test($('#ins_email').val()) == false) {
        $('#alertEmail').text("La saisie est incorrecte");
    } else {
        $('#alertEmail').html('&nbsp');

    }
});

// champ login  
$('#ins_login').blur(function () {
    if ($('#ins_login').val() == '') {
        $('#alertLogin').text("Le champs n'est pas rempli");
    } else if (regLogin.test($('#ins_login').val()) == false) {
        $('#alertLogin').text("La saisie est incorrecte");
    } else {
        $('#alertLogin').html('&nbsp');

    }
});

// champ mot de passe 
$('#ins_mdp').blur(function () {
    if ($('#ins_mdp').val() == '') {
        $('#alertMdp').text("Le champs n'est pas rempli");
    } else if (regMdp.test($('#ins_mdp').val()) == false) {
        $('#alertMdp').text("La saisie est incorrecte");
    }     
    else {
        $('#alertMdp').html('&nbsp');
    }
});

// champ verif mot de passe 
$('#ins_mdpverif').blur(function () {
    if ($('#ins_mdp').val() != $('#ins_mdpverif').val()) {
        $('#alertmdpVerif').text("Vérification du mot de passe incorrecte")
    } else {
        $('#alertmdpVerif').html('&nbsp');
    }
});

//controle doublons email (ajax)
$('#ins_email').change(function () {
    $.post({
         url: "./../Ajax/doublon",
         data:
        {
            verifRef: $("#ins_email").val(),
            verifChamps: "email",
            verifTable: "adherent",
        },
        success: function (data) {
             if (data == 1) {
                $("#alertEmail").text("dèjà utilisée");
            } else {
                $("#alertEmail").html('&nbsp');
            }
        }
    });
});

//controle doublons login (ajax)
$('#ins_login').change(function () {
    $.post({
        url: "./../Ajax/doublon",
        data:
        {
            verifRef: $("#ins_login").val(),
            verifChamps: "login",
            verifTable: "adherent",
        },
        success: function (data) {
            if (data == 1) {
                $("#alertLogin").text("dèjà utilisée");
            } else {
                 $("#alertLogin").html('&nbsp');
             }
        }
    });
});


});


