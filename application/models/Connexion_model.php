<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Connexion_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

//PARTIE INSCRIPTION / CONNEXION
  
//Ajout d'adherent
    function insert_adherents($data)
    {
        //ajout de la date inscritpion
        $today = date("Y-m-d");
        $this->db->set("adh_d_inscription", $today );
        //insert dans la base
        $this->db->insert('adherent', $data);
        //retourne le nombre de ligneinserré ou modifié
        $insert = $this->db->affected_rows();
        return $insert;
    }

//Retourne un enregistrement => fct login ou email
    function login($log, $email)
    {   
        //select mot de passe table adhérent
        $this->db->from("adherent");
        //where en fonction de l'email ou du login
        $this->db->where("adh_login", $log);
        $this->db->or_where("adh_email", $email);
        // retourne le resultat du row
        $requete =  $this->db->get();
        return $requete;
    } 

 // Met a jour la date de connexion    
    function conn_date($email){
        // déf une date du jour en fonction de la timezone europe /Paris
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");     
        $this->db->set('adh_d_connexion', $date);
        //condition where  sur email
        $this->db->where("adh_email", $email);
        //update de la table adhérent avec date dernière connexion
        $this->db->update("adherent");
    }

// selection row de la table invite jointure table session where email et nom
    function loginjeu($email, $nom){
        $this->db->select("*");
        // table invite
        $this->db->from("invite");
        $this->db->join("session","ses_id=inv_ses_id");
        // condition where email et nom
        $this->db->where("inv_email", $email);
        $this->db->where("inv_nom", $nom);
        //retourne le resultat de la requete
        $requete =  $this->db->get();
        return $requete;
    }


// RESET MOT DE PASSE   

// inesrt cles de reset dans table reset
    public function insert_reset_cle($cle_url, $cle_conf, $adh_id){
        // date et du jour heure de Paris
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");

        //param insert
        $this->db->set('res_adh_id', $adh_id );
        $this->db->set('res_cle_url', $cle_url );
        $this->db->set('res_conf', $cle_conf);
        $this->db->set('res_date', $date);
        //fait insert dans table reset
        $this->db->insert('reset');
        // retourne 1 si une ligne ajoutée
        $data = $this->db->affected_rows();
        return $data;
    } 

// retourne l'enregistrement en fonction cle_url et la cle de confirmation
    public function edit_reset_cle($cle_url, $cle_conf){
        $this->db->from('reset');
        $this->db->where('res_cle_url', $cle_url);
        $this->db->where('res_conf', $cle_conf);
        $resultat = $this->db->get();
        return $resultat;
    }

// supprime enregisrement table reset where res_adh_id
   public function delete_reset_cle($id){
        $this->db->from('reset');
        $this->db->where('res_adh_id', $id );
        $this->db->delete();
   } 

//met a jour le mot de passe
   public function modif_password($mdp, $id){

    $this->db->from('adherent');
    $this->db->set('adh_mdp',$mdp);
    $this->db->where('adh_id', $id);
    $this->db->update();

    $data = $this->db->affected_rows();
    return $data;

   }

}