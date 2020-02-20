<div class="container ">
    <div>
        <h1>Modification fiche adhérent</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">


            <?= form_open('Administration/modif_adherent/', 'id="form_modifAdherent"'); ?>

            <div class="form-group row justify-content-center">
                <label for="inv_id" class="col-sm-1 col-form-label ">Index</label>
                <div class="col-sm-2">
                    <input type="text" name="inv_id" id="inv_id" class="form-control" value="" disabled>
                    <input type="hidden" name="inv_id" id="inv_id" class="form-control" value="">
                    <span id="">&nbsp</span>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
<!--
            <div class="form-group row justify-content-center">
                <label for="inv_ses_id" class="col-sm-1 col-form-label ">Session</label>
                <div class="col-sm-2">
                    <input type="text" name="inv_ses_id" id="inv_ses_id" class="form-control" value="">
                    <span class="messerreur" id="alertInvSession">&nbsp<?= form_error('inv_ses_id', '<span>', '</span>') ?></span>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
-->
            <div class="form-group row justify-content-center">
                <label for="inv_email" class="col-sm-1 col-form-label ">Email</label>
                <div class="col-sm-5">
                    <input type="text" name="inv_email" id="inv_email" class="form-control" value="">
                    <span id="alertAdhEmail">&nbsp<?= form_error('inv_email', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="inv_nom" class="col-sm-1 col-form-label ">Nom</label>
                <div class="col-sm-5">
                    <input type="text" name="inv_nom" id="adh_nom" class="form-control" value="">
                    <span id="alertInvNom">&nbsp<?= form_error('inv_nom', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="inv_prenom" class="col-sm-1 col-form-label ">Prénom</label>
                <div class="col-sm-5">
                    <input type="text" name="inv_prenom" id="inv_prenom" class="form-control" value="">
                    <span id="alertInvPrenom">&nbsp<?= form_error('inv_prenom', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="" class="col-sm-1 col-form-label"></label>
                <div class="col-5">
                    <button type="submit" id="modifInvite_submit" value="Modifier" class="btn">Modifier</button>
                    <span id="">&nbsp</span>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>