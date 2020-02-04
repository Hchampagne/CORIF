
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
                    <th scole="col"></th>
                    <th scole="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($liste as $adherent){ ?>
            <tr>
            <td><?= $adherent->adh_nom ?> </td>
            <td><?= $adherent->adh_prenom ?> </td>
            <td><?= $adherent->adh_email ?> </td>
            <td><?= $adherent->adh_organisme ?> </td>
            <td><?= $adherent->adh_role ?> </td>
            <td><?= $adherent->adh_login ?> </td>
            <td><?= ($adherent->adh_validation ==1) ? "oui" : "non" ;?> </td>


            
            <td><a class="btn" href="<?=site_url("administration/modif/$adherent->adh_id")?>" style="color:#343538">Modifier</a></td>
            <td> <a class="btn btn-danger"href="<?=site_url("administration/suppr/")?>" style="color:#343538" Onclick='return confirm("Etes-vous sûr?")'>Suppression</a></td>
            </tr>
             <?php } ?>

            </tbody>

        </table>
    </div>
</div>



