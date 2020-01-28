<div class="container">
  <div>
    <div id="titre">
      <h1> Login</h1>
      <hr>
    </div><br>
    <!--<form action="" name="login" role="form" class="" method="post" id="mc_signup_form" accept-charset="utf-8"> -->
    <?= form_open('connexion/login', 'id="form_inscription"'); ?>

    <div class="form-group row justify-content-md-center">
      <label for="con_login" class="col-sm-2 col-form-label">Login</label>
      <div class="col-sm-6">
        <input type="text" name="con_login" id="con_login" class="form-control" value="<?php echo set_value('adh_login') ?>" placeholder="Votre login">
        <span id=alertLogin>&nbsp<?= form_error('login', '<span>', '</span>') ?></span>
      </div>
    </div>

    <div class="form-group row justify-content-md-center">
      <label for="con_password" class="col-sm-2 col-form-label">Mot de passe</label>
      <div class="col-sm-6">
        <input name="password" type="con_password" class="form-control" id="con_password" value="<?php echo set_value('adh_mdp') ?>" placeholder="Votre mot de passe">
        <span id="alertMdp">&nbsp<?= form_error('mdp', '<span>', '</span>') ?></span>
      </div>
    </div>

    <div class="form-group row justify-content-md-center">
      <div class="col-sm-2 col-form-label">
      </div>
      <div class="col-sm-6">
        <input type="submit" id="login_submit" value="login" class="btn">
        <a href=<?= site_url("connexion/reset") ?>>
        <button type="button" class="btn btn-primary" id="reset" value="connexion" style="border: none">Mot de passe oublié !</button>
      </div>
    </div>
    </div>

    </form>
  </div>
</div>