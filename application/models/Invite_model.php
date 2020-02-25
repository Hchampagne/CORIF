<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invite_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    // liste participant
    function adminListe_invite(){
        $this->db->from('invite');
        $result = $this->db->get()->result();
        return $result;
    }

    // liste invité-e(s) fct adherent-e
    // jointure table session et invite 
    function liste_invite(){
        $adh_id = $this->session->adherent_id;
        $this->db->from('session');
        $this->db->join('invite', 'inv_ses_id = ses_id ');
        $this->db->where('ses_adh_id', $adh_id);
        $result = $this->db->get()->result();
        return $result;      
    }

    // liste invité-e(s) fct  session 
    function listeAjout_invite($session_id){
        $this->db->where('inv_ses_id',$session_id);
        $result = $this->db->get('invite')->result();
        return $result;
    }

    // ajout invite
    function ajout_invite($session_id, $data){
        $this->db->set('inv_ses_id',$session_id);
        $this->db->insert('invite', $data);       
        return ;
    }

    // modification de la liste invité fct session
    function modification_liste($inv_id, $data){
        $this->db->where('inv_ses_id',$inv_id);
        $this->db->update('invite', $data);
        return;
    }

    // suppression d'un invité-e
    function suppression_invite($inv_id){
        $this->db->where('inv_id', $inv_id);
        $this->db->delete('invite');
        return;
    }

    // retourne l'enregitrement en fonction du mail et la session
    function invite_jeu($invMail){
        $this->db->where('inv_email', $invMail);
        $data = $this->db->get('invite')->row();
        return $data;
    }
  
}