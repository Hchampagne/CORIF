<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carte extends CI_Controller {

    
    // liste affichage vue
    public function liste(){
        // liste des cartes
        $aliste = $this->Carte_model->liste_carte();
        $aview['liste_carte'] = $aliste;     
     
        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/carte/liste_carte', $aview);
        $this->load->view('script'); 

    }

    // Affichage vue modification
	public function modification($id){

         // données de la carte
         $data = $this->Carte_model->select_carte($id);
         // select liste des métiers
         $liste = $this->Metier_model->liste_metier();

         $this->load->view('head');
         $this->load->view('header/header_loader');
         $this->load->view('administration/carte/modif_carte', $data + $liste);
         $this->load->view('script');
    }

    // Affichage vue ajout
    public function ajout(){
        
        //select liste des métiers
        $liste = $this->Metier_model->liste_metier();

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('administration/carte/ajout_carte', $liste);
        $this->load->view('script');
    }

}
