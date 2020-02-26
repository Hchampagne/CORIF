<div class="container">
    <div>
        <h1>Ajout/modification liste invité-e(s) à une session</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <?= form_open('Invite/modificationListe_invite/'. $session, 'id="form_creatInvite"'); ?>
            <div>
                <h5>Participant-e(s)</h5>
            </div>
            <div class="form-group row">
                <div class="col-sm-1">
                    <label for=""> Session </label>
                    <input type="text" name="" id="" class="form-control" placeholder="Email" value="<?= $session ?>" disabled>
                </div>

                <div class="col-sm-3">
                    <label for="inv_email"> Email </label>
                    <input type="text" name="inv_email" id="invEmail" class="form-control" placeholder="Email" value="<?= set_value('inv_email') ?>">
                    <span class="messerreur" id="alertParEmail">&nbsp<?= form_error('inv_email', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-3">
                    <label for="inv_nom"> Nom </label>
                    <input type="text" name="inv_nom" id="invNom" class="form-control" placeholder="Nom" value="<?= set_value('inv_nom') ?>">
                    <span class="messerreur" id="alertParNom">&nbsp<?= form_error('inv_nom', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-3">
                    <label for="inv_prenom"> Prénom </label>
                    <input type="text" name="inv_prenom" id="invPrenom" class="form-control" placeholder="Prénom" value="<?= set_value('inv_prenom') ?>">
                    <span class="messerreur" id="alertParPrenom">&nbsp<?= form_error('inv_prenom', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-1">
                    <label> &nbsp </label>
                    <button type="submit" class="btn">Ajouter</button>
                </div>
            </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>                           
                            <th class="col-sm-3">Email</th>
                            <th class="col-sm-3">Nom</th>
                            <th class="col-sm-3">Prénom</th>
                            <th class="col-sm-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($liste as $participant) {
                        ?>
                            <tr>
                                <td class=""><?= $participant->inv_email ?></td>
                                <td class=""><?= $participant->inv_nom ?></td>
                                <td class=""><?= $participant->inv_prenom ?></td>
                                <td class=""> <a class="btn" href="<?= site_url("Invite/suppressionListeAjout_invite/") . $participant->inv_id . "/" . $session ?>" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="form-group row ">
                <div class="col">
                    <a href="<?= site_url("Metier/modificationMetier_session/").$session ?>" class="btn">Modification métier(s)</a>
                    <a href="<?= site_url("Session_jeu/modification_session/").$session ?>" class="btn">Retour</a>
                    <span class="messerreur" id="">&nbsp</span>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>