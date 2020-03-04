<div class="container">
  <div>
    <div id="titre">
      <h1> Réinitialisation de mot de passe:</h1>
      <hr>
    </div><br>

    <?= form_open('Connexion/resetPassword', 'id="form_resetPassword"'); ?>

    <div class="form-group row justify-content-md-center">
      <label for="res_mail" class="col-sm-2 col-form-label">Votre Email</label>
      <div class="col-sm-6">
        <input type="text" name="res_mail" id="res_mail" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Votre email">
        <span class="messerreur" id=alertResMail>&nbsp<?= form_error('res_mail', '<span>', '</span>') ?></span>

      </div>
    </div>
    <div class="form-group row justify-content-md-center">
      <div class="col-sm-2 col-form-label">
      </div>
      <div class="col-sm-6">
        <button type="submit" id="" value="" class="btn">Valider</button>
        <span class="messerreur">&nbsp<?= isset($message) ? $message : ""; ?></span>
      </div>
    </div>
    <div class="form-group row justify-content-md-center">
      <div class="col-sm-1 col-form-label">
      </div>
      <div class="col-sm-6">
        <p>Un lien de réinitialisation pour votre mot de passe vous sera envoyé par mail.</p>
        <p id="lienMdp">Attention ce lien sera actif pendant 24 heures.</p>
      </div>
    </div>
    </form>
  </div>
</div>