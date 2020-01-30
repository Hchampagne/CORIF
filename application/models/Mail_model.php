<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // envoi mail retourne true si envoi réussi
    // paramètres

    public function sendMail($sendMail,$action){

        switch ($action){
            case "adhConf": // mail inscription ahérent confirmation inscription
                $to = $sendMail;  // mail adhérent inscrit
                $from = "noreply@jerem1formatic.fr";
                $subject = "Inscription sur Corif : Des métiers, des vies ";
                $message = "Une fois votre inscription validé, un email de confirmation vous sera envoyé.";
                break;

            case "adminConf" : // mail pour administrateur compte à valider
                $to = "hch1@gmail.com"; //mail administrateur
                $from = "noreply@jerem1formatic.fr";
                $subject = "Inscription sur Corif : Des métiers, des vies ";
                $message = $sendMail." "."Cet adhérent est en attente de validation !";
                break;
            
            case "resetMdp" :
                $to = $sendMail;
                $from = "noreply@jerem1formatic.fr";
                $from = "noreply@jerem1formatic.fr";
                $subject = "Réinitialisation de mots de passe";
                $message = "essai";
            break;

            default :
                redirect('Accueil');
                break;
        }


        //  paramètres email
        $this->email->from($from, "CORIF des métiers, des vies");  // mail emetteur
        $this->email->to($to);           // mail destinataire
        $this->email->subject($subject);      // mail sujet
        $this->email->message($message);      // mail message

        $reponse = $this->email->send();    // envoie le mail 
        return $reponse; 




    }








   
}
