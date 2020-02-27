<div class="container">
    <div>
        <h1>Modication de session </h1>
    </div>
    <hr>
    <div class="row">
        <div class="col">


            <?= form_open('Session_jeu/modification_session/' . $session->ses_id, 'id="form_session"'); ?>
            <div class="form-group row  justify-content-sm-center">
                <div class="col-sm-2 ">
                    <label for="ses_id">Session</label>
                    <input type="text" name="ses_id" id="ses_id" class="form-control text-center" value="<?= ($session->ses_id) ? $session->ses_id : set_value('ses_id'); ?>" disabled>
                    <span class="messerreur" id="alertSession">&nbsp</span>
                </div>
                <div class="col-sm-5 ">
                </div>
            </div>
            <div class="form-group row justify-content-sm-center">
                <div class="col-sm-2">
                    <label for="ses_d_session">Date</label>
                    <input type="date" name="ses_d_session" id="ses_d_session" class="form-control text-center"  value="<?= ($session->ses_d_session) ? $session->ses_d_session  : set_value('ses_id'); ?>">
                    <span class="messerreur" id="alertDate">&nbsp<?= form_error('ses_date', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-2">
                    <label for="ses_h_debut">Heure début</label>
                    <input type="time" name="ses_h_debut" id="heureDebut" class="form-control text-center"  value="<?= ($session->ses_h_debut) ? date("H:i", strtotime($session->ses_h_debut)) : set_value('ses_id'); ?>">
                    <span class="messerreur" id="alertDebut">&nbsp<?= form_error('ses_h_debut', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-2">
                    <label for="ses_h_fin">Heure fin</label>
                    <input type="time" name="ses_h_fin" id="heureFin" class="form-control text-center" value="<?= ($session->ses_h_fin) ? date("H:i", strtotime($session->ses_h_fin)) : set_value('ses_id'); ?>">
                    <span class="messerreur" id="alertFin">&nbsp<?= form_error('ses_h_fin', '<span>', '</span>'); ?></span>
                </div>
                <div class="col-sm-1">
                    <label>&nbsp</label>
                    <button type="submit" class="btn" value="session" id="submit_session">Enregistrer</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>