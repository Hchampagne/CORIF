<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Adherent_model extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }

    function insert_adherents($data)
    {
        //ajout de la date inscritpion
        $today = date("Y-m-d");
        $this->db->set("adh_d_inscription", $today);
        //insert dans la base
        $this->db->insert('adherent', $data);
        //retourne le nombre de ligneinserré ou modifié
        $insert = $this->db->affected_rows();
        return $insert;
    }

    // Select adherent par ID
    function select_adherent($col, $data)
    {
        $this->db->from('adherent');
        $this->db->where($col, $data);
        $requete =  $this->db->get();
        return $requete->row();
    }
}