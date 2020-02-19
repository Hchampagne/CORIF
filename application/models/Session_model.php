<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Session_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

// liste des sessions
    function liste_session(){
        $this->db->select('*');
        $this->db->from('session');    
        $result = $this->db->get()->result();
        return $result ;       
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
    

}