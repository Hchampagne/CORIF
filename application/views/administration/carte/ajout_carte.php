<div id="titre">
    <h1>Ajout d'une carte</h1>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 25rem; height: 32rem;">
                <img class="card-img-top" src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <p id="text_numero">N° Carte</p>
                    </h5>
                    <span class="card-text">

                        <p id="text_metier">Métier</p>

                        <p id="text_type">Type de carte</p>

                        <p id="text_description">Désciption</p>

                    </span>
                </div>
            </div>
        </div>
        <div class="col">

            <?= form_open('Administration/ajout_carte', 'id="form_ajoutCarte"'); ?>
            <div class="form-group row">
                <label for="car_numero" class="col-sm-2 col-form-label">N° carte</label>
                <div class="col-sm-5">
                    <input type="text" name="car_numero" id="car_numero" class="form-control" value="<?= set_value('car_numero') ?>">
                    <span class="messerreur" id="alertCarNum">&nbsp<?= form_error('car_numero', '<span>', '</span>'); ?></span>
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
                    <span class="messerreur" id="alertCarMet">&nbsp<?= form_error('car_met_id', '<span>', '</span>'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="car_type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-5">
                    <select class="form-control" name="car_type" id="car_type">
                        <option value="" selected>option</option>
                        <option value="metier">Métier</option>
                        <option value="parcours">Parcours</option>
                    </select>
                    <span class="messerreur" id="alertCarType">&nbsp<?= form_error('car_type', '<span>', '</span>'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="car_description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="10" cols="50" maxlength="500" type="text" name="car_description" id="car_description" class="form-control" placeholder="Déscritption"></textarea>
                    <span class="messerreur" id="alertCarDescription"> <?= form_error('car_description', '<span>', '</span>'); ?>&nbsp</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="submit" value="Ajout" class="btn">
                    <a href="<?= site_url("Accueil") ?>" class="btn">Retour</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>