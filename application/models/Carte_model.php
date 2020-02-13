<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Carte_model extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }


//ajout carte
    function ajout_carte($data){
        $this->db->insert('carte', $data);
        return;
    }

// liste carte
    function liste_carte(){      
        $this->db->from('carte');
        $this->db->join('metier', 'car_met_id = met_id');
        $aliste = $this->db->get()->result();
        return $aliste;
    }

// select carte par id pour affichage vue
    function select_carte($id){
        $this->db->from('carte');
        $this->db->join('metier', 'car_met_id= met_id');
        $this->db->where('car_id', $id);
        $requete['carte'] =  $this->db->get()->row();
        return $requete;
    }

    // select carte par id
    function carte($id)
    {
        $this->db->where('car_id', $id);
        $requete =  $this->db->get('carte')->row();
        return $requete;
    }

// modificatioin carte par id
    function modif_carte($id, $data){
        $this->db->where('car_id', $id);
        $this->db->update('carte',$data);
        return;

    }

// suppression carte par id
    function suppr_carte($id){
        $this->db->where('car_id', $id);
        $this->db->delete('carte');
        return;
    }


}