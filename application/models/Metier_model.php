<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Metier_model extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }

// Ajout metier
    function ajout_metier($data){
        $this->db->insert('metier', $data);
        return;
    }

// liste metier
    function liste_metier(){            
        $aliste['liste_metier'] = $this->db->get('metier')->result();
        return $aliste;
    }

//select metier par id
    function select_metier($id){
        $this->db->where('met_id', $id);
        $requete['metier'] =  $this->db->get('metier')->row();
        return $requete;
    }


// update metier
    function modif_metier($id, $data){
        $this->db->from('metier');
        $this->db->where('met_id', $id);
        $this->db->update($data);
        return ;
    }

// suppr metier
    public function suppr_metier($id){
        $this->db->from('metier');
        $this->db->where('met_id', $id);
        $this->db->delete();
        return;
    }


    
}