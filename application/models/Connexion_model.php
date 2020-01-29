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
        $this->db->from('adherent');
        //where en fonction de l'email ou du login
        $this->db->where('adh_login', $log);
        $this->db->or_where('adh_email', $email);
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
        $this->db->update('adherent');
    }

//  
    function participantb($nom){
        $this->db->select('*');
        $this->db->from('invite');
        $this->db->join('session', 'session.id = invite.id_session');
        $this->db->where('nom', $nom);
        $requete= $this->db->get();
        return  $requete->row();
}   

}