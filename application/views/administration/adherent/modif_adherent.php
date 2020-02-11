<div class="container ">
    <div>
        <h1>Modification fiche adhérent</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">


            <?= form_open('Administration/modif_adherent/', 'id="form_modifAdherent"'); ?>

            <div class="form-group row justify-content-center">
                <label for="adh_id" class="col-sm-1 col-form-label ">Index</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_id" id="adh_id" class="form-control" value="<?= $adherent->adh_id ?>" disabled>
                    <input type="hidden" name="adh_id" id="adh_id" class="form-control" value="<?= $adherent->adh_id ?>">
                    <span id="">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_nom" class="col-sm-1 col-form-label ">Nom</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_nom" id="adh_nom" class="form-control" value="<?= (set_value('adh_nom')) ? set_value('adh_nom') : $adherent->adh_nom; ?>">
                    <span id="alertAdhNom">&nbsp<?= form_error('adh_nom', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_prenom" class="col-sm-1 col-form-label ">Prénom</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_prenom" id="adh_prenom" class="form-control" value="<?= (set_value('adh_prenom')) ? set_value('adh_prenom') : $adherent->adh_prenom; ?>">
                    <span id="alertAdhPrenom">&nbsp<?= form_error('adh_prenom', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_organisme" class="col-sm-1 col-form-label ">Organisme</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_organisme" id="adh_organisme" class="form-control" value="<?= (set_value('adh_organisme')) ? set_value('adh_organisme') : $adherent->adh_organisme; ?>">
                    <span id="alertAdhOrganisme">&nbsp<?= form_error('adh-organisme', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_email" class="col-sm-1 col-form-label ">Email</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_email" id="adh_email" class="form-control" value="<?= (set_value('adh_email')) ? set_value('adh_email') : $adherent->adh_email; ?>">
                    <span id="alertAdhEmail">&nbsp<?= form_error('adh_email', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_login" class="col-sm-1 col-form-label ">Login</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_login" id="adh_login" class="form-control" value="<?= (set_value('adh_login')) ? set_value('adh_login') : $adherent->adh_login; ?>">
                    <span id="alertAdhLogin">&nbsp<?= form_error('adh_login', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_role" class="col-sm-1 col-form-label "></label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="adh_role" id="adhrole1" value="formateur" <?= ($adherent->adh_role == "formateur") ? "checked" : ""; ?>>
                        formateur
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="adh_role" id="adhrole2" value="administrateur" <?= ($adherent->adh_role == "administrateur") ? "checked" : ""; ?>>
                        administrateur
                    </label>
                    <span id="alertAdhRole">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_login" class="col-sm-1 col-form-label "></label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="adh_validation" id="adhvalidation1" value="0" <?= ($adherent->adh_validation == "0") ? "checked" : ""; ?>>
                        En cours de validation
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="adh_validation" id="adhvalidation2" value="1" <?= ($adherent->adh_validation == "1") ? "checked" : ""; ?>>
                        validé
                    </label>
                    <span id="alertAdhValid">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="" class="col-sm-1 col-form-label"></label>
                <div class="col-5">
                    <input type="submit" id="mdifadh_submit" value="Modifier" class="btn">
                    <span id="">&nbsp</span>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>