<div class="container-fluid">
   <div class="row">
      <div class="col">
         <div class="row">
            <div class="col">
               <hr>
               <button id="ajoutPile" class="btn">Ajout pile</button>
               <hr>
            </div>
         </div>
      </div>
   </div>


   <div class="row">
      <div class="col">
         <div class="aireJeu row justify-content-center">
            <div class="pile col-sm-3 ">
               <div class="target ui-widget-header" id="target0">
                  <p>drop zone</p>
               </div>
               <input type="text" name="reponseMetier" id="reponseMetier" placeholder="Réponse">
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <div class="row">
            <div class="col">
               <hr>
               <p id="compteur"> &nbsp</p>
               <hr>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <div class="row justify-content-center">
            <div class="col-3">
               <div id="start" class="start ui-widget-header">
                  <?php foreach ($cartes as $carte) { ?>
                     <div id="<?= $carte->car_id; ?>" z-index="<?= $carte->car_id; ?>" class="card position-absolute ui-widget-content">
                        <img src="<?= base_url("assets/img/images/logo-b.jpg") ?>" class="card-img-top">
                        <div class="card-body">
                           <h5 class="card-title"><?= $carte->car_numero ?></h5>
                           <p><?= $carte->car_type ?></p>
                           <p class="card-text"><?= $carte->car_description ?></p>
                        </div>
                     </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>

<script>
   $(document).ready(function() {

     

      // initialise le compteur carte
      var compte = 0;
      // initialise un compteur por les piles
      var nb = 0 ;

      // ajout drop zone
      $("#ajoutPile").on("click", function() {

         nb += 1;
         var pile = "pile"+nb;
         var target= "target"+nb;
         var btn = "btn"+nb;

         alert(target);

         var ZD = "<div class=\"ajoutPile\ col-sm-3 \" id=\"\">" +
         "<div class=\"target1 ui-widget-header \" id=\"coucou\">" +     
         "<button class=\"btn\" id=\"\">supprimer la pile</button>"+
         "</div>" +
         "<input type=\"text\" name=\"reponseMetier\" id=\"reponseMetier\" placeholder=\"Réponse\">" +
         "</div>";   

         // ajout drop zone
         $(ZD).appendTo(".aireJeu");
            
         
              
         // def zone target droppable
         $(".target1").droppable({

            drop: function(event, ui) {
               $(this).css('background', 'rgb(0,200,0)'); 
                 alert($("#coucou").attr("id"));     
            },

            over: function(event, ui) {
               $(this).css('background', 'orange');
            },

            out: function(event, ui) {
               $(this).css('background', 'rgb(0,200,0)');
               
            }
         });

         $(".btnSuppr").on("click",function(){
            
         });


      });

      // rend les cartes draggable
      $(".card").draggable();

      // zone de départ tas initial droppable + compteur deplacement
      $(".start").droppable({

         drop: function(event, ui) {
            $(this).css('background', 'rgb(0,200,0)');
            compte += 1;
            $("#compteur").text("compteur: " + compte);
         },
         over: function(event, ui) {
            $(this).css('background', 'orange');
         },
         out: function(event, ui) {
            $(this).css('background', 'rgb(0,200,0)');
            compte -= 1;
            $("#compteur").text("compteur: " + compte);
         }
      });

      // zone de dépot initiale droppable 
      $(".target").droppable({

         drop: function(event, ui) {
            $(this).css('background', 'rgb(0,200,0)');           
         },
         over: function(event, ui) {
            $(this).css('background', 'orange');
         },
         out: function(event, ui) {
            $(this).css('background', 'rgb(0,200,0)');
         }
      });

   });
</script>