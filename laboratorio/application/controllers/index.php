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

		$this->form_validation->set_rules('rut','Rut','trim|required|min_length[7]|max_length[9]|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|callback_verificarperfil');
		
        $this->form_validation->set_message('min_length','Largo de campo %s menor al determinado');
        $this->form_validation->set_message('max_length','Largo de campo %s mayor al determinado');
        $this->form_validation->set_message('required','Ingrese %s');

        $variable = $this->form_validation->run();

        if($this->form_validation->run() == FALSE){
        	$this->load->view('index');
        }
        else{
        	$mensaje = $this->verificarperfil_mensaje();
        	if($mensaje == 2){
        		redirect('funcionario','refresh');
        	}
        	if($mensaje == 1){
        		redirect('administrador','refresh');
        	}
        	
        }
        
        //Validación para funcionario y administrador
        /*if( $this->form_validation->run('general') == FALSE) {
        	$this->load->view('index');
        }
        else{
        	if( $this->form_validation->run('general') == 1){
        		redirect('funcionario','refresh');
        	}
        	else{
        		redirect('administrador','refresh');
        	}    
        }*/
	}

	//Verificar funcionario en Base de Datos
	public function verificarperfil(){
		$rut = $this->input->post('rut');
		$pass = $this->input->post('password');

		$admin = $this->verificarperfiladmin($rut,$pass);
		$func = $this->verificarperfilfunc($rut,$pass);

		if($admin){
			return true;
		}
		if($func){
			return true;
		}
		if(!$admin && !$func){
			$this->form_validation->set_message('verificarperfil','Validación Incorrecta');
			return false;
		}
	}

	public function verificarperfil_mensaje(){
		$rut = $this->input->post('rut');
		$pass = $this->input->post('password');

		$admin = $this->verificarperfiladmin($rut,$pass);
		$func = $this->verificarperfilfunc($rut,$pass);

		if($admin){
			return 1;
		}
		if($func){
			return 2;
		}
		if(!$admin && !$func){
			return 0;
		}
	}

	public function verificarperfiladmin($rut,$pass){

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
			return false;
		}
	}


	public function verificarperfilfunc($rut,$pass){

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
			return false;
		}
	}

}
?>