// FORMULAIRE AJOUT ET MODIFICATION METIER

//REGEX
var regMetier = /[A-Za-zéèçàäëï()]+([\s-][A-Za-zéèçàäëï()]+)*$/;




// Contrôle les champs du formulaire 
// champs métier
$('#met_metier').blur(function () {
    if ($('#met_metier').val().length === 0) {
        $('#alertMetMetier').text("Le champs n'est pas rempli");
    }else if(test != 1){
         $('#alertMetMetier').text("La saisie est trop longue");
    }    
    else if ($('#met_metier').val().length > 50 ) {
        $('#alertMetMetier').text("La saisie est trop longue");
    } else if ((regMetier.test($('#met_metier').val()) == false)) {
        $('#alertMetMetier').text("La saisie est incorrecte");
    } else {
        $('#alertMetMetier').html('&nbsp');
    }


//Valide le formulaire avant envoi
$("#form_metier").submit(function (event) {

    // champs métier
    if ($('#met_metier').val().length === 0) {
        $('#alertMetMetier').text("Le champs n'est pas rempli");
        event.preventDefault();
    } else if ($('#met_metier').val().length > 50) {
        $('#alertMetMetier').text("La saisie est trop longue");
        event.preventDefault();
    } else if ((regNum.test($('#met_metier').val()) == false)) {
        $('#alertMetMetier').text("La saisie est incorrecte");
        event.preventDefault();
    }else{
        $('#alertMetMetier').html('&nbsp');
    }
   
});
    
});
    
