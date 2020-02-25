
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE invite

//REGEX
var regDate = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
var regHeure = /^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/;
// Messages erreurs
var vide = "Le champs est vide";
var long = "La saisie est trop longue";
var saisie = "La saisie est incorrecte";

// Contrôle sur le change de l'input
// champs date
$('#ses_d_session').blur(function () {
    if ($('#ses_d_session').val().length === 0) {      
        $('#alertDate').text(vide);
    } 
    else if($('#ses_d_session').val().length > 8){
        $('#alertDate').text(long);     
    }
    else if (regMail.test($('#ses_d_session').val()) == false) {
        $('#alertDate').text(saisie);
    }     
    else {
        $('#alertDate').html('&nbsp');       
    }
});
// champs heure debut
$('#heureDebut').blur(function () {
    if ($('#heureDebut').val().length === 0) {      
        $('#alertDebut').text(vide);
    } 
    else if($('#heureDebut').val().length > 5){
        $('#alertDebut').text(long);     
    }
    else if (regPrenom.test($('#heureDebut').val()) == false) {
        $('#alertDebut').text(saisie);
    }     
    else {
        $('#alertDebut').html('&nbsp');       
    }
});

// champs heure fin
$('#heureFin').blur(function () {
    if ($('#heureFin').val().length === 0) {      
        $('#alertFin').text(vide);
    } 
    else if($('#heurefin').val().length > 5){
        $('#alertFin').text(long);     
    }
    else if (regPrenom.test($('#HeureFin').val()) == false) {
        $('#alertFin').text(saisie);
    }     
    else {
        $('#alertFin').html('&nbsp');       
    }
});




// Controle sur envoi du formulaire
$("#form_session").submit(function(event){

// Champs email
    if ($('#ses_d_session').val().length === 0) {
      
        $('#alertDate').text(vide);
        event.preventDefault();
    }
    else if ($('#ses_d_session').val().length > 60) {
        event.preventDefault();
        $('#alertDate').text(long);
    }
    else if (regMail.test($('#ses_d_session').val()) == false) {
        event.preventDefault();
        $('#alertDate').text(saisie);
    }
    else {
        $('#alertSesDate').html('&nbsp');
    }
// champs nom
    if ($('#heureDebut').val().length === 0) {
        event.preventDefault();
        $('#alertDebut').text(vide);
    }
    else if ($('#heureDebut').val().length > 60) {
        event.preventDefault();
        $('#alertDebut').text(long);
    }
    else if (regNom.test($('#heureDebut').val()) == false) {
        event.preventDefault();
        $('#alertDebut').text(saisie);
    }
    else {
        $('#alertDebut').html('&nbsp');
    }
// champs prénom
    if ($('#heureFin').val().length === 0) {
        event.preventDefault();
        $('#alertFin').text(vide);
    }
    else if ($('#heureFin').val().length > 60) {
        event.preventDefault();
        $('#alertFin').text(long);
    }
    else if (regPrenom.test($('#heureFin').val()) == false) {
        event.preventDefault();
        $('#alertFin').text(saisie);
    }
    else {
        $('#alertFin').html('&nbsp');
    }
      
});


});



