<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {


/*****************/
/*** ADHERENTs ***/
/*****************/

// Lstes de sadhérents
    public function adherent(){
       
        $data = $this->Adherent_model->liste_adherents();
        var_dump($data);
        $this->load->view('head');
        $this->load->view('header/header_loader');     
        $this->load->view('Administration/adherent/liste_adherent', $data);    
        $this->load->view('script');
      
    }

// ajout adherent
    public function ajout_adherent(){

        if($this->input->post()){
            // il y a un post

            // Règles devalidation formulaires
            $this->form_validation->set_rules('adh_nom','adh_nom','required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_prenom','adh_prenom','required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_organisme','adh_rganisme','required|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champ est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_email','adh_email','required|valid_email|is_unique[adherent.adh_email]|max_length[150]',
                array('required' => 'Le champs est vide', 'valid_email' => 'Votre email est incorrecte','is_unique'=>'Déjà utilisé', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_login','adh_login','required|is_unique[adherent.adh_email]|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[100]',
                array('required' => 'Le champs est vide','is_unique'=>'Déjà utilisé', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));


            if($this->form_validation->run() != false){
                // Validation formulaire ok
                $data = $this->input->post(null,true);
                $resultat = $this->Adherent_model->insert_adherent($data);
                // def message de la modal de confirmation
                if($resultat){
                    $messModal['mess'] = "L'ajout a été effectué.";
                }else{
                    $messModal['mess'] = "L'ajout a échoué.";
                }
                // chargement modal   
                $reload['reload'] = "<script> $('#mailConfModal').modal('show') </script>";    

                $this->load->view('head');
                $this->load->view('header/header_loader');
                $this->load->view('modal/insertAdhConfModal', $messModal);
                $this->load->view('administration/adherent/ajout_adherent');
                $this->load->view('script', $reload);

            }else{
                // Validation formulaire non ok
                // re affichage formulaire
                
                $this->load->view('head');
                $this->load->view('header/header_loader');
                $this->load->view('administration/adherent/ajout_adherent');
                $this->load->view('script');
            }
        }else{
            // pas de post 
            // premier affichage
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('administration/adherent/ajout_adherent');
            $this->load->view('script');
        }

        
    }

// modification adhérent
    public function modif_adherent($id){

        if($this->input->post()){
            // set les règles de validation

            $this->form_validation->set_rules('adh_nom','adh_nom','required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_prenom','adh_prenom','required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_organisme','adh_rganisme','required|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champ est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_email','adh_email','required|valid_email|max_length[150]',
                array('required' => 'Le champs est vide', 'valid_email' => 'Votre email est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('adh_login','adh_login','required|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[100]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            // AJOUTE DES REGLES POUR LES DOUBLONS SI MODIFICATION DE L'EMAIL ET/OU DU LOGIN
            
            // enregistrement row adherent modif
            $data = $this->Adherent_model->adherent($id);  

            // pour email
            if($this->input->post('adh_email') != $data->adh_email ){
                // ajoute regle is_unique mail modifié
                $this->form_validation->set_rules('adh_email','adh_email','is_unique[adherent.adh_email]',array('is_unique'=>'Déjà utilisé'));
            }
            // pour login
            if ($this->input->post('adh_login') != $data->adh_login) {
                // ajoute regle is_unique mail modifié
                $this->form_validation->set_rules('adh_login', 'adh_login', 'is_unique[adherent.adh_login]', array('is_unique' => 'Déjà utilisé'));
            }
               

                // VALIDATION FORMULAIRE
                if ($this->form_validation->run() != false){
                // validation de formulaire OK
                    // html escape sur le post$thius->input->post(), 
                    $data = $this->input->post(null, true);
                    // envoi au model pour mis a jour base                 
                    $update=$this->Adherent_model->modif_adherent($id, $data);

                        // prepare les message de confirmation mail
                        if ($update && $this->input->post('adh_validation') === "1"){
                            // envoi message validation effectué
                            $message =  "Bonjour, " . "\r\n\n" .
                                        "Votre compte sur le Site CORIF est modifié."."\r\n".
                                        "Votre inscription est validé."."\r\n\n".                                                                              
                                        "L'équipe CORIF";
                        }else{
                            // envoi message compte modifié                          
                            $message =  "Bonjour, " . "\r\n\n" .
                                        "Votre compte sur le Site CORIF est modifié." . "\r\n" .
                                        "Vorte inscription n'est pas validé." . "\r\n\n" .
                                        "L'équipe CORIF";
                        }
                    // définition paramètres pour envoi email   
                    $sendMail = $this->input->post('adh_email');
                    $action = "validation";
                    // envoi du email de confirmation
                    $envoi = $this->Mail_model->sendMail($sendMail, $action, $message);
                    
                        if($envoi){
                            // envoie mail réussi
                            $messModal['mess'] = "L'émail de modification a été envoyé ." ;                                                      
                        }else{
                            // envoie mail échoué
                            $messModal['mess'] = "L'émail de modification n'a pas été envoyé !";                                                      
                        }

                    // chargement modal confirmation envoi mail  
                    $reload['reload'] = "<script> $('#mailConfModal').modal('show') </script>";    

                    // retour à la liste gestion adherent
                    $data = $this->Adherent_model->liste_adherents();                    
                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('modal/mailConfModal', $messModal);                   
                    $this->load->view('administration/adherent/liste_adherent', $data);
                    $this->load->view('script', $reload); 

                }else{
                // validation formulaire non ok    
                // recharge le formulaire 
                redirect('Adherent/modification/'.$id);  
                }
        }else{
            // pas depost 
            // premier affichage
            redirect('Adherent/modification/'.$id);         
        }
    }

// supprimer adhérent
    public function suppr_adherent($id){
        $this->Adherent_model->suppr_adherent($id);
        redirect('Administration/adherent');
    }    


/**************/
/*** CARTES ***/
/**************/
// Liste des  cartes
    public function carte(){
        // liste des cartes
        $aliste = $this->Carte_model->liste_carte();
        $aview['liste_carte'] = $aliste;         
        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/carte/liste_carte', $aview);
        $this->load->view('script'); 
    }

// Ajout carte
    public function ajout_carte()
    {
        if($this->input->post()){
            // il y a un post

            // Règles de valkidation
            $this->form_validation->set_rules('car_numero','car_numero','required|regex_match[/^[A-Z][ ][0-9]{1,8}$/]|is_unique[carte.car_numero]|max_length[10]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte','is_unique'=>'Déjà utilisé', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('car_met_id','car_met_id','required|regex_match[/^[0-9]+$/]|max_length[10]',
                array('required' => 'Sélectionner une option', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('car_type','car_type','required|regex_match[/^[a-z]+$/]|max_length[10]', 
                array('required' => 'Sélectionner une option', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('car_description','car_description','required|regex_match[/^[^<>\/]+[\w\W]{1,500}$/]|max_length[500]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            if($this->form_validation->run() != false){
                // validation formulaire ok
                $data = $this->input->post(null,true); //filtre html
                // insertion DB
                $this->Carte_model->ajout_carte($data);

                // recharge le formulaire
                // select liste des métiers
                $liste = $this->Metier_model->liste_metier();
                $this->load->view('head');
                $this->load->view('header/header_loader');
                $this->load->view('administration/carte/ajout_carte', $liste);
                $this->load->view('script');

            }else{
                // validation formulaire non ok
                // select liste des métiers
                $liste = $this->Metier_model->liste_metier();
                $this->load->view('head');
                $this->load->view('header/header_loader');
                $this->load->view('administration/carte/ajout_carte', $liste);
                 $this->load->view('script');              
            }
        }else{
            // pas de post chargement premier démarrage
            // select liste des métiers
            $liste = $this->Metier_model->liste_metier();
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('administration/carte/ajout_carte', $liste);
            $this->load->view('script');
        }       
    } 
    
// Modification carte
    public function modif_carte($id){

        if($this->input->post()){
            // post existant

            // Règles de validation

            $this->form_validation->set_rules('car_numero','car_numero','required|regex_match[/^[A-Z][ ][0-9]{1,8}$/]|max_length[10]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));
                
                // une règle is_unique si on modifie le numéro de la carte
                // evite les doublons et une erreur DB colonne index unique 
                $data = $this->Carte_model->carte($id);
                if($this->input->post('car_numero') != $data->car_numero){
                    $this->form_validation ->set_rules('car_numero', 'car_numero','is_unique[carte.car_numero]',
                    array('is_unique'=>'Déjà utilisé'));
                }

            $this->form_validation->set_rules('car_met_id','car_met_id','required|numeric|max_length[10]',
                array('required' => 'Sélectionner une option', 'numeric' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('car_type','car_type','required|in_list[metier,parcours]|max_length[10]',
                array('required' => 'Sélectionner une option', 'in_list' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('car_description','car_description','required|regex_match[/^[^<>\/]+[\w\W]{1,500}$/]|max_length[500]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte','max_length' => 'Saisie trop longue'));    

           
                if($this->form_validation->run() != false){

                    // validation formulaire ok
                    // recup l'id de input post filtre html 
                    $data= $this->input->post(null, true);
                    //$id = $this->input->post('car_id',true);

                    $this->Carte_model->modif_carte($id,$data);
                    // Liste des cartes
                    redirect('Administration/carte');

                }else{
                    // validation formulaire non ok
                    // recharge le formulaire
                    // données de la carte
                    $data = $this->Carte_model->select_carte($id);
                    // select liste des métiers
                    $liste = $this->Metier_model->liste_metier();

                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('administration/carte/modif_carte', $data + $liste);
                    $this->load->view('script');
                }
        }else{
            // pas de post / premier affichage
            // données de la carte
            $data = $this->Carte_model->select_carte($id);
            // select liste des métiers
            $liste = $this->Metier_model->liste_metier();

            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('administration/carte/modif_carte', $data + $liste);
            $this->load->view('script');
        }
    }

// Supprimer carte
    public function suppr_carte($id){
        $this->Carte_model->suppr_carte($id);
        redirect('Administration/carte/');
    }


/***************/
/*** METIERS ***/
/***************/

// Liste metier
    public function metier(){
        $aliste = $this->Metier_model->liste_metier();       
        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/metier/liste_metier', $aliste);
        $this->load->view('script'); 
    }


// Ajout métier
    public function ajout_metier(){

        if($this->input->post()){
            // il y a un post

            // règles de validation formulaire
            $this->form_validation->set_rules('met_metier','met_metier','required|regex_match[/[A-Za-zéèçàäëï()]+([\s-][A-Za-zéèçàäëï()]+)*$/]|max_length[50]',array('required'=>'Le champs est vide','regex_match'=>'La saisie est incorrecte','max_length'=>'Saisie trop longue'));

            $this->form_validation->set_rules('met_prenom','met_prenom','required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('met_age','met_age','required|regex_match[/^[0-9]{2,3}$/]|max_length[3]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

                if($this->form_validation->run() != false){
                    // validation formulaire ok
                   
                    // insertion DB
                    $data = $this->input->post(null,true);
                    $this->Metier_model->ajout_metier($data);

                    //retour formulaire pour une nouvelle entrée
                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('administration/metier/ajout_metier');
                    $this->load->view('script');

                }else{
                    // validation formulaire non ok
                    // re affichage du formulaire
                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('administration/metier/ajout_metier');
                    $this->load->view('script');
                }
        }else{
            // pas de post 
            // premier affichage
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('administration/metier/ajout_metier');
            $this->load->view('script');
           
        }       
    }

// modif métier
    public function modif_metier($id){

        if($this->input->post()){
            // li y a un post

            // règles de validation formulaire
            $this->form_validation->set_rules('met_metier','met_metier','required|regex_match[/[A-Za-zéèçàäëï()]+([\s-][A-Za-zéèçàäëï()]+)*$/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('met_prenom','met_prenom','required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('met_age','met_age','required|regex_match[/^[0-9]{2,3}$/]|max_length[3]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));


            if($this->form_validation->run() != false){
                // validation formulaire ok
                //insertion DB filtre post html_escape
                $data = $this->input->post(null,true);
                $this->Metier_model->modif_metier($id,$data);
                // retour à la liste
                redirect('Administration/metier/');

            }else{
                // validation formulaire non ok
                // re affiche le formulaire
                $data = $this->Metier_model->select_metier($id);

                $this->load->view('head');
                $this->load->view('header/header_loader');
                $this->load->view('administration/metier/modif_metier', $data);
                $this->load->view('script');  
            }
        }else{
            // il n'y a pas de post
            // premier affichage du formulaire
            $data = $this->Metier_model->select_metier($id);

            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('administration/metier/modif_metier', $data);
            $this->load->view('script');      
        }     
    }

// supprimer metier
    public function suppr_metier($id){
        $this->Metier_model->suppr_metier($id);
        redirect('Administration/metier');
    }


/***************/
/*** SESSION ***/  
/***************/ 

// liste  session / formateur à venir 
    public function dashboad()
    {
   
        if($this->auth->is_admin()){
            $this->load->view('head');
            $this->load->view('header');
            $data['formateur'] = $this->Corif_model->formateurs();
            $sessions = $this->db->query("select * from session where date_session >= ?", mdate())->result();
            foreach ($sessions as $session) {
                $session->nb_participant = $this->db->query("select count(*) as compteur from invite where id_session=?", $session->id)->row()->compteur;
                $session->metiers = $this->db->query("select * from metier join contient on metier.id=contient.id_metier where contient.id_session=?", $session->id)->result();
            }
            $data["sessions"] = $sessions;
            $this->load->view('administration/dashboad', $data);
            $this->load->view('footer'); 
        }
        else{
            message("Vous n'êtes pas autorisé à visualiser cette page !");
            redirect(site_url("connexion/login"));
        }
            }


    }







