<div class="container">
  <div>
    <div id="titre">
      <h1> Réinitialisation de mot de passe:</h1>
      <hr>
    </div><br>

    <?= form_open('connexion/reset', 'id="form_reset"'); ?>

      <div class="form-group row justify-content-md-center">
        <label for="email" class="col-sm-1 col-form-label">Login</label>
        <div class="col-sm-6">
          <input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Votre email">
          <span id=alertLogin>&nbsp<?= form_error('email', '<span>', '</span>') ?></span>
        </div>
      </div>
      <div class="form-group row justify-content-md-center">
        <div class="col-sm-1 col-form-label">
        </div>
        <div class="col-sm-6">
          <input type="submit" id="reset_submit" value="Valider" class="btn">
        </div>
      </div>
      <div class="form-group row justify-content-md-center">
        <div class="col-sm-1 col-form-label">
        </div>
        <div class="col-sm-6">
          <p>Renseignez votre email un lien de réinitialisation pour votre mot de passe vous sera sur celui-ci.</p>
          <p id="lienMdp">Attention ce lien sera actif pendant 24 heures.</p>
        </div>
      </div>
    </form>
  </div>
</div>