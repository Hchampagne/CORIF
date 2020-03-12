

// SCRIPT JEUd
$(document).ready(function () {

    // Nombre de crates
    var nombreCartes = $(".liste > li").length;
    $("#compteur").text("Cartes restantes : " + nombreCartes);

    
         
    // initialise un compteur pour les piles /creation
    var nb = 0;
    var xcarte = 0;
          
    /***  ajout drop zone  ***/
    $("#ajoutPile").on("click", function () {

        nb += 1;
        var pile = "pile" + nb;
        var target = "target" + nb;
        var btn = "btn" + nb;              
        var reponseMetier = "reponseMetier"+nb


        var ZD = '<div class="pile  col-sm-3 " id=' + pile + '>' +
                "<button class=\"btnSuppr\" id=\"" + btn + "\">supprimer la pile</button>" +
                "<ul class=\"target ui-widget-header \" id=\"" + target + "\">" +                
                "</ul>" +
                "<input type=\"text\" name=\"reponseMetier\" id=\""+reponseMetier+"\" placeholder=\"Réponse\">" +
                "</div>";

        // ajout drop zone
        $(ZD).appendTo(".aireJeu");
        // requete AJAX ajout DZ en base de donnée table pile
        
        $.post({
            url: "../../Ajax/ajout_pile",
            data: {
                pil_jeu_id: $("#jeu_id").val(),
                pil_container: target,
            },
            success: function (data) {
                if (data == 1) {
                    // success
                } else {
                    // problème
                }
            }
        });
        
    /*** def zone target droppable ***/
    $("#" + target).droppable({ 
                                            
        drop: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)');

            // attribut à la variable objet deplacé courant
            var carte = ui.draggable;
            carte.remove("img");        
            // attribut à la variable 
            var dropZone = $("#"+target);
            // ajoute la carte dnas la drop zone
            dropZone.append('<li class="objet-target ui-widget-content">' + carte.html() + '</li>'); 

            xcarte = $('#'+ target +'> li').length;
            
            // efface la carte de placée
            carte.fadeOut();
           

            console.log(target + " / " + xcarte);


            /* rend la carte deposée draggable 
             attribut un z-index pour être au premier plan 
             invalide le retour dans la pile de départ*/
            $(".objet-target").draggable({
                zIndex: "1000",
                revert : "invalid"
            });

            // calcul nombre de carte(s) restante(s)
            // ne compte que si la carte est dropée
            nombreCartes -= 1;
            $("#compteur").text("Cartes restantes : " + nombreCartes); 

                                            
        },

        over: function (event, ui) {
            $(this).css('background', 'orange');
        },

        out: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)'); 
            
            xcarte = $('#' + target + '> li').length;
        }
    });

/**** Suppression d'une zone dropable ***/
    $("#" + btn).on("click", function () {  
                     
        var delId = $("#"+pile).attr("id"); // recup id de pile  .ajoutPile bouton 
        var delTarget = $("#"+target).attr("id"); // recup le id target  .ajoutPile bouton    

        // requtet ajax supprime la target       
        $.post({
            url: "../../Ajax/suppression_pile",
            data: {
                pil_jeu_id: $("#jeu_id").val(),
                pil_container: delTarget,
            },
            success: function (data) {
                if (data == 1) {
                    // success
                    $("#" + delId).remove(); // suppression de la div 
                } else {
                    // problème
                }
                }           
            });
        });            
    });
         

/*** rend les cartes draggable ***/
    $(".card").draggable({ 

        zIndex: "1000",
        revert : "invalid",
        cursor: "move", cursorAt: {
            top: 150,
            left: 90
        }
    });

    $(".objet-target").draggable({
        zIndex: "1000",
        revert: "invalid"
    });




/*** zone de départ tas initial droppable ***/
    $(".start").droppable({

        accept : ".card",

        drop: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)');            
        },

        over: function (event, ui) {
            $(this).css('background', 'orange');
        },

        out: function (event, ui) {
            $(this).css('background', 'rgba(133, 141, 133, 0.856)');            
        }
    });
   
});

