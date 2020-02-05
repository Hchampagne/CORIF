

        
            <div class="container">
                <table class="table table-hover" >
                    <thead  class="thead-light text-center">
                        <tr>
                            <th class="align-middle">numero</th>
                            <th class="align-middle">Métier</th>
                            <th class="align-middle">Prénom</th>
                            <th class="align-middle">Age</th>
                            <th class="align-middle"></th>
                            <th class="align-middle"></th>
                        </tr>                
                    </thead>          
                    <tbody>
                        <?php foreach ($liste_metier as $data){ ?>
                        <tr>                           
                            <td class="align-middle"><?= $data->met_id?> </td>
                            <td class="align-middle"><?= $data->met_metier ?> </td>
                            <td class="align-middle"><?= $data->met_prenom ?> </td>
                            <td class="align-middle"><?= $data->met_age ?> </td>               
                            <td class="align-middle"> <a class="btn" href="<?=site_url("administration/modif_metier/$data->met_id")?>" >Modifier</a> </td>
                            <td class="align-middle"> <a class="btn" href="<?=site_url("administration/suppr_metier/$data->met_id")?>" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>             
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
       
  



