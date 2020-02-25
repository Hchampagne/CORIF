<div class="container ">
    <div>
        <h1>Connexion jeu</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">

            <?= form_open('Espace_jeu/connexion_jeu/', 'id="form_connexionJeu"'); ?>

            <div class="form-group row justify-content-center">
                <label for="invConn_nom" class="col-sm-1 col-form-label ">Nom</label>
                <div class="col-sm-5">
                    <input type="text" name="invConn_nom" id="invConn_nom" class="form-control" value="<?= set_value('adh_nom') ?>">
                    <span class="messerreur" id="alertInvConnNom">&nbsp<?= form_error('invConn_nom', '<span>', '</span>') ?></span>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="invConn_email" class="col-sm-1 col-form-label ">Email</label>
                <div class="col-sm-5">
                    <input type="text" name="invConn_email" id="invConn_email" class="form-control" value="<?= set_value('inv_email') ?>">
                    <span class="messerreur" id="alertInvConnEmail">&nbsp<?= form_error('invConn_email', '<span>', '</span>') ?></span>
                </div>
            </div>           

            <div class="form-group row justify-content-center">
                <label for="" class="col-sm-1 col-form-label"></label>
                <div class="col-5">
                    <Button type="submit" id="formAjoutAdh" value="Enregistrer" class="btn">Valider</Button>
                    
                    <span class="messerreur" id="">&nbsp<?= isset($message) ? $message : "" ?></span>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>