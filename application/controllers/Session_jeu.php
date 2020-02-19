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
   public function liste_metier($id){
        $data_s =  $this->Session_model->liste_session();
        $liste_session['liste'] =  $data_s;

        $data_p = $this->Session_model->liste_participant($id);
        $liste_participant['liste'] =  $data_p;

        $data_m = $this->Session_model->liste_metier($id);
        $liste_metier['liste'] =  $data_m;

        $load['reload'] = "<script> $('#listeMetierModal').modal('show') </script>";


        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('session/listeParticipantModal', $liste_metier);
        $this->load->view('session/liste_session', $liste_session);
        $this->load->view('script', $load);

   }
    
} 