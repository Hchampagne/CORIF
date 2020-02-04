<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {


//ADHERENT
// affichage liste
    public function adherent(){
        $data["liste"] = $this->Adherent_model->liste_adherents();
        $this->load->view('head');
        $this->load->view('header');       
        $this->load->view('administration/adherent/liste_adherent', $data);    
        $this->load->view('footer');
    }

// modification fiche adhérent
    public function modif($id)  {
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->Corif_model->update_adherents($id, $data);
            redirect(site_url("administration/adhrent/liste_adherent"));
        } else {           
            $this->load->view('head');
            $this->load->view('header');
            $data['adherent'] = $this->Adherent_model->modif_adherent($id);
            $this->load->view('administration/adherent/modif_adherent', $data);
            $this->load->view('footer');           
        }      
    }

// CARTES
// liste des cartes
    public function carte(){  
                
            $aliste = $this->Carte_model->liste_carte();
            $aview['liste_carte'] = $aliste;     
     
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('administration/carte/liste_carte', $aview);
            $this->load->view('footer');        
    }

//modif carte 
    public function modif_carte($id){      
                      
                $this->load->view('head');
                $this->load->view('header');
                $data['carte'] = $this->Carte_model->modif_carte($id);
                $this->load->view('administration/carte/modif_carte', $data);
                $this->load->view('footer');
            }       
    
    

  


/************************************************************************ */
    public function ajout_metier()
    {
        $this->output->enable_profiler(TRUE);   
        if ($this->input->post())
        {
            
            $data= $this->input->post();
            $this->Corif_model->insert_metier($data);
            redirect('administration/carte');

        }
        else
        {
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('administration/ajout_metier');
            $this->load->view('footer');
        }

    }

    public function ajout_carte()
    {
    
        if ($this->input->post())
        {
            $metier= $this->input->post('id_metiers');
            $data= $this->input->post();
            $this->Corif_model->insert_carte($data);
            redirect('administration/carte');
            
        }

    else{
        $this->load->view('head');
        $this->load->view('header');
        $model['metier']= $this->Corif_model->liste_prenom();
        if($this->auth->is_logged() == TRUE){
            if($this->auth->is_admin() == TRUE){
                
                $this->load->view('administration/ajoutcarte', $model);
            }
            else{
                message("Vous n'êtes pas autorisé à visualiser cette page !");
                $this->load->view('connexion/login');
            }
    }
        else{
            message("Vous n'êtes pas autorisé à visualiser cette page !");
            $this->load->view('connexion/login');  
        }

		    $this->load->view('footer');
        }
    }

//******************************************************************************* */
  

    public function delete($id)
    {

            if($this->auth->is_admin()){
                $data =$this->input->post();
                $data['carte'] = $this->Corif_model->delete_carte($id);
                redirect(site_url("administration/carte"));
            }

            else{
                redirect(site_url("administration/carte"));
            }
    }



    
// liste  session / formateur à venir 
    public function dashboad()
    {
        $this->output->enable_profiler(FALSE);

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







