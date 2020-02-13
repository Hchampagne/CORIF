<div class="container ">
    <div>
        <h1>Ajout fiche adhérent</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">

            <?= form_open('Administration/ajout_adherent/', 'id="form_adherent"'); ?>

            <div class="form-group row justify-content-center">
                <label for="adh_nom" class="col-sm-1 col-form-label ">Nom</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_nom" id="adh_nom" class="form-control" value="<?= set_value('adh_nom') ?>">
                    <span class="messerreur" id="alertAdhNom">&nbsp<?= form_error('adh_nom', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_prenom" class="col-sm-1 col-form-label ">Prénom</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_prenom" id="adh_prenom" class="form-control" value="<?= set_value('adh_prenom') ?>">
                    <span class="messerreur" id="alertAdhPrenom">&nbsp<?= form_error('adh_prenom', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_organisme" class="col-sm-1 col-form-label ">Organisme</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_organisme" id="adh_organisme" class="form-control" value="<?= set_value('adh_organisme') ?>">
                    <span class="messerreur" id="alertAdhOrganisme">&nbsp<?= form_error('adh_organisme', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_email" class="col-sm-1 col-form-label ">Email</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_email" id="adh_email" class="form-control" value="<?= set_value('adh_email') ?>">
                    <span class="messerreur" id="alertAdhEmail">&nbsp<?= form_error('adh_email', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_login" class="col-sm-1 col-form-label ">Login</label>
                <div class="col-sm-5">
                    <input type="text" name="adh_login" id="adh_login" class="form-control" value="<?= set_value('adh_login') ?>">
                    <span class="messerreur" id="alertAdhLogin">&nbsp<?= form_error('adh_login', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_login" class="col-sm-1 col-form-label "></label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="adh_role" id="adh_role" value="formateur" checked>
                        formateur
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="adh_role" id="adh_role" value="administrateur">
                        administrateur
                    </label>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="adh_login" class="col-sm-1 col-form-label "></label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                        <input type="radio" name="adh_validation" id="adh_validation" value="0" checked>
                        En cours de validation
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="adh_validation" id="adh_validation" value="1">
                        validé
                    </label>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="" class="col-sm-1 col-form-label"></label>
                <div class="col-5">
                    <input type="submit" id="formAjoutAdh" value="Enregistrer" class="btn">
                    <a href="<?= site_url("Accueil") ?>" class="btn">Retour</a>
                    <span class="messerreur" id="">&nbsp</span>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>