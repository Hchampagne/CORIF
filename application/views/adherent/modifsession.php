<div id="titre">
<h1>1 - Modification de session</h1>
</div>
<div class="corp">
           <hr>
            <form action="" method="post">
                <?php foreach($sessions as $session){ ?>
                    <label for="" class="col-form-label">Date de session</label>
                    <input type="date" name="date_session" id="" class="form-control" value="<?= $session->date_session; ?>">
                    <br><br>
                        <div class="form-group">
                            <label for="" class="col-form-label">Heure de bébut:</label>
                            &nbsp;
                            <input type="time" name="heure_debut" id="" class="form-control" value="<?= $session->heure_debut; ?>">
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <label for="" class="col-form-label">Heure de fin:</label>
                            &nbsp;
                            <input type="time" name="heure_fin" id="" class="form-control" value="<?= $session->heure_fin; ?>">
                        </div>
                    <br>
                    <button class="btn">Suivant</button>
                <?php } ?>
            </form>
            <br>    
 </div>
        
       
