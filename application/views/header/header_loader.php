<?php 
isset($_SESSION['role']) ? $role = $_SESSION['role'] : $role = "accueil";
isset($_SESSION['validation']) ? $valid = $_SESSION['validation'] : $valid = "0";
if($role == "accueil"){$this->load->view('header/header');}
else if ($role == "invite"){$this->load->view('header/header_invite');}
else if ($role == "formateur" && $valid == 1){
    $this->load->view('header/header_adherent');
    $this->load->view('modal/participantModal');
    $this->load->view('modal/sessionModal');
}
else if ($role == "administrateur" && $valid == 1){
    $this->load->view('header/header_admin');

}
else{$this->load->view('header/header');}
?>