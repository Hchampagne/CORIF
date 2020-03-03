  
    // SCRIPT JEU
    $(document).ready(function () {


          // initialise le compteur pour les cartes / drop
          var compte = 0;
          // initialise un compteur pour les piles /creation
          var nb = 0;
 
          var inv_id = $("#inv_id").val();

          // ajout drop zone
          $("#ajoutPile").on("click", function () {

              nb += 1;
              var pile = "pile" + nb;
              var target = "target" + nb;
              var btn = "btn" + nb;

              var ZD = "<div class=\"ajoutPile\ col-sm-3 \" id=\"" + pile + "\">" +
                  "<div class=\"target ui-widget-header \" id=\"" + target + "\">" +
                  "<button class=\"btnSuppr\" id=\"" + btn + "\">supprimer la pile</button>" +
                  "</div>" +
                  "<input type=\"text\" name=\"reponseMetier\" id=\"reponseMetier\" placeholder=\"Réponse\">" +
                  "</div>";

              // ajout drop zone
              $(ZD).appendTo(".aireJeu");

              //requete ajout DZ dans la table pile
              $.post({
                  url: "../../Ajax/ajout_pile",
                  data: {
                      pil_inv_id: $("#inv_id").val(),
                      pil_nom: pile,
                      pil_target: target,
                  },
                  success: function (data) {
                      if (data == 1) {
                          alert("good");
                      } else {
                          alert("pas good");
                      }
                  }
              });
            

              // def zone target droppable
              $("#" + target).droppable({

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


              // bouton supprimer
              $(".btnSuppr").on("click", function () {
                  var delId = $(this).closest(".ajoutPile").attr('id'); // recup id de div parentes .ajoutPile du bouton clicker
                  $("#" + delId).remove(); // suppression de div 
              });

          });

           // bouton supprimer drop zone
           $(".btnSuppr").on("click", function () {
               var delId = $(this).closest(".ajoutPile").attr('id'); // recup id de div parentes .ajoutPile du bouton clicker
               $("#" + delId).remove(); // suppression de div 
           
            });







         



          // rend les cartes draggable
          $(".card").draggable();

          // zone de départ tas initial droppable
          $(".start").droppable({

              drop: function (event, ui) {
                  $(this).css('background', 'rgba(133, 141, 133, 0.856)');

                  $("#compteur").text("compteur: " + compte);
              },
              over: function (event, ui) {
                  $(this).css('background', 'orange');
              },
              out: function (event, ui) {
                  $(this).css('background', 'rgba(133, 141, 133, 0.856)');

                  $("#compteur").text("compteur: " + compte);
              }
          });
        

   
    });
