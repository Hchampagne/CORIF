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
        // retourne resultat de la recherche
        $requete =  $this->db->get();
        return $requete->result();
    }

}