

// SCRIPT JEUd
$(document).ready(function () {

    // Nombre de crates
    var nombreCartes = $(".liste > li").length;
    $("#compteur").text("Cartes restantes : " + nombreCartes);   
         
    // initialise un compteur pour les piles /creation
    var nb = 0;
    // initialise compteur nombres de cartes => drop zone
    var x = 0;
           
    /***  ajout drop zone  ***/
    $("#ajoutPile").on("click", function () {

        nb += 1;
        var pile = "pile" + nb;
        var target = "target" + nb;
        var btn = "btn" + nb;              
        var reponseMetier = "reponseMetier"+nb

        var ZD = '<div class="pile  col-sm-3 " id=' + pile + '>' + 
            "<input type=\"text\" name=\"reponseMetier\" id=\"" + reponseMetier + "\" placeholder=\"Réponse\">" +          
            "<ul class=\"target ui-widget-header \" id=\"" + target + "\">" +
            "</ul>" +           
            "</div>";        

        // ajout drop zone
        $(ZD).appendTo(".aireJeu");
    
        
        /*** def zone target droppable ***/
        $("#" + target).droppable({ 
                                            
            drop: function (event, ui) {
                $(this).css('background', 'rgba(133, 141, 133, 0.856)');
                // incrément de id de la balise li ajout carte
                x += 1;
                var ajout = "ajout"+x;
                // attribut à la variable objet deplacé courant
                var carte = ui.draggable;
                     
                // attribut à la variable 
                var dropZone = $("#"+target);

                // ajoute la carte dnas la drop zone
                dropZone.append('<li class="ajout" id="'+ajout+'">' + carte.html() + '</li>'); 

                // modificatioon apparence de la carte
                var compteCarte = $('#'+ target +'> li').length; // compte le nombre de li <=> nombre carte dans la liste ul              
                var idCarte = $('#' + ajout + ' p:first-child').attr('id'); // recupère id de la balise p
                $('#'+ajout+' img:first-child' ).remove();  // supprime l'image première balise img
                $('#' + ajout + ' p:last-child').hide(); // cache la description derniére balise p

                var numeroCarte = $('#' + ajout + ' p:first-child').html();    // recupère le numéro de la carte
                var description = $('#' + ajout + ' p:last-child').html();  // recupère la description de la carte 

                // efface la carte déplacée
                carte.fadeOut();

                // montre la description de la carte réduite dropée
                $('#' + ajout).hover(function(){                                   
                    $('#' + ajout + ' p:last-child').show();
                    console.log(numeroCarte + " : " +description);
                }, function(){ $('#' + ajout + ' p:last-child').hide();}
                );

           
                // Actualise le  nombre de carte(s) restante(s)
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

        /*** rend les cartes draggable  ***/
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
                //$(this).css('background', 'rgba(133, 141, 133, 0.856)');            
            },

            over: function (event, ui) {
                //$(this).css('background', 'orange');
            },

            out: function (event, ui) {
                //$(this).css('background', 'rgba(133, 141, 133, 0.856)');            
            }
        });
   
});

