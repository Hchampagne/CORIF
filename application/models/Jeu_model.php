<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Jeu_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

   // cartes en fonction du ou des métier(s) en session pour le jeu 
   function cartes_jeu($session_id){
          $cartes = $this->db->query("
          select * from carte where car_type = 'metier' and car_met_id in (
          select id_metier from contient where id_session=?
          )
          order by car_description asc
          ", $session_id)->result();
          return $cartes; 
   }

   // métier(s) paramtètré(s) en session pour le jeu
   function metier_jeu($session_id){
          $metiers = $this->db->query("
          select * from metier where met_id in (
          select id_metier from contient where id_session=?
          )
          ", $session_id)->result();
          return $metiers;
     }


     // recup id du jeu en fonction du de l'id due l'invite
     function jeu($id_invite){
          $this->db->where('jeu_inv_id', $id_invite);
          $data = $this->db->get('jeu')->row();
          return $data;
     }

     //création id pour le jeu et retourne id du jeu créé
     function ajoutJeu_jeu($jeu_inv_id){
          // date et du jour heure de Paris
          date_default_timezone_set('Europe/Paris');
          $date = date("Y-m-d H:i:s");

          $this->db->set('jeu_date', $date);
          $this->db->set('jeu_inv_id', $jeu_inv_id);
          $this->db->insert('jeu');
          $id = $this->db->insert_id();
          return $id;
     }

     // ajout target drop zone 
     function ajoutTarget_jeu($jeu, $target){
          $this->db->set('pil_jeu_id', $jeu);
          $this->db->set('pil_container', $target);
          $this->db->insert('pile');
          $data = $this->db->affected_rows();
          return $data;
     }

     // suppression target
     function suppressionTarget_jeu($jeu,$target){
          $this->db->where('pil_jeu_id', $jeu);
          $this->db->where('pil_container', $target);
          $this->db->delete('pile');
          $data = $this->db->affected_rows();
          return $data;
     }


     //suppression jeu complet entrée(s) dans jeu/pile/contient_carte
     function delete_jeu($id_jeu){
          $this->db->select('pil_id');
          $this->db->where('pil_jeu_id',$id_jeu);
          $data = $this->db->get('pile')->result();

          foreach($data as $row){
               $this->db->where('pil_id', $row->pil_id);
               $this->db->delete('contient_carte');
          }

          $this->db->where('pil_jeu_id',$id_jeu);
          $this->db->delete('pile');

          $this->db->where('jeu_id',$id_jeu);
          $this->db->delete('jeu');

     }

   }