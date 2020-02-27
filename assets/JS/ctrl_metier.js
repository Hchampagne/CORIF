// FORMULAIRE AJOUT ET MODIFICATION METIER
// FORMULAIRE AJOUT ET MODIFICATION METIER

//REGEX
var regMetier = /[A-Za-zéèçàäëï()]+([\s-][A-Za-zéèçàäëï()]+)*$/;
var regPrenom = /[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
var regAge = /^[0-9]{2,3}$/;

// Contrôle les champs du formulaire 
// champs métier
$('#met_metier').blur(function () {
    if ($('#met_metier').val().length === 0) {
        $('#alertMetMetier').text("Le champs n'est pas rempli");
    } else if ($('#met_metier').val().length > 50 ) {
        $('#alertMetMetier').text("La saisie est trop longue");
    } else if ((regMetier.test($('#met_metier').val()) == false)) {
        $('#alertMetMetier').text("La saisie est incorrecte");
    } else {
        $('#alertMetMetier').html('&nbsp');
    }
});

 // champs prénom
$('#met_prenom').blur(function () {
    if ($('#met_prenom').val().length === 0) {
        $('#alertMetPrenom').text("Le champs n'est pas rempli");
    } else if ($('#met_prenom').val().length > 50) {
        $('#alertMetPrneom').text("La saisie est trop longue");       
    } else if ((regPrenom.test($('#met_prenom').val()) == false)) {
        $('#alertMetPrenom').text("La saisie est incorrecte");
    } else {
        $('#alertMetPrenom').html('&nbsp');
    }
});

 // champs age
 $('#met_age').blur(function () {
     if ($('#met_age').val().length === 0) {
         $('#alertMetAge').text("Le champs n'est pas rempli");
     } else if ($('#met_age').val().length > 3) {
         $('#alertMetAge').text("La saisie est trop longue");
     } else if ((regAge.test($('#met_age').val()) == false)) {
         $('#alertMetAge').text("La saisie est incorrecte");
     } else {
         $('#alertMetAge').html('&nbsp');
     }
 });


//Valide le formulaire avant envoi
$("#form_metier").submit(function (event) {

    // champs métier
    if ($('#met_metier').val().length === 0) {
        $('#alertMetMetier').text("Le champs n'est pas rempli");
        event.preventDefault();
    } else if ($('#met_metier').val().length > 50) {
        $('#alertMetMetier').text("La saisie est trop longue");
        event.preventDefault();
    } else if ((regMetier.test($('#met_metier').val()) == false)) {
        $('#alertMetMetier').text("La saisie est incorrecte");
        event.preventDefault();
    }else{
        $('#alertMetMetier').html('&nbsp');
    }

    // champs prénom
    if ($('#met_prenom').val().length === 0) {
        $('#alertMetPrenom').text("Le champs n'est pas rempli");
        event.preventDefault();
    } else if ($('#met_prenom').val().length > 50) {
        $('#alertMetPrenom').text("La saisie est trop longue");
        event.preventDefault();
    } else if ((regPrenom.test($('#met_prenom').val()) == false)) {
        $('#alertMetPrenom').text("La saisie est incorrecte");
        event.preventDefault();
    } else {
        $('#alertMetPrenom').html('&nbsp');
    }

    // champs age
    if ($('#met_age').val().length === 0) {
        $('#alertMetAge').text("Le champs n'est pas rempli");
        event.preventDefault();
    } else if ($('#met_age').val().length > 3) {
        $('#alertMetAge').text("La saisie est trop longue");
        event.preventDefault();
    } else if ((regAge.test($('#met_age').val()) == false)) {
        $('#alertMetAge').text("La saisie est incorrecte");
        event.preventDefault();
    } else {
        $('#alertMetAge').html('&nbsp');
    }

});
    
