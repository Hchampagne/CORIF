<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Session_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

// retourne l'enregistrement table session where  ses_id
    function session($idSession){        
        $this->db->from('session');
        $this->db->where('ses_id', $idSession);
        $requete =  $this->db->get();
        return $requete->result();        
    }

// creation d'une session retourne ses_id de l'insertion
    function creat_session($date,$heure){
        //recup id en session
        $ses_adh_id = $this->session->id;
        
        $this->db->set('ses_adh_id',$ses_adh_id);
        $this->db->set('ses_d_session',$date);
        $this->db->set('ses_h_debut', $heure);
        $this->db->insert('session');
        $ses_id = $this->db->insert_id();
        return $ses_id;
    }

    

}