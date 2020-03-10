  
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

            var ZD = "<div class=\"ajoutPile\ col-sm-3 \" id=\"" + pile + "\">" +
                    "<button class=\"btnSuppr\" id=\"" + btn + "\">supprimer la pile</button>" +
                    "<ul class=\"target  \" id=\"" + target + "\">" +                
                    "</ul>" +
                    "<input type=\"text\" name=\"reponseMetier\" id=\""+reponseMetier+"\" placeholder=\"Réponse\">" +
                    "</div>";

            // ajout drop zone
            $(ZD).appendTo(".aireJeu");
            
            });
 
/*** rend les cartes draggable ***/
    $(".card").draggable({
       //revert : "invalid"
    });           



/*** def zone target droppable ***/
    $("#"+ pile).droppable({
        accept : ".card",
        drop : function(event,ui){
            var current = ui.draggable;
            var resultat = $("#".target);

            current.fadeOut();
            resultat.append('<li class="target-res">'+"coucou"+'</li>')
        }
    });


    $("."+target).selectable();
 

/*** zone de départ tas initial droppable ***/
          $(".start").droppable();  
});
