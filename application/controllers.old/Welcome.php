<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		
		$this->load->view('template/header');
		$this->load->view('pages/dashboard');
		$this->load->view('template/footer');
	}
}
