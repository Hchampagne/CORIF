<div class="container-fluid">
   <div hidden class="description" title="description">
   </div>
   <div class="text-center">
      <h3>JEU METIER</h3>
   </div>
   <hr>
   <div>
      <input type="hidden" mane="inv_id" id="inv_id" value="<?= $inv_id ?>">
      <input type="hidden" mane="ses_id" id="ses_id" value="<?= $id_session ?>">
      <input type="hidden" mane="jeu_id" id="jeu_id" value="<?= $id_jeu ?>">
      <p>
         <H4><?= "SESSION : " . $id_session ?></H4>
      </p>
      <p>
         <h5><?= "Bonjour : " . $inv_nom . " " . $inv_prenom ?></h5>
      </p>
   </div>
   <hr>
   <div class="row">
      <div class="col-3">
         <p id="compteur"></p>
         <div class="row justify-content-center">
            <div id="start" class="start  ui-widget-header">
               <ul class="liste">
                  <?php foreach ($cartes as $carte) { ?>
                     <li class="ui-widget-content">
                        <div class="card position-absolute" z-index="<?= $carte->car_id; ?>">
                           <img src="<?= base_url("assets/img/images/logo-b.jpg") ?>" class="card-img-top">
                           <div class="card-body">
                              <p class="card-title" id="<?= $carte->car_id; ?>"><?= $carte->car_numero ?></p>
                              <p class="card-text"><?= $carte->car_description ?></p>
                           </div>
                           <div>
                     </li>
                  <?php } ?>
               </ul>
            </div>
         </div>
      </div>
      <div class="col-9">
         <div class="aireJeu row justify-content-center">
            <!-- insertion zone droppable -->
         </div>
      </div>
   </div>
</div>