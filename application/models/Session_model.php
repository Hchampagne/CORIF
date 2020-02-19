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


// liste choix par id session
    function choix_metier(){
        
    }
    

}