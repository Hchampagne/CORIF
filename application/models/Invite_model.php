<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invite_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    // enregistre un ou plusieurs invité-e(s)
    function ajout_invite($liste, $session_id){
            $insert = 0;
        for ($x = 0; $x < count($liste); $x++) {
            $this->db->set('inv_ses_id', $session_id);
            $this->db->set('inv_email', $liste[$x]['inv_email']);
            $this->db->set('inv_nom', $liste[$x]['inv_nom']);
            $this->db->set('inv_prenom', $liste[$x]['inv_prenom']);
            $this->db->insert('invite');  
            $insert = $insert + $this->db->affected_rows(); 
            }                 
        return $insert ;
    }

    // liste invité-e(s) fct adherent-e
    // jointure table session et invite 
    function liste_invite(){
        $adh_id = $this->session->adherent_id;
        $this->db->from('session');
        $this->db->join('invite', ('inv_ses_id = ses_id '));
        $this->db->where('ses_adh_id', $adh_id);
        $result = $this->db->get()->result();
        return $result;      
    }

    function insert_invite($data){
        $this->db->insert('invite', $data);       
        return ;
    }

     // liste participant
     function adminListe_invite(){    
        $this->db->from('invite');   
        $result = $this->db->get()->result();
        return $result ; 
    }

    // suppression d'un invité-e
    function suppression_invite($inv_id){
        $this->db->where('inv_id', $inv_id);
        $this->db->delete('invite');
        return;
    }
  
}