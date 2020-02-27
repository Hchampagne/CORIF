<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_jeu extends CI_Controller {

    public function liste_session()
    {
        // liste des sessions 
        $data =  $this->Session_model->liste_session();              
        $liste_session['liste'] =  $data;
            
        //affichage de la vue
        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('session/listeParticipantModal');
        $this->load->view('session/liste_session', $liste_session);
        $this->load->view('script');          
    }

// liste participant pour modal
   public function liste_participant($id)
   {
        $data_s =  $this->Session_model->liste_session();              
        $liste_session['liste'] =  $data_s;

        $data_p = $this->Session_model->liste_participant($id);
        $liste_participant['liste'] =  $data_p;

        $load['reload'] = "<script> $('#listeParticipantModal').modal('show') </script>";

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('session/listeParticipantModal',$liste_participant);
        $this->load->view('session/liste_session', $liste_session);
        $this->load->view('script',$load);
   }

// liste métier modal pour liste session
   public function liste_metier($session_id){

     $data_s =  $this->Session_model->liste_session();              
     $liste_session['liste'] =  $data_s;

     $liste_metier['liste'] = $this->Metier_model->listeMetier_session($session_id);

      // interoge DB pour liste metier
      
        $load['reload'] = "<script> $('#listeMetierModal').modal('show') </script>";

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('session/listeMetierModal', $liste_metier);
        $this->load->view('session/liste_session', $liste_session);
        $this->load->view('script', $load);

   }

// ajout session
   public function creation_session(){

         $session['session'] = "SESSION";

         if($this->input->post()){

            var_dump($this->input->post());

         // formulaire validation
            $this->form_validation->set_rules('ses_d_session','ses_d_session',
            'required|max_length[10]|regex_match[/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/]', 
               array('required' => 'Champs vide','regex_match'=>'Saisie incorrecte','max_length'=> 'Saisie trop longue'));

            $this->form_validation->set_rules('ses_h_debut','ses_h_debut','required|max_length[5]|regex_match[/^[0-9]{2}:[0-9]{2}$/]',
               array('required'=>'Champs vide','regex_match' => 'Saisie incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('ses_h_fin','ses_h_fin','required|max_length[5]|regex_match[/^[0-9]{2}:[0-9]{2}$/]',
               array('required' => 'Champs vide','regex_match' => 'Saisie incorrecte', 'max_length' => 'Saisie trop longue'));

            if($this->form_validation->run() != false){

               $data = $this->input->post(NULL, true);
               $date = date("Y-m-d", strtotime($this->input->post('ses_d_session', TRUE)));
               $data['ses_d_session'] = $date;

               $session_id = $this->Session_model->creation_session($data);

               redirect('Invite/modificationListe_invite/' . $session_id);


            }else{
            $session['session'] = "coucou";

               $this->load->view('head');
               $this->load->view('header/header_loader');
               $this->load->view('session/creation_session', $session);
               $this->load->view('script');
            }
      }else{
         // pas de post / premier affichage

         $this->load->view('head');
         $this->load->view('header/header_loader');
         $this->load->view('session/creation_session', $session);
         $this->load->view('script');
      }        
   }


   
// modification de session
   public function modification_session($session_id){
      // set validation à o modification 
      $this->Session_model->validationSession_session($session_id, '0');
      // recuop paramètrage de la session
      $session['session'] = $this->Session_model->session($session_id);
      

      if($this->input->post()){
         // formulaire validation
         $this->form_validation->set_rules('ses_d_session','ses_d_session',
            'required|max_length[10]|regex_match[/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/]',
            array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Saisie trop longue'));

         $this->form_validation->set_rules('ses_h_debut','ses_h_debut','required|max_length[5]|regex_match[/^[0-9]{2}:[0-9]{2}$/]',
            array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Saisie trop longue'));

         $this->form_validation->set_rules('ses_h_fin','ses_h_fin','required|max_length[5]|regex_match[/^[0-9]{2}:[0-9]{2}$/]',
            array('required' => 'Champs vide', 'regex_match' => 'Saisie incorrecte', 'max_length' => 'Saisie trop longue'));

            if($this->form_validation->run() != false){
               // validation formulaire ok
               $data = $this->input->post(NULL, TRUE);

               $date = date("Y-m-d", strtotime($this->input->post('ses_d_session', TRUE)));
               $data['ses_d_session'] = $date;
               $this->Session_model->modification_session($session_id, $data);
               redirect('Invite/modificationListe_invite/' . $session_id);
            }else{
               // validation formulaire non ok
               $this->load->view('head');
               $this->load->view('header/header_loader');
               $this->load->view('session/modification _session', $session);
               $this->load->view('script');           
            }
      }else{
         // pas de post premier affichage
         $this->load->view('head');
         $this->load->view('header/header_loader');
         $this->load->view('session/modification _session', $session);
         $this->load->view('script');
      }
   }


// Validation d'une session
   public function validation_session($session_id){
      // paramètres de la session
      $data =$this->Session_model->session($session_id);

      if($data->ses_validation == '1'){ 
         // session valider les mail ont été envoyés
         // redirection vue liste session
         Redirect('Session_jeu/liste_session/');

      }else{
         // liste des invité-e(s)
         $invite = $this->Session_model->liste_participant($session_id);
         $envoi = 0;
         $compteur = 0;

         //envoi mail invitation
         foreach($invite as $invite){
            $sendmail = $invite->inv_email;
            $action = "invitation";
            $message = "Bonjour ". $invite->inv_nom." ". $invite->inv_prenom."\r\n\n"
                        ."Vous êtes invité-e le : ".$data->ses_d_session." à ".$data->ses_h_debut."\r\n"
                        ."Cliquez sur le lien pour jouez : ".site_url('Espace_jeu/connexion_jeu/'.$session_id)."\r\n\n"
                        ."Cordialement"         ;

            $retour =  $this->Mail_model->sendmail($sendmail, $action, $message);
            $envoi = $envoi + $retour; 
            $compteur = $compteur + 1 ;                                                               
         }

         if($envoi !== $compteur){ 
            // problème envoi mail
            Redirect('Session_jeu/liste_session/');

         }else{
            // tous les emails ont été enoyés
            $this->Session_model->validationSession_session($session_id, '1');
            Redirect('Session_jeu/liste_session/');
         }        
      }
   }



// Suppression de session
   public function supprime_session($id){

      $this->Session_model->supprime_session($id);

      // liste des sessions 
     redirect('Session_jeu/liste_session');
      
   }
    
} 