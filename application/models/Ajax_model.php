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

   function doublonListeInvite($email, $session){
        //condition where 
        $this->db->where('inv_email', $email);
        $this->db->where('inv_ses_id', $session);
        // requete db compte le nombre d'occurence
        $data = $this->db->count_all_results('invite');
        //retourne le resultat au controleur
        return $data;
} 

}