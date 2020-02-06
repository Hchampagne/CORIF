<div id="titre">
<h1> 2- Choix des métiers</h1>
</div>
<hr>
<div id="container">
    
<form action="" method="post">
        <div class="row">
            <div class="col-12">
                Session du <?=french_date( $session->date_session)?>
            </div><!--fin select -->
            <div class="col-12">
                Choix des metiers
            </div><!--fin select -->
        </div><!--fin row -->
        <br>
    <div class="row">
        <div class="col-5" id="metiers">
            <select name="id_metier1" size="5">
                <?php foreach($metiers as $metier){   ?>
                    <option value="<?= $metier->id ?>">
                         <?= $metier->metier ?>
                    </option>
                <?php  } ?>
             </select>
        </div><!--fin col -->
        <div class="col-2">
        <input class="btn" type="submit" name="add" value="Ajouter"><br><br>
        <input class="btn" type="submit" name="del" value="Supprimer"><br>
        </div>
        <div class="col-5">
            <select name="id_metier2" size="5">
                <?php foreach($metiers_session as $metier){   ?>
                    <option value="<?= $metier->id ?>">
                         <?= $metier->metier ?>
                    </option>
                <?php  } ?>
             </select>
        </div>
    </div><!--fin row -->

</div><!--fin container -->
    <br>
     <div class="row">
        <div class="col-6">
            <a href="<?=site_url("jeu/modif_session/".$session->id) ?>" class="btn" style="color:#343538;">Retour</a>
        </div>
        <div class="col-6">
            <input class="btn" type="submit" name="next" value="Suivant">
        </div>
        </div>
</form>
<br>
