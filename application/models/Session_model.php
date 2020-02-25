<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Session_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

// liste des sessions filtre par adherent
    function liste_session(){
        $this->db->select('*');
        $this->db->from('session');
        $this->db->where('ses_adh_id', $this->session->adherent_id);    
        $result = $this->db->get()->result();
        return $result ;       
    }

// retourne une session par son index  
    function session($ses_id){
        $this->db->where('ses_id', $ses_id);
        $session = $this->db->get('session')->row();    
        return $session;
    }

// modification de session
    function modification_session($id, $data){
        $this->db->where('ses_id',$id);
        $this->db->update('session', $data);
        return;
    }

// liste participant par id session
    function liste_participant($id){    
        $this->db->from('invite'); 
        $this->db->where('inv_ses_id',$id);   
        $result = $this->db->get()->result();
        return $result ; 
    }

// liste metier par id session
    function liste_metier($id){
        $this->db->from('invite'); 
        $this->db->where('inv_ses_id',$id);   
        $result = $this->db->get()->result();
        return $result ;       
    }

//supprime une session par id session
    function supprime_session($id){
        $this->db->where('ses_id',$id);
        $this->db->delete('session');
        return;
    }

// creation de session retourne id insertion db
    function creation_session($data){
        $this->db->set('ses_adh_id', $this->session->adherent_id);
        $this->db->insert('session',$data);
        $id =$this->db->insert_id();
        return $id;
    }

// validation session set à 1
    function validationSession_session($session_id, $val){
        $this->db->set('ses_validation', $val );
        $this->db->where('ses_id',$session_id);
        $this->db->update('session');
        return;
    }

}