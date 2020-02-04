
$(document).ready(function () { 
// initialise JQUERY au chargement du document

//FORMULAIRE newPassword

//REGEX
var regMdp = /^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
var regCleConf = /^[0-9]{6,6}$/;

// Messages erreurs
var vide = "Le champs n'est pas rempli";
var long = "La saisie est trop longue";
var saisie = "La saisie est incorrecte";


// champs cle de confirmation
$("#cleConf").blur(function () {
    if ($("#cleConf").val().length === 0) {      
        $("#alertCleConf").text(vide);
    } 
    else if($("#cleConf").val().length > 6){
        $("#alertCleConf").text(long);
        
    }
    else if (regCleConf.test($("#cleConf").val()) == false) {
        $("#alertCleConf").text(saisie);
    }     
    else {
        $("#alertCleConf").html("&nbsp");       
    }
});

// champs email
$("#newMdp").blur(function () {
    if ($("#newMdp").val().length === 0) {      
        $("#alertNewMdp").text(vide);
    } 
    else if($("#newMdp").val().length > 150){
        $("#alertNewMdp").text(long);
        
    }
    else if (regMail.test($("#newMdp").val()) == false) {
        $("#alertNewMdp").text(saisie);
    }     
    else {
        $("#alertNewMdp").html("&nbsp");       
    }
});

// champs verif mot de passe 
$('#verifNewMdp').blur(function () {
    if ($('#newMdp').val() != $('#verifNewMdp').val()) {
        $('#alertVerifMdp').text("Vérification du mot de passe incorrecte")
    } else {
        $('#alertVerifMdp').html('&nbsp');
    }
});



$("#form_newPassword").submit(function(event){

// champs cle confirmation
    if ($("#cleConf").val().length === 0) {      
        $("#alertCleConf").text(vide);
        event.preventDefault();
    } 
    else if($("#cleConf").val().length > 6){
        $("#alertCleConf").text(long);
        
    }
    else if (regCleConf.test($("#cleConf").val()) == false) {
        $("#alertCleConf").text(saisie);
        event.preventDefault();
    }     
    else {
        $("#alertCleConf").html("&nbsp");       
    }

 // champs mot de passe      
    if($("#newMdp").val().length === 0){
        $("#alertNewMdp").text(vide);
        event.preventDefault();
    }
    else if($("#newMdp").val().length > 150){
        $("#alertNewMdp").text("Votre saisie est trop longue");
        event.preventDefault();
    }
    else if (regMdp.test($("#newMdp").val()) == false){
        $("#alertNewMdp").text(saisie);
        event.preventDefault();
    }else{
        $("#alertNewMdp").html("&nbsp");        
    }

    if ($('#newMdp').val() != $('#verifNewMdp').val()) {
        $('#alertVerifMdp').text("Vérification du mot de passe incorrecte")
        event.preventDefault();
    } else {
        $('#alertVerifMdp').html('&nbsp');
    }
});

});




