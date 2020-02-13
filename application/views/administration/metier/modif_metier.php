<div class="container">
  <div id="titre">
    <h1> Modification de la fiche métier</h1>
  </div>
  <hr>
  <div class="row">
    <div class="col">
    
      <?= form_open('Administration/modif_metier/' . $metier->met_id, 'id="form_metier"'); ?>

        <div class="form-group row justify-content-center">
          <label for="met_id" class="col-sm-1 col-form-label">Index</label>
          <div class="col-sm-5">
            <input type="text" name="met_id" id="met_id" class="form-control" value="<?= $metier->met_id; ?>" disabled>
            <span id="alertMetId">&nbsp</span>
          </div>
        </div>

        <div class="form-group row justify-content-center">
          <label for="met_metier" class="col-sm-1 col-form-label">Métier</label>
          <div class="col-sm-5">
            <input type="text" name="met_metier" id="met_metier" class="form-control" value="<?= set_value('met_metier', $metier->met_metier) ?>">
            <span class="messerreur" id="alertMetMetier">&nbsp<?= form_error('met_metier', '<span>', '</span>'); ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-center">
          <label for="met_prenom" class="col-sm-1 col-form-label">Prénom</label>
          <div class="col-sm-5">
            <input type="text" name="met_prenom" id="met_prenom" class="form-control" value="<?= set_value('met_prenom', $metier->met_prenom) ?>">
            <span class="messerreur" id="alertMetPrenom">&nbsp<?= form_error('met_prenom', '<span>', '</span>'); ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-center">
          <label for="met_age" class="col-sm-1 col-form-label">Age</label>
          <div class="col-sm-5">
            <input type="text" name="met_age" id="met_age" class="form-control" value="<?= set_value('met_age', $metier->met_age) ?>">
            <span class="messerreur" id="alertMetAge">&nbsp<?= form_error('met_age', '<span>', '</span>'); ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-center">
          <label for="" class="col-sm-1 col-form-label"></label>
          <div class="col-sm-5">
            <input type="submit" id="mc_signup_submit" value="Modifier" class="btn">
            <a href="<?= site_url("Administration/metier") ?>" class="btn">Retour</a>
            <span id="">&nbsp</span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>