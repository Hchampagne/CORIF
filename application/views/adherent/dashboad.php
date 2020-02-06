<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Trimestre', 'Nombre de session'],
          ['1er Trimestre',30],
          ['2nd Trimestre',21],
          ['3eme Trimestre',14],
          ['4eme Trimestre',5],
         
        ]);

        var options = {
          title: 'Taux de session',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    
    <div class=titre>
    <h1>Tableau de bord formateur</h1>
    <p>
    
    </p>
</div>
<hr>
<div class="corp row">
    <div class="participant col-6">
        <h2 class="bg-light text-center">Liste des participants</h2>
        <div class="bg-secondary text-corif">
            <div class="table-reponsive-xl">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Session</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($participant as $liste){ ?>
                    <tr>
                    <td><?= $liste->nom ?> </td>
                    <td><?= $liste->email ?> </td>
                    <td><?= french_date($liste->date_session)?>&nbsp; <?= $liste->heure_debut?> </td>
                    <td scope="col"><a style="color:#343538" class="btn btn-danger"  href="<?=site_url("jeu/delete_participant/$liste->idi")?>"Onclick='return confirm("Etes-vous sûr?")'>Suppresion</a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
             </div>
        </div>
    </div>

    <div class="statistique col-6">
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
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
</div>