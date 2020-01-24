<!-- Modal -->
<div class="modal fade" id="inscriptionModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Inscription
                </h4>
            </div>
            <div class="modal-body">
                <?= form_open('connexion/inscription', 'id="form_inscription"'); ?>
                    <div class="form-group row justify-content-md-center">
                        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-6">
                            <input type="text" name="nom" id="ins_nom" class="form-control" value="<?php echo set_value('nom') ?>" placeholder="Votre nom">
                            <span id="alertNom">&nbsp<?= form_error('nom', '<span>', '</span>') ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                        <div class="col-sm-6">
                            <input type="text" name="prenom" id="ins_prenom" class="form-control" value="<?php echo set_value('prenom') ?>" placeholder="Votre prénom">
                            <span id="alertPrenom">&nbsp<?= form_error('prenom', '<span>', '</span>') ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="organisme" class="col-sm-2 col-form-label">Organisme</label>
                        <div class="col-sm-6">
                            <input type="text" name="organisme" id="ins_organisme" class="form-control" value="<?php echo set_value('organisme') ?>" placeholder="Votre organisme">
                            <span id="alertOrganisme">&nbsp<?= form_error('organisme', '<span>', '</span>') ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label fro="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="email" id="ins_email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Votre email">
                            <span id="alertEmail">&nbsp<?= form_error('email', '<span>', '</span>') ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="login" class="col-sm-2 col-form-label">Login</label>
                        <div class="col-sm-6">
                            <input type="text" name="login" id="ins_login" class="form-control" value="<?php echo set_value('login') ?>" placeholder="Votre login">
                            <span id=alertLogin>&nbsp<?= form_error('login', '<span>', '</span>') ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-6">
                            <input name="mdp" type="password" class="form-control" id="ins_mdp" value="<?php echo set_value('mdp') ?>" placeholder="Votre mot de passe">
                            <span id="alertMdp">&nbsp<?= form_error('mdp', '<span>', '</span>') ?></span>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-6">
                            <input name="verifmdp" type="password" class="form-control" id="ins_mdpverif" value="<?php echo set_value('verifmdp') ?>" placeholder="Veuillez confirmer votre mot de passe">
                            <span id="alertmdpVerif">&nbsp<?= form_error('verifmdp', '<span>', '</span>') ?></span>
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
    </div>
</div>