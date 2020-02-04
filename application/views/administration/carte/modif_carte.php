<div id="titre">
<h1>  Modification de la carte de "<?= $carte->car_numero; ?>"</h1>
</div>
                        
                                                                                                                    

<div class="row">
    <div class="col-6">
    <div class="row">                                                        
        <form method="post" action="" id="mc_signup_form">
                                                            
                <div class="col-12 align-self-center">
                    <label>Type de la carte</label>
                    <input type="text"  id="input" class="form-control" value="<?=$carte->car_type; ?>" readonly/>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Prenom de l'ouvrier(ère)</label><br>
                    <input type="text"  id="input1" value="<?=$carte->met_prenom; ?>" readonly/>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Numéro de la carte</label>
                    <input type="text" name="numero" id="input2" class="form-control" value="<?=$carte->car_numero ?>" />
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Description:*<span class="mc_required">*</span></label>
                    <textarea rows="5" cols="33" type="text" name="description" id="input3" class="form-control" required  ><?=$carte->car_description; ?></textarea>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Métier</label>
                    <input type="text" name="cat" id="input4" class="form-control" value="<?=$carte->met_metier?>" /> 
                </div><!--  -->
                <br>                                                   
                                                                        
                <div class="col-12 align-self-center">
                    <input type="submit"  id="mc_signup_submit" value="Modication" class="btn" style="margin-bottom:2.5rem" />
                </div><!--  -->
                                                                    
        </form><!--form -->
    </div> <!-- fin de row -->
    </div> <!-- fin col -->

    <div>
        <div class="card" style="width: 18rem; color:#343538; margin-bottom:2rem;">
            <img class="card-img-top" src="<?= base_url("assets/img/images/logo-b.jpg") ?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Carte : "<?=$carte->car_type; ?>" </h5>
            

            <span class="card-text" style="color:#343538">
               <b> Nom de l'ouvrier(ère):</b> <p><?=$carte->met_prenom; ?></p> 

               <b>Numéro de la carte:</b> <p><?=$carte->car_numero ?></p>

               <b>Description:</b> <p><?=$carte->car_description; ?></p>
                
            </span>
        </div>
    </div> 

    </div> <!-- fin de col -->
    </div> <!-- fin de row -->

