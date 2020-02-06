<style>
input{
    border: none
}
</style>


<div id="titre">
<h1>3 - Ajout de participant</h1>
</div>

<div class="row">
    <div class="col-12">
        <hr>
        <form action="" method="post">
            <div class="row">
                    <div class="row col-12 col-md-12">
                        <div class="col-7 col-md-2">
                            <label style="color:#343538">Nom du formateur:</label>
                        </div>
                        <div class="col-5 .col-md-2" style="color:#F18F1F">
                            <?=$_SESSION['nom'] ?> &nbsp;<?=$_SESSION['prenom']?>
                        </div>
                    </div>                    

                    <div class=" row col-12 col-md-12">
                        <div class="col-6 col-md-2">
                           <label style="color:#343538">Session du:</label> 
                        </div><!--fin select -->
                        <div class="col-6 .col-md-2" style="color:#F18F1F">
                            <?=french_date($session->date_session)?>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                    <select name="id_metier2" size="5" style="background-color:#343538; color:#F18F1F ">
                        <?php foreach($choix as $choixe ){ ?> 
                            <option value="<?= $choixe->id ?>">
                                <?= $choixe->metier ?>
                            </option>
                        <?php  } ?>
                    </select>
                     </div>
            </div>
                    <br>
                
                    <div class="row">
                        <div class="col-12 col-md-5" id="metiers">
                            <div class="form-control"  style="width:100%; background-color: #343538; color:#F18F1F">
                                <label for="">
                                    <span>Nom</span>
                                </label>
                                <input type="text" name="nom"  style="background-color: #343538; color:#F18F1F; width:80%;">
                            </div>
                            <br>
                            <div class="form-control"  style="width:100%; background-color: #343538; color:#F18F1F">
                                <label for="">
                                    <span>Email</span>
                                </label>
                                <input type="email" name="email"  style="background-color: #343538; color:#F18F1F; width:80%;">
                            </div>
                        </div><!--fin col -->
                        <div>
                            <br>
                            <div class="col-12 col-md-2">
                                <input class="btn" type="submit" name="add" value="Ajouter"><br>
                                <input class="btn" type="submit" name="del" value="Supprimer"><br>
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <select name="id_metier2" size="5" style="width:100%; background-color: #343538 ; color:#F18F1F">
                                <?php foreach($participants_session as $participant){   ?>
                                    <option value="<?= $participant->id ?>">
                                        <?= $participant->nom ?> / <?= $participant->email ?>
                                    </option>
                                <?php  } ?>
                            </select>
                        </div>
                        
                    </div><!--fin row -->
                        <br>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <a href="<?=site_url("jeu/choix_metier/$session->id") ?>" class="btn" style="color:#343538;">Retour</a>
                        </div>
                        <div class="col-6 col-md-6">
                            <button class="btn">Valider</button>
                        </div>
                    </div>
                    
                <br>
        </form>
    </div>     
</div>