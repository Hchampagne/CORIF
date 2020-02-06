<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Adherent_model extends CI_Model 
{
  
    function __construct() 
    {
      parent::__construct();
    }


//ajout adherent
    function insert_adherents($data) {
        //ajout de la date inscritpion
        $today = date("Y-m-d");
        $this->db->set("adh_d_inscription", $today);
        //insert dans la base
        $this->db->insert('adherent', $data);
        //retourne le nombre de ligne inserré ou modifié
        $insert = $this->db->affected_rows();
        return $insert;
    }

// liste adherent  
    function liste_adherents(){
        $this->db->from('adherent');
        $requete['liste'] =  $this->db->get()->result();
        return $requete;
    }

// Select adherent par id
    function select_adherent($id){
        $this->db->from('adherent');
        $this->db->where('adh_id', $id);
        $requete['adherent'] =  $this->db->get()->row();
        return $requete;
    }

// modification adherent par id
    function modif_adherent($id, $data){      
        $this->db->where('adh_id', $id);
        $this->db->update('adherent',$data);
        return;
    }

//suppression adherent par id
    function suppr_adherent($id){
        $this->db->from('adherent');
        $this->db->where('adh_id', $id);
        $this->db->delete();
        return;
    }


}