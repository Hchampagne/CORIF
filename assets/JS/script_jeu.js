  
    // SCRIPT JEU
    $(function () {


          // initialise le compteur pour les cartes / drop
          var compte = 0;
          // initialise un compteur pour les piles /creation
          var nb = 0;
          
          // ajout drop zone
          $("#ajoutPile").on("click", function () {

              nb += 1;
              var pile = "pile" + nb;
              var target = "target" + nb;
              var btn = "btn" + nb;
              var reponseMetier = "reponseMetier"+nb

              var ZD = "<div class=\"ajoutPile\ col-sm-3 \" id=\"" + pile + "\">" +
                  "<div class=\"target ui-widget-header \" id=\"" + target + "\">" +
                  "<button class=\"btnSuppr\" id=\"" + btn + "\">supprimer la pile</button>" +
                  "</div>" +
                  "<input type=\"text\" name=\"reponseMetier\" id=\""+reponseMetier+"\" placeholder=\"Réponse\">" +
                  "</div>";

            // ajout drop zone
              $(ZD).appendTo(".aireJeu");
            // requet AJAX ajout en base de donnée
               $.post({
                           url: "../../Ajax/ajout_pile",
                           data: {
                               pil_jeu_id: $("#jeu_id").val(),
                               pil_container: target,
                           },
                           success: function (data) {
                               if (data == 1) {
                                  // succes
                               } else {
                                  // problème
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

                $("#" + btn).on("click", function () {
                    var delId = $(this).closest(".ajoutPile").attr('id'); // recup id de div parentes .ajoutPile bouton 
                    var delTarget = $(this).parent().attr('id'); // recup le id target de div parent .ajoutPile bouton 

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
