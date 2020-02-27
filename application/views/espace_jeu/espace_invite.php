 <div>
    <h2 class="text-center">Dossier</h2>
    <button class="btn btn-info" id="btn_add">+ Métier</button>
    <div><br></div>
    <!--Zone draggable -->
    <div class="row" id="metiers">

    </div>

 </div>
 <!--Fin de Dossier  -->
 <hr style="background-color:#FFFFFF">
 <div>
    <h2 class="text-center">Carte (<span id="compteur"></span>)</h2>

    <div id="cartes" class="row dossier">
       <?php foreach ($cartes as $carte) : ?>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2 carte" id="drag<?= $carte->car_id ?>" draggable="true">
             <div class="card text-white bg-primary mb-3" id="test" style="max-width: 18rem;">
                <div class="card-header metier-<?= $carte->car_met_id ?> " title="<?= $carte->car_description; ?>">Carte <?= $carte->car_type ?>
                   <span class="float-right"><?= $carte->car_numero; ?></span>
                </div>
                <div class="card-body">
                   <textaera class="card-text" rows="3" cols="30"><?= $carte->car_description; ?></textaera>
                   <!-- <p class="card-text"><?= $carte->car_description; ?></p> -->
                </div>
             </div>
          </div>
          <!--Fin carte 1  -->
       <?php endforeach; ?>
    </div>
    <!--Fin de row  -->
 </div>
 <!--Fin de Carte  -->
 </div>
 <!--Fin de corp  -->

 <script>
    // 
    $(document).ready(function() {



       // deplacement carte
       function evt_dragover() {
          $(".dossier").on("dragover", function(ev) {
             ev.originalEvent.dataTransfer.dropEffect = "move";
             ev.preventDefault();
          });
       }


       //  drop carte
       function evt_dragdrop() {

          $(".carte").on("dragstart", function(ev) {

             ev.originalEvent.dataTransfer.setData("text/plain", ev.target.id);
             ev.originalEvent.dataTransfer.effectAllowed = "move";
          });



          $(".dossier").on("drop", function(ev) {
             var dest = $(this).closest('.dossier')[0];

             var data = ev.originalEvent.dataTransfer.getData("text/plain");
             dest.appendChild(document.getElementById(data));

             if (dest.id == "cartes") { // en bas
                $("#" + data).addClass("col-6 col-sm-4 col-md-3 col-lg-2");
             } else { // en haut
                $("#" + data).removeClass("col-6 col-sm-4 col-md-3 col-lg-2");
             }
             compte_cartes();
          });
       }


       // enlève une carte de la pile  
       function evt_remove() {
          $(".btn_close").click(function() {
             var div = $(this).parent();
             div.children().each(function() {
                if ($(this).hasClass("carte")) {

                   $(this).addClass("col-6 col-sm-4 col-md-3 col-lg-2");
                   $(this).appendTo($("#cartes"));
                }
             });
             div.remove();
             compte_cartes();
          });
       }




       // ajout drop zone   
       $("#btn_add").click(function() {

          var metiers = document.getElementById("metiers");
          var tmp = metiers.innerHTML;
          var ajout = "<div class=\"col-6 col-sm-4 col-md-3 col-lg-2 metier dossier\">\
                       <button class=\"btn btn-info btn_close\" >- Supprimer</button>\
                       <div class=\"textbox\" contenteditable>Metier ?</div>\
                       </div>";
          metiers.innerHTML = tmp + ajout;
          evt_dragdrop();
          evt_dragover();
          evt_remove();

       });

       // compte des cartes
       function compte_cartes() {
          $("#compteur").html($("#cartes").children().length);
       }


    });
 </script>