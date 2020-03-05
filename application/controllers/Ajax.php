<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    // controle doublons
    public function doublon(){ //doublons email 
        //recup post ajax   
        $verif = $this->input->post("verifRef",true); 
        $champs = $this->input->post("verifChamps",true);
        $table = $this->input->post("verifTable",true);
        //appel du model pour traitement base de donnée
        $dat= $this->Ajax_model->doublon($verif, $champs, $table);  
        //retour resultat de la requete vers controleur ajax            
        echo  $dat;        
    }
    
    // ajout pile pour le jeu
    public function ajout_pile(){
        $jeu = $this->input->post('pil_jeu_id',true);      
        $pile = $this->input->post('pil_container', true);       
        $data = $this->Jeu_model->ajoutTarget_jeu($jeu, $pile);       
        echo $data;
    }

    // supprime pile pour le jeu
    public function suppression_pile(){
        $jeu = $this->input->post('pil_jeu_id', true);
        $target = $this->input->post('pil_container', true);
        $data = $this->Jeu_model->suppressionTarget_jeu($jeu,$target);
        echo $data;
    }

}