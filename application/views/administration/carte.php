<div id="titre">
<h1> Carte Métiers</h1>
</div>
<hr>
<div class="row">
    <div class=" col-9">
        <form class="form-inline" method="post" action="<?= site_url("administration/search")?>"> 
            <div class="form-group mx-sm-3 mb-2">
                <input class="form-control mr-sm-2 " type="search" placeholder="Recherche" name="nam">
            </div>
                <button class="btn mb-2" type="submit">Recherche</button>
        </form>
    </div> <!-- fin de col -->
    <div class="col-3">
        <button class="btn"><a  href="<?= site_url("administration/ajout_metier") ?>" style="color:#343538"">Ajouter des métiers</a></button>
    </div>  <!-- fin de col -->
    <div class="col-3">
        <button class="btn"><a  href="<?= site_url("administration/ajout_carte") ?>" style="color:#343538"">Ajouter des cartes</a></button>
    </div>  <!-- fin de col -->
</div> <!-- fin row -->

  <div class="corp">
    <div class="table-reponsive-xl">
    <?php if (isset($results)) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Numéro de carte</th>
                    <th scope="col">Description</th>
                    <th scope="col">Métiers</th>
                    <th scope="col">Type</th>
                    <th scole="col">Update</th>
                    <th scole="col">Delete</th>
                </tr>
                
            </thead>
            
            <tbody>
            <?php foreach ($results as $data): ?>
                <tr>
                <td><?= $data->numero ?> </td>
                <td><?= $data->description ?> </td>
                <td><?= $data->metier ?> </td>
                <td><?= $data->type ?> </td>
                <?php if($this->auth->is_admin()): ?>
                    <td> <a class="btn" href="<?=site_url("administration/modif_carte/$data->id")?>" style="color:#343538">Modifier</a> </td>
                    <td> <a class="btn btn-danger"href="<?=site_url("administration/suppr_carte/$data->id")?>" Onclick='return confirm("Etes-vous sûr de bien vouloir supprimer la carte ?")' style="color:#343538">Suppression </a> </td>
                <?php endif; ?>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
        <div class="text-center">
            <h6>
        <?php } 
            else { ?>
                <div>No user(s) found.</div>
            <?php } ?>
 
                        <?php if (isset($links)) { ?>
                            <br>
                            <?php echo $links ?>
                        <?php } ?>
                        </h6>
        </div>
        


    </div>
</div>



