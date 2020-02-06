 <div class="container-fluid">
     <div class="row text-center">
         <div class="col table-responsive">
             <table class="table  table-striped">
                 <thead class="thead-light">
                     <tr>
                         <th class="align-middle">Session</th>
                         <th class="align-middle">Date</th>
                         <th class="align-middle">Début</th>
                         <th class="align-middle">Fin</th>
                         <th class="align-middle">Métiers</th>
                         <th class="align-middle">Partcipants</th>
                         <th class="align-middle">&nbsp</th>
                         <th class="align-middle">&nbsp</th>                       
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach ($sessions as $session) { ?>
                         <tr>
                             <td class="align-middle"><?= $session->id ?></td>
                             <td class="align-middle"><?= $session->date_session != 0 ? date("d/m/Y", strtotime($session->date_session)) : ""; ?></td>
                             <td class="align-middle"><?= $session->heure_debut ?></td>
                             <td class="align-middle"><?= $session->heure_fin ?></td>
                             <td class="align-middle">
                                 <?php foreach ($session->metiers as $metier) : ?>
                                     <?= $metier->metier ?><br>
                                 <?php endforeach; ?>
                             </td>
                             <td class="align-middle"><?= $session->nb_participant ?></td>
                             <td class="align-middle">
                                 <a class="btn btn-info" href="<?= site_url("jeu/modif_session/$session->id") ?>">modifier</a>
                             </td>
                             <td class="align-middle">
                                 <a class="btn btn-danger" id="btnDas" href="<?= site_url("jeu/delete_session/$session->id") ?>" Onclick='return confirm("Etes-vous sûr?")'>supprimer</a>
                             </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>