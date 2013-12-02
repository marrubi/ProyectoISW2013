<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Funcionario extends CI_Controller{

    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('laboratorioModel');
        $this->load->model('equipoModel');
	}

	public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['nombre'] = $session_data['nombre'];
            $this->load->view('funcionario', $data);
        }
        else{
            //If no session, redirect to login page
            redirect('index', 'refresh');
        }
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('funcionario', 'refresh');
    }

    public function verLabs(){
        $data = array(
            'titulo' => 'Laboratorios',
            'laboratorios' => $this->laboratorioModel->getLabs()        
        );
        $this->load->view('verlab',$data);
    }

    public function verEq($numLab){
        $data = array(
            'equipos' => $this->equipoModel->getEquip($numLab)        
        );
        $this->load->view('verequip',$data);
    }

    public function vistaPrestamo(){
        $this->load->view('prestamo');
    }
}
?>