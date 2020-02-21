 <div class="row">
     <div class="col">
         <?= form_open('Invite/modificationMetier_session/' . $session, 'id="form_creatInvite"'); ?>
         <div>
             <h5>Choix des métier(s)</h5>
         </div>

         <div class="form-group row">
             <div class="col-sm-3">
                 <label for="metier1">Métier 1</label>
                 
                     <select type="text" name="metier1" id="" class="form-control">
                         <?php foreach ($liste as $metier) { ?>
                             <option value="<?= $metier->met_id ?>"> <?= $metier->met_metier ?> </option>
                         <?php } ?>
                     </select>
                 
                 <span class="messerreur" id="">&nbsp<?= form_error('metier1', '<span>', '</span>'); ?></span>
             </div>

             <div class="col-sm-3">
                 <label for="metier2">Métier 2</label>
                 <select type="text" name="metier2" id="" class="form-control">
                     <option> 1</option>
                     <option> 2 </option>
                 </select>
                 <span class="messerreur" id="m">&nbsp<?= form_error('metier2', '<span>', '</span>'); ?></span>
             </div>
             <div class="col-sm-3">
                 <label for="metier3">Métier 3</label>
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