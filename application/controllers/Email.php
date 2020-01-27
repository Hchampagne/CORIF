<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

		if ($response == false) {
			message("L'envoie du mail de confirmation n'a pas pu aboutir");
			redirect('administration/adherent');
		} else {
			redirect('administration/email_val');
			message('Votre inscription est en cours de validation.');
			redirect('administration/adherent');
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

		// test si le mail a été envoyer
		if ($response == false) {
			echo "envoie ko";
		} else {
			message('Votre inscription est en cours de validation.');
			redirect('accueil');
		}
	}
}
