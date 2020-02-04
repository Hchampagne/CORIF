<form method="post" action="" id="mc_signup_form">


    <div class="form-group">
        <label for="adh_nom">Nom</label>
        <input type="text" name="adh_nom" id="adh_nom" class="form-control" value="<?= $adherent->adh_nom; ?>" />
    </div>

    <div class="form-group">
        <label for="adh_prenom">Prénom</label>
        <input type="text" name="adh_prenom" id="adh_prenom" class="form-control" value="<?= $adherent->adh_prenom; ?>" />
    </div>

    <div class="form-group">
        <label>Organisme:<span class="mc_required">*</span></label>
        <input type="text" name="organisme" id="mc_mv_organisme" class="form-control" value="<?= $adherent->adh_organisme; ?>" required />
    </div>

    <div class="form-group">
        <label for="adh_email">Email</label>
        <input type="email" name="email" id="mc_mv_EMAIL" class="form-control" value="<?= $adherent->adh_email; ?>" required />
    </div>

    <div class="form-group">
        <label>Login:<span class="mc_required">*</span></label>
        <input type="text" name="login" id="mc_mv_login" class="form-control" value="<?= $adherent->adh_login; ?>" required />
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="adh_role" id="adh_role" class="form-control" value="formateur" <?= ($adherent->adh_role == "formateur") ? "checked" : ""; ?>>
        <label class="form-check-label">formateur</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="adh_role" id="adh_role" class="form-control" value="administrateur" <?= ($adherent->adh_role == "administrateur") ? "checked" : ""; ?>>
        <label class="form-check-label">administrateur</label>
    </div>


    <div class="form-check">
        <input class="form-check-input" type="radio" name="adh_validation" id="adh_validation" class="form-control" value="0" <?= ($adherent->adh_validation == 0) ? "checked" : ""; ?>>
        <label class="form-check-label">En cours de validation</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="adh_validation" id="adh_validation" class="form-control" value="1" <?= ($adherent->adh_validation == 1) ? "checked" : ""; ?>>
        <label class="form-check-label">Validation</label>
    </div>

    <div class="mc_signup_submit">
        <input type="submit" id="mc_signup_submit" value="Modication" class="btn" />
    </div><!-- /mc_signup_submit -->
    <br>
</form><!-- /mc_signup_form -->