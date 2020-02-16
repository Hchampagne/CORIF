<!-- Modal -->
<div class="modal fade" id="sessionModal" role="dialog">
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
                    <label for="ses_date" class="col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-4">
                        <input type="date" name="ses_date" id="ses_date" class="form-control" value="<?= set_value('') ?>">
                        <span class="messerreur" id="alertSesDate">&nbsp<?= form_error('ses_date', '<span>', '</span>'); ?></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ses_h_debut" class="col-sm-4 col-form-label">Heure de debut</label>
                    <div class="col-sm-4">
                        <input type="time" name="ses_h_debut" id="ses_h_debut" class="form-control" value="<?= set_value('') ?>">
                        <span class="messerreur" id="alertSesHD">&nbsp<?= form_error("ses_h_debut", '<span>', '</span>'); ?></span>
                    </div>
                </div>
<!-- 
                <div class="form-group row">
                    <label for="inv_email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                        <span class="messerreur" id="alertInvNom">&nbsp<?= form_error('inv_email', '<span>', '</span>'); ?></span>
                    </div>
                </div>
-->
                <div class="form-group row justify-content-md-center">
                    <div class="col-sm-4 col-form-label">
                    </div>
                    <div class="col-sm-4">
                        <div>                            
                            <a href="<?= site_url("connexion/inscription") ?>" class="btn btn-default">Valider</a>
                            <a href="<?= site_url("accueil") ?> " type="button" class="btn btn-default" data-dismiss="modal">Fermer</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>