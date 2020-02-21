<div class="container">
    <div>
        <h1>Modication de session </h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div>
                <h5>Horaire de la session</h5>
            </div> <?= form_open('Session_jeu/modification_session/'.$session->ses_id , 'id="form_creat_session"'); ?>
            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="ses_id">Session</label>
                    <input type="text" name="ses_id" id="ses_id" class="form-control text-center" value="<?= ($session->ses_id) ? $session->ses_id : set_value('ses_id'); ?>" disabled>
                    <span class="messerreur" id="alertSesDate">&nbsp</span>
                </div>
                <div class="col-sm-2">
                    <label for="ses_d_session">Date</label>
                    <input type="text" name="ses_d_session" id="ses_d_session" class="form-control text-center" value="<?= ($session->ses_d_session) ?  $session->ses_d_session : set_value('ses_id'); ?>">
                    <span class="messerreur" id="alertSesDate">&nbsp<?= form_error('ses_date', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-2">
                    <label for="ses_h_debut">Heure</label>
                    <input type="time" name="ses_h_debut" id="ses_h_debut" class="form-control text-center" value="<?= ($session->ses_h_debut) ? $session->ses_h_debut : set_value('ses_id'); ?>">
                    <span class="messerreur" id="alertSesHD">&nbsp<?= form_error('ses_h_debut', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-1">
                    <label>&nbsp</label>
                    <button  type="submit" class="btn" value="session" id="submit_session">Enregistrer</button>
                </div>
            </div>
            </form>
        </div>
    </div>