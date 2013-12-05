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
		$this->form_validation->set_rules('rut','Rut','trim|required|min_length[7]|max_length[8]|xss_clean');
        $this->form_validation->set_rules('password','Password','required|trim|callback_verificarfunc');
        $this->form_validation->set_rules('password','Password','required|trim|callback_verificaradmin');

        
        $this->form_validation->set_message('min_length[7]','Largo de campo %s menor al determinado');
        $this->form_validation->set_message('max_length[8]','Largo de campo %s mayor al determinado');
        $this->form_validation->set_message('required','Campo %s vacío');

        //Validación para funcionario y administrador
        if(($this->form_validation->verificarfunc() && $this->form_validation->verificaradmin())== FALSE){
           	$this->load->view('index');
        }
        else{

        	//Redirecciones a las perfiles correspondientes
        	if($this->form_validation->verificarfunc() == true){
        		redirect('funcionario','refresh');
        	}
        	else{
        		redirect('administrador','refresh');
        	}
        	
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
					'nombre' => $row->nombre
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