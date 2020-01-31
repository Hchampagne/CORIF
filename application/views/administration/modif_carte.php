<div id="titre">
<h1>  Modification de la carte de "<?= $carte->numero; ?>"</h1>
</div>
                        
                                                                                                                    

<div class="row">
    <div class="col-6">
    <div class="row">                                                        
        <form method="post" action="" id="mc_signup_form">
                                                            
                <div class="col-12 align-self-center">
                    <label>Type de la carte:</label>
                    <input type="text"  id="input" class="form-control" value="<?=$carte->type; ?>" readonly/>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Prenom de l'ouvrier(ère):</label><br>
                    <input type="text"  id="input1" value="<?=$carte->prenom; ?>" readonly/>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Numéro de la carte:</label>
                    <input type="text" name="numero" id="input2" class="form-control" value="<?=$carte->numero ?>" />
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Description:<span class="mc_required">*</span></label>
                    <textarea rows="5" cols="33" type="text" name="description" id="input3" class="form-control" required  ><?=$carte->description; ?></textarea>
                </div><!--  -->

                <div class="col-12 align-self-center">
                    <label>Catégorie:</label>
                    <input type="text" name="cat" id="input4" class="form-control" value="<?=$carte->cat?>" /> 
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
            <img class="card-img-top" src="<?= base_url("img/images/logo-b.jpg") ?>" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Type de la carte: <p>"<?=$carte->type; ?>"</p> </h5>
            

            <span class="card-text" style="color:#343538">
               <b> Nom de l'ouvrier(ère):</b> <p><?=$carte->prenom; ?></p> 

               <b>Numéro de la carte:</b> <p><?=$carte->numero ?></p>

               <b>Description:</b> <p><?=$carte->description; ?></p>
                
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