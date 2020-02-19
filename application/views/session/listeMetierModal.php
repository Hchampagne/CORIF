<!-- Modal -->
<div class="modal fade" id="listeParticipantModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">
                   Liste métier(s)
                </h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="">Metier1</th>
                                <th class="">Metier2</th>
                                <th class="">métier3</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php                      
                        foreach ($liste as $metiert) {
                        ?>
                            <tr>
                                <td class=""><?= $metier->jeu_metier1 ?></td>
                                <td class=""><?= $metier->jeu_metier2 ?></td>
                                <td class=""><?= $metier->jeu_metier3 ?></td>                               
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