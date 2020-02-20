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
                  
                    if($this->session->liste === NULL){ // test si variable liste en session
  
                        // creation tableau liste en session
                        $this->session->liste = array();
                        $liste = $this->session->liste;
                        // recup valeurs post pour affichage
                        $email = $this->input->post('inv_email',TRUE);
                        $nom = $this->input->post('inv_nom', TRUE);
                        $prenom = $this->input->post('inv_prenom', TRUE);
                        // cré un tableau avec valeur du post
                        $invite = array('inv_email'=>$email, 'inv_nom'=>$nom, 'inv_prenom'=>$prenom);
                        array_push($liste,$invite);
                        // stock tableau la liste en session
                        $this->session->liste = $liste;

                        redirect('Invite/creation_invite/'.$session_id);
                        // prepare affiche vue                    
  
                    }else{ // variable liste en session existante
  
                        //Test si email déjà présent
                        $tab = $this->session->liste;
                        $email = $this->input->post('inv_email');
                        $test = true;
                        //boucle test  
                        for ($x=0;$x < count($tab);$x++){               
                          if ($tab[$x]['inv_email'] == $email) {
                              $test = false;
                            }                       
                        }                  
  
                        if($test === true){ // email différent
  
                            // recup valeurs post pour affichage
                            $email = $this->input->post('inv_email', TRUE);
                            $nom = $this->input->post('inv_nom', TRUE);
                            $prenom = $this->input->post('inv_prenom', TRUE);
                            // recupération de la list en session
                            $liste = $this->session->liste;
                            // ajoute nouvelles valeurs du post au tableau
                            $invite = array('inv_email' => $email, 'inv_nom' => $nom, 'inv_prenom' => $prenom);
                            array_push($liste, $invite);
                            // stock la liste en session
                             $this->session->liste = $liste;                          
                            // prepare affiche vue 
                            $liste_participant['liste'] = $liste;
                            //affichage de la vue
                                                       
                            redirect('Invite/creation_invite/'.$session_id);                            
  
                        }else{ // email déjà présent
   
                            $liste = $this->session->liste;
                            // prepare affiche vue 
                            $liste_participant['liste'] = $liste;
                            //affichage de la vue
                            $session['session'] = $session_id;
                            $this->load->view('head');
                            $this->load->view('header/header_loader');
                            $this->load->view('invite/creation_invite', $liste_participant+$session);
                            $this->load->view('script');              
                        }
                    }
                }else {//validation non ok
                   // si pas de post premier affichage
                    // sinon affichage des valeurs tableau en session
                    if($this->session->liste === NULL){
                        $liste_participant['liste'] = array();
                    }else{
                        $liste = $this->session->liste;       
                        $liste_participant['liste'] = $liste;
                    }  
                    //affichage de la vue
                    $session['session'] = $session_id;
                    $this->load->view('head');
                    $this->load->view('header/header_loader');
                    $this->load->view('invite/creation_invite', $liste_participant+$session);
                    $this->load->view('script');  
                }                     
            }else{ //pas de post  
                // si pas de post premier affichage
                // sinon affichage des valeurs tableau en session
                if($this->session->liste === NULL){
                    $liste_participant['liste'] = array();
                }else{
                    $liste = $this->session->liste;                  
                    $liste_participant['liste'] = $liste;
                }  
                //affichage de la vue
                $session['session'] = $session_id;
                $this->load->view('head');
                $this->load->view('header/header_loader');             
                $this->load->view('invite/creation_invite', $liste_participant+$session);
                $this->load->view('script'); 
            }            
        }


// insertion dans la base de donnée click enregitrer
        public function ajout_invite($session_id){           

            //$adh_id = $this->session->adherent_id;
            $liste = $this->session->liste;
            $data = $this->Invite_model->ajout_invite($liste, $session_id);

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