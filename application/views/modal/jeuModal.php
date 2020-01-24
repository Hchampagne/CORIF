<!-- Modal -->
<div class="modal fade" id="jeuModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">
          Connexion espace de jeu
        </h4>
      </div>

      <div class="modal-body">

        <?= form_open('jeu/login', 'id="form_login _jeu"'); ?>

        <div class="form-group row justify-content-md-center">
          <label for="nom" class="col-sm-3 col-form-label">Nom</label>
          <div class="col-sm-7">
            <input type="text" name="nom" id="log_login" class="form-control" value="" placeholder="Votre nom">
            <span id=alertLogin>&nbsp</span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <label for="email" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-7">
            <input name="email" type="mail" class="form-control" id="log_mdp" value="" placeholder="Votre email">
            <span id="alertMdp">&nbsp</span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <div class="col-sm-3 col-form-label">
          </div>
          <div class="col-sm-7">
            <input type="submit" id="jeuLogin" value="Connexion" class="btn">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

        </form>
      </div>

    </div>

  </div>
</div>