<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metier extends CI_Controller {
    
    // affichage liste
    public function liste(){

        $aliste = $this->Metier_model->liste_metier();       

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/metier/liste_metier', $aliste);
        $this->load->view('script'); 
    }

    //  affichage vue modification
	public function modification($id){

        $data = $this->Metier_model->select_metier($id);

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/metier/modif_metier', $data);
        $this->load->view('script');
    }

    // affichage vue ajout
    public function ajout(){
        
        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/metier/ajout_metier');
        $this->load->view('script');
    }

}
