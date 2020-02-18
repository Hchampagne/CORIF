<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invite_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    // enregistre un invite
    function ajout_invite($liste){
            $insert = 0;
        for ($x = 0; $x < count($liste); $x++) {
            $this->db->set('inv_email', $liste[$x]['inv_email']);
            $this->db->set('inv_nom', $liste[$x]['inv_nom']);
            $this->db->set('inv_prenom', $liste[$x]['inv_prenom']);
            $this->db->insert('invite');  
            $insert = $insert + $this->db->affected_rows(); 
            }                 
        return $insert ;
    }

}