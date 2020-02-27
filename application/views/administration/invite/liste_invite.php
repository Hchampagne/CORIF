

    <div class="table-reponsive">
        <table class="table  table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Email adhérent-e</th>
                    <th scope="col">Nom adhérent-e</th>
                    <th scope="col">Prénom adhérent-e</th>
                    <th scope="col">Session</th>
                    <th scope="col">Email invité-e</th>
                    <th scope="col">Nom invité-e</th>
                    <th scope="col">Prenom invité-e</th>
                    <th scole="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($liste as $invite){?>
                <tr>
                    <td><?= $invite->adh_email?></td>
                    <td><?= $invite->adh_nom ?></td>
                    <td><?= $invite->adh_prenom ?></td>
                    <td><?= $invite->ses_id ?></td>
                    <td><?= $invite->inv_email ?></td>
                    <td><?= $invite->inv_nom ?></td>
                    <td><?= $invite->inv_prenom ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>




