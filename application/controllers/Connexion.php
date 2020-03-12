<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller{

// controller servant à la connexion des administrateurs et des adhérents et invités
// comporte les fonctions : inscription 
//                          connexion administrateur/adhérent/invité
//                          reset mot de passse
//                          deconnexion

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
                'required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',     
                array('required'=>'Le champs est vide' , 'regex_match'=>'La saisie est incorrecte','max_length'=>'Saisie trop longue')); 

            $this->form_validation->set_rules('adh_prenom', 'Prenom',
                'required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]', 
                array('required'=>'Le champs est vide', 'regex_match'=>'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_organisme', 'Organisme',
                'required|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*/]|max_length[50]', 
                array('required'=>'Le champ est vide', 'regex_match'=>'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_email', 'Email', 'required|is_unique[adherent.adh_email]|valid_email|max_length[150]',   
                array('required'=>'Le champs est vide', 'is_unique'=>'Déjà utilisé','valid_email'=>'Votre email est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_login', 'Login',
                'required|is_unique[adherent.adh_login]|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[100]', 
                array('required'=>'Le champs est vide', 'is_unique'=>'Déjà utilisé', 'regex_match'=>'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_mdp', 'MDP',
                'required|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]|min_length[8]', 
                array('required'=>'Le champs est vide', 'regex_match'=>'La saisie est incorrecte', 'min_length' => 'Huit caractètres minimum'));

            $this->form_validation->set_rules('verifmdp','Verifmdp','required|matches[adh_mdp]',             
                array('required'=>'Le champs est vide', 'matches'=>'Les mots de passes ne sont pas identiques' ));

                if($this->form_validation->run() == false ){

                // formulaire non conforme aux controles
                // rechargement de la page
                $this->load->view('head');
                $this->load->view('banner');
                $this->load->view('header/header_loader');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('connexion/inscription');
                $this->load->view('footer');
                $this->load->view('script');
                   
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
                                $this->load->view('banner');
                                $this->load->view('header/header_loader');
                                $this->load->view('modal/inscriptionConfModal',$inscription + $envoi);
                                $this->load->view('modal/connexionModal');
                                $this->load->view('modal/espacejeuModal');
                                $this->load->view('accueil/accueil');
                                $this->load->view('footer');
                                $this->load->view('script', $reload);

                            }else{
                                // affichage inscription réussi / problème envoi mail
                                // modal avec retour a l'accueil 
                                $inscription['inscription'] = "Votre inscription est en attente de validation";
                                $envoi['envoi'] = "Le mail de confirmation a échoué !";
                                //reload modal
                                $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                                $this->load->view('head');
                                $this->load->view('banner');
                                $this->load->view('header/header_loader');
                                $this->load->view('modal/inscriptionConfModal', $inscription + $envoi);
                                $this->load->view('modal/connexionModal');
                                $this->load->view('modal/espacejeuModal');
                                $this->load->view('accueil/accueil');
                                $this->load->view('footer');
                                $this->load->view('script', $reload);
                            }
                    }else{
                        // insert en base a échoué
                        // modal avec retour a l'accueil
                        $incription['inscription'] = "Votre inscription a échouée !";
                        $titre['titre'] = "Inscription";

                        //reload modal
                        $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader');
                        $this->load->view('modal/inscriptionConfModal', $inscription);
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer');
                        $this->load->view('script', $reload);
                    }                   
                }
        } else {

            // pas de post() rechargement de la page premier affichage
            $this->load->view('head');
            $this->load->view('banner');
            $this->load->view('header/header_loader');
            $this->load->view('modal/connexionModal');
            $this->load->view('modal/espacejeuModal');
            $this->load->view('connexion/inscription');
            $this->load->view('footer');
            $this->load->view('script');

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

            //Règles de validation
            if ($testEmail){ 
                // form email valide
                $this->form_validation->set_rules('con_login', 'con_login', 'required|html_escape');
            }else{ 
                // form email non valide => peut etre login
                $this->form_validation->set_rules('con_login', 'con_login',
                    'required|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]',
                    array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte'));
            }

            $this->form_validation->set_rules('con_password','con_password', 
                'required|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]' 
                ,array('required' => 'Le champs est vide','regex_match' => 'La saisie est incorrecte'));

            

            // 
            if($this->form_validation->run() == false){ // non conforme

                $this->session->sess_destroy();

                //reload modal
                $reload['reload'] = "<script> $('#connexionModal').modal('show') </script>";

                $this->load->view('head');
                $this->load->view('banner');
                $this->load->view('header/header_loader');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('accueil/accueil');
                $this->load->view('footer');
                $this->load->view('script',$reload);
              
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
                    $this->load->view('banner');
                    $this->load->view('header/header_loader');
                    $this->load->view('modal/connexionModal',$message);
                    $this->load->view('modal/espacejeuModal');
                    $this->load->view('accueil/accueil');
                    $this->load->view('footer');
                    $this->load->view('script',$reload);

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
                        $this->session->set_userdata('adherent_id',$detail->adh_id);
                        $this->session->set_userdata('role', $detail->adh_role);
                        $this->session->set_userdata('nom', $detail->adh_nom);
                        $this->session->set_userdata('prenom', $detail->adh_prenom);
                        $this->session->set_userdata('validation',$detail->adh_validation);

                        // redirection page accueil
                        redirect('Accueil');

                    } elseif (password_verify($this->input->post("con_password", true), $detail->adh_mdp) && ($detail->adh_validation == 0)) {

                        $this->session->sess_destroy();
                        // mot de passe vérifié et compte non validé 
                        // message compte non validé                 
                        $message['message'] = "Vous êtes enregistré mais votre compte n'est pas validé.";

                        //reload modal
                        $reload['reload'] = "<script> $('#connexionModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader'); 
                        $this->load->view('modal/connexionModal', $message);
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer');
                        $this->load->view('script', $reload);
                    } else {
                        // mot de passe erroné
                        // message mot de passe incorrecte
                        $this->session->sess_destroy();

                        $message['message'] = "Votre mot de passe n'est pas conforme.";

                        //reload modal
                        $reload['reload'] = "<script> $('#connexionModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader');
                        $this->load->view('modal/connexionModal', $message);
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer');
                        $this->load->view('script', $reload);
                    }
                }              
            }             
        }   
    }
 

// RESET MOT DE PASSE
    public function resetPassword() {          
                       
        if($this->input->post()){  //si il y a un post

            // regle de validation email    
            $this->form_validation->set_rules('res_mail', 'res_mail', 'required|valid_email',
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
                            $this->load->view('banner');
                            $this->load->view('header/header_loader');
                            $this->load->view('modal/connexionModal');
                            $this->load->view('modal/espacejeuModal');
                            $this->load->view('modal/resetConfModal');
                            $this->load->view('accueil/accueil');
                            $this->load->view('footer');
                            $this->load->view('script', $reload);

                        }else{
                            // envoi message échoué
                            // echec opération + message

                            // efface insertion evite double demande dans système
                            $this->Connexion_model->delete_reset_cle($res->adh_id);

                            $message['message'] = " Désolé fonction indisponible, veuillez essayer ulterieurement";

                            $this->load->view('head');
                            $this->load->view('banner');
                            $this->load->view('header/header_loader');
                            $this->load->view('modal/connexionModal');
                            $this->load->view('modal/espacejeuModal');
                            $this->load->view('connexion/resetPassword',$message);
                            $this->load->view('footer');
                            $this->load->view('script');

                        }

                    }else{
                        // insert base a échoué
                        // + message erreur

                        $message['message'] = "Désolé fonction indisponible, veuillez essayer ulterieurement";

                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader');
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('connexion/resetPassword', $message);
                        $this->load->view('footer');
                        $this->load->view('script');
                    }
                }else{
                    // email inconnu
                    // + message erreur

                    $message['message'] = "Vous n'êtes pas inscrit";

                    $this->load->view('head');
                    $this->load->view('banner');
                    $this->load->view('header/header_loader');
                    $this->load->view('modal/connexionModal');
                    $this->load->view('modal/espacejeuModal');
                    $this->load->view('connexion/resetPassword', $message);
                    $this->load->view('footer');
                    $this->load->view('script'); 


                }
            }else{
                // validation non conforme retour au formulaire
                // + message erreur
                $this->load->view('head');
                $this->load->view('banner');
                $this->load->view('header/header_loader');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('connexion/resetPassword');
                $this->load->view('footer');
                $this->load->view('script'); 

            }
        }else{
            // pas de post / premier affichage

            $this->load->view('head');
            $this->load->view('banner');
            $this->load->view('header/header_loader');
            $this->load->view('modal/connexionModal');
            $this->load->view('modal/espacejeuModal');
            $this->load->view('connexion/resetPassword');
            $this->load->view('footer');
            $this->load->view('script'); 
        }                           
    }

// change le mot de passe
    public function newPassword(){
              
        // extraction cle_url et passe dans champs input de la vue pour traitement
        $cle_url['cle_url'] = $this->uri->segment(3);

            if($this->input->post()){
            //il y a un post

                $this->form_validation->set_rules('cleUrl','cleUrl','required|numeric|min_length[11]|max_length[20]',
                    array());

                $this->form_validation->set_rules ('cleConf','cleConf','required|numeric|exact_length[6]',
                     array('required' => 'Le champs est vide', 'numeric'=>'Saisie incorrecte','exact_length' => 'Six chiffres !'));

                $this->form_validation->set_rules('newMdp','newMdp','required|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]',
                    array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte'));

                $this->form_validation->set_rules('verifNewMdp','erifNewMdp','required|matches[newMdp]',
                    array('required' => 'Le champs est vide', 'matches' => 'Les mots de passes ne sont pas identiques'));


                    if($this->form_validation->run() != false){
                        // champs valid

                        // attribut les valeurs du post aux clés
                        $cle_conf = $this->input->post('cleConf');
                        $cle_url = $this->input->post('cleUrl');
                        // retourne l'enr de la base fct les clés url et conf
                        $result = $this->Connexion_model->edit_reset_cle($cle_url, $cle_conf);
                        $res = $result->row();
                       
                        if($result->num_rows() == 1){
                            // un enr dans la base 
                            // attribut à $id la valeur de res_adh_id <=> adh_id
                            // attribut valeur du champs newMdp à $mdp
                            $id = $res->res_adh_id;
                            //$mdp = $this->input->post('newMdp',true);
                            //hash du mot de passe 
                            $mdp = password_hash($this->input->post('newMdp', true), PASSWORD_DEFAULT);
                            // update du mot de passe 
                            var_dump($mdp, $id);
                            $data = $this->Connexion_model->modif_password($mdp, $id); 
                            
                                if($data){
                                    // update reussi                                    
                                    // delete la cle reset mot de passe
                                    $this->Connexion_model->delete_reset_cle($id);
                                    // redirection accueil message bonne fin
                                    $messNewPass['messNewPass'] ="Votre mot de passe a été modifié";
                                    $reload['reload'] = "<script> $('#newmdpConfModal').modal('show') </script>";

                                    $this->load->view('head');
                                    $this->load->view('banner');
                                    $this->load->view('header/header_loader');
                                    $this->load->view('modal/connexionModal');
                                    $this->load->view('modal/espacejeuModal');
                                    $this->load->view('modal/newmdpConfModal', $messNewPass);
                                    $this->load->view('accueil/accueil');
                                    $this->load->view('footer');
                                    $this->load->view('script', $reload);

                                }else{
                                    // l'update a échoué                                   
                                    // delete la cle reset mot de passe
                                    $this->Connexion_model->delete_reset_cle($id);
                                    //reirection accueil message erreur
                                    $messNewPass['messNewPass'] = "La modification de votre mot passe a échoué";
                                    $reload['reload'] = "<script> $('#newmdpConfModal').modal('show') </script>";

                                    $this->load->view('head');
                                    $this->load->view('banner');
                                    $this->load->view('header/header_loader');
                                    $this->load->view('modal/connexionModal');
                                    $this->load->view('modal/espacejeuModal');
                                    $this->load->view('modal/newmdpConfModal', $messNewPass);
                                    $this->load->view('accueil/accueil');
                                    $this->load->view('footer');
                                    $this->load->view('script', $reload);
                                }

                        }else{
                        // pas enr dans base
                        // redirection accueil pas de message d'erreur
                        $messNewPass['messNewPass'] = "Vous n'êtes pas enregistré";
                        $reload['reload'] = "<script> $('#newmdpConfModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader');
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('modal/newmdpConfModal', $messNewPass);
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer');
                        $this->load->view('script', $reload);
                        }
                    }else{
                        // champs non valid
                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader');
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('connexion/newPassword',$cle_url);
                        $this->load->view('footer');
                        $this->load->view('script');
                    }
                        
            }else{
             
                //il n'ya pas de post / premier affichage
                $this->load->view('head');
                $this->load->view('banner');
                $this->load->view('header/header_loader');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('connexion/newPassword',$cle_url);
                $this->load->view('footer');
                $this->load->view('script'); 
            }
    }


// DECONNEXION
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('Accueil');
    }

}                          
            
        

