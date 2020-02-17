<div class="container">
    <div>
        <h1>CREATION DE SESSION</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <?= form_open('Espace_jeu/creation_session', 'id="form_crete_session"'); ?>
            <div>
                <h5>Horaire de la session</h5>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <input type="date" name="ses_date" id="ses_date" class="form-control" value="<?= set_value('') ?>">
                    <span class="messerreur" id="alertSesDate">&nbsp</span>
                </div>
                <div class="col-sm-2">
                    <input type="time" name="ses_h_debut" id="ses_h_debut" class="form-control" value="<?= set_value('') ?>">
                    <span class="messerreur" id="alertSesHD">&nbsp<?= form_error('ses_h_debut', '<span>', '</span>'); ?></span>
                </div>
            </div>
            <hr>
            <div>
                <h5>Participant-e(s)</h5>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <input type="text" name="inv_email" id="inv_email" class="form-control" placeholder="Email">
                    <span class="messerreur" id="alertInvNom">&nbsp<?= form_error('inv_email', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="inv_nom" id="inv_nom" class="form-control" placeholder="Nom" value="<?= set_value('') ?>">
                    <span class="messerreur" id="alertInvNom">&nbsp<?= form_error('inv_nom', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="inv_prenom" id="inv_prenom" class="form-control" placeholder="Prénom" value="<?= set_value('') ?>">
                    <span class="messerreur" id="alertInvPreom">&nbsp<?= form_error('inv_prenom', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-1">
                    <button class="btn"  id="par_ajout">Ajouter</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light text-center">
                        <tr>
                            <th class="col-sm-4 justify-text-left">Email</th>
                            <th class="col-sm-4">Nom</th>
                            <th class="col-sm-3">Prénom</th>
                            <th class="col-sm-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        var_dump($liste);
                        foreach ($liste as $participant) {
                        ?>
                            <tr>
                                <td class=""><?= $participant['inv_email'] ?></td>
                                <td class=""><?= $participant['inv_prenom']?></td>
                                <td class=""><?= $participant['inv_prenom']?></td>
                                <td class=""> <a class="btn" href="" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div>
                <h5>Métier(s)</h5>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <select type="text" name="metier1" id="" class="form-control">
                        <option> 1</option>
                        <option> 2 </option>
                    </select>
                    <span class="messerreur" id="">&nbsp<?= form_error('metier1', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-4">
                    <select type="text" name="metier2" id="" class="form-control">
                        <option> 1</option>
                        <option> 2 </option>
                    </select>
                    <span class="messerreur" id="m">&nbsp<?= form_error('metier2', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-4">
                    <select type="text" name="metier3" id="" class="form-control">
                        <option> 1</option>
                        <option> 2 </option>
                    </select>
                    <span class="messerreur" id="">&nbsp<?= form_error('metier3', '<span>', '</span>'); ?></span>
                </div>
            </div>
            <div class="form-group row ">

                <div class="col">
                    <input type="submit" id="formAjoutAdh" value="Enregistrer" class="btn">
                    <a href="<?= site_url("Accueil") ?>" class="btn">Retour</a>
                    <span class="messerreur" id="">&nbsp</span>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>