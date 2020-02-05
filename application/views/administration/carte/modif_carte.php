<div id="titre">
    <h1> Modification de la carte de "<?= $carte->car_numero; ?>"</h1>
</div>



<div class="row">
    <div class="col-6">
        <div class="row">
            <form method="post" action="" id="mc_signup_form">

                <div class="col-12 align-self-center">
                    <label for=car_id>Numero</label>
                    <input type="text" name="car_id" id="car_id" class="form-control" value="<?= $carte->car_id; ?>" disabled>
                </div>

                <div class="col-12 align-self-center">
                    <label for="car_numero">N° carte</label>
                    <input type="text" name="car_numero" id="car_numero" class="form-control" value="<?= $carte->car_numero; ?>" readonly>
                </div>

                <div class="col-12 align-self-center">
                    <label for="car_met_id">Métier</label>
                    <select class="form-control" name="car_met_id" id="car_met_id">

                        <?php
                        foreach ($liste_metier as $metier) {
                        ?>
                            <option value="<?= $metier->met_id ?>" <?= ($metier->met_metier ==$carte->met_metier) ? "selected" : ""; ?>>
                             <?= $metier->met_metier ?> 
                            </option>
                        <?php
                        }
                        ?>                      
                    </select>
                </div>

                <div class="col-12 align-self-center">
                    <label for="car_description">Description</label>
                    <textarea rows="5" cols="33" type="text" name="car_description" id="car_description" class="form-control" required><?= $carte->car_description; ?></textarea>
                </div><br>

                <div class="col-12 align-self-center">
                    <label car_type>Type </label>

                    <select class="form-control" name="car_type" id="car_type">
                        <option selected="<?= $carte->car_type ?>" value="<?= $carte->car_type ?>"><?= $carte->car_type ?></option>
                        <option value="metier">métier</option>
                        <option value="parcours">parcours</option>
                    </select>
                </div><br>


                <div class="col-12 align-self-center">
                    <input type="submit" id="btn_submit" value="Modication" class="btn">
                </div>

            </form>

        </div>
    </div>

    <div>
        <div class="card" style="width: 18rem; color:#343538; margin-bottom:2rem;">
            <img class="card-img-top" src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Carte : "<?= $carte->car_type; ?>" </h5>


                <span class="card-text" style="color:#343538">
                    <b> Nom de l'ouvrier(ère):</b>
                    <p><?= $carte->met_prenom; ?></p>

                    <b>Numéro de la carte:</b>
                    <p><?= $carte->car_numero ?></p>

                    <b>Description:</b>
                    <p><?= $carte->car_description; ?></p>

                </span>
            </div>
        </div>

    </div> <!-- fin de col -->
</div> <!-- fin de row -->