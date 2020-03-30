<div id="titre">
  <h1> Réinitialisation du mot de passe </h1>
  <hr>
</div><br>
<?= form_open('Connexion/newPassword', 'id="form_newPassword"'); ?>

<div class="form-group row justify-content-md-center>
  <input type="hidden" class="form-control" id="cleUrl" name="cleUrl" value="<?= isset($cle_url) ? $cle_url : "" ?><?= set_value('cleUrl') ?>" >
</div>
<div class="form-group row justify-content-sm-center">
  <label for="cleConf" class="col-sm-2 col-form-label">Clé de confirmation :</label>
  <div class="col-sm-3">
    <input type="text" class="form-control" id="cleConf" name="cleConf" placeholder="Clé de confirmation" value="<?= set_value('cleConf') ?>">
    <span class="messerreur" id="alertCleConf">&nbsp<?= form_error('cleConf', '<span>', '</span>') ?></span>
  </div>
</div>
<div class="form-group row justify-content-sm-center">
  <label for="newMdp" class="col-sm-2 col-form-label">Mot de Passe:</label>
  <div class="col-sm-3">
    <input type="password" class="form-control" id="newMdp" name="newMdp" placeholder="Votre mot de passe" value="<?= set_value('newMdp') ?>">
    <span class="messerreur" id="alertNewMdp">&nbsp<?= form_error('newMdp', '<span>', '</span>') ?></span>
  </div>
</div>
<div class="form-group row justify-content-sm-center">
  <label for="verifNewMdp" class="col-sm-2 col-form-label">Confirmation de mot de Passe:</label>
  <div class="col-sm-3">
    <input type="password" class="form-control" id="verifNewMdp" name="verifNewMdp" placeholder="Confirmer votre mot de passe" value="<?= set_value('verifNewMdp') ?>">
    <span class="messerreur" id="alertVerifMdp">&nbsp<?= form_error('verifNewMdp', '<span>', '</span>') ?></span>
  </div>
</div>
<div class="form-group row justify-content-sm-center">
<label for="" class="col-sm-2 col-form-label"></label>
  <div class="col-sm-3">
    <button type="submit" class="btn" id="valide" value="">Valider</button>
  </div>
</div>
</form>




