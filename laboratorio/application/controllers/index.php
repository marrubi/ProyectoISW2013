<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('funcionarioModel');
		$this->load->model('administradorModel');
		$this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
	}

	public function index(){
		$this->load->view('index');
	}

	public function validar(){

        $this->form_validation->set_message('min_length','Largo de campo %s menor al determinado');
        $this->form_validation->set_message('max_length','Largo de campo %s mayor al determinado');
        $this->form_validation->set_message('required','Campo %s vacío');

        //Validación para funcionario y administrador
        if($this->form_validation->run('valida_func')== FALSE){
        	$this->load->view('index');
        }
        else{
        	redirect('funcionario','refresh');
        }
	}


	//Verificar administrador en Base de Datos
	public function verificaradmin(){
		$rut = $this->input->post('rut');
		$pass = $this->input->post('password');

		$resultado = $this->administradorModel->login($rut,$pass);

		if($resultado){
			$sess_array = array();
			foreach($resultado as $row){
				$sess_array = array(
					'rut' => $row->rut,
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		}
		else{
			$this->form_validation->set_message('verificaradmin', 'Validación Incorrecta, ingrese nuevamente los datos');
			return false;
		}
	}

	//Verificar funcionario en Base de Datos
	public function verificarfunc(){
		$rut = $this->input->post('rut');
		$pass = $this->input->post('password');

		$resultado = $this->funcionarioModel->login($rut,$pass);

		if($resultado){
			$sess_array = array();
			foreach($resultado as $row){
				$sess_array = array(
					'rut' => $row->rut,
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