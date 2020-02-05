<div class="">
  <div id="titre">
    <h1> Ajout d'un Métier</h1>
  </div>
  <hr>

  <div>

    <form method="post" action="" id="form_ajoutMetier">
      <div class="form-group">
        <label for="met_id">numero</label>
        <input type="text" class="form-control" name="met_id" value="<?= $metier->met_id; ?>" disabled>
      </div>
      <div class="form-group">
        <label for="met_metier">Metier</label>
        <input type="text" class="form-control" name="met_metier" value="<?= $metier->met_metier; ?>">
      </div>
      <div class="form-group">
        <label for="met_prenom">Prénom</label>
        <input type="text" class="form-control" name="met_prenom" value="<?= $metier->met_prenom; ?>">
      </div>
      <div class="form-group">
        <label for="met_age">Age</label>
        <input type="text" class="form-control" name="met_age" value="<?= $metier->met_age; ?>">
      </div>

      <input type="submit" id="mc_signup_submit" value="Ajout du métier" class="btn" style="margin-bottom:2.5rem" />
    </form>

  </div>