<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Metier_model extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }

// Ajout metier
    function ajout_metier($data,$session){
        $this->db->set('set_ses_id',$session);
        $this->db->insert('metier', $data);
        return;
    }

// liste metier
    function liste_metier(){            
        $aliste['liste_metier'] = $this->db->get('metier')->result();
        return $aliste;
    }

//select metier par id
    function select_metier($id){
        $this->db->where('met_id', $id);
        $requete['metier'] =  $this->db->get('metier')->row();
        return $requete;
    }

// update metier
    function modif_metier($id, $data){
        $this->db->where('met_id', $id);
        $this->db->update('metier',$data);
        return ;
    }

// suppr metier ans la liste metier admin
    function suppr_metier($id){
        $this->db->where('met_id', $id);
        $this->db->delete('metier');
        return;
    }

// Ajout de metier pour la creation/modification de session
    function metierAjout_session($session_id, $metier_id){
        $this->db->set('id_session', $session_id );
        $this->db->insert('contient', $metier_id);
        return;
    }

// liste métier(s) en fct session pour liste creation session
    function listeMetier_session($session_id){
        $this->db->from('contient');
        $this->db->join('metier','met_id = id_metier');
        $this->db->where('id_session',$session_id);
        $data = $this->db->get()->result();
        return $data;
    }

// suppression metier dans la liste de la session
    function suppressionMetier_session($session_id, $metier_id){
        $this->db->where('id_session',$session_id);
        $this->db->where('id_metier', $metier_id);
        $this->db->delete('contient');
        return;
    }





// si contenu dans table
    function contient($session_id, $metier_id)
    {
        $this->db->where('id_session', $session_id);
        $this->db->where('id_metier', $metier_id);
        $this->db->from('contient');
        $test = $this->db->count_all_results();
        return $test;
    }


// retourne liste des id metier
    function listeMetier_metier(){       
        $this->db->select('met_id');
        $result = $this->db->get('metier')->result();
        return $result;
    }

    
}