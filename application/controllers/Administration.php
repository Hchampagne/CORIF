<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {



// CONTROLE ACCES ADMINISTRATEUR



/*****************/
/*** ADHERENTs ***/
/*****************/

// Liste adhérents
    public function adherent(){

        $data["liste"] = $this->Adherent_model->liste_adherents();
        $this->load->view('head');
        $this->load->view('header');       
        $this->load->view('administration/adherent/liste_adherent', $data);    
        $this->load->view('script');
    }

// Ajout adherent
    public function ajout_adherent(){

        
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('administration/adherent/ajout_adherent');

        $this->load->view('script');
    }

// modificvation adhérent
    public function modif_adherent($id){

        $this->load->view('head');
        $this->load->view('header');
        $data['adherent'] = $this->Adherent_model->select_adherent($id);
        $this->load->view('administration/adherent/modif_adherent', $data);
        $this->load->view('script');
    }

// supprimer adhérent
    public function suppr_adherent(){

    }    


/**************/
/*** CARTES ***/
/**************/

// Liste des cartes
    public function carte(){  
                
        $aliste = $this->Carte_model->liste_carte();
        $aview['liste_carte'] = $aliste;     
     
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('administration/carte/liste_carte', $aview);
        $this->load->view('script');       
    }

// Ajout carte
    public function ajout_carte()
    {
        $liste = $this->Metier_model->liste_metier();

        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('administration/carte/ajout_carte',$liste);
        $this->load->view('script');
    } 
    
// Modification carte
    public function modif_carte($id){

        $data = $this->Carte_model->select_carte($id);
        $liste = $this->Metier_model->liste_metier();

        $this->load->view('head');
        $this->load->view('header');      
        $this->load->view('administration/carte/modif_carte', $data + $liste);
        $this->load->view('script');
    }

// supprimer adherent
    public function suppr_carte(){

    }


/***************/
/*** METIERS ***/
/***************/

// Liste metier
    public function metier(){

        $aliste = $this->Metier_model->liste_metier();
        $aview['liste_metier'] = $aliste;

        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('administration/metier/liste_metier', $aview);
        $this->load->view('script'); 
    }

// Ajout métier
    public function ajout_metier(){
        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('administration/metier/ajout_metier');
        $this->load->view('script');
    }

// modif métier
    public function modif_metier($id){

        $this->load->view('head');
        $this->load->view('header');
        $data['metier'] = $this->Metier_model->select_metier($id);
        $this->load->view('administration/metier/modif_metier', $data);
        $this->load->view('script');
    }

// supprimer metier
    public function suppr_metier(){

    }


/***************/
/*** SESSION ***/  
/***************/ 

// liste  session / formateur à venir 
    public function dashboad()
    {
   
        if($this->auth->is_admin()){
            $this->load->view('head');
            $this->load->view('header');
            $data['formateur'] = $this->Corif_model->formateurs();
            $sessions = $this->db->query("select * from session where date_session >= ?", mdate())->result();
            foreach ($sessions as $session) {
                $session->nb_participant = $this->db->query("select count(*) as compteur from invite where id_session=?", $session->id)->row()->compteur;
                $session->metiers = $this->db->query("select * from metier join contient on metier.id=contient.id_metier where contient.id_session=?", $session->id)->result();
            }
            $data["sessions"] = $sessions;
            $this->load->view('administration/dashboad', $data);
            $this->load->view('footer'); 
        }
        else{
            message("Vous n'êtes pas autorisé à visualiser cette page !");
            redirect(site_url("connexion/login"));
        }
            }


    }







