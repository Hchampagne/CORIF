<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_jeu extends CI_Controller {

    public function creation_session()
    {
        if ($this->input->post()){           
            // pas de post
            if($this->input->post('session') === "session"){
                // regles de validation fromulaire
                $this->form_validation->set_rules(
                    'ses_date',
                    'ses_date',
                    'required',
                    array('required' => 'Champs requis')
                );

                $this->form_validation->set_rules(
                    'ses_h_debut',
                    'ses_h_debut',
                    'required',
                    array('required' => 'Champs requis')
                );

                if($this->form_validation->run() ===false){ // validation formulaire non ok
                    // si p s de post premier affichage
                   
                    //affichage de la vue
                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('adherent/creation_session');
                    $this->load->view('script');
                    


                }else{ // validation formulaire ok
                    var_dump($this->input->post());
                    $date = $this->input->post('ses_date',TRUE);
                    $heure = $this->input->post('ses_h_debut', TRUE);

                    $ses_id = $this->Session_model->creat_session($date, $heure);
                    var_dump($ses_id);
                    

                    redirect('session_jeu/creation_session/'.$ses_id);
                   
                }

            }//fin if post session
        


        }Else{
            // il y a un post
           
            //affichage de la vue
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('adherent/creation_session');
            $this->load->view('script');
        }  
        }

           
    }

  