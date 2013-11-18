<?php
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	public function index(){
		$this->load->view('login');
	}

	public function validar(){
		$this->form_validation->set_rules('user','Usuario','required');
		$this->form_validation->set_rules('password','Contraseña','required');
		$this->form_validation->set_message('required','Campo %s vacío');
		if($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}
		else{
			$this->load->view('success');
		}	
	}

	public function siguiente(){
		$this->load->view('estudiante');
	}
}	
?>