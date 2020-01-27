<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //controle doublons

    public function doublon(){ //doublons email 
        //recup post ajax   
        $verif = $this->input->post('verifRef'); 
        $champs = $this->input->post('verifChamps');
        $table = $this->input->post('verifTable');
        //appel du model pour traitement base de donnée
        $dat= $this->Ajax_model->doublon($verif, $champs, $table);  
        //retour resultat de la requete vers controleur ajax         
        echo $dat;        
    }   
    
}