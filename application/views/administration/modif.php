<div id="titre">
<h1>  Modification da la fiche de "<?= $adherent->nom; ?> <?=$adherent->prenom; ?>" </h1>
</div>
                                                                                
                                                            <form method="post" action="" id="mc_signup_form">
                                                            
                                                               
                                                                    <div class="form-group">
                                                                        <label>Nom:<span class="mc_required">*</span></label>
                                                                        <input type="text" name="nom" id="mc_mv_FNAME" class="form-control" value="<?=$adherent->nom; ?>" required />
                                                                    </div><!-- /form-group -->
<br>
                                                                    <div class="form-group">
                                                                        <label>Prénom:<span class="mc_required">*</span></label>
                                                                        <input type="text" name="prenom" id="mc_mv_FNAME" class="form-control" value="<?=$adherent->prenom; ?>" required />
                                                                    </div><!-- /form-group -->
<br>
                                                                    <div class="form-group">
                                                                        <label>Email:<span class="mc_required">*</span></label>
                                                                        <input type="email" name="email" id="mc_mv_EMAIL" class="form-control" value="<?=$adherent->email; ?>" required />
                                                                    </div><!-- /form-group -->
<br>
                                                                    <div class="form-group">
                                                                        <label>Organisme:<span class="mc_required">*</span></label>
                                                                        <input type="text" name="organisme" id="mc_mv_organisme" class="form-control" value="<?=$adherent->organisme; ?>" required />
                                                                    </div><!-- /form-group -->

                                                                    <br>
                                                                    <?php if($adherent->role == "administrateur") { ?>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="role" id="mc_mv_role" class="form-control" value="administrateur" checked>
                                                                        <label class="form-check-label">Administrateur</label>
                                                                    </div> 

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="role" id="mc_mv_role" class="form-control" value="formateur">
                                                                        <label class="form-check-label">Formateur</label>
                                                                    </div> 
                                                                    <?php }
                                                                    else{ ?>
                                                                        <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="role" id="mc_mv_role" class="form-control" value="administrateur" >
                                                                        <label class="form-check-label">Administrateur</label>
                                                                        </div> 

                                                                        <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="role" id="mc_mv_role" class="form-control" value="formateur" checked>
                                                                        <label class="form-check-label">Formateur</label>
                                                                    </div> 
                                                                   <?php } ?>
                                                                <br>
                                                                    
                                                                    <div class="form-group">
                                                                        <label>Login:<span class="mc_required">*</span></label>
                                                                        <input type="text" name="login" id="mc_mv_login" class="form-control" value="<?=$adherent->login; ?>" required />
                                                                    </div><!-- /form-group -->
<br>
                                                                    <?php if($adherent->validation == 0 ) { ?>
                                                                        <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="validation" id="mc_mv_role" class="form-control" value="0" checked>
                                                                        <label class="form-check-label">En cours de validation</label>
                                                                    </div> 

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="validation" id="mc_mv_role" class="form-control" value="1">
                                                                        <label class="form-check-label">Validation</label>
                                                                    </div> 
                                                                    <?php }
                                                                    
                                                                    else{ ?>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="validation" id="mc_mv_role" class="form-control" value="0" >
                                                                        <label class="form-check-label">En cours de validation</label>
                                                                    </div> 

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="validation" id="mc_mv_role" class="form-control" value="1" checked>
                                                                        <label class="form-check-label">Validation</label>
                                                                    </div> 

                                                                    <?php } ?>




                                                                    
                                                                    <br>
                                                                    <div class="mc_signup_submit">
                                                                        <input type="submit" id="mc_signup_submit" value="Modication" class="btn" style="font-weight: bold;padding: 8px 10px;color: #5E5E5E;text-transform: uppercase;"/>
                                                                    </div><!-- /mc_signup_submit -->
                                                                <br>
                                                            </form><!-- /mc_signup_form -->