<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accueil extends CI_Controller
{
    public function metier()
    {
        // validation formulaire ok
        //liste des métiers
        $liste = $this->Metier_model->liste_metier();

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/carte/ajout_carte', $liste);
        $this->load->view('script');
    }



    
}