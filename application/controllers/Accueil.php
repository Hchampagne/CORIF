<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/espacejeuModal');
		$this->load->view('accueil/accueil');
		$this->load->view('footer');
	}

	public function avantpropos()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/espacejeuModal');
		$this->load->view('accueil/avantpropos');
		$this->load->view('footer');
	}


	public function remerciements()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/espacejeuModal');
		$this->load->view('accueil/remerciements');
		$this->load->view('footer');
	}

	public function animation()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/espacejeuModal');
		$this->load->view('accueil/animation');
		$this->load->view('footer');
	}


}
