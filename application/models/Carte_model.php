<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Carte_model extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }

    // liste carte
    function liste_carte(){      
        $this->db->from('carte');
        $this->db->join('metier', 'car_met_id = met_id');
        $aliste = $this->db->get()->result();
        return $aliste;
    }

    // carte 
    function modif_carte($id){
        $this->db->from('carte');
        $this->db->join('metier', 'car_met_id= met_id');
        $this->db->where('car_id', $id);
        $requete =  $this->db->get()->row();
        return $requete;
    }
    
}