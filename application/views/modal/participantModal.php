<!-- Modal -->
<div class="modal fade" id="participantModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">
                   Ajouter un participant
                </h4>
            </div>
            <div class="modal-body">

                <?= form_open('connexion/login', 'id="form_participant"'); ?>

                <div class="form-group row">
                    <label for="inv_nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-8">
                        <input type="text" name="inv_nom" id="inv_nom" class="form-control" value="<?= set_value('') ?>">
                        <span class="messerreur" id="alertInvNom">&nbsp<?= form_error('inv_nom', '<span>', '</span>'); ?></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inv_prenom" class="col-sm-2 col-form-label">Prenom</label>
                    <div class="col-sm-8">
                        <input type="text" name="inv_prenom" id="inv_prenom" class="form-control" value="<?= set_value('') ?>">
                        <span class="messerreur" id="alertInvNom">&nbsp<?= form_error('inv_prenom', '<span>', '</span>'); ?></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inv_email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                        <span class="messerreur" id="alertInvNom">&nbsp<?= form_error('inv_email', '<span>', '</span>'); ?></span>
                    </div>
                </div>

                <div class="form-group row justify-content-md-center">
                    <div class="col-sm-1 col-form-label">
                    </div>
                    <div class="col-sm-11">
                        <div>                            
                            <a href="<?= site_url("connexion/inscription") ?>" class="btn btn-default">Ajout</a>
                            <a href="<?= site_url("accueil") ?> " type="button" class="btn btn-default" data-dismiss="modal">Fermer</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>