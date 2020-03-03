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

        $pil_inv_id = $this->input->post('pil_inv_id',true);
        $pil_nom= $this->input->post('pil_nom', true);
        $pil_target = $this->input->post('pil_target', true);

        $data = $this->Ajax_model->ajout_pile($pil_inv_id, $pil_nom, $pil_target );
        
        echo $data;
    }

    // supprime pile pour le jeu
    public function supprime_pile()
    {
        $pil_inv_id = $this->input->post('pil_inv_id', true);
        $pil_nom = $this->input->post('pil_nom', true);
        $pil_target = $this->input->post('pil_target', true);

        $data = $this->Ajax_model->ajout_pile($pil_inv_id, $pil_nom, $pil_target);

        echo $data;
    }

}