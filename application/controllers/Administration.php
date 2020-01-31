<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

    

/************************************************************************************ */
    public function adherent()
    {
        $data["liste"] = $this->Corif_model->select_adherents();
        $this->load->view('head');
        $this->load->view('header');

        if($this->auth->is_logged() == TRUE){
            if($this->auth->is_admin() == TRUE){
                $this->load->view('administration/adherent', $data);
            }
            else{
                $this->load->view('accueil/accueil');  
            }
        }
        
        else{
            $this->load->view('accueil/accueil');  
            }
        	$this->load->view('footer');
    }  

    public function suppr($id)
    {           
        $data =$this->input->post();
        $data['adherent'] = $this->Corif_model->delete_adherents($id);
        redirect(site_url("administration/adherent"));
            
    }


//***************************************************************************************** */
    public function newpassword()
{
    // attribut la à $tok la valeur pasée par url
    $tok = $this->uri->segment(3);

    // recup la cle dans la table adherent  
    $user = $this->Adherent_model->select_adherent("adh_cle", $tok);
  

        $this->load->view('head');
        $this->load->view('header');
        $this->load->view('administration/mdp');
        $this->load->view('footer');

        if($tok == $user->adh_cle){ 

        }else{


        }


    /*
    if ($tok && $user) {
        $ttc = substr($tok, 10, -10)/10000; 
        
        if (($ttc+(3600*24))>(microtime(true))) {
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Mot de passe', 'required');
            $this->form_validation->set_rules('cpassword', 'Mot de passe', 'required|matches[password]');

            if ($this->input->post() && $this->form_validation->run()) {
                if ($user) {
                    $data = array(
                        'key' => '',
                        'mdp' => password_hash($this->input->post("password"), PASSWORD_DEFAULT)
                    );
                    $this->db->update("adherent", $data, "id=".$user->id);
                    
                    message("Votre mot de passe a été changé !");
                    redirect(site_url("connexion/login"));
                }
            }
            else {
                $this->load->view('head');
                $this->load->view('header');
                $this->load->view('administration/mdp');
                $this->load->view('footer');
                 
            }
        } 
        else {
            message("Le lien de reinitialisation de mot de passe n'est valable que 24 heures");
            redirect(site_url("accueil"));
        }
    }
    else {
        message("Le lien de reinitialisation de mot de passe n'est valable que 24 heures");
        redirect(site_url("accueil"));
    }
*/
}


//****************************************************************************************** */
    public function carte()
    {
        

        if ($this->auth->is_logged()) {

            $params = array();
            $limit_per_page = 20;
            $total_records = $this->Cards->get_total();
    
            if ($total_records > 0) 
            {
                // get current page records
                
                // var_dump($params);
                // $this->output->enable_profiler(true);
                $config['base_url'] = site_url() . '/administration/carte';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit_per_page;
                $config["uri_segment"] = 3;
                
                // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = FALSE;
                $config['reuse_query_string'] = TRUE;
                
                
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
                $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                // build paging links
                $params["links"] = $this->pagination->create_links();
                $params["results"] = $this->Cards->get_current_page_records($limit_per_page, $start_index);
            }
            
            $this->load->view('head');
            $this->load->view('header');
            $this->load->view('administration/carte', $params);
            $this->load->view('footer');
        }
        else  {
            message("Vous n'êtes pas autorisé à visualiser cette page !");
            redirect(site_url("connexion/login"));
        }
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
    public function modif($id)
    {
        if ($this->input->post())
        {
            $data = $this->input->post();
            $this->Corif_model->update_adherents($id,$data);
            redirect(site_url("administration/adherent"));
        }
        else
        {
            if($this->auth->is_admin() == TRUE){
                $this->load->view('head');
                $this->load->view('header');
                $data['adherent'] = $this->Corif_model->modif_adherents($id);
                $this->load->view('administration/modif', $data);
                $this->load->view('footer');
            }
            else  {
                message("Veuillez vous identifier !!");
                redirect(site_url("connexion/login"));
            }
        }
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







