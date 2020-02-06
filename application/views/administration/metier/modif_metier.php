<div class="container">
  <div id="titre">
    <h1> Modifcation de la fiche métier</h1>
  </div>
  <hr>
  <div class="row">
    <div class="col">
      <form method="post" action="" id="form_modifMetier">

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
            <input type="text" name="met_metier" id="met_metier" class="form-control" value="<?= $metier->met_metier; ?>">
            <span id="alertMetMetier">&nbsp</span>
          </div>
        </div>

        <div class="form-group row justify-content-center">
          <label for="met_prenom" class="col-sm-1 col-form-label">Prénom</label>
          <div class="col-sm-5">
            <input type="text" name="met_prenom" id="met_prenom" class="form-control" value="<?= $metier->met_prenom; ?>">
            <span id="alertMetMetier">&nbsp</span>
          </div>
        </div>

        <div class="form-group row justify-content-center">
          <label for="met_age" class="col-sm-1 col-form-label">Age</label>
          <div class="col-sm-5">
            <input type="text" name="met_age" id="met_age" class="form-control" value="<?= $metier->met_age; ?>">
            <span id="alertMetMetier">&nbsp</span>
          </div>
        </div>

        <div class="form-group row justify-content-center">
          <label for="" class="col-sm-1 col-form-label"></label>
          <div class="col-sm-5">
            <input type="submit" id="mc_signup_submit" value="Modifier" class="btn">
            <span id="">&nbsp</span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>