<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accueil extends CI_Controller
{
    public function modif_metier($id)
    {
        $data = $this->Metier_model->select_metier($id);

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/metier/modif_metier', $data);
        $this->load->view('script');
    }



    
}