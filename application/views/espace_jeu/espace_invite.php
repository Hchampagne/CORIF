<div class="container-fluid">
   <div class="text-center">
      <h3>JEU METIER</h3>
   </div>
   <hr>
   <div>
      <input type="hidden" mane="inv_id" id="inv_id" value="<?= $inv_id ?>">
      <input type="hidden" mane="ses_id" id="ses_id" value="<?= $id_session ?>">
      <p>
         <H4><?= "SESSION : " . $id_session ?></H4>
      </p>
      <p>
         <h5><?= "Bonjour : " . $inv_nom . " " . $inv_prenom ?></h5>
      </p>
   </div>
   <hr>
   <div class="row">
      <div class="col">
         <div class="aireJeu row justify-content-center">
            <!-- insertion zone droppable -->
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <div class="row">
            <div class="col">
               <hr>
               <p id="compteur">Carte : </p>
               <hr>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <div class="row justify-content-center">
            <div class="col-sm-3">
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