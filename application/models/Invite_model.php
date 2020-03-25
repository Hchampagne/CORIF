<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invite_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    // liste participant
    function invite(){
        $this->db->from('invite');
        $this->db->join('session', 'ses_id = inv_ses_id');
        $this->db->join('adherent','adh_id = ses_adh_id');
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
    function ajout_invite($data){
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

    // retourne l'enregitrement en fonction du mail et la session et du nom
    function invite_jeu($id_session, $nom, $email){
        $this->db->where('inv_ses_id', $id_session);
        $this->db->where('inv_nom', $nom);
        $this->db->where('inv_email',$email);
        $data = $this->db->get('invite');
        return $data;
    }

    //mis à jour connexion invité
    function inviteConnexion_jeu($id_invite){
        $this->db->where('inv_id',$id_invite);
        $this->db->set('inv_conn', 1);
        $this->db->update('invite');
        return;
    }
  
}