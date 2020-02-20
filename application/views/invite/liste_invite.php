        <div class=container>
            <div class="table-reponsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="">Session</th>
                            <th class="">Email</th>
                            <th class="">Nom</th>
                            <th class="">Prenom</th>
                            <th class=""></th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($liste as $invite) { ?>
                        <tr>
                            <td><?= $invite->inv_ses_id ?> </td>
                            <td><?= $invite->inv_email ?> </td>
                            <td><?= $invite->inv_nom ?> </td>
                            <td><?= $invite->inv_prenom ?> </td>
                            <td> <a class="btn " href="<?= site_url("Invite/suppression_invite/") . $invite->inv_id ?>" Onclick='return confirm("Etes-vous sûr?")'>Suppression</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
 