<div id="titre">
    <h1>Ajout d'une carte</h1>
<hr>
</div>
<div class="row">
    <div class="col-6">
    <div class="row">                                                        
        <form method="post" action="" id="mc_signup_form">
                                                            
                <div class="col-12 align-self-center">
                    <label>Type de la carte</label>
                    <select type="text" name="type" id="input" class="form-control" required/>
                    <option></option>
                    <option  value="metier" name="type">Carte métiers</option>
                    <option  value="parcours" name="type">Carte Parcours</option>
                    </select>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Prenom de l'ouvrier(ère)</label>
                    <select type="text" name="id_metier"  id="input1" class="form-control" required />
                    <option></option>
                    <?php foreach($metier as $metier) { ?>

                            <option value="<?= $metier->id ?>">
                                    <?= $metier->prenom ?> 
                            </option>

                                    <?php } ?> 
                    </select>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Numéro de la carte</label>
                    <input type="text" name="numero" id="input2" class="form-control" required />
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Description<span class="mc_required">*</span></label>
                    <textarea type="text" name="description" id="input3" class="form-control" required > </textarea>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Catégorie:<span class="mc_required">*</span></label>
                    <select rows="5" cols="33" type="text" name="cat" id="input" class="form-control">
                        <option></option> 
                        <option  value="essentiel" name="type">Carte essentiel</option>
                        <option  value="autre" name="type">Carte secondaire</option>
                    </select>    
                </div><!--  -->
                <br>                                                   
                                                                        
                <div class="col-12 align-self-center">
                    <input type="submit"  id="mc_signup_submit" value="Ajout de la carte" class="btn" style="margin-bottom:2.5rem" />
                </div><!--  -->
                                                                    
        </form><!--form -->
    </div> <!-- fin de row -->
    </div> <!-- fin col -->

    <div>
        <div class="card" style="width: 18rem; color:#343538; margin-bottom:2rem;">
            <img class="card-img-top" src="<?= base_url("img/images/logo-b.jpg") ?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Type de la carte: <p id="text"></p> </h5>
            
            <span class="card-text" style="color:#343538">
               <b> Nom de l'ouvrier(ère):</b> <p id="text1" style="color:#343538"></p> 

               <b>Numéro de la carte:</b> <p id="text2" style="color:#343538"></p>

               <b>Description:</b> <p id="text3" style="color:#343538"></p>
                
            </span>
        </div>
    </div> 

    </div> <!-- fin de col -->
    </div> <!-- fin de row -->
    <script>
        $(document).ready(function(){
   
   $('#input').on('input',function(e){
                   $("#text").html($(this).val());
                    });
   
   $('#input1').on('input',function(e){
                   $("#text1").html($(this).val());
                   });
   
   $('#input2').on('input',function(e){
                   $("#text2").html($(this).val());
                   });
   
   $('#input3').on('input',function(e){
                   $("#text3").html($(this).val());
                   });
   
   
   });
    </script>
