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
    public function modificationListe_invite($session_id)
    {

        $session['session'] = $session_id;
        $liste_invite['liste'] = $this->Invite_model->listeAjout_invite($session_id);

        if ($this->input->post()) { // si bouton 

            // regle de validation formulaire
            $this->form_validation->set_rules(
                'inv_email',
                'inv_mail',
                'required|valid_email|max_length[150]',
                array('required' => 'Le champs est vide', 'valid_email' => 'Votre email est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            $this->form_validation->set_rules(
                'inv_nom',
                'inv_nom',
                'required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            $this->form_validation->set_rules(
                'inv_prenom',
                'inv_Prenom',
                'required|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            if ($this->form_validation->run() != false) { //validation ok

                $data = $this->input->post(NULL, TRUE);
                $this->Invite_model->ajout_invite($session_id, $data);
                redirect('Invite/modificationListe_invite/' . $session_id);
            } else { //validation non ok
                // si pas de post premier affichage                  
                //affichage de la vue

                $this->load->view('head');
                $this->load->view('header/header_loader');
                $this->load->view('invite/modificationListe_invite', $liste_invite + $session);
                $this->load->view('script');
            }
        } else { //pas de post  
            // si pas de post premier affichage               
            //affichage de la vue

            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('invite/modificationListe_invite', $liste_invite + $session);
            $this->load->view('script');
        }
    }
        

    //  suppression dans la liste invité-e(s) formulaire ajout pour session
    public function suppressionListeAjout_invite($inv_id,$session_id){
        $this->Invite_model->suppression_invite($inv_id);           
        redirect('Invite/modificationListe_invite/'.$session_id);  
      }


    // suppression d'un invité-e
    public function suppression_invite($inv_id){  
        // appel model pour suppression db et retour la liste           
        $this->Invite_model->suppression_invite($inv_id);
        redirect('Invite/liste_invite');
      }

}    