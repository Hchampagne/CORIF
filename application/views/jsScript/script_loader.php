<?php 
isset($_SESSION['role']) ? $role = $_SESSION['role'] : $role = "accueil";
isset($_SESSION['validation']) ? $valid = $_SESSION['validation'] : $valid = "0";
if($role == "accueil"){   
    $this->load->view('jsScript/scriptAccueil');    
}
else if ($role == "invite"){
    $this->load->view('jsScript/scriptInvite');
}
else if ($role == "formateur" && $valid == 1){
    $this->load->view('jsScript/scriptAdhérent');
}
else if ($role == "administrateur" && $valid == 1){
   $this->load->view('jsScript/scriptAdministrateur');
}
else{
    $this->load->view('jsScript/scriptAccueil');}
?>