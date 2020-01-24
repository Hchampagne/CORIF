<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 * 
	 
	 */



	


	public function index()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/jeuModal');
		$this->load->view('accueil/accueil');
		$this->load->view('footer');
	}

	public function avantpropos()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/jeuModal');
		$this->load->view('accueil/avantpropos');
		$this->load->view('footer');
	}


	public function remerciements()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/jeuModal');
		$this->load->view('accueil/remerciements');
		$this->load->view('footer');
	}

	public function animation()
	{
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('modal/connexionModal');
		$this->load->view('modal/jeuModal');
		$this->load->view('accueil/animation');
		$this->load->view('footer');
	}


}
