<div class="container">
    <div>
        <div id="titre">
            <h1>Inscription</h1>
            <hr>
        </div>


        <?= form_open('connexion/inscription', 'id="form_inscription"'); ?>

    <!-- csrf protection
        <?php
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        ?>
        <input type="hidden" id="csrf" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
    fin csrf -->

        <div class="form-group row justify-content-md-center">
            <label for="adh_nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-6">
                <input type="text" name="adh_nom" id="ins_nom" class="form-control" value="<?= set_value('nom') ?>" placeholder="Votre nom">
                <span class="messerreur" id="alertNom">&nbsp<?= form_error('nom', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="adh_prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-6">
                <input type="text" name="adh_prenom" id="ins_prenom" class="form-control" value="<?= set_value('prenom') ?>" placeholder="Votre prénom">
                <span class="messerreur" id="alertPrenom">&nbsp<?= form_error('prenom', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="adh_organisme" class="col-sm-2 col-form-label">Organisme</label>
            <div class="col-sm-6">
                <input type="text" name="adh_organisme" id="ins_organisme" class="form-control" value="<?= set_value('organisme') ?>" placeholder="Votre organisme">
                <span class="messerreur" id="alertOrganisme">&nbsp<?= form_error('organisme', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label fro="adh_email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="email" name="adh_email" id="ins_email" class="form-control" value="<?= set_value('email') ?>" placeholder="Votre email">
                <span class="messerreur" id="alertEmail">&nbsp<?= form_error('email', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="adh_login" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-6">
                <input type="text" name="adh_login" id="ins_login" class="form-control" value="<?= set_value('login') ?>" placeholder="Votre login">
                <span class="messerreur" id=alertLogin>&nbsp<?= form_error('login', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="adh_mdp" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-6">
                <input name="adh_mdp" type="password" class="form-control" id="ins_mdp" value="<?= set_value('mdp') ?>" placeholder="Votre mot de passe">
                <span class="messerreur" id="alertMdp">&nbsp<?= form_error('mdp', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <label for="verifmdp" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-6">
                <input name="verifmdp" type="password" class="form-control" id="ins_mdpverif" value="<?= set_value('verifmdp') ?>" placeholder="Veuillez confirmer votre mot de passe">
                <span class="messerreur" id="alertmdpVerif">&nbsp<?= form_error('verifmdp', '<span>', '</span>') ?></span>
            </div>
        </div>

        <div class="form-group row justify-content-md-center">
            <div class="col-sm-2 col-form-label">
            </div>
            <div class="col-sm-6">
                <input type="submit" id="mc_signup_submit" value="Inscription" class="btn">
            </div>
        </div>
        </form>
    </div>
</div>