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

 
