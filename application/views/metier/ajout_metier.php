    <div class="container">
         
         <div id="titre">
             <h1>Choix des métier(s)</h1>
         </div>
        <hr>
         <?= form_open('Invite/modificationMetier_session/' . $session, 'id="form_creatInvite"'); ?>

         <div class="form-group row justify-content-md-center">
            <label for="adh_nom" class="col-sm-1 col-form-label">Metier 1</label>
            <div class="col-sm-5">
                <select type="text" name="metier1" id="" class="form-control">
                    <?php foreach ($liste_metier as $metier) { ?>
                    <option value="<?= $metier->met_id ?>"> <?= $metier->met_metier ?> </option>
                    <?php } ?>
                </select>               
                <span class="messerreur" id="alertNom">&nbsp<?= form_error('nom', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="adh_nom" class="col-sm-1 col-form-label">Metier 1</label>
            <div class="col-sm-5">
                <select type="text" name="metier1" id="" class="form-control">
                    <?php foreach ($liste_metier as $metier) { ?>
                    <option value="<?= $metier->met_id ?>"> <?= $metier->met_metier ?> </option>
                    <?php } ?>
                </select>               
                <span class="messerreur" id="alertNom">&nbsp<?= form_error('nom', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="adh_nom" class="col-sm-1 col-form-label">Metier 1</label>
            <div class="col-sm-5">
                <select type="text" name="metier1" id="" class="form-control">
                    <?php foreach ($liste_metier as $metier) { ?>
                    <option value="<?= $metier->met_id ?>"> <?= $metier->met_metier ?> </option>
                    <?php } ?>
                </select>               
                <span class="messerreur" id="alertNom">&nbsp<?= form_error('nom', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="adh_nom" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn" id="submit_Meitier">Enregistrer</button>            
                <span class="messerreur" id="alertNom">&nbsp<?= form_error('nom', '<span>', '</span>') ?></span>
            </div>
        </div>
        </form>                          
    </div>          
