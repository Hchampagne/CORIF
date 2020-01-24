<!-- Modal -->
<div class="modal fade" id="connexionModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">
          Login
        </h4>
      </div>

      <div class="modal-body">

        <?= form_open('connexion/login', 'id="form_inscription"'); ?>

        <div class="form-group row justify-content-md-center">
          <label for="login" class="col-sm-3 col-form-label">Login</label>
          <div class="col-sm-7">
            <input type="text" name="login" id="log_login" class="form-control" value="<?php echo set_value('login') ?>" placeholder="Votre login">
            <span id=alertLogin>&nbsp<?= form_error('login', '<span>', '</span>') ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>
          <div class="col-sm-7">
            <input name="password" type="password" class="form-control" id="log_mdp" value="<?php echo set_value('mdp') ?>" placeholder="Votre mot de passe">
            <span id="alertMdp">&nbsp<?= form_error('mdp', '<span>', '</span>') ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <div class="col-sm-1 col-form-label">
          </div>
          <div class="col-sm-11">
            <input type="submit" id="login_submit" value="Connexion" class="btn btn-default">
            <a href="<?= site_url("connexion/inscription") ?>" class="btn btn-default">Incription</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <div class="col-sm-3 col-form-label">
          </div>
          <div class="col-sm-7">
            <a id="mdpo" href="<?= site_url("connexion/reset") ?>" class="">Mot de passe oublié</a>
          </div>
        </div>



        </form>
      </div>

    </div>

  </div>
</div>