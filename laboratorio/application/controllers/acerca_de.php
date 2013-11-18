<?php
class Acerca_de extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index(){
		$this->load->view('acerca_de');
	}
}
?>