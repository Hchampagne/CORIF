<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Adherent_model extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }


//ajout de la date inscritpion
    function insert_adherents($data) {
        $today = date("Y-m-d");
        $this->db->set("adh_d_inscription", $today);
        //insert dans la base
        $this->db->insert('adherent', $data);
        //retourne le nombre de ligne inserré ou modifié
        $insert = $this->db->affected_rows();
        return $insert;
    }

// selection des adherents tous les adhérents  
    function select_adherents(){
        $this->db->from('adherent');
        $requete =  $this->db->get();
        return $requete->result();
    }

// Select adherent par ID
    function modif_adherent($id){
        $this->db->from('adherent');
        $this->db->where('adh_id', $id);
        $requete =  $this->db->get();
        return $requete->row();
    }
}