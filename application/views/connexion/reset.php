<div class="container">
  <div>
    <div id="titre">
      <h1> Réinitialisation de mot de passe:</h1>
      <hr>
    </div><br>

    <!-- <form action="" name="login" role="form" class="" method="post" id="mc_signup_form" accept-charset="utf-8"> -->
    <?= form_open('connexion/reset', 'id="form_reset"'); ?>

    <div class="form-group row justify-content-md-center">
      <label for="login" class="col-sm-1 col-form-label">Login</label>
      <div class="col-sm-6">
        <input type="text" name="login" id="log_login" class="form-control" value="<?php echo set_value('login') ?>" placeholder="Votre email ou login">
        <span id=alertLogin>&nbsp<?= form_error('login', '<span>', '</span>') ?></span>
      </div>
    </div>


    <div class="form-group row justify-content-md-center">
      <div class="col-sm-1 col-form-label">
      </div>
      <div class="col-sm-6">
        <input type="submit" id="login_submit" value="Valider" class="btn">       
      </div>
    </div>






    <!-- <div class="form-group">
      <label for="exampleInputLogin">Email:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email or login" name="login" required>
      <small id="emailHelp" class="form-text text-muted">Entrez votre login ou votre adresse email</small>
    </div>
    <div style="margin-bottom:2rem; ">
      <button type="submit" class="btn btn-primary" id="valide" value="connexion" style="border: none">Valider</button>

    </div> -->
    </form>
  </div>
</div>