<div class="container">
    <div>
        <h1>CREATION DE SESSION</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <form action="" method="post">
                <div>
                    <div>
                        <h5>Horaire de la session de formation</h5>
                    </div>
                    <div class="form-group row">
                        <label for="ses_date" class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-">
                            <input type="date" name="ses_date" id="ses_date" class="form-control ses_time" value="<?= set_value('') ?>">
                        </div>
                        <span class="messerreur" id="alertSEsDate">&nbsp<?= form_error('inv_nom', '<span>', '</span>'); ?></span>
                    </div>

                    <div class="form-group row">
                        <label for="ses_h_debut" class="col-sm-3 col-form-label">Heure de début</label>
                        <div class="col-sm-3">
                            <input type="time" name="ses_h_debut" id="ses_h_debut" class="form-control ses_time" value="<?= set_value('') ?>">
                        </div>
                        <span class="messerreur" id="alertSesHD">&nbsp<?= form_error('inv_nom', '<span>', '</span>'); ?></span>
                    </div>

                    <div class="form-group row">
                        <label for="ses_h_fin" class="col-sm-3 col-form-label">Heure de début</label>
                        <div class="col-sm-3">
                            <input type="time" name="ses_h_fin" id="ses_h_fin" class="form-control ses_time" value="<?= set_value('') ?>">
                        </div>
                        <span class="messerreur" id="alertSesHF">&nbsp<?= form_error('ses_h_fin', '<span>', '</span>'); ?></span>
                    </div>

                    <hr>
                    <div>
                        <div>
                            <h5>Ajout participant</h5>
                        </div>

                        <div class="form-group row">
                            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-8">
                                <input type="text" name="inv_nom" id="inv_nom" class="form-control" value="<?= set_value('') ?>">
                                <span class="messerreur" id="alertInvNom">&nbsp<?= form_error('inv_nom', '<span>', '</span>'); ?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                            <div class="col-sm-8">
                                <input type="text" name="inv_prenom" id="inv_nom" class="form-control" value="<?= set_value('') ?>">
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


                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" value="Ajout" class="btn">
                                <a href="<?= site_url("Accueil") ?>" class="btn">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8">
            <form action="#" method="post">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                    </div>
                </div>

                <hr>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="inv_email" id="inv_email" class="form-control" value="<?= set_value('') ?>">
                    </div>
                    <div class="col-sm-2">
                        <a href="#" class="btn">Supprimer</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!--container -->