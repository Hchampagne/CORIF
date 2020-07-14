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

    function sendMail($sendMail,$action,$message){

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

            case "validation"  :  // valoidation adhérent
                $to = $sendMail; //mail administrateur
                $from = "noreply@jerem1formatic.fr";
                $subject = "Inscription sur Corif : Des métiers, des vies ";
                $message = $message;
                break;
        
            case "resetMdp" :  // reset mot de passe
                $to = $sendMail;
                $from = "noreply@jerem1formatic.fr";
                $subject = "Réinitialisation de mots de passe";
                $message = $message;
                break;

            case "invitation" : // mail invitation pour une session 
                $to = $sendMail;
                $from = "noreply@jerem1formatic.fr";
                $subject = "Invitation à une session jeu sur  CORIF: Des métiers, des vies ";
                $message = $message;
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
