<div id="titre">
<h1> Adherent</h1>
</div>
<div>
<a class="btn" href="<?=site_url("connexion/inscription")?>" style="color:#343538">Ajouter</a>
</div>


<div class="corp">
    <div class="table-reponsive-xl">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Organisme</th>
                    <th scope="col">Role</th>
                    <th scole="col">Login</th>
                    <th scole="col">Validation</th>
                    <th scole="col">Update</th>
                    <th scole="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($liste as $adherent){ ?>
            <tr>
            <td><?= $adherent->nom ?> </td>
            <td><?= $adherent->prenom ?> </td>
            <td><?= $adherent->email ?> </td>
            <td><?= $adherent->organisme ?> </td>
            <td><?= $adherent->role ?> </td>
            <td><?= $adherent->login ?> </td>
            <td><?= $adherent->validation ?> </td>


            
            <td> <b><a class="btn" href="<?=site_url("administration/modif/$adherent->id")?>" style="color:#343538">Modifier</a></b>  </td>
            <td> <b> <a class="btn btn-danger"href="<?=site_url("administration/suppr/$adherent->id")?>" style="color:#343538" Onclick='return confirm("Etes-vous sûr?")'>Suppression</a></b> </td>
            </tr>
             <?php } ?>

            </tbody>

        </table>
    </div>
</div>



