

// SCRIPT JEU
$(document).ready(function () {

    // Nombre de crates
    var nombreCartes = $(".donne >li").length;
    $("#compteur").text("Cartes restantes : " + nombreCartes);
         
    // initialise un compteur pour les piles /creation
    var nb = 0;
          
        /***  ajout drop zone  ***/
    $("#ajoutPile").on("click", function () {

        nb += 1;
        var pile = "pile" + nb;
        var target = "target" + nb;
        var btn = "btn" + nb;              
        var reponseMetier = "reponseMetier"+nb

        var count = 0;

        var ZD = '<div class="pile ui-widget-header col-sm-3 " id=' + pile + '>' +
                "<button class=\"btnSuppr\" id=\"" + btn + "\">supprimer la pile</button>" +
                "<ul class=\"target ui-widget-header \" id=\"" + target + "\">" +                
                "</ul>" +
                "<input type=\"text\" name=\"reponseMetier\" id=\""+reponseMetier+"\" placeholder=\"Réponse\">" +
                "</div>";

        // ajout drop zone
        $(ZD).appendTo(".aireJeu");
        // requete AJAX ajout DZ en base de donnée
        $.post({
            url: "../../Ajax/ajout_pile",
            data: {
                pil_jeu_id: $("#jeu_id").val(),
                pil_container: target,
            },
            success: function (data) {
                if (data == 1) {
                   
                } else {
                    // problème
                }
            }
        });

    /*** def zone target droppable ***/
    $("#" + target).droppable({ 
        
        //accept : ".card",
                                      
        drop: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)');

            var current = ui.draggable;
            var resultat = $("#"+target);
            //current.fadeOut();
            resultat.append('<li class="objet-target ui-widget-content">' + current.html()+ '</li>');   
                     
            current.fadeOut();

            $(".objet-target").draggable({
                zIndex: "1000",
                revert : "invalid"
            });
                                            
        },

        over: function (event, ui) {
            $(this).css('background', 'orange');
        },

        out: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)');
           
            
           
        }
    });

/**** Suppression d'une zone dropable ***/
    $("#" + btn).on("click", function () {                  
        var delId = $("#"+pile).attr("id"); // recup id de div parentes .ajoutPile bouton 
        var delTarget = $("#"+target).attr("id"); // recup le id target de div parent .ajoutPile bouton        
        
        $.post({
            url: "../../Ajax/suppression_pile",
            data: {
                pil_jeu_id: $("#jeu_id").val(),
                pil_container: delTarget,
            },
            success: function (data) {
                if (data == 1) {
                    // succes
                    $("#" + delId).remove(); // suppression de div 
                } else {
                    // problème
                }
                }
                
            });
        
        });            
    });
         

/*** rend les cartes draggable ***/
    $(".card").draggable({      
        revert : "invalid",
        cursor: "move", cursorAt: {
            top: 150,
            left: 90
        },

        start: function(event,ui){          
        },

        stop: function(event,ui){          
        }

    });


/*** zone de départ tas initial droppable ***/
    $(".donne").droppable({

        accept : ".card",

        drop: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)'); 
            //nombreCartes += 1;
            //$("#compteur").text("Cartes restantes : " + nombreCartes);
        },

        over: function (event, ui) {
            $(this).css('background', 'orange');
        },

        out: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)');  
                
            //nombreCartes -= 1;
            //$("#compteur").text("Cartes restantes : " + nombreCartes);
        }
    });
   
});

