<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	// gère les envois email	

	public function email_conf()
	{  
		// email du post enregistré
		$to = $this->input->post("adh_email");

		// mail emetteur
		$from = "noreply@jerem1formatic.fr";

		// sujet du mail                
		$subject = "Inscription sur Corif : Des métiers, des vies ";

		// message du mail
		$message = "Une fois votre inscription validé, un email de confirmation vous sera envoyé.";

		//envoie du mail
		$response = $this->Mail_model->mail($from, $to, $subject, $message);

		if ($response){
			// inscription et mail envoyé
		}else{
			// inscription réussi
			// problème de mail
		}
		
	}

	public function email_val()
	{  // mail envoyé au(x) administrateur(s) pour demandé validation adhérent


		//cherche les adiministrateurs dans la liste adhérent
		$liste = $this->Corif_model->admin();
		//construit un tableau des mails des administrateurs
		//mail groupé
		$tab = array();
		foreach ($liste as $email) {
			array_push($tab, $email->email);
		}
		// variable des emails separer par ,
		$to = join(",", $tab);

		//mail emetteur
		$from = "noreply@jerem1formatic.fr";

		//sujet du mail
		$subject = "Validation de profil : Des métiers, des vies ";

		//message à envoyer
		$message = "Des profils sont en attente de validation sur le site !";

		//envoie du mail       
		$response = $this->Mail_model->mail($from, $to, $subject, $message);		
	}
}
