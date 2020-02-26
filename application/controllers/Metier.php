<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metier extends CI_Controller {

// liste metier(s)
    public function liste_metier(){

    }

// creation/modification metier pour session
    public function modificationMetier_session($session_id){

        // construction liste  pour affichage liste déroulante
        $liste_metier = $this->Metier_model->liste_metier();
        // pour affichage tableau sous select
        $data = $this->Metier_model->listeMetier_session($session_id);
        $liste['liste'] = $data;
        // pour transmittion de du numéro de session
        $session['session'] = $session_id;

        // Création de la liste avec les id métier pour test in_list
        $selectionMetier = $this->Metier_model->listeMetier_metier();
        $listeMetier = array();
        foreach( $selectionMetier as $metier){
            array_push($listeMetier, $metier->met_id);
        }
        $listeMetier=implode(",",$listeMetier);
          

        if ($this->input->post()) {
            // interroge db si la session contient déjà le metier
            $test = $this->Metier_model->contient($session_id,$this->input->post('id_metier'));
         
            // validation formulaire test value vide te ne prend que les id en base de donnée
            $this->form_validation->set_rules("id_metier", "id_metier","required|in_list[".$listeMetier."]", 
                array('required'=>'Pas de selection','in_list'=>'Metier inconnu'));

            // test si metier unique pour la session    

                if($this->form_validation->run() != false && $test < 1){
                    $id_metier = $this->input->post(NULL, TRUE);
                    $this->Metier_model->metierAjout_session($session_id, $id_metier);
                    redirect('Metier/modificationMetier_session/' . $session_id);
                }else{
                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('metier/modification_metier', $liste_metier + $liste + $session);
                    $this->load->view('script');
                }
        } else {
            $this->load->view('head');
            $this->load->view('header/header_loader');
            $this->load->view('metier/modification_metier', $liste_metier + $liste + $session);
            $this->load->view('script');
        }
    }

// suppression metier de la liste metier
    public function suppressionMetier_session( $session_id, $metier_id){

        $this->Metier_model->suppressionMetier_session($session_id,$metier_id);
        redirect('Metier/modificationMetier_session/'.$session_id);
    }
}



