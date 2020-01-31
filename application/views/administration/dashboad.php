<div class=titre>
    <h1>Tableau de bord administrateur</h1>
    <p>
    
    </p>
</div>
<hr>
<div class="corp row">
    <div class="participant col-5">
        <h2 class="bg-light text-center">Liste des formateurs</h2>
        <div class="bg-secondary text-corif">
            <div class="table-reponsive-xl">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Validation</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($formateur as $liste){ ?>
                    <tr>
                    <td><?= $liste->nom ?> </td>
                    <td><?= $liste->prenom ?> </td>

                <?php if($liste->validation == 0) { ?>
                    <td> <a href="<?=site_url("administration/modif/$liste->id")?>">A valider</a>  </td>
                <?php } 
               
                else{ ?>
                    <td> Validé </td>
                <?php   }?>

                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
             </div>
        </div>
    </div>

    <div class="statistique col-7">
        <h2 class="bg-light text-center">Session à venir</h2>
        <div class="bg-secondary text-corif">
            <div class="bg-secondary text-corif">
                <div class="table-reponsive-xl">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Heure de début</th>
                                <th scope="col">Heure de Fin</th>
                                <th scope="col">Choix métiers</th>
                                <th scope="col">Nombre de participant</th>
                                <th scope="col">Modification</th>
                                <th scope="col">Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sessions as $session){ ?>
                        <tr>
                        <td><?= french_date($session->date_session) ?> </td>
                        <td><?= $session->heure_debut?> </td>
                        <td><?= $session->heure_fin?> </td>
                        <td>
                            <?php foreach($session->metiers as $metier): ?>
                                <?= $metier->metier ?><br>
                            <?php endforeach; ?>
                        </td>
                        <td><a href=<?=site_url("jeu/session/$session->id")?>><?= $session->nb_participant ?></a></td>
                        <td scope="col"><a style="color:#343538" class="btn btn-info"  href="<?=site_url("jeu/modif_session/$session->id")?>">Modification</a></td>
                        <td scope="col"><a style="color:#343538" class="btn btn-danger"  href="<?=site_url("jeu/delete_session/$session->id")?>"Onclick='return confirm("Etes-vous sûr?")'>Suppresion</a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

<div class=">Session col-12">
    <h2 class="bg-light text-center">Statistique</h2>
    <div class="bg-secondary text-corif">
        <p>test</p>
    </div>
</div>