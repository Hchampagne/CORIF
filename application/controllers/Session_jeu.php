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

// liste métier
   public function liste_metier(){

     $data_s =  $this->Session_model->liste_session();              
     $liste_session['liste'] =  $data_s;

      // interoge DB pour liste metier
      
        $load['reload'] = "<script> $('#listeMetierModal').modal('show') </script>";


        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('session/listeMetierModal');
        $this->load->view('session/liste_session', $liste_session);
        $this->load->view('script', $load);

   }

// ajout session
   public function creation_session(){

      if($this->input->post()){

         // formulaire validation

         $data = $this->input->post(NULL,true);

         $session_id = $this->Session_model->creation_session($data);
         $this->session->session_id = $session_id;
      
         redirect('Invite/creation_invite/');

      }else{
         // pas de post / premier affichage

         $this->load->view('head');
         $this->load->view('header/header_loader');
         $this->load->view('session/creation_session');
         $this->load->view('script');
      }

    
      
   }





// Suppression de session
   public function suppr_session($id){

      $this->Session_model->supprime_session($id);

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
    
} 