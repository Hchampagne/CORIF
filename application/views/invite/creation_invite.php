<div class="container">
    <div>
        <h1>Ajout invité-e(s) à une session</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <?= form_open('Invite/creation_invite', 'id="form_creatInvite"'); ?>
            <div>
                <h5>Participant-e(s)</h5>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <input type="text" name="inv_email" id="invEmail" class="form-control" placeholder="Email" value="<?= set_value('inv_email') ?>">
                    <span class="messerreur" id="alertParEmail">&nbsp<?= form_error('inv_email', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="inv_nom" id="invNom" class="form-control" placeholder="Nom" value="<?= set_value('inv_nom') ?>">
                    <span class="messerreur" id="alertParNom">&nbsp<?= form_error('inv_nom', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="inv_prenom" id="invPrenom" class="form-control" placeholder="Prénom" value="<?= set_value('inv_prenom') ?>">
                    <span class="messerreur" id="alertParPrenom">&nbsp<?= form_error('inv_prenom', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn">Ajouter</button>
                </div>
            </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-sm-1">index</th>
                            <th class="col-sm-4">Email</th>
                            <th class="col-sm-3">Nom</th>
                            <th class="col-sm-3">Prénom</th>
                            <th class="col-sm-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 0;
                        foreach ($liste as $participant) {
                        ?>
                            <tr>
                                <td class=""><?= $index ?></td>
                                <td class=""><?= $participant['inv_email'] ?></td>
                                <td class=""><?= $participant['inv_prenom'] ?></td>
                                <td class=""><?= $participant['inv_prenom'] ?></td>
                                <td class=""> <a class="btn" href="<?= site_url("Invite/deleteParticipantListe/") . $index ?>" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>
                            </tr>
                        <?php $index++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="form-group row ">

                <div class="col">
                    <a href="<?= site_url("Invite/ajout_invite/") ?>" class="btn">Enregistrer</a>
                    <a href="<?= site_url("Accueil") ?>" class="btn">Retour</a>
                    <span class="messerreur" id="">&nbsp</span>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>