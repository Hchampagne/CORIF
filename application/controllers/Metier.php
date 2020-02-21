<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metier extends CI_Controller {

    // liste metier(s)
    public function liste_metier(){

    }

    public function ajoutMetier_session(){
        
        $liste_metier['liste'] = $this->Metier_model->liste_metier();



        if($this->input->post()){




        }else{
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('metier/ajout_metier', $liste_metier);
            $this->load->view('script');
        }


    }

    public function modificationMetier_session($session_id){
       
        $data = $this->Metier_model->liste_metier();
        $liste_metier['liste'] = $data;
        $session['session'] = $session_id;




        if ($this->input->post()) {
        } else {
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('metier/modification_metier', $liste_metier + $session);
            $this->load->view('script');
        }
    }


}



