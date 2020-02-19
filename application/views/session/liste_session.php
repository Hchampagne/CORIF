

    <div class="container">
     <hr>   
        <div class="row">
            <div class="col-sm-3 ">
                <a class="btn" href="#" >Ajout session</a> 
            </div>                         
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover" >
                        <thead  class="thead-light text-center">
                            <tr>
                                <th class="text-center">Session</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Heure</th>
                                <th class="text-center">Participant-e(s)</th>
                                <th class="text-center">Métier</th>
                                <th class="text-center"></th>
                            </tr>                
                        </thead>          
                        <tbody>
                            <?php foreach($liste as $session){ ?>
                            <tr>                           
                                <td class="text-center"><?= $session->ses_id ?></td>
                                <td class="text-center"><?= $session->ses_d_session?></td>
                                <td class="text-center"><?= $session->ses_h_debut?></td>
                                <td class="text-center"><a href="<?= site_url("session_jeu/liste_participant/".$session->ses_id) ?>">Partipant-e(s)</a></td>   
                                <td class="text-center"><a href="#" >Métier(s)</a></td>               
                                <td class="text-center"> <a class="btn" href="#" >Modifier</a> </td>
                                <td class="text-center"> <a class="btn" href="#" Onclick='return confirm("Confirmez la suppression ?")'>Suppression </a> </td>             
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


