
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE Session

//REGEX
var regDate = /^[0-9]{4}-[0-9][0-9]-[0-9][0-9]$/;
var regHeure = /^[0-9]{2}:[0-9]{2}$/;
// Messages erreurs
var vide = "Le champs est vide";
var long = "La saisie est trop longue";
var saisie = "La saisie est incorrecte";

// Contrôle sur le blur de l'input
// champs date
$('#ses_d_session').blur(function () {
    if ($('#ses_d_session').val().length === 0) {      
        $('#alertDate').text(vide);
    } 
    else if($('#ses_d_session').val().length > 10){
        $('#alertDate').text(long);     
    }
    else if (regDate.test($('#ses_d_session').val()) == false) {
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
    else if (regHeure.test($('#heureDebut').val()) == false) {
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
    else if($('#heureFin').val().length > 8){
        $('#alertFin').text(long);     
    }
    else if (regHeure.test($('#heureFin').val()) == false) {
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
    else if ($('#ses_d_session').val().length > 10) {
        event.preventDefault();
        $('#alertDate').text(long);
    }
    else if (regDate.test($('#ses_d_session').val()) == false) {
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
    else if (regHeure.test($('#heureDebut').val()) == false) {
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
    else if (regHeure.test($('#heureFin').val()) == false) {
        event.preventDefault();
        $('#alertFin').text(saisie);
    }
    else {
        $('#alertFin').html('&nbsp');
    }
      
});



});



