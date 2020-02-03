<div id="titre">
  <h1> Réinitialisation du mot de passe </h1>
  <hr>
</div><br>
<?= form_open('Connexion/newPassword', 'id="form_newPassword"'); ?>

  <div class="form-group">
    <label for="cleConf">Clé de confirmation :</label>
    <input type="text" class="form-control" id="cleConf" name="cleConf" placeholder="Clé de confirmation" >
    <span id="alertCleConf">&nbsp</span>
  </div>

  <div class="form-group">
    <label for="newMdp">Mot de Passe:</label>
    <input type="password" class="form-control" id="newMdp" name="newMdp" placeholder="Votre mot de passe" >
    <span id="alertNewMdp">&nbsp</span>
  </div>

  <div class="form-group">
    <label for="verifNewMdp">Confirmation de mot de Passe:</label>
    <input type="password" class="form-control" id="verifNewMdp" name="verifNewMdp" placeholder="Confirmer votre mot de passe" >
    <span id="alertVerifMdp">&nbsp</span>
  </div>

  <div style="margin-bottom:2rem; ">
    <button type="submit" class="btn" id="valide" value="" >Valider</button>
  </div>
</form>