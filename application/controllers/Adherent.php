<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adherent extends CI_Controller
{

    public function inscription(){

        
        if ($this->input->post()) {

            // controle formulaire post()
            // tests si vide  (riquired) / filtre balises html (html_escape) / test regex (regex_match)
            // test si déjà present dans Database (is_unique) / si champs identiques (matches[])
            // test validité eamil (valid_email)
            // messages d'erreurs en fonction des tests

            $this->form_validation->set_rules(
                'adh_nom',
                'Nom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            $this->form_validation->set_rules(
                'adh_prenom',
                'Prenom',
                'required|html_escape|regex_match[/[A-Z][a-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            $this->form_validation->set_rules(
                'adh_organisme',
                'Organisme',
                'required|html_escape|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][0-9A-Za-zéèçàäëï]+)*/]|max_length[50]',
                array('required' => 'Le champ est vide', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            $this->form_validation->set_rules(
                'adh_email',
                'Email',
                'required|is_unique[adherent.adh_email]|valid_email|max_length[150]',
                array('required' => 'Le champs est vide', 'is_unique' => 'Déjà utilisé', 'valid_email' => 'Votre email est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            $this->form_validation->set_rules(
                'adh_login',
                'Login',
                'required|is_unique[adherent.adh_login]|regex_match[/[0-9A-Za-zéèçàäëï]+([\s-][A-Z][a-zéèçàäëï]+)*/]|max_length[100]',
                array('required' => 'Le champs est vide', 'is_unique' => 'Déjà utilisé', 'regex_match' => 'La saisie est incorrecte', 'max_length' => 'Saisie trop longue')
            );

            $this->form_validation->set_rules(
                'adh_mdp',
                'MDP',
                'required|html_escape|regex_match[/(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*/]|min_length[8]',
                array('required' => 'Le champs est vide', 'regex_match' => 'La saisie est incorrecte', 'min_length' => 'Huit caractètres minimum')
            );

            $this->form_validation->set_rules(
                'verifmdp',
                'Verifmdp',
                'required|matches[adh_mdp]',
                array('required' => 'Le champs est vide', 'matches' => 'Les mots de passes ne sont pas identiques')
            );

            if ($this->form_validation->run() == false) {

                // formulaire non conforme aux controles
                // rechargement de la page
                $this->load->view('head');
                $this->load->view('banner');
                $this->load->view('header/header_loader');
                $this->load->view('modal/connexionModal');
                $this->load->view('modal/espacejeuModal');
                $this->load->view('accueil/accueil');
                $this->load->view('footer');
                $this->load->view('script');
            } else {
                //pas d'erreurs dans les formulaires
                // nous pouvons faire l'indsertion en base De donnée                 

                //recup le post du formulaire inscription
                $data = $this->input->post(null, true);  // filtre html balise 

                //supprime le champ verifmdp du post => "controle champs identiques"
                //ATTENTION supprime la 6ème position (5)
                array_splice($data, 6, 1);

                //le hash du mot de passe
                $password_hash = password_hash($data["adh_mdp"], PASSWORD_DEFAULT);
                $data["adh_mdp"] = $password_hash;

                // insertion dans base de donnée appel model corif_model->insert_adherents
                $insert = $this->Adherent_model->insert_adherents($data);

                if ($insert == 1) {
                    // insert en base réussi                     
                    // envoi des email confirmation inscrption et attente validation
                    // mail admin pour validation
                    // retour si mail adhérent envoyé

                    // mail adhérent
                    $sendMail = $data['adh_email'];
                    $action = "adhConf";
                    $message = ""; // déjà paramètré dans le model
                    $retour = $this->Mail_model->sendMail($sendMail, $action, $message);
                    // mail admin
                    $action = "adminConf";
                    $this->Mail_model->sendMail($sendMail, $action, $message);

                    if ($retour) {
                        // affichage inscription et confirmation réussies
                        // modal avec retour a l'accueil
                        $inscription['inscription'] = "Votre inscription est en attente de validation";
                        $envoi['envoi'] = "Un mail de confirmation vous a été envoyé";
                        //reload modal
                        $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader');
                        $this->load->view('modal/inscriptionConfModal', $inscription + $envoi);
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer');
                        $this->load->view('script', $reload);
                    } else {
                        // affichage inscription réussi / problème envoi mail
                        // modal avec retour a l'accueil 
                        $inscription['inscription'] = "Votre inscription est en attente de validation";
                        $envoi['envoi'] = "Le mail de confirmation a échoué !";
                        //reload modal
                        $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                        $this->load->view('head');
                        $this->load->view('banner');
                        $this->load->view('header/header_loader');
                        $this->load->view('modal/inscriptionConfModal', $inscription + $envoi);
                        $this->load->view('modal/connexionModal');
                        $this->load->view('modal/espacejeuModal');
                        $this->load->view('accueil/accueil');
                        $this->load->view('footer',);
                        $this->load->view('script', $reload);
                    }
                } else {
                    // insert en base a échoué
                    // modal avec retour a l'accueil
                    $incription['inscription'] = "Votre inscription a échouée !";
                    $titre['titre'] = "Inscription";

                    //reload modal
                    $reload['reload'] = "<script> $('#inscriptionConfModal').modal('show') </script>";

                    $this->load->view('head');
                    $this->load->view('banner');
                    $this->load->view('header/header_loader');
                    $this->load->view('modal/inscriptionConfModal', $inscription);
                    $this->load->view('modal/connexionModal');
                    $this->load->view('modal/espacejeuModal');
                    $this->load->view('accueil/accueil');;
                    $this->load->view('footer');
                    $this->load->view('script', $reload);
                }
            }
        } else {

            // pas de post() rechargement de la page premier affichage
            $this->load->view('head');
            $this->load->view('banner');
            $this->load->view('header/header_loader');
            $this->load->view('modal/connexionModal');
            $this->load->view('modal/espacejeuModal');
            $this->load->view('accueil/accueil');
            $this->load->view('footer');
            $this->load->view('script');
        }
    }
}
