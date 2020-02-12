

// Construction de lacarte

var regNum = /^[A-Z][ ][0-9]{1,8}$/; // regex 1 lettre Maj + espace + 8 chifres max / 1 mini
var regDescript = /^[^<>\/]+[\w\W]{1,500}$/;  // regex exclu chevron et  slash de 1 à 300 caractères

// Construction de la carte
// recopie la valeur des champs dans le visuel carte
$('#car_type').click(function () {
    $('#text_type').html($("#car_type  option:selected").text());
});

$('#car_numero').keyup(function () {
    $('#text_numero').html($("#car_numero").val());  
});

$('#car_description').keyup(function () {
    $('#text_description').html($("#car_description").val());
});

$('#car_met_id').click(function () {
    $('#text_metier').html($("#car_met_id option:selected").text());
});


// Contrôle les champs du formulaire

// champs numéro carte
$('#car_numero').blur(function () {
    if ($('#car_numero').val().length === 0) {
        $('#alertCarNum').text("Le champs n'est pas rempli");
    } else if ($('#car_numero').val().length > 10 ) {
        $('#alertCarNum').text("La saisie est trop longue");
    } else if ((regNum.test($('#car_numero').val()) == false)) {
        $('#alertCarNum').text("La saisie est incorrecte");
    } else {
        $('#alertCarNum').html('&nbsp');
    }
});
// select métier
$('#car_met_id').click(function () {
    if ($('#car_met_id').val().length === 0) {       
        $('#alertCarMet').text("Selectionner une option");   
    } else {
        $('#alertCarMet').html('&nbsp');
    }
});
// select type
$('#car_type').click(function () {
    if ($('#car_type').val().length === 0) {
        $('#alertCarType').text("Selectionner une option");
    } else {
        $('#alertCarType').html('&nbsp');
    }
});
 // textaera description
$('#car_description').blur(function () {
    if ($('#car_description').val().length === 0) {
        $('#alertCarDescription').text("Le champs n'est pas rempli");
    } else if ($('#car_description').val().length > 500) {
        $('#alertCarDescription').text("La saisie est trop longue");       
    } else if ((regDescript.test($('#car_description').val()) == false) || (regMail.test($('#car_numero').val() == false))) {
        $('#alertCarDescription').text("La saisie est incorrecte");
    } else {
        $('#alertCarDescription').html('&nbsp');
    }
});

// requete AJAX
//controle doublons email (ajax) inscription
$("#car_numero").change(function () {
    $.post({
        url: "./../Ajax/doublon",
        data: {
            verifRef: $("#car_numero").val(),
            verifChamps: "car_numero",
            verifTable: "carte",
        },
        success: function (data) {
            if (data == 1) {
                $("#alertCarNum").text("Dèjà utilisé");
            } else {
                $("#alertCarNum").html("&nbsp");
            }
        }
    });
});


//Valid le formulaire avant envoi
$("#form_ajoutCarte").submit(function (event) {

    // champs numéro carte
    if ($('#car_numero').val().length === 0) {
        $('#alertCarNum').text("Le champs n'est pas rempli");
        event.preventDefault();
    } else if ($('#car_numero').val().length > 10) {
        $('#alertCarNum').text("La saisie est trop longue");
        event.preventDefault();
    } else if ((regNum.test($('#car_numero').val()) == false)) {
        $('#alertCarNum').text("La saisie est incorrecte");
        event.preventDefault();
    }else{
        $('#alertCarNum').html('&nbsp');
    }

    // select métier
    if ($('#car_met_id').val().length === 0) {
        $('#alertCarMet').text("Selectionner une option");
        event.preventDefault();
    } else {
        $('#alertCarMet').html('&nbsp');
    }

    // select type
    if ($('#car_type').val().length === 0) {
        $('#alertCarType').text("Selectionner une option");
        event.preventDefault();
    } else {
        $('#alertCarType').html('&nbsp');
    }

    // textaera description
    if ($('#car_description').val().length === 0) {
        $('#alertCarDescription').text("Le champs n'est pas rempli");
        event.preventDefault();
    } else if ($('#car_description').val().length > 500) {
        $('#alertCarDescription').text("La saisie est trop longue");
        event.preventDefault();
    } else if ((regDescript.test($('#car_description').val()) == false)) {
        $('#alertCarDescription').text("La saisie est incorrecte");
        event.preventDefault();
    } else {
        $('#alertCarDescription').html('&nbsp');
    }      
    
});