<div id="titre">
    <h1>Ajout d'une carte</h1>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card" style="width: 18rem; color:#343538; margin-bottom:2rem;">
                <img class="card-img-top" src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Type de la carte: <p id="text"></p>
                    </h5>
                    <span class="card-text" style="color:#343538">
                    
                        <b>Numéro de la carte:</b>
                        <p id="text2" style="color:#343538"></p>

                        <b>Description:</b>
                        <p id="text3" style="color:#343538"></p>

                    </span>
                </div>
            </div>
        </div>
        <div class="col-7">
            <form method="post" action="" id="form_ajoutCarte">
                <div class="col-3">
                    <label for="car_numero">N° carte</label>
                    <input type="text" name="car_numero" id="car_numero" class="form-control" value="">
                </div>

                <div class="col-7">
                    <label for="car_met_id">Métier</label>
                    <select class="form-control" name="car_met_id" id="car_met_id">
                        <?php foreach ($liste_metier as $metier) { ?>
                            <option value="<?= $metier->met_id ?>"> <?= $metier->met_metier ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col">
                    <label for="car_description">Description</label>
                    <textarea rows="7" cols="33" type="text" name="car_description" id="car_description" class="form-control" required></textarea>
                </div><br>

                <div class="col-3">
                    <label car_type>Type </label>
                    <select class="form-control" name="car_type" id="car_type">
                        <option value="metier" selected>métier</option>
                        <option value="parcours">parcours</option>
                    </select>
                </div><br>

                <div class="col">
                    <input type="submit" id="btn_submit" value="Modication" class="btn">
                </div>

            </form>
        </div>
    </div>
</div>




