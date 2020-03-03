<?php
class Ajax_model extends CI_Model
{
      public function __construct()
    {
        parent::__construct();
    }

   function doublon($verif, $champs, $table){
       //condition where 
        $this->db->where($champs, $verif);
        // requete db compte le nombre d'occurence
        $data = $this->db->count_all_results($table);
        //retourne le resultat au controleur
        return $data;
   }


   function ajout_pile($pil_inv_id, $pil_nom, $pil_target){
        $this->db->set('pil_inv_id', $pil_inv_id);
        $this->db->set('pil_nom', $pil_nom);
        $this->db->set('pil_target', $pil_target);
        $this->db->insert('pile');
        $insert = $this->db->affected_rows();
        return $insert;
   }

   

}