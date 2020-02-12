<div id="titre">
    <h1> Modification de la carte de "<?= $carte->car_numero; ?>"</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 25rem; height: 32rem;"">
                <img class=" card-img-top" src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <p id="text_numero"><?= $carte->car_numero ?></p>
                    </h5>
                    <span class="card-text">

                        <p id="text_metier"><?= $carte->met_metier ?></p>

                        <p id="text_type"><?= $carte->car_type ?></p>

                        <p id="text_description"><?= $carte->car_description ?></p>

                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <?= form_open('Administration/modif_carte', 'id="form_modifCarte"'); ?>

            <div class="form-group row">
                <label for="car_id" class="col-sm-2 col-form-label">Index</label>
                <div class="col-sm-4">
                    <input type="text" name="" id="" class="form-control" value="<?= $carte->car_id; ?>" disabled>
                    <input type="text" name="car_id" id="" class="form-control" value="<?= $carte->car_id; ?>" hidden>
                    <span class="messerreur" id="alertCarId">&nbsp</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="car_numero" class="col-sm-2 col-form-label">N° carte</label>
                <div class="col-sm-5">
                    <input type="text" name="car_numero" id="car_numero" class="form-control" value="<?= (set_value('car_numero')) ? set_value('car_numero') : $carte->car_numero; ?>">
                    <span class="messerreur" id="alertCarNum">&nbsp<?= form_error('car_numero', '<span>', '</span>'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="car_met_id" class="col-sm-2 col-form-label">Métier</label>
                <div class="col-sm-8">
                    <select class="form-control" name="car_met_id" id="car_met_id">
                        <?php foreach ($liste_metier as $metier) { ?>
                            <option value="<?= $metier->met_id ?>" <?= ($metier->met_metier == $carte->met_metier) ? "selected" : ""; ?>>
                                <?= $metier->met_metier ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span class="messerreur" id="alertMetMtier">&nbsp<?= form_error('car_met_id', '<span>', '</span>'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="car_type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-5">
                    <select class="form-control" name="car_type" id="car_type">
                        <option selected="<?= $carte->car_type ?>" value="<?= $carte->car_type ?>"><?= $carte->car_type ?></option>
                        <option value="metier">Métier</option>
                        <option value="parcours">Parcours</option>
                    </select>
                    <span class="messerreur" id="alertCarType">&nbsp<?= form_error('car_type', '<span>', '</span>'); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="car_description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea rows="10" cols="50" type="text" maxlength="500" name="car_description" id="car_description" class="form-control"><?= $carte->car_description; ?></textarea>
                    <span class="messerreur" id="alertCarDescription">&nbsp<?= form_error('car_description', '<span>', '</span>'); ?></span>
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