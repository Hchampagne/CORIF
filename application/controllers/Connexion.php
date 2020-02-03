<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller{

// controller servant à la connexion des administrateurs et des adhérents et invités
// comporte les fonctions : inscription 
//                          connexion administrateur/adhérent/invité
//                          deconnexion
//                          reset mot de passse

/*************************/
/* inscription adhérents */
/*************************/
    public function inscription(){
             
        if ($this->input->post()){

            // controle formulaire post()
            // tests si vide  (riquired) / filtre balises html (html_escape) / test regex (regex_match)
            // test si déjà present dans Database (is_unique) / si champs identiques (matches[])
            // test validité eamil (valid_email)
            // messages d'erreurs en fonction des tests

            $this->form_validation->set_rules('adh_nom','Nom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]',     
                array('required'=>'Le champs est vide' , 'regex_match'=>'La saisie est incorrecte')); 

            $this->form_validation->set_rules('adh_prenom', 'Prenom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]', 
                array('required'=>'Le champs est vide', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('adh_organisme', 'Organisme',
                'required|html_escape|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*/]', 
                array('required'=>'Le champ est vide', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('adh_email', 'Email', 'required|is_unique[adherent.adh_email]|valid_email',   
                array('required'=>'Le champs est vide', 'is_unique'=>'Déjà utilisé','valid_email'=>'Votre email est incorrecte'));

            $this->form_validation->set_rules('adh_login', 'Login',
                'required|is_unique[adherent.adh_login]|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]', 
                array('required'=>'Le champs est vide', 'is_unique'=>'Déjà utilisé', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('adh_mdp', 'MDP',
                'required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]', 
                array('required'=>'Le champs est vide', 'regex_match'=>'La saisie est incorrecte'));

            $this->form_validation->set_rules('verifmdp','Verifmdp','required|matches[adh_mdp]',             
                array('required'=>'Le champs est vide', 'matches'=>'Les mots de passes ne sont pas identiques' ));

                if($this->form_validation->run() == false ){ 

                    // formulaire non conforme aux controles
                    // rechargement de la page
                    $this->load->view('head');
                    $this->load->view('header');
                    $this->load->view('connexion/inscription');                  
                    $this->load->view('footer');
                   
                }else{  
                    //pas d'erreurs dans les formulaires
                    // nous pouvons faire l'indsertion en base De donnée                 

                    //recup le post du formulaire inscription
                    $data = $this->input->post(null,true);  // filtre html balise 

                    //supprime le champ verifmdp du post => "controle champs identiques"
                    //ATTENTION supprime la 6ème position (5)
                    array_splice($data,6,1);

                    //le hash du mot de passe
                    $password_hash = password_hash($data["adh_mdp"], PASSWORD_DEFAULT);
                    $data["adh_mdp"] = $password_hash;                

                    // insertion dans base de donnée appel model corif_model->insert_adherents
                    $insert = $this->Adherent_model->insert_adherents($data);

                    if($insert == 1){                      
                    // insert en base réussi                     
                        // envoi des email confirmation inscrption et attente validation
                        // mail admin pour validation
                        // retour si mail adhérent envoyé

                        // mail adhérent
                        $sendMail = $data['adh_email'];
                        $action = "adhConf";
                        $message = ""; // déjà paramètré dans le model
                        $retour = $this->Mail_model->sendMail($sendMail,$action, $message);
                        // mail admin
                        $action = "adminConf";
                        $this->Mail_model->sendMail($sendMail, $action, $message);

                            if($retour){
                                // affichage inscription et confirmation réussies
                                // modal avec retour a l'accueil
                                $inscription['inscription'] = "Votre inscription est en attente de validation";
                                $envoi['envoi'] = "Un mail de confirmation vous a été envoyé";
                               //reload modal
                                $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                                $this->load->view('head');
                                $this->load->view('header');
                                $this->load->view('modal/inscriptionConfModal',$inscription + $envoi);
                                $this->load->view('modal/connexionModal');
                                $this->load->view('modal/espacejeuModal');
                                $this->load->view('accueil/accueil');
                                $this->load->view('footer', $reload);

                            }else{
                                // affichage inscription réussi / problème envoi mail
                                // modal avec retour a l'accueil 
                                $inscription['inscription'] = "Votre inscription est en attente de validation";
                                $envoi['envoi'] = "Le mail de confirmation a échoué !";
                                //reload modal
                                $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                                $this->load->view('head');
                                $this->load->view('header');
                                $this->load->view('modal/inscriptionConfModal', $inscription + $envoi);
                                $this->load->view('modal/connexionModal');
                                $this->load->view('modal/espacejeuModal');
                                $this->load->view('accueil/accueil');
                                $this->load->view('footer', $reload);
                            }
                    }else{
                        // insert en base a échoué
                        // modal avec retour a l'accueil
                        $incription['inscription'] = "Votre inscription a échouée !";
                        $titre['titre'] = "Inscription";

                        //reload modal
                        $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/inscriptionConfModal', $inscription);
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');;
                        $this->load->view('footer', $reload);
                        }                   
                    }
        } else {

        // pas de post() rechargement de la page premier affichage
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('connexion/inscription');
        $this->load->view('footer');
        }     
    }


/*************************************/
/* connexion administrateur/adhérent */
/*************************************/
    public function login(){

        if ($this->input->post()) {  // si il y a un post


            //test si champ saisie correspond a un mail valide
            $email = $this->input->post('con_login',true);
            $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

            //Règles devalidation
            if ($testEmail){ 
                // form email valide
                $this->form_validation->set_rules('con_login', 'con_login', 'required|html_escape');
            }else{ 
                // form email non valide => peut etre login
                $this->form_validation->set_rules('con_login', 'con_login',
                    'required|html_escape|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]',
                    array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte'));
            }

            $this->form_validation->set_rules('con_password','con_password', 
                'required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]' 
                ,array('required' => 'Le champs est vide','regex_match' => 'La saisie est incorrecte'));

            

            // 
            if($this->form_validation->run() == false){ // non conforme

                $this->session->sess_destroy();

                //reload modal
                $reload['reload'] = "<script> $('#connexionModal').modal('show') </script>";

                $this->load->view('head');
                $this->load->view('header');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('accueil/accueil');
                $this->load->view('footer', $reload);
              
            }else{

                // recherche enregistrement base donnée en fonction de email/login 
                // html escape sur le champ recupérer du post
                $log = $email = $this->input->post("con_login", true);
                // interroge base de donnée adhérent en fonction de l'eamil ou du login
                $data = $this->Connexion_model->login($log, $email);
                $detail = $data->row();
                //nombre enregistremt
                $row = $data->num_rows(); 

                

                if ($row == 0){
                    
                    $this->session->sess_destroy();

                    // pas enregistré ou erreur login ou email
                    $message['message'] = "Vous n'êtes pas enregistré (erreur login).";

                    //reload modal
                    $reload['reload'] = "<script> $('#connexionModal').modal('show') </script>";
                   
                    $this->load->view('head');
                    $this->load->view('header');
                    $this->load->view('modal/connexionModal',$message);
                    $this->load->view('modal/espacejeuModal');
                    $this->load->view('accueil/accueil');
                    $this->load->view('footer',$reload);

                }else{

                    // recherche enregistrement base donnée en fonction de email/login 
                    // html escape sur le champ recupérer du post
                    $log = $email = $this->input->post("con_login", true);
                    // interroge base de donnée adhérent en fonction de l'eamil ou du login
                    $data = $this->Connexion_model->login($log, $email);
                    $detail = $data->row();                  

                    //test validation conform                      
                    if (password_verify($this->input->post("con_password", true), $detail->adh_mdp) && ($detail->adh_validation == 1)) {
                        // mot de passe vérifié et compte validé  

                        // update de la date de connexion
                        $this->Connexion_model->conn_date($detail->adh_email);

                        // création des valeur de session
                        $this->session->set_userdata('role', $detail->adh_role);
                        $this->session->set_userdata('nom', $detail->adh_nom);
                        $this->session->set_userdata('prenom', $detail->adh_prenom);

                        // redirection page accueil
                        redirect(site_url("Accueil"));
                    } elseif (password_verify($this->input->post("con_password", true), $detail->adh_mdp) && ($detail->adh_validation == 0)) {

                        $this->session->sess_destroy();
                        // mot de passe vérifié et compte non validé 
                        // message compte non validé                 
                        $message['message'] = "Vous êtes enregitré mais votre compte n'est pas validé.";

                        //reload modal
                        $reload['reload'] = "<script> $('#connexionModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/connexionModal', $message);
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer', $reload);
                    } else {
                        // mot de passe erroné
                        // message mot de passe incorrecte
                        $this->session->sess_destroy();

                        $message['message'] = "Votre mot de passe n'est pas conforme.";

                        //reload modal
                        $reload['reload'] = "<script> $('#connexionModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/connexionModal', $message);
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer', $reload);
                    }
                }              
            }             
        }   
    }
 
/********************/   
/* connexion invite */
/********************/
    function loginInvite() {

        if ($this->input->post()){  //si post  
            
            //Défénit les règles du controle du formulaire
            $this->form_validation->set_rules('inv_nom','inv_nom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]',     
                array('required'=>'Le champs est vide' , 'regex_match'=>'La saisie est incorrecte')); 

            $this->form_validation->set_rules('inv_mail', 'inv_mail', 'required|valid_email',   
            array('required'=>'Le champs est vide','valid_email'=>'Votre email est incorrecte'));

            $valForm = $this->form_validation->run();
           
                if ($valForm != false ){

                    //recup poste  + filtre html escape
                    $nom = $this->input->post("inv_nom", true);
                    $email = $this->input->post("inv_mail", true);

                    //appel model pour lecture base de données table invité
                    //filtre sur email et nom
                    $model = $this->Connexion_model->loginjeu($email, $nom);
                    $detail = $model->row();
                    $retour = $model->num_rows();                                    

                    if ($retour == 0){ 

                        $this->session->sess_destroy();

                        // Erreur dans la saisie 
                        $message['message'] = "Le compte n'existe pas !";

                        //reload modal
                        $reload['reload'] = "<script> $('#espacejeuModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal', $message);
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer',$reload);

                        

                    }else{
                        // invite enregistré dans la base

                        // création des valeurs de session
                        $this->session->set_userdata('role', $detail->inv_role);
                        $this->session->set_userdata('nom', $detail->inv_nom);
                        $this->session->set_userdata('prenom', $detail->inv_prenom);
                        $this->session->set_userdata("date", $detail->ses_d_session);
                        $this->session->set_userdata('idSession', $detail->ses_id);

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer');
                    }                                  
                } else {

                    $this->session->sess_destroy();

                    // Erreur dans la saisie 
                    $message['message'] = "Erreur dans la saisie !";

                    //reload modal
                    $reload['reload'] = "<script> $('#espacejeuModal').modal('show') </script>";

                    $this->load->view('head');
                    $this->load->view('header');
                    $this->load->view('modal/connexionModal');
                    $this->load->view('modal/espacejeuModal', $message);
                    $this->load->view('accueil/accueil');
                    $this->load->view('footer', $reload);
                  
                }
        }else{
            redirect("Accueil");
        }         
      
    }


// RESET MOT DE PASSE
    public function resetPassword() {          
                       
        if($this->input->post()){  //si il y a un post

            // regle de validation email    
            $this->form_validation->set_rules('res_mail', 'res_mail', 'required|html_escape|valid_email',
                array("required"=>"Le champs est vide","valid_email"=>"L'email saisie n'est pas correcte"));

            if($this->form_validation->run() != false){

                //controle formulaire ok

                // filtre post email html_escape xss
                $log = $email = $mail = $this->input->post("res_mail", true);
                // interroge base avec email
                $results = $this->Connexion_model->login($log, $email);
                $res = $results->row();

                if ($results->num_rows() == 1) {
                    // present dans base
                    // génère les clés
                    $time = now("europe/paris");  // timestamp heure de paris
                    $cle_url = key_gen(10) . $time;  // génère la clé url
                    $cle_conf = key_gen(6);          // génère le clé de confirmation 

                    // supprime si il y a déjà un enregistrement dans la base
                    $this->Connexion_model->delete_reset_cle($res->adh_id);

                    // insert clés dans la base
                    $data = $this->Connexion_model->insert_reset_cle($cle_url, $cle_conf, $res->adh_id);

                    if ($data == 1) {
                        // insert cle dans table reset réussi
                        // envoi email avec le lien de retour et la clé en GET
                        $message = "Bonjour, " ."\r\n\n".
                            "Cliquez sur le lien pour réinitialiser votre mot de passe :"."\r\n" .
                            "http://localhost/corif/index.php/Connexion/newPassword/" . $cle_url."\r\n\n".
                            "Clé de confirmation : " . $cle_conf . "\r\n\n" .  
                            "L'équipe CORIF";

                        $envoi = $this->Mail_model->sendMail($mail, "resetMdp", $message);

                        if($envoi){
                            // envoi message réussi
                            $reload['reload'] = "<script> $('#resetConfModal').modal('show') </script>";

                            // echec opération
                            $this->load->view('head');
                            $this->load->view('header');
                            $this->load->view('modal/connexionModal');
                            $this->load->view('modal/espacejeuModal');
                            $this->load->view('modal/resetConfModal');
                            $this->load->view('accueil/accueil');
                            $this->load->view('footer', $reload);

                        }else{
                            // envoi message échoué
                            // echec opération + message

                            // efface insertion evite double demande dans système
                            $this->Connexion_model->delete_reset_cle($res->adh_id);

                            $message['message'] = " Désolé fonction indisponible, veuillez essayer ulterieurement";

                            $this->load->view('head');
                            $this->load->view('header');
                            $this->load->view('modal/connexionModal');
                            $this->load->view('modal/espacejeuModal');
                            $this->load->view('connexion/resetPassword',$message);
                            $this->load->view('footer');

                        }

                    }else{
                        // insert base a échoué
                        // + message erreur

                        $message['message'] = "Désolé fonction indisponible, veuillez essayer ulterieurement";

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('connexion/resetPassword', $message);
                        $this->load->view('footer');
                    }
                }else{
                    // email inconnu
                    // + message erreur

                    $message['message'] = "Vous n'êtes pas inscrit";

                    $this->load->view('head');
                    $this->load->view('header');
                    $this->load->view('modal/connexionModal');
                    $this->load->view('modal/espacejeuModal');
                    $this->load->view('connexion/resetPassword', $message);
                    $this->load->view('footer'); 


                }
            }else{
                // validation non conforme retour au formulaire
                // + message erreur
                $this->load->view('head');
                $this->load->view('header');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('connexion/resetPassword');
                $this->load->view('footer'); 

            }
        }else{
            // pas de post / premier affichage

            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('modal/connexionModal');
            $this->load->view('modal/espacejeuModal');
            $this->load->view('connexion/resetPassword');
            $this->load->view('footer'); 
        }                           
    }

// change le mot de passe
    public function newPassword()
    {
        // regex pour cle_url entre 11 et 20 caratère des chiffres de de 0 à 9
        $regex = "/^[0-9]{11,20}$/";
        // extraction cle_url
        $cle_url = $this->uri->segment(3);
        //test regex
        $test = preg_match($regex, $cle_url);
      
        if ($test){
            // clé valide

            if($this->input->post()){
                //il y a un post

                $this->form_validation->set_rules ('cleConf','cleConf', 'required|html_escape|regex_match[/^(?=.{6,6}$)(?=.*[0-9]).*$/]',
                     array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte'));

                $this->form_validation->set_rules('newMdp','newMdp','required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]',
                    array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte'));

                $this->form_validation->set_rules('verifNewMdp','VerifNewMdp','required|matches[newMdp]',
                    array('required' => 'Le champs est vide', 'matches' => 'Les mots de passes ne sont pas identiques'));


                    if($this->form_validation->run() != false){
                        // champs valid

                        $cle_conf = $this->input->post('cleConf');

                        $result = $this->Connexion_model->edit_reset_cle($cle_url, $cle_conf);
                        $res = $result->row();

                        if($result->num_rows() == 1){
                            // un enr dans la base

                            // attribut à $id la valeur de res_adh_id <=> adh_id
                            $id = $res->res_adh_id;       

                            // update du mot de passe 
                            $data = $this->connexion_model->modif_password($this->input->post('newMdp,true'),$id); 

                                if($data){
                                    // update reussi
                                    //reirection accueil message bonne fin


                                }else{
                                    // l'update a échoué
                                    //reirection accueil message erreur

                                }

                        }else{
                        // pas enr dans base
                        // redirection accueil pas de message d'erreur
                        redirect('Accueil');

                        }
                    }else{
                        // champs non valid
                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('connexion/newPassword');
                        $this->load->view('footer');
                    }
                        
            }else{
                //il n'ya pas de post
                $this->load->view('head');
                $this->load->view('header');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('connexion/newPassword');
                $this->load->view('footer'); 
            }

        }else{
            
            //cle incorrecte
            // redirection accueil pas de message d'erreur
            redirect('Accueil');

        }
      
    }


// DECONNEXION
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('Accueil');
    }

}                          
            
        

