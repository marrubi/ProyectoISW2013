<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Administrador extends CI_Controller{

    //Constructor del controlador Administrador
    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('laboratorioModel');
        $this->load->model('equipoModel');
	}

    //Redirecciones
	public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['rut'] = $session_data['rut'];
            $this->load->view('administrador', $data);
        }
        else{
            //If no session, redirect to login page
            redirect('index', 'refresh');
        }
    }

    //Finalizar Sesión
    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('administrador', 'refresh');
    }
}
?>