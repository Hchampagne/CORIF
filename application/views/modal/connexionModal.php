<!-- Modal -->
<div class="modal fade" id="connexionModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">
          Se connecter
        </h4>
      </div>
      <div class="modal-body">

        <?= form_open('connexion/login', 'id="form_connexion"'); ?>

        <div class="form-group row justify-content-md-center">
          <label for="con_login" class="col-sm-3 col-form-label">Login</label>
          <div class="col-sm-7">
            <input type="text" name="con_login" id="con_login" class="form-control" value="<?php echo set_value('con_login') ?>" placeholder="Votre login ou email">
            <span class="messerreur" id=alertConLogin>&nbsp<?= form_error('con_login', '<span>', '</span>') ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <label for="con_password" class="col-sm-3 col-form-label">Mot de passe</label>
          <div class="col-sm-7">
            <input name="con_password" type="password" class="form-control" id="con_password" value="<?php echo set_value('con_password') ?>" placeholder="Votre mot de passe">
            <span class="messerreur" id="alertConMdp">&nbsp<?= form_error('con_password', '<span>', '</span>') ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <div class="col-sm-1 col-form-label">
          </div>
          <div class="col-sm-11">
            <div>
              <button type="submit" id="submit" class="btn btn-default">connexion</button>
              <a href="<?= site_url("connexion/inscription") ?>" class="btn btn-default">Incription</a>
              <a href="<?= site_url("accueil") ?> " type="button" class="btn btn-default" data-dismiss="modal">Fermer</a>
            </div>
          </div>
        </div>

        <div>
          <span>&nbsp<?= isset($message) ? $message : ""; ?></span>
        </div>

        <hr>

        <div class="form-group row justify-content-md-center">
          <div class="col-sm-3 col-form-label">
          </div>
          <div class="col-sm-7">
            <a id="mdpo" href="<?= site_url("connexion/resetPassword") ?>" class="btn btn-default">Mot de passe oublié</a>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>