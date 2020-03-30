    <div class="container">

        <div id="titre">
            <h1>Choix des métiers</h1>
        </div>
        <hr>
        <?= form_open('Metier/modificationMetier_session/' . $session, 'id="form_metierSession"'); ?>
        <div class="form-group row ">
            <label for="id_metier" class="col-sm-1 col-form-label">Metier</label>
            <div class="col-sm-5">
                <select type="text" name="id_metier" id="metSession" class="form-control"> 
                                    
                    <?php foreach ($liste_metier as $metier) { ?>
                        <option value="<?= $metier->met_id ?>"> <?= $metier->met_metier ?> </option>
                    <?php } ?>
                </select>
                <span class="messerreur" id="alertMetSession">&nbsp<?= form_error('id_metier', '<span>', '</span>') ?></span>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn" id="submit_Meitier">Ajouter</button>
            </div>
        </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th class="col-sm-3">Metier</th>
                        <th class="col-sm-3">Prénom</th>
                        <th class="col-sm-2">Age</th>
                        <th class="col-sm-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($liste as $metier) {
                    ?>
                        <tr>
                            <td class=""><?= $metier->met_metier ?></td>
                            <td class=""><?= $metier->met_prenom ?></td>
                            <td class=""><?= $metier->met_age ?></td>
                            <td class=""> <a class="btn" href="<?= site_url("Metier/suppressionMetier_session/").$session."/". $metier->met_id ?>" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>
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
                <a href="<?= site_url("Session_jeu/liste_session/") ?>" class="btn">Terminer</a>
                <a href="<?= site_url("Invite/modificationListe_invite/") . $session ?>" class="btn">Retour</a>
                <span class="messerreur" id="">&nbsp</span>
            </div>
        </div>
    </div>