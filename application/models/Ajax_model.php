<?php
class Ajax_model extends CI_Model
{
      public function __construct()
    {
        parent::__construct();
    }

   public function doublon($verif, $champs, $table){
       //condition where 
        $this->db->where($champs, $verif);
        // requete db compte le nombre d'occurence
        $data = $this->db->count_all_results($table);
        //retourne le resultat au controleur
        return $data;
    }

    public function connexion($verifLogin){
        // where or where pour login ou email
        $this->db->where("adh_login", $verifLogin);
        $this->db->or_where("adh_email",$verifLogin);
        // de la table adherent
        $this->db->form("adherent");
        //select le champ mot de passe
        $data = $this->db->select("adh_mdp");

        return $data;

    }

}