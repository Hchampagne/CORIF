<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller{

// controller servant à la connexion des adimlinistrateurs et des adhérents
// comporte les fonctions : inscription 
//                          login
//                          deconnexion
//                          reset mot de passse 




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
                    $insert = $this->Connexion_model->insert_adherents($data);

                    if($insert == 1){                      
                    // insert en base réussi                     
                        // envoi des email confirmation inscrption et attente validation
                        // mail admin pour validation
                        // retour si mail adhérent envoyé

                        // mail adhérent
                        $sendMail = $data['adh_email'];
                        $action = "adhConf";
                        $retour = $this->Mail_model->sendMail($sendMail,$action);
                        // mail admin
                        $action = "adminConf";
                        $this->Mail_model->sendMail($sendMail, $action);

                            if($retour){
                                // affichage inscription et confirmation réussies
                                // modal avec retour a l'accueil
                                $inscription['inscription'] = "Votre inscription est en attente de validation";
                                $envoi['envoi'] = "Un mail de confirmation vous a été envoyé";
                                $titre['titre'] = "Inscription";

                                $this->load->view('head');
                                $this->load->view('header');
                                $this->load->view('modal/inscriptionConfModal',$inscription + $envoi + $titre);
                                $this->load->view('modal/connexionModal');
                                $this->load->view('modal/espacejeuModal');
                                $this->load->view('accueil/accueil');
                                $this->load->view('footer');

                            }else{
                                // affichage inscription réussi / problème envoi mail
                                // modal avec retour a l'accueil 
                                $inscription['inscription'] = "Votre inscription est en attente de validation";
                                $envoi['envoi'] = "Le mail de confirmation a échoué !";
                                $titre['titre'] = "Inscription";

                                $this->load->view('head');
                                $this->load->view('header');
                                $this->load->view('modal/inscriptionConfModal', $inscription + $envoi + $titre);
                                $this->load->view('modal/connexionModal');
                                $this->load->view('modal/espacejeuModal');
                                $this->load->view('accueil/accueil');
                                $this->load->view('footer');
                            }
                    }else{
                        // insert en base a échoué
                        // modal avec retour a l'accueil
                        $incription['inscription'] = "Votre inscription a échouée !";
                        $titre['titre'] = "Inscription";

                        $this->load->view('head');
                        $this->load->view('header');
                        $this->load->view('modal/inscriptionConfModal', $inscription+$titre);
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');;
                        $this->load->view('footer');
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


/***********/
/** LOGIN **/
/***********/

    public function login(){

        if ($this->input->post()) {  // si il y a un post

        // VALIDATION FORMULAIRE
            //test si champ saisie correspond a un mail valide
            $email = $this->input->post('con_login',true);
            $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
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
                'required|html_escape|matches[adherent.adh_mdp]|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]' 
                ,array('required' => 'Le champs est vide','matches'=>'Votre mot de passe est erroné', 'regex_match' => 'La saisie est incorrecte'));

            // recherche enregistrement base donnée en fonction de email/login 
            // html escape sur le champ recupérer du post
            $log = $email = $this->input->post("con_login", true);
            // interroge base de donnée adhérent en fonction de l'eamil ou du login
            $data = $this->Connexion_model->login($log, $email);
            $detail = $data->row();
            // compte le nopmbre d'enregistrement 0 ou 1
            $row = $data->num_rows();

        // test formulaire etr compte enregitré
            if($this->form_validation->run() == false && $row == 0){

                if ($row == 0){
                    
                    $this->session->sess_destroy();

                    // pas enregistré ou erreur login ou email
                    $message['message'] = "Vous n'êtes pas enregistré (erreur login).";
                   
                    $this->load->view('head');
                    $this->load->view('header', $message);
                    $this->load->view('modal/connexionModal');
                    $this->load->view('modal/espacejeuModal');
                    $this->load->view('accueil/accueil');
                    $this->load->view('footer');
                }              
               
            }else{
                //test validation conform                      
                    if(password_verify($this->input->post("con_password",true), $detail->adh_mdp) && ($detail->adh_validation == 1)){
                        // mot de passe vérifié et compte validé  
                    
                        // update de la date de connexion
                        $this->Connexion_model->conn_date($detail->adh_email);
                    
                        // création des valeur de session
                        $this->session->set_userdata('role', $detail->adh_role);
                        $this->session->set_userdata('nom', $detail->adh_nom);
                        $this->session->set_userdata('prenom', $detail->adh_prenom);

                        // redirection page accueil
                        redirect(site_url("Accueil"));

                    } elseif (password_verify($this->input->post("password"), $detail->adh_mdp) && ($detail->adh_validation == 0)) {

                        $this->session->sess_destroy();
                        // mot de passe vérifié et compte non validé 
                        // message compte non validé                 
                        $message['message'] = "Vous êtes enregitré mais votre compte n'est pas validé.";

                        $this->load->view('head');
		                $this->load->view('header', $message);
		                $this->load->view('modal/connexionModal');
		                $this->load->view('modal/espacejeuModal');
		                $this->load->view('accueil/accueil');
		                $this->load->view('footer');
                    

                    }else{
                        // mot de passe erroné
                        // message mot de passe incorrecte
                        $this->session->sess_destroy();

                        $message['message'] = "Votre mot de passe n'est pas conforme.";
                        
                        $this->load->view('head');
		                $this->load->view('header', $message);
		                $this->load->view('modal/connexionModal');
		                $this->load->view('modal/espacejeuModal');
		                $this->load->view('accueil/accueil');
		                $this->load->view('footer');
                                          
                    }                              
                }
            } //fin test validation conforme  
    }
   
    function loginInvite() {

        if ($this->input->post()){  //si post  
            
            
            // manque control formulaire

            //recup valeur du post
            $nom = $this->input->post("nom",true);
            $prenom = $this->input->post("prenom",true);
            $mail = $this->input->post("email",true);

            // interroge la base de donnée table invité pour le nom
            $data= $this->Connexion_model->participantb($nom, $prenom, $mail);

            // recup id de la session, date de session, email
            $idsession = $data->id_session;
            $datesession = $data->date_session;
            $email= $data->email;

            // interroge la base de donnée
            $model= $this->Corif_model->loginjeu($email);
            $detail = $model->row();
                        

            if ($model->num_rows() == 0){
               
                message("Vous n'êtes pas enregistré !!");
                redirect(site_url("accueil"));
                
            }else{
                if ($data->email == $email && $today == $datesession){    

                    $id=$data->id;
                    $this->auth->loginjeu($nom, $email);
                    $message ="Bienvenue !!";
                    Redirect(site_url('jeu/index/').$idsession);
                }else{
                             
                    $message ="Merci de vérifier les identifiants de connexion reçu par Email ou la date et heure de connexion";
                    redirect(site_url("accueil"));
                    }
                }
        }else{
       
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('jeu/login');
        $this->load->view('footer');
    }
}

// DECONNEXION
    public function deconnexion(){       
            $this->session->sess_destroy();
            redirect('Accueil');
        }


// RESET MOT DE PASSE
        public function reset()      
        {           
            if($this->input->post())          
            {               
               $mail= $this->input->post();              
               $data= $this->Corif_model->create_key($mail);               

                $this->email->from('noreply@jerem1formatic.fr', 'Corif');
                $this->email->to($mail);
                
                $this->email->subject('Réinitialisation de mots de passe');
                $this->email->message('<a href="https://dev.amorce.org/corif/index.php/administration/newpassword/'.$data.'"><strong>Réinitialisation de mot de passe</strong></a>');

                $this->email->send();                
                redirect('accueil');
                $message('Un Email avec un lien valable 24H vous a été envoyé !');
            }       
            else
            {
                $this->load->view('head');
                $this->load->view('header');
                $this->load->view('connexion/reset');
                $this->load->view('footer');   
            }
        }

}