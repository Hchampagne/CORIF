<div class="titre">
<?php foreach($partsessions as $partsession){ ?>
    <h1>Liste de Participant pour la session <?= $partsession->id_session ?></h1>
<?php } ?>
</div>

<div class="corp">
    <div class="statistique col-7">
        <div class="bg-secondary text-corif">
            <div class="bg-secondary text-corif">
                 <div class="table-reponsive-xl">
                    <table class="table table-striped">
                        <thead>
                             <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Visite de la session en cours</th>
                                <th>
                                <form action="<?=site_url("jeu/update_etat")?>" method="post">

                                <input type="hidden" name="id" value="<?= $partsession->id_session ?>" >

                                <?php if ($etat == 0) { ?>
                                        <button class="btn" type="submit" name="etat" value="2"  >Afficher les métiers</button>
                                <?php    }
                                    else { ?>
                                        <button class="btn" type="submit" name="etat" value="0" >Cacher les métiers</button>
                                <?php   } ?>
                                    

                                    
                                </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($partsessions as $partsession){ ?>
                        <tr>
                        <td><?= $partsession->nom ?> </td>
                        <td><?= $partsession->email?> </td>
                        <td><a href="<?=site_url("jeu/index/$partsession->id_session")?>">Entrée</a></td>
                        
                        </tr>
                        <?php } ?>
                         </tbody>
                    </table> 
                </div>
            </div>
        </div>
            <a class="btn" href="<?=site_url("jeu/dashboad")?>" style="color:#FFFFFF; background-color:#343538">retour</a>
        <br>
    </div>
</div>
