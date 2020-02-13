<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adherent extends CI_Controller{

    // affichage liste des adhérents + admin
    public function liste(){

        $data = $this->Adherent_model->liste_adherents();
        $this->load->view('head');
        $this->load->view('header/header_loader');     
        $this->load->view('Administration/adherent/liste_adherent', $data);    
        $this->load->view('script');
    }

    // Ajout adherent
    public function ajout(){
       
        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/adherent/ajout_adherent');
        $this->load->view('script');
    }
    
    // Modification adherent
    public function modification($id){
         // recup données pour affichage
         $data = $this->Adherent_model->select_adherent($id);

         $this->load->view('head');
         $this->load->view('header/header_loader');
         $this->load->view('administration/adherent/modif_adherent', $data);
         $this->load->view('script');
    }
}
