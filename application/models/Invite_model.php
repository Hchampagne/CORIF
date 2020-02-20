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
            $this->db->set('inv_adh_id', $this->session->adherent_id);
            $this->db->set('inv_email', $liste[$x]['inv_email']);
            $this->db->set('inv_nom', $liste[$x]['inv_nom']);
            $this->db->set('inv_prenom', $liste[$x]['inv_prenom']);
            $this->db->insert('invite');  
            $insert = $insert + $this->db->affected_rows(); 
            }                 
        return $insert ;
    }

    // liste invite fct adherent-e
    function liste_invite(){
        $this->db->where('inv_adh_id', $this->session->adherent_id);
        $result = $this->db->get('invite')->result();
        return $result ;
    }

    // modifcation d'un invite
    function modification_invite($inv_id, $data){
        $this->db->where('inv', $inv_id);
        $this->db->update('inv', $data);
        return ;
    }

    // suppression d'un invité-e
    function suppression_invite($inv_id){
        $this->db->where('inv_id', $inv_id);
        $this->db->delete('invite');
        return;
    }



}