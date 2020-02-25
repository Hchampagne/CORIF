<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Espace_jeu extends CI_Controller {

    function connexion_jeu($session_id)
    {

        if ($this->input->post()) {  //si post

            $inv_email = $this->input->post('invConn_email',TRUE);
            $inv_nom = $this->input->post('invConn_nom', TRUE);
            $inv_nom = $this->input->post('invConn_nom', TRUE);

            $invite = $this->Invite_model->invite_jeu($session_id, $inv_email);

            if( isset($invite)){
                // un resultat

                



            }else{
                // pas de resultat


            }

            
        } else { // pas de post

            $this->load->view('head');
            $this->load->view('banner');
            $this->load->view('header/header_invite');           
            $this->load->view('espace_jeu/connexion_invite');
            $this->load->view('footer');
            $this->load->view('script');
        }
    }
  
   
    
      







// Tableau bord sessions/adhérents
    public function dashboad()
    {
                      
            if($this->auth->as_role() == true){  // test si role exist
                //charge views head et header
                $this->load->view('head');
                $this->load->view('header');
                // jeu resultats table invite et session
                $data['participant'] = $this->Corif_model->participant();
                //attribut a $id <- valeur id en session
                $id=$_SESSION["id"];
                // requete select table session ou date session est la date du jour et ou id formateur est id de la session 
                $sessions = $this->db->query("select * from session where date_session>=?", mdate() ," and id_formateur=?", $id)->result();
                // ajoute dans $session le nombre de participant et les métier
                // nb praticipant requete invite / id _session
                // les métier selectionnés jointure sur metier avec contient ou id session
                foreach ($sessions as $session) {
                    $session->nb_participant = $this->db->query("select count(*) as compteur from invite where id_session=?", $session->id)->row()->compteur;
                    $session->metiers = $this->db->query("select * from metier join contient on metier.id=contient.id_metier where contient.id_session=?", $session->id)->result();
                }
                // prepare transmittion a la vue dashboard
                $data["sessions"] = $sessions;
                // charge les vues dashboard et footer
                $this->load->view('jeu/newdashboad', $data);
                $this->load->view('footer');
            }

            else{
                // redirection a login il n'y a pas de role existant
                redirect(site_url("connexion/login"));
            } 
    }





 


   
}






