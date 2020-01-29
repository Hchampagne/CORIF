<!-- Modal -->
<div class="modal fade" id="espacejeuModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">
         Se connecter à l'espace de jeu
        </h4>
      </div>

      <div class="modal-body">

        <?= form_open('connexion/loginInvite', 'id="form_invite"'); ?>

        <div class="form-group row justify-content-md-center">
          <label for="inv_nom" class="col-sm-3 col-form-label">Nom</label>
          <div class="col-sm-7">
            <input type="text" name="inv_nom" id="inv_nom" class="form-control" value="" placeholder="Votre nom">
            <span id=alertInvNom>&nbsp</span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <label for="inv_mail" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-7">
            <input name="inv_mail" type="mail" class="form-control" id="inv_mail" value="" placeholder="Votre email">
            <span id="alertInvMail">&nbsp</span>
          </div>
        </div>

        <hr>

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