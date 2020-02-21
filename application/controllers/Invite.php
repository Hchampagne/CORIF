<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Invite extends CI_Controller {

//liste des invité-e(s)
    public function liste_invite(){

       $data = $this->Invite_model->liste_invite();

       $liste_invite['liste'] = $data;

        $this->load->view('head');
        $this->load->view('header/header_loader');
        $this->load->view('invite/liste_invite', $liste_invite);
        $this->load->view('script');
    }


// Création invité-e(s)
    public function creation_invite($session_id){

        $session['session'] = $session_id;
        $liste_invite['liste'] = $this->Invite_model->liste_invite($session_id);
    
        if($this->input->post()){ // si bouton 
  
            // regle de validation formulaire
            $this->form_validation->set_rules('inv_email', 'inv_mail', 
                'required|valid_email|max_length[150]|is_unique[invite.inv_email]',   
                array('required'=>'Le champs est vide', 'is_unique'=>'Déjà utilisé','valid_email'=>'Votre email est incorrecte', 'max_length' => 'Saisie trop longue'));

            $this->form_validation->set_rules('inv_nom','inv_nom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',     
                array('required'=>'Le champs est vide' , 'regex_match'=>'La saisie est incorrecte','max_length'=>'Saisie trop longue')); 

            $this->form_validation->set_rules('inv_prenom', 'inv_Prenom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]', 
                array('required'=>'Le champs est vide', 'regex_match'=>'La saisie est incorrecte', 'max_length' => 'Saisie trop longue'));    

                if($this->form_validation->run() != false){//validation ok
                  
                    $data = $this->input->post(NULL,TRUE);
                    $this->invite_model->ajout_invite($session_id, $data);
                    redirect ('Invite/creation_invite/'.$session_id);                                  
                    
                }else {//validation non ok
                    // si pas de post premier affichage                  
                    //affichage de la vue
                    
                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('invite/creation_invite',$liste_invite+ $session);
                    $this->load->view('script');  
                }   
                                     
            }else{ //pas de post  
                // si pas de post premier affichage               
                //affichage de la vue
               
                $this->load->view('head');
                $this->load->view('header/header_loader');             
                $this->load->view('invite/creation_invite', $liste_invite+$session);
                $this->load->view('script'); 
            }            
        }
        

// insertion dans la base de donnée click enregitrer
        public function ajout_invite($session_id){           

            //$adh_id = $this->session->adherent_id;
            $liste = $this->session->liste;
            $data = $this->Invite_model->ajout_invite($session_id);

            if($data == count($liste)){
                // insertion DB réussie
                // supprime le tableau en session
                // retour a l'accueil
                $this->session->unset_userdata('liste');
                redirect('session_jeu/liste_session/');

            }else{
                //insertion DB échouée retour liste
                redirect('Invite/creation_invite/');
            }                      
        }

//  suppression dans la liste invité-e(s) formulaire ajout pour session
      public function deleteParticipantListe($index){
        // place la liste de la session dans $liste
        $liste = $this->session->liste;
        // supprime l'entrée et re index
        array_splice($liste,$index,1);
        // replace la liste dans la sssion
        $this->session->liste = $liste;
        // redirection controller Invite/creation _session pour affichage       
        redirect('Invite/creation_invite');  
      }


// suppression d'un invité-e
      public function suppression_invite($inv_id){  
        // appel model pour suppression db et retour la liste           
        $this->Invite_model->suppression_invite($inv_id);
        redirect('Invite/liste_invite');
      }

}    