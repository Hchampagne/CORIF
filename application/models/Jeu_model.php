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
   }

   //création id pour le jeu
   function creationJeu_jeu(){
       return;
   }

   //creation pile en fonction du jeu
   function creationPile_jeu(){
        return;
   }
   
   //enregistrement des cartes dans les piles
   function ajoutCartePile_jeu(){
       return;
   }
   }