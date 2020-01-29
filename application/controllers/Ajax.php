<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    //controle doublons

    public function doublon(){ //doublons email 
        //recup post ajax   
        $verif = $this->input->post("verifRef"); 
        $champs = $this->input->post("verifChamps");
        $table = $this->input->post("verifTable");
        //appel du model pour traitement base de donnée
        $dat= $this->Ajax_model->doublon($verif, $champs, $table);  
        //retour resultat de la requete vers controleur ajax         
        echo $dat;        
    } 
    
    public function connexion(){
        //post requete ajax
        $verifLogin = $this->input->post("verifLogin",true);
        $verifMdp = $this->input->post("verifMdp",true);
        // interroge le model reour mot de passe hashé
        $result = $this->Ajax_model->connexion($verifLogin);

        if ($result != false){
            // enregistré
            if(password_verify($verifMdp, $result)){
                // enregistré et mdp match
                $dat = 2;
            }else{               
                // enregistré et mdp non match
                $dat = 1;
            }
        }else{
            //pas enregistré
            $dat = 0;
        }   
        echo $dat;




    }
    
}