<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

// affichage liste
    public function adherent(){
        $data["liste"] = $this->Adherent_model->select_adherents();
        $this->load->view('head');
        $this->load->view('header');       
        $this->load->view('administration/adherent', $data);    
        $this->load->view('footer');
    }

// modification fiche adhérent
    public function modif($id)  {

        if ($this->input->post()) {
            $data = $this->input->post();
            $this->Corif_model->update_adherents($id, $data);
            redirect(site_url("administration/adherent"));
        } else {           
            $this->load->view('head');
            $this->load->view('header');
            $data['adherent'] = $this->Adherent_model->modif_adherent($id);
            $this->load->view('administration/modif', $data);
            $this->load->view('footer');           
        }      
    }

// liste avec pagination
    public function carte(){  
        
        





        // get current page records

                $params = array();
                $config['base_url'] = site_url().'/administration/carte';
                $config['total_rows'] = $this->Carte_model->get_total();
                $config['per_page'] = 15;
                $config["uri_segment"] = 3;
                
                // custom paging configuration
                $config['num_links'] = 3;
                $config['use_page_numbers'] = true;
                $config['reuse_query_string'] = false;
                
                
                $config['first_link'] = 'Première';
                $config['first_tag_open'] = '<span class="firstlink">';
                $config['first_tag_close'] = '</span>';
                
                $config['last_link'] = 'Derniére';
                $config['last_tag_open'] = '<span class="lastlink">';
                $config['last_tag_close'] = '</span>';
                
                $config['next_link'] = '&gt;';
                $config['next_tag_open'] = '<span class="nextlink">';
                $config['next_tag_close'] = '</span>';
    
                $config['prev_link'] = '&lt;';
                $config['prev_tag_open'] = '<span class="prevlink">';
                $config['prev_tag_close'] = '</span>';
    
                $config['cur_tag_open'] = '<span class="curlink">';
                $config['cur_tag_close'] = '</span>';
    
                $config['num_tag_open'] = '<span class="numlink">';
                $config['num_tag_close'] = '</span>';

                $this->pagination->initialize($config);
                $params["links"] = $this->pagination->create_links();
                $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                // build paging links
                $params["results"] = $this->Carte_model->pagination($config['per_page'], $start_index);


          
                 
     
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('administration/carte', $params);
            $this->load->view('footer');        
    }
    

    
//************************************************************************* */
    public function search()
    {
        $data = $this->input->post("search");
        $model["description"] = $this->Corif_model->search($data);
        $this->load->view('head');
		$this->load->view('header');
		$this->load->view('administration/recherche', $model);
		$this->load->view('footer');
    }

//************************************************************************ */   
    public function recap()
    {
        
        $this->load->view('head');
		$this->load->view('header');
		$this->load->view('administration/recap', $model);
		$this->load->view('footer');
    }


//************************************************************************* */   


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
    public function modif_carte($id)
    {

        if($this->auth->is_admin()){
            if ($this->input->post())
            {

                $data = $this->input->post();
                $this->Corif_model->update_carte($id,$data);
                message("La fiche a ete correctement modifié");
                redirect(site_url("administration/carte"));
            }
            else
            {
                $this->load->view('head');
                $this->load->view('header');
                $data['carte'] = $this->Corif_model->modif_carte($id);
                $this->load->view('administration/modif_carte', $data);
                $this->load->view('footer');
            }
        }
        else{
            message("Vous n'êtes pas autorisé à visualiser cette page !");
            redirect(site_url("connexion/login"));
        }
    }

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







