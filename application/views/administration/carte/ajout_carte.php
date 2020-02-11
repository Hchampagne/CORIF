<div id="titre">
    <h1>Ajout d'une carte</h1>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem; color:#343538; margin-bottom:2rem;">
                <img class="card-img-top" src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Type de la carte: <p id="text_type"></p>
                    </h5>
                    <span class="card-text" style="color:#343538">

                        <b>Numéro de la carte:</b>
                        <p id="text_numero" style="color:#343538"></p>

                        <b>Description:</b>
                        <p id="text_description" style="color:#343538"></p>

                    </span>
                </div>
            </div>
        </div>
        <div class="col">
            <form method="post" action="" id="form_ajoutCarte">

                <div class="form-group row">
                    <label for="car_numero" class="col-sm-2 col-form-label">N° carte</label>
                    <div class="col-sm-5">
                        <input type="text" name="car_numero" id="car_numero" class="form-control" value="">
                        <span class="messerreur" id="alertCarNum">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_met_id" class="col-sm-2 col-form-label">Métier</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="car_met_id" id="car_met_id">
                            <?php foreach ($liste_metier as $metier) { ?>
                                <option value="<?= $metier->met_id ?>"> <?= $metier->met_metier ?> </option>
                            <?php } ?>
                            <option value="" selected>option</option>
                        </select>
                        <span class="messerreur" id="alertCarMet">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_type" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="car_type" id="car_type">
                            <option value="" selected>option</option>
                            <option value="metier">métier</option>
                            <option value="parcours">parcours</option>
                        </select>
                        <span class="messerreur" id="alertCarType">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="car_description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="7" cols="33" type="text" name="car_description" id="car_description" class="form-control"></textarea>
                        <span class="messerreur" id="alertCarDescription">&nbsp</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit"  value="Modication" class="btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>