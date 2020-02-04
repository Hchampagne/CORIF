<div id="titre">
  <h1> Réinitialisation du mot de passe </h1>
  <hr>
</div><br>
<?= form_open('Connexion/newPassword', 'id="form_newPassword"'); ?>

<div class="form-group">
  <input type="hidden" class="form-control" id="cleUrl" name="cleUrl" value="<?= isset($cle_url) ? $cle_url : "" ?><?= set_value('cleUrl') ?>" >
</div>

<div class="form-group">
  <label for="cleConf">Clé de confirmation :</label>
  <input type="text" class="form-control" id="cleConf" name="cleConf" placeholder="Clé de confirmation" value="<?= set_value('cleConf') ?>">
  <span class="messerreur" id="alertCleConf">&nbsp<?= form_error('cleConf', '<span>', '</span>') ?></span>
</div>

<div class="form-group">
  <label for="newMdp">Mot de Passe:</label>
  <input type="password" class="form-control" id="newMdp" name="newMdp" placeholder="Votre mot de passe" value="<?= set_value('newMdp') ?>">
  <span class="messerreur" id="alertNewMdp">&nbsp<?= form_error('newMdp', '<span>', '</span>') ?></span>
</div>

<div class="form-group">
  <label for="verifNewMdp">Confirmation de mot de Passe:</label>
  <input type="password" class="form-control" id="verifNewMdp" name="verifNewMdp" placeholder="Confirmer votre mot de passe" value="<?= set_value('verifNewMdp') ?>">
  <span class="messerreur" id="alertVerifMdp">&nbsp<?= form_error('verifNewMdp', '<span>', '</span>') ?></span>
</div>

<div style="margin-bottom:2rem; ">
  <button type="submit" class="btn" id="valide" value="">Valider</button>
</div>
</form>