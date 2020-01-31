<div id="titre">
<h2> Tableau de bord</h2>
</div>
<div class="corp col-5">
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
                </tr>
            </thead>
            <?php if (isset($_SESSION["log_in"])): ?>
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
            <td> <a href="<?=site_url("administration/modif/$adherent->id")?>">Modifier</a> </td>
            <td> <a href="<?=site_url("administration/suppr/$adherent->id")?>" Onclick='return confirm("Etes-vous sûr?")'>Suppression </a> </td>
            </tr>
             <?php } ?>

            </tbody>
            <?php else: ?>
            <?php redirect(site_url("connexion/login")); ?>
            <?php endif; ?>
        </table>
    </div>
</div>