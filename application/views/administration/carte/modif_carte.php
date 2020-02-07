<div id="titre">
    <h1> Modification de la carte de "<?= $carte->car_numero; ?>"</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem; color:#343538; margin-bottom:2rem;">
                <img class="card-img-top" src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Carte : "<?= $carte->car_type; ?>" </h5>
                    <span class="card-text" style="color:#343538">
                        <b> Nom de l'ouvrier(ère):</b>
                        <p><?= $carte->met_prenom; ?></p>

                        <b>Numéro de la carte:</b>
                        <p><?= $carte->car_numero ?></p>

                        <b>Description:</b>
                        <p><?= $carte->car_description; ?></p>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="col">
            <form method="post" action="" id="mc_signup_form">

                <div class="form-group row">
                    <label for="car_id" class="col-sm-2 col-form-label">Index</label>
                    <div class="col-sm-4">
                        <input type="text" name="car_id" id="car_id" class="form-control" value="<?= $carte->car_id; ?>" disabled>  
                        <span id="alertCarId">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_numero" class="col-sm-2 col-form-label">N° carte</label>
                    <div class="col-sm-4">
                        <input type="text" name="car_numero" id="car_numero" class="form-control" value="<?= $carte->car_numero; ?>">  
                        <span id="alertCarNum">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_met_id" class="col-sm-2 col-form-label">Métier</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="car_met_id" id="car_met_id">
                            <?php foreach ($liste_metier as $metier) { ?>
                            <option value="<?= $metier->met_id ?>" <?= ($metier->met_metier ==$carte->met_metier) ? "selected" : ""; ?>>
                            <?= $metier->met_metier ?> 
                            </option>
                            <?php } ?>                      
                        </select> 
                        <span id="alertMetMtier">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_type" class="col-sm-2 col-form-label">N° carte</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="car_type" id="car_type">
                            <option selected="<?= $carte->car_type ?>" value="<?= $carte->car_type ?>"><?= $carte->car_type ?></option>
                            <option value="metier">métier</option>
                            <option value="parcours">parcours</option>
                        </select>  
                        <span id="alertCarType">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-9">
                    <textarea rows="7" cols="33" type="text" name="car_description" id="car_description" class="form-control"><?= $carte->car_description; ?></textarea>
                        <span id="alertCarDescription">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-9">
                    <input type="submit" id="btn_submit" value="Modication" class="btn">
                    </div>
                </div>
            </form>
        </div>    
    </div>
</div>





           