<div id="titre">
<h1> Recherche</h1>
</div>

<form method="post" action="<?= site_url("administration/search")?>"> 
<div class="row">
    <div class="col'4">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="search">
    </div>
    <div class="col-4">
    <button class="btn" type="submit">Recherche</button>
    </div>
</div>
<br>

  </form>
<div class="corp">
    <div class="table-reponsive-xl">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Prenom</th>
                    <th scope="col">Métiers</th>
                    <th scope="col">Numéro de carte</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    
                </tr>
                
            </thead>
            
            <?php if ($this->auth->is_logged() == TRUE): ?>
            <tbody>
            <?php foreach ($description as $metiers){ ?>
            
            <td><?= $metiers->prenom ?> </td>
            <td><?= $metiers->metier ?> </td>
            <td><?= $metiers->numero ?> </td>
            <td><?= $metiers->description ?> </td>
            <td><?= $metiers->type ?> </td>
            </tr>
             <?php } ?>

            </tbody>
            <?php else: ?>
            <?php redirect(site_url("connexion/login")); ?>
            <?php endif; ?>
        </table>
    </div>
</div>



