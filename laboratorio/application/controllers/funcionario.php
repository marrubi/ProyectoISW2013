<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Funcionario extends CI_Controller{

    //Constructor, helpers, modelos y librerías a ocupar
    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('laboratorioModel');
        $this->load->model('tipoHojaModel');
        $this->load->model('equipoModel');
        $this->load->library('pagination');
        $this->load->library('calendar');
	}

    //Redirecciones
	public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['rut'] = $session_data['rut'];
            $this->load->view('funcionario', $data);
        }
        else{
            //If no session, redirect to login page
            redirect('index', 'refresh');
        }
    }

    //Ver laboratorios
    public function verLabs(){
        $data = array(
            'titulo' => 'Laboratorios',
            'laboratorios' => $this->laboratorioModel->getLabs()        
        );
        $this->load->view('verlab',$data);
    }


    /* Equipos */
    //Ver equipos de laboratorios
    public function verEq($numLab){
        $data = array(
            'equipos' => $this->equipoModel->getEquip($numLab),  
            'sumadisponibles' => $this->equipoModel->getSumaDisponibles($numLab),
            'sumanodisponibles'=> $this->equipoModel->getSumaNoDisponibles($numLab),
            'sumahabilitados' => $this->equipoModel->getSumaHabilitados($numLab),
            'sumainhabilitados' => $this->equipoModel->getSumaInhabilitados($numLab),
        );
        $this->load->view('verequip',$data);
    }

    //Ver estado de inventario
    public function estadoInventario(){
        $this->load->view('inventario');
    }

    //Ver préstamo de inventario
    public function prestamoInventario(){
        $this->load->view('prestamo');
    }

    ////Ver imnpresiones
    public function imp(){
        $this->load->view('impresiones');
    }

    //Ver agregar impresion
    public function ag_imp(){ 
        $data = array(
            'tipohoja' => $this->tipoHojaModel->getTipoHoja()      
        );
        $this->load->view('agregar_impresion',$data);

    }

    //Validar los datos de para agregar impresión
    public function validar_agr(){
        //Validar numero de hoja de array $hoja en vista agr_imp 
        echo "Función del controlador para agregar impresiones";
    }

    //Mostrar impresiones desde X hasta Y fecha
    public function mostrar_imp(){
        echo "Funcion del controlador para mostrar impresiones desde X hasta Y fecha";
    }


     //Finalizar sesión
    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('funcionario', 'refresh');
    }
}
?>