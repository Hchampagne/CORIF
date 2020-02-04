<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Carte_model extends CI_Model 
{

    

    function __construct() 
    {
      parent::__construct();
    }
   
 
    public function pagination($limit, $start){
       
        $this->db->from('carte');
        $this->db->join('metier', 'car_met_id = met_id');
        $this->db->order_by('car_numero', 'asc'); 
        $this->db->limit($limit, $start);         
        $requete = $this->db->get();
        return $requete->result();
 
    }    
     
    public function get_total() 
    {
        return $this->db->count_all("carte");
    }
}