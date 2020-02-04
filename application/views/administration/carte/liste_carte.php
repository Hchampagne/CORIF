

        
            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead  class="thead-light text-center">
                        <tr>
                            <th class="align-middle">N° carte</th>
                            <th class="align-middle">Description</th>
                            <th class="align-middle">Métiers</th>
                            <th class="align-middle">Type</th>
                            <th class="align-middle"></th>
                            <th class="align-middle"></th>
                        </tr>                
                    </thead>          
                    <tbody>
                        <?php foreach ($liste_carte as $data){ ?>
                        <tr>                           
                            <td class="align-middle"><?= $data->car_numero ?> </td>
                            <td class="align-middle"><?= $data->car_description ?> </td>
                            <td class="align-middle"><?= $data->met_metier ?> </td>
                            <td class="align-middle"><?= $data->car_type ?> </td>               
                            <td class="align-middle"> <a class="btn" href="<?=site_url("administration/modif_carte/$data->car_id")?>" >Modifier</a> </td>
                            <td class="align-middle"> <a class="btn" href="<?=site_url("administration/suppr_carte/$data->car_id")?>" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>             
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
       
  



