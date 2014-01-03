<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Administrador extends CI_Controller{

    //Constructor del controlador Administrador
    public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('laboratorioModel');
        $this->load->model('equipoModel');
        $this->load->model('estudianteModel');
	}

    /* ---------------------------------------- */
    /* -------------   INICIO   --------------- */
    /* ---------------------------------------- */

    //Redirecciones
	public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['rut'] = $session_data['rut'];
            $this->load->view('administradores/home', $data);
        }
        else{
            //If no session, redirect to login page
            redirect('index', 'refresh');
        }
    }

    /* ----------------------------------------- */
    /* ------------   INVENTARIO   ------------- */
    /* ----------------------------------------- */

    //Estado actual de inventario
    public function inventario(){

    }

    public function reporte_inventario(){

    }

    /* ----------------------------------------- */
    /* -----------   IMPRESIONES   ------------- */
    /* ----------------------------------------- */

    //Vista principal impresiones
    public function impresiones(){

    }

    public function impresora(){

    }

    /* ----------------------------------------- */
    /* -------------   ALUMNOS  ---------------- */
    /* ----------------------------------------- */

    //Vista principal alumnos
    public function alumnos(){
        $array = array(
            'alumnos'=> $this->estudianteModel->getAlumnos()
        );
        $this->load->view('administradores/alumnos',$array);
    }

    //Generar Reporte
    public function generar_reporte(){

    }

    //Perfil del Alumno
    public function perfil_alumno($id_alum){
        $array = array(
            'alumno' => $this->estudianteModel->getAlumno($id_alum),
            'asignaturas' => $this->estudianteModel->getAsignaturas($id_alum),
            'visitas' => $this->estudianteModel->getCantidadVisitas($id_alum),
            'visitasmes' => $this->estudianteModel->getCantidadVisitasMes($id_alum)
        );
        $this->load->view('administradores/perfil_alumno',$array);
    }

    public function mantencion_alumnos(){

    }

    /* ----------------------------------------- */
    /* ---------   FIN DEL SISTEMA   ----------- */
    /* ----------------------------------------- */
    
    //Finalizar Sesión
    public function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('administrador', 'refresh');
    }
}
?>