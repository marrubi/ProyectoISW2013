<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('funcionarioModel');
		$this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
	}

	public function index(){
		$this->load->view('index');
	}

	public function validar(){
		$this->form_validation->set_rules('rut','Rut','required');
        $this->form_validation->set_rules('password','Password','required|trim|callback_verificarfunc');
        
        
        $this->form_validation->set_message('required','Campo %s vacío');
        if($this->form_validation->run() == FALSE){
           	$this->load->view('index');
        }
        else{
        	redirect('funcionario','refresh');
        }
	}

	public function verificarfunc(){
		$rut = $this->input->post('rut');
		$pass = $this->input->post('password');

		$resultado = $this->funcionarioModel->login($rut,$pass);

		if($resultado){
			$sess_array = array();
			foreach($resultado as $row){
				$sess_array = array(
					'rut' => $row->rut,
					'nombre' => $row->nombre
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		}
		else{
			$this->form_validation->set_message('verificarfunc', 'Validación Incorrecta, ingrese nuevamente los datos');
			return false;
		}

	}
}
?>