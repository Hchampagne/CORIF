<div class="container">
    <div>
        <h1>CREATION DE SESSION</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <!-----------------------------------------------------Parie session---------------------------------------------------------------------------------------->
            <div>
                <h5>Horaire de la session</h5>
            </div> <?= form_open('Session_jeu/creation_session', 'id="form_creat_session"'); ?>
            <div class="form-group row">
                <div class="col-sm-2">
                    <input type="text" name="ses_id" id="ses_id" class="form-control text-center" value="<?= isset($session->ses_id) ? $session->ses_id : set_value('ses_id');?>" disabled>
                    <span class="messerreur" id="alertSesDate">&nbsp</span>
                </div>
                <div class="col-sm-2">
                    <input type="date" name="ses_date" id="ses_date" class="form-control text-center" value="<?= set_value('') ?>">
                    <span class="messerreur" id="alertSesDate">&nbsp<?= form_error('ses_date', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-2">
                    <input type="time" name="ses_h_debut" id="ses_h_debut" class="form-control text-center" value="<?= set_value('') ?>">
                    <span class="messerreur" id="alertSesHD">&nbsp<?= form_error('ses_h_debut', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn" name="session" value="session" id="submit_session">Enregistrer</button>
                </div>
            </div>
            </form>
            <hr>

            <!-----------------------------------------------------Parie invité---------------------------------------------------------------------------------------->
            <div>
                <h5>Participant-e(s)</h5>
            </div>
            <?= form_open('Invite/creation_invite', 'id="form_creat"'); ?>
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
                    <button type="submit" class="btn" id="submit_invite">Enregistrer</button>
                </div>
            </div>
            </form>
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
                        
                        ?>
                            <tr>
                                <td class=""></td>
                                <td class=""></td>
                                <td class=""></td>
                                <td class=""></td>
                                <td class=""> <a class="btn" href="<?= site_url("Invite/deleteParticipantListe/") ?>" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>                       
                            </tr>
                        <?php ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <!-----------------------------------------------------Parie metier---------------------------------------------------------------------------------------->
            <div>
                <h5>Métier(s)</h5>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <select type="text" name="metier1" id="" class="form-control">
                        <option> 1</option>
                        <option> 2 </option>
                    </select>
                    <span class="messerreur" id="">&nbsp<?= form_error('metier1', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-3">
                    <select type="text" name="metier2" id="" class="form-control">
                        <option> 1</option>
                        <option> 2 </option>
                    </select>
                    <span class="messerreur" id="m">&nbsp<?= form_error('metier2', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-3">
                    <select type="text" name="metier3" id="" class="form-control">
                        <option> 1</option>
                        <option> 2 </option>
                    </select>
                    <span class="messerreur" id="">&nbsp<?= form_error('metier3', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn" id="submit_Meitier">Enregistrer</button>
                </div>
            </div>
            <div class="form-group row ">

                <div class="col">
                    <input type="submit" id="formAjoutAdh" value="Enregistrer" class="btn">
                    <a href="<?= site_url("Accueil") ?>" class="btn">Retour</a>
                    <span class="messerreur" id="">&nbsp</span>
                </div>
            </div>

        </div>
    </div>
</div>