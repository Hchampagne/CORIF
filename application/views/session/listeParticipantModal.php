<!-- Modal -->
<div class="modal fade" id="listeParticipantModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">
                   Liste participant-e(s)
                </h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="">Email</th>
                                <th class="">Nom</th>
                                <th class="">Prénom</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php                      
                        foreach ($liste as $participant) {
                        ?>
                            <tr>
                                <td class=""><?= $participant->inv_email ?></td>
                                <td class=""><?= $participant->inv_nom ?></td>
                                <td class=""><?= $participant->inv_prenom ?></td>                               
                            </tr>
                        <?php 
                        } ?>
                        </tbody>
                    </table>
                </div>
                <div>                                                       
                    <a href="#" type="button" class="btn btn-default" data-dismiss="modal">Fermer</a>
                </div>               
            </div>
        </div>
    </div>
</div>