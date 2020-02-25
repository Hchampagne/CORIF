<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metier extends CI_Controller {

// liste metier(s)
    public function liste_metier(){

    }

// creation/modification metier pour session
    public function modificationMetier_session($session_id){

        $liste_metier = $this->Metier_model->liste_metier($session_id);
       
        $data = $this->Metier_model->listeMetier_session($session_id);
        $liste['liste'] = $data;
        $session['session'] = $session_id;



        if ($this->input->post()) {

            $id_metier = $this->input->post(NULL,TRUE);
            var_dump($id_metier);
            $this->Metier_model->metierAjout_session($session_id, $id_metier); 

            redirect('Metier/modificationMetier_session/'.$session_id);

        } else {
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('metier/modification_metier', $liste_metier + $liste + $session);
            $this->load->view('script');
        }
    }

// suppression metier de la liste metier
    public function suppressionMetier_session( $session_id, $metier_id){

        $this->Metier_model->suppressionMetier_session($session_id,$metier_id);
        redirect('Metier/modificationMetier_session/'.$session_id);
    }


}



