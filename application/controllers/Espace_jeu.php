<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Espace_jeu extends CI_Controller {

    public function connexion_jeu(){

        if ($this->input->post()) {  //si post
          
            $this->form_validation->set_rules('invConn_nom', 'invConn_nom',
                'required|regex_match[/^[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*$/]', 
                array('required'=>'Champs vide','regex_match'=>'Saisie incorrecte'));

            $this->form_validation->set_rules('invConn_email','invConn_email',
                'required|regex_match[/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/]',
                array('required' => 'Champs vide','regex_match'=>'Saisie incorecte'));

            if($this->form_validation->run() != false){

                $inv_email = $this->input->post('invConn_email',TRUE);
                $inv_nom = $this->input->post('invConn_nom', TRUE);         
                $invite = $this->Invite_model->invite_jeu($inv_email);

                if( isset($invite->inv_email) == $inv_email && isset($invite->inv_nom) == $inv_nom){ // condition email et nom si
                    // un resultat
                    $session = $this->Session_model->session($invite->inv_ses_id);
                    $date= $session->ses_d_session;
                    $debut = date("H:i", strtotime($session->ses_h_debut));
                    $fin = date("H:i", strtotime($session->ses_h_fin));

                    date_default_timezone_set('Europe/Paris');
                    $jour = date('Y-m-d');
                    $heure =date('H:i');

                    if( $jour == $date && $debut < $heure && $fin > $heure){ // condition crénaux horaire connexion
                        // dans creneau
                        $this->session->set_userdata('inv_nom', $invite->inv_nom);
                        $this->session->set_userdata('inv_prenom', $invite->inv_prenom);
                        $this->session->set_userdata('inv_id', $invite->inv_id);
                        $this->session->set_userdata('inv_role',$invite->inv_role);                   

                        redirect('Espace_jeu/invite_jeu/'.$session->ses_id);
                    }else{
                        // hors creneau horaire
                        $message['message'] = "Le créneau horaire ne semble pas correcte vérifier votre email !";
                      
                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_invite');
                        $this->load->view('espace_jeu/connexion_invite', $message);
                        $this->load->view('footer');
                        $this->load->view('script');
                    }
                }else{
                    // erreur mail et/ou nom
                    $message['message'] = "Votre mail ou votre nom ne semble pas correcte !";
                              
                    $this->load->view('head');
                    $this->load->view('banner');
                    $this->load->view('header/header_invite');
                    $this->load->view('espace_jeu/connexion_invite', $message);
                    $this->load->view('footer');
                    $this->load->view('script');
                }
            }else{
                // form validation false
                $this->load->view('head');
                $this->load->view('banner');
                $this->load->view('header/header_invite');           
                $this->load->view('espace_jeu/connexion_invite');
                $this->load->view('footer');
                $this->load->view('script');

            }          
        } else { // pas de post premier affichage

            $this->load->view('head');
            $this->load->view('banner');
           // $this->load->view('header/header_invite');           
            $this->load->view('espace_jeu/connexion_invite');
            $this->load->view('footer');
            $this->load->view('script');
        }
    }
  
// page espace de jeu invite
    public function invite_jeu($session_id){

        // requete  cartes fct metiers sélectionnés
        $cartes = $this->Jeu_model->cartes_jeu($session_id);
        // requete metiers selectionnés
        $metiers =$this->Jeu_model->metier_jeu($session_id); 
        // un jeu enregistré ? si $jeu n'existe pas création jeu // cause refresh page
        $jeu = $this->Jeu_model->jeu($this->session->inv_id);
        if($jeu == false){
            // requete enregistre le jeu et recup id du jeu
            // transmet id_invite pour insertion db
            $id_jeu = $this->Jeu_model->ajoutJeu_jeu($this->session->inv_id);
        }else{
            // supprime le jeu
            $this->Jeu_model->delete_jeu($jeu->jeu_id);
            // ré attribut la valeur de id en base
            $id_jeu = $this->Jeu_model->ajoutJeu_jeu($this->session->inv_id);
        }   

        // prépare les données à envoyer à la vue
        $data['cartes'] = $cartes;
        $data['metiers'] = $metiers;   
        $data['id_session'] = $session_id;
        $data['inv_nom'] = $this->session->inv_nom;
        $data['inv_prenom'] = $this->session->inv_prenom;            
        $data['inv_id'] = $this->session->inv_id;
        $data['id_jeu'] = $id_jeu;

        // charge la vue
        $this->load->view('head');
        $this->load->view('header/header_invite');           
        $this->load->view('espace_jeu/espace_invite',$data);
        $this->load->view('script');
    }


  
    


















 


   
}






