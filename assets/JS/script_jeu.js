

// SCRIPT JEUd
$(document).ready(function () {

    // Nombre de crates
    var nombreCartes = $(".liste > li").length;
    $("#compteur").text("Cartes restantes : " + nombreCartes);

    
         
    // initialise un compteur pour les piles /creation
    var nb = 0;
    var x = 0;
  
          
    /***  ajout drop zone  ***/
    $("#ajoutPile").on("click", function () {

        nb += 1;
        var pile = "pile" + nb;
        var target = "target" + nb;
        var btn = "btn" + nb;              
        var reponseMetier = "reponseMetier"+nb

        var ZD = '<div class="pile  col-sm-3 " id=' + pile + '>' +           
            "<ul class=\"target ui-widget-header \" id=\"" + target + "\">" +
            "</ul>" +
            "<input type=\"text\" name=\"reponseMetier\" id=\"" + reponseMetier + "\" placeholder=\"Réponse\">" +
            "</div>";        

        // ajout drop zone
        $(ZD).appendTo(".aireJeu");
    
        
        /*** def zone target droppable ***/
        $("#" + target).droppable({ 
                                            
            drop: function (event, ui) {
                $(this).css('background', 'rgba(133, 141, 133, 0.856)');
                x += 1;
                var ajout = "ajout"+x;
                // attribut à la variable objet deplacé courant
                var carte = ui.draggable;
                carte.remove("img");        
                // attribut à la variable 
                var dropZone = $("#"+target);
                // ajoute la carte dnas la drop zone
                dropZone.append('<li class="ajout" id="'+ajout+'">' + carte.html() + '</li>'); 

                var compteCarte = $('#'+ target +'> li').length;
                var depot = $('#'+target+' li:nth-child('+compteCarte+')').html();
                var idCarte = $('#' + ajout + ' p:first-child').attr('id');

                console.log(target + " / " + compteCarte +" / "+ idCarte);
                // efface la carte de placée
                carte.fadeOut();
           
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
                      
            }
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

