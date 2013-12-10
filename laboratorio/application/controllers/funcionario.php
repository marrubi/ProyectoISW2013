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
        $this->load->model('estudianteModel');
        $this->load->model('reservaModel');
        $this->load->model('academicoModel');
        $this->load->model('periodoModel');
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

    /* ----------          ESTADO DE LABORATORIOS          ---------- */

    //Ver laboratorios
    public function verLabs(){
        $data = array(
            'titulo' => 'Laboratorios',
            'laboratorios' => $this->laboratorioModel->getLabs()        
        );
        $this->load->view('verlab',$data);
    }

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

    /* ----------          INVENTARIO PARA PRESTAR          ---------- */

    //Ver estado de inventario
    public function estadoInventario(){
        $this->load->view('inventario');
    }

    //Ver préstamo de inventario
    public function prestamoInventario(){
        $this->load->view('prestamo');
    }

     /* ----------          IMPRESIONES         ---------- */

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

     /* ----------          INGRESO-SALIDA ALUMNOS          ---------- */

     //Ingreso Alumnos
    public function ingresoAlumno(){
        $this->load->view('ingreso');
    }

    //Salida Alumnos
    public function salidaAlumno(){
        $this->load->view('salida');
    }

    //Validar el ingreso a alumnos
    public function val_ing_al(){
        $rut = $this->input->post('rut');

        $lab = $this->input->post('Laboratorio');
        $data = array(
            'equipos' => $this->equipoModel->getDisponibles($lab),
        );
        $this->load->view('ingreso',$data);
    }

    //Asignar equipo a alumno
    public function asignar_equipo($numequipo){

    }

    /* ----------          RESERVAS ACADÉMICOS          ---------- */

    //Visualizar Reservas Realizadas
    public function ver_reservas(){
        $data = array(
            'reservas' => $this->reservaModel->getReservas(),
            'academicos' => $this->academicoModel->getAcademicos(),
            'periodos'=> $this->periodoModel->getPeriodos(),
        );
        $this->load->view('reserva_acad',$data);
    }

    //Agregar Reservas
    public function add_reservas(){
        $this->load->view('agr_reserva_acad');
    }

    public function validar_add_reserva(){
        
        $this->form_validation->set_rules('rutacad','Rut Académico','required|trim|xss_clean|callback_validaracademico');
        $this->form_validation->set_rules('fec','Fecha de reserva','required');
        $this->form_validation->set_message('required','Ingrese %s');

        if($this->form_validation->run() == FALSE){
            $this->load->view('agr_reserva_acad');
        }
        else{
           redirect('funcionario/ver_reservas');
        }
        
    }

    public function validaracademico(){

        $rutac = $this->input->post('rutacad');
        if($this->academicoModel->consultar_academico($rutac)){
            
            $array = array(
                'academico-fk'=> $this->academicoModel->getID($rutac),
                'fecha_dest'=> $this->input->post('fec'),
                'lab-fk'=> $this->input->post('Laboratorio'),
                'periodo-fk'=> $this->input->post('Periodo'),
                'asignatura-fk'=> $this->input->post('Asignatura'),
                );
            $this->reservaModel->setReserva($array);
            return true;
        }
        else{
            $this->form_validation->set_message('validaracademico','El rut ingresado no existe en la Base de Datos');
            return false;
        }
    }

    //Editar Reservas realizadas
    public function edit_reserva($id){
        $this->load->view('ed_reserva_acad');
    }

    public function validar_edit_reserva(){
        
    }
    //Eliminar Reservas realizadas
    public function del_reserva($id){

        $this->reservaModel->delReserva($id);

        $data = array(
            'reservas' => $this->reservaModel->getReservas(),
            'academicos' => $this->academicoModel->getAcademicos(),
            'periodos'=> $this->periodoModel->getPeriodos(),
        );

        redirect('funcionario/ver_reservas');
    }

    public function validar_del_reserva(){
        
    }
    /* ----------          SALIR DEL SISTEMA          ---------- */
     //Finalizar sesión
    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('funcionario', 'refresh');
    }
}
?>