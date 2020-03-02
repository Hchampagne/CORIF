<!-- Modal -->
<div class="modal fade" id="listeMetierModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Liste métier(s)
                </h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="">Métier</th>                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($liste as $metier) {
                        ?>
                            <tr>
                                <td class=""><?= $metier->met_metier ?></td>                            
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
                <div>
                    <a href="<?= site_url("Session_jeu/liste_session/") ?>" type="button" class="btn btn-default" >Fermer</a>
                </div>
            </div>
        </div>
    </div>
</div>