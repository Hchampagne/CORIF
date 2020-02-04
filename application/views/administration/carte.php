

  <div class="corp">
    <div class="table-reponsive-xl">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N° carte</th>
                    <th scope="col">Description</th>
                    <th scope="col">Métiers</th>
                    <th scope="col">Type</th>
                    <th scole="col"></th>
                    <th scole="col"></th>
                </tr>                
            </thead>
            
            <tbody>
                <?php foreach ($results as $data): ?>
                <tr>
                    <td><?= $data->car_numero ?> </td>
                    <td><?= $data->car_description ?> </td>
                    <td><?= $data->met_metier ?> </td>
                    <td><?= $data->car_type ?> </td>               
                    <td> <a class="btn" href="<?=site_url("administration/modif_carte/$data->car_id")?>" style="color:#343538">Modifier</a> </td>
                    <td> <a class="btn btn-danger"href="<?=site_url("administration/suppr_carte/$data->car_id")?>" Onclick='return confirm("Etes-vous sûr de bien vouloir supprimer la carte ?")' style="color:#343538">Suppression </a> </td>
                
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
  </div>



