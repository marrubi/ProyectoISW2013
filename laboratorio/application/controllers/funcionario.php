<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Funcionario extends CI_Controller{

    //Constructor, helpers, modelos y librerías a ocupar
    public function __construct(){
        //Constructor
		parent::__construct();
        //Helper para habilitar las urls
		$this->load->helper('url');
        //Librería para validar formularios
        $this->load->library('form_validation');
        //Helper para formularios en las vistas
        $this->load->helper('form');
        //Modelos a utilizar en el controlador
        $this->load->model('laboratorioModel');
        $this->load->model('equipoModel');
        $this->load->model('estudianteModel');
        $this->load->model('reservaModel');
        $this->load->model('academicoModel');
        $this->load->model('periodoModel');
        $this->load->model('estudianteModel');
        $this->load->model('impresionModel');
        $this->load->model('herramientasModel');
	}

    //Redirecciones
	public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['rut'] = $session_data['rut'];
            $this->load->view('funcionarios/home', $data);
        }
        else{
            //Redirección a la página de inicio si no hay inicio de sesión
            redirect('index', 'refresh');
        }
    }

    /* ----------          ESTADO DE LABORATORIOS          ---------- */

    //Ver laboratorios
    public function laboratorios(){
        $data = array(
            'titulo' => 'Laboratorios',
            'laboratorios' => $this->laboratorioModel->getLabs()        
        );
        $this->load->view('funcionarios/laboratorios',$data);
    }

    //Ver equipos de laboratorios
    public function equipos($numLab){
        $data = array(
            'equipos' => $this->equipoModel->getEquip($numLab),  
            'sumadisponibles' => $this->equipoModel->getSumaDisponibles($numLab),
            'sumanodisponibles'=> $this->equipoModel->getSumaNoDisponibles($numLab),
            'sumahabilitados' => $this->equipoModel->getSumaHabilitados($numLab),
            'sumainhabilitados' => $this->equipoModel->getSumaInhabilitados($numLab),
        );
        $this->load->view('funcionarios/equipos',$data);
    }

    /* ----------          INVENTARIO DEL LABORATORIO         ---------- */

    //Ver estado de inventario
    public function estadoInventario(){
        $array = array(
            'herramientas' => $this->herramientasModel->getHerramientasLibres(),
        );
        $this->load->view('funcionarios/inventario',$array);
    }

    //Ver préstamo de inventario
    public function prestamoInventario(){
        $this->load->view('funcionarios/prestamo');
    }

     /* ----------          IMPRESIONES         ---------- */

    ////Ver imnpresiones
    public function impresiones(){
        $array = array(
            'impresiones' => $this->impresionModel->getImpresionesToday(),
            'alumnos' => $this->estudianteModel->getDatosAlumnos(),
            'carreras' => $this->estudianteModel->getCarreras()
        );
        $this->load->view('funcionarios/impresiones',$array);
    }

    //Mostrar fechas en intervalos "desde" y "hasta"
    public function validar_fechas_impresiones(){
        $desde = $this->input->post('fechadesde');
        $hasta = $this->input->post('fechahasta');

        $this->form_validation->set_rules('fechadesde','Fecha Desde','required|trim|xss_clean');
        $this->form_validation->set_rules('fechahasta','Fecha Hasta','required|trim|xss_clean|callback_validar_condiciones');
        $this->form_validation->set_message('required','Ingrese %s');

        if($this->form_validation->run() == false){
            $array = array(
                'impresiones' =>'',
                'desde' => $this->input->post('fechadesde'),
                'hasta' => $this->input->post('fechahasta')
            );
            $this->load->view('funcionarios/impresiones',$array);
        }
        else{
            $array = array(
                'impresiones' =>$this->impresionModel->getImpresiones($desde,$hasta),
                'alumnos' => $this->estudianteModel->getDatosAlumnos(),
                'carreras' => $this->estudianteModel->getCarreras(),
            );
            $this->load->view('funcionarios/impresiones',$array);
        }
    }
    //Validaciones de fechas para condiciones específicas
    public function validar_condiciones(){
        //Obtener datos ingresados
        $desde = $this->input->post('fechadesde');
        $hasta = $this->input->post('fechahasta');
        //Fecha actual
        /* ¡¡¡OJO!!!, Recuerde cambiar 'date.timezone' a 'date.timezone = "Chile/Continental"' en php.ini, y reiniciar el servidor!! */
        $actual = date("Y-m-d");

        if($desde > $actual){
            //Validación de fecha desde con fecha actual
            $this->form_validation->set_message('validar_condiciones','Fecha desde debe ser menor o igual que fecha actual');
            return false;
        }
        else{
            if($hasta > $actual){
                //Validación de fecha hasta con fecha actual
                $this->form_validation->set_message('validar_condiciones','Fecha hasta debe ser menor o igual que fecha actual');
                return false;
            }
            else{
                if($desde > $hasta){
                    //Validación de fecha desde con fecha hasta
                    $this->form_validation->set_message('validar_condiciones','Fecha desde debe ser menor o igual que fecha hasta');
                    return false;
                }
                else{
                    return true;
                }
            }
        }
    }
    //Ver agregar impresion
    public function ag_imp(){ 
        $data = array(
            'rut_data' => '',
            'canthojas_data' => ''      
        );
        $this->load->view('funcionarios/agregar_impresion',$data);

    }

    //Validar los datos de para agregar impresión
    public function validar_agr_imp(){
        //Obtener fecha y hora actual
        $fecha = date('Y-m-d');
        $hora = date('G:i:s');

        $this->form_validation->set_rules('rut','Rut Estudiante','required|trim|xss_clean|callback_validar_rut_agr_imp');
        $this->form_validation->set_rules('hojas','Cantidad Hojas','required|trim|xss_clean|callback_validar_cant_hojas');
        $this->form_validation->set_message('required','Ingrese %s');

        if($this->form_validation->run() == false){
            $data = array(
                'rut_data' => $this->input->post('rut'),
                'canthojas_data' => $this->input->post('hojas'),
            );
            $this->load->view('funcionarios/agregar_impresion', $data);
        }
        else{
            $idrut = $this->input->post('rut');
            $data = array(
                'alumno_fk' => $this->estudianteModel->getIDEst($idrut),
                'n_hojas' => $this->input->post('hojas') ,
                'tipo_fk' => $this->input->post('tipohoja'),
                'fecha' => $fecha,
                'hora' => $hora
            );
            $this->impresionModel->addImpresion($data);
            

            redirect('funcionario/impresiones');
        }
    }

    //Validar rut para agregar ina impresion
    public function validar_rut_agr_imp(){
        $rut = $this->input->post('rut');

        if($this->estudianteModel->getIDEst($rut) == false){
            $this->form_validation->set_message('validar_rut_agr_imp','El rut no se encuentra en la base de datos');
            return false;
        }
        else{
            return true;
        }
        
    }

    //Validar la cantidad de hojas ingresada
    public function validar_cant_hojas(){
        $cantidad = $this->input->post('hojas');
        
        if($cantidad <= 0){
            if($this->impresionModel->compHojas($cantidad)){
                $this->form_validation->set_message('validar_cant_hojas','Cantidad de hojas debe ser mayor que 0');
                return false;
            }
        }
        else{
            return true;    
        }
    }

    // ESTADO IMPRESORA

    public function impresora(){
        $this->load->view('funcionarios/impresora');
    }
     /* ----------          INGRESO-SALIDA ALUMNOS          ---------- */

     //Ingreso Alumnos
    public function ingresoAlumno(){
        $data = array(
            'titulo' => 'Ingreso de Rut del alumno',
            'switch' => '1',
            'rutAlumno' => '',
            'nombreAlumno' => '',
            'carreraAlumno' => '',
            'equipos' => ''
        );
        $this->load->view('funcionarios/ingreso',$data);
    }

    //Validar el ingreso a alumnos
    public function val_ing_al(){
        $rut = $this->input->post('rut');

        $this->form_validation->set_rules('rut','Rut','required|trim|xss_clean|callback_validarrutest');
        $this->form_validation->set_message('required','El campo %s no puede ser vacío');

        if($this->form_validation->run() == false){
            $data = array(
                'titulo' => 'Ingreso de Rut del alumno',
                'switch' => '1',
                'rutAlumno' => '',
                'nombreAlumno' => '',
                'carreraAlumno' => '',
                'equipos' => ''
            );
            $this->load->view('funcionarios/ingreso',$data);
        }
        else{
            $arraydatosal = $this->estudianteModel->getDatosAlumno($rut);
            $data = array(
                'titulo' => 'Ingreso de Rut del alumno',
                'switch' => '2',
                'rutAlumno' => $arraydatosal['rut'],
                'nombreAlumno' => $arraydatosal['nombre'],
                'carreraAlumno' => $this->estudianteModel->getCarrera($arraydatosal['carrera_fk']),
                'equipos' => ''
            );
            $this->load->view('funcionarios/ingreso',$data);  
        }
    }

    //Validar rut ingresado
    public function validarrutest(){
        $rut = $this->input->post('rut');
        $idest = $this->estudianteModel->getIDEst($rut);
        if($idest){
            if($this->equipoModel->consultarAlumno($idest)){
                $this->form_validation->set_message('validarrutest','El rut ingresado ya tiene un equipo asignado');
                return false;
            }
            else{
                return true;
            }
        }
        else{
            $this->form_validation->set_message('validarrutest','El rut ingresado no existe o no corresponde a un alumno de la escuela de informática');
            return false;
        }
    }

    //Validar laboratorio ingresado
    public function val_lab_ing(){
        $rut = $this->input->post('rut');
        $laboratorio = $this->input->post('laboratorio');
        $this->form_validation->set_rules('laboratorio');

        if($this->form_validation->run() == false){
            $arraydatosal = $this->estudianteModel->getDatosAlumno($rut);
            $data = array(
                'titulo' => 'Ingreso de Rut del alumno',
                'switch' => '2',
                'rutAlumno' => $arraydatosal['rut'],
                'nombreAlumno' => $arraydatosal['nombre'],
                'carreraAlumno' => $this->estudianteModel->getCarrera($arraydatosal['carrera_fk']),
                'equipos' => ''
            );
            $this->load->view('funcionarios/ingreso',$data);
        }
        else{
            $arraydatosal = $this->estudianteModel->getDatosAlumno($rut);

            $data = array(
                'titulo' => 'Ingreso de Rut del alumno',
                'switch' => '3',
                'rutAlumno' => $arraydatosal['rut'],
                'nombreAlumno' => $arraydatosal['nombre'],
                'carreraAlumno' => $this->estudianteModel->getCarrera($arraydatosal['carrera_fk']),
                'equipos' => $this->equipoModel->getEquiposDisponibles($laboratorio)
            );
            $this->load->view('funcionarios/ingreso',$data);  
        }
    }

    //Asignar equipo a alumno
    public function asignar_equipo($numequipo,$rut){
        echo "Rut: ".$rut."<br/>";
        echo "ID Equipo: ".$numequipo."<br/>";
        $fecha = date("Y-m-d H:i:s");
        echo "Fecha: ".$fecha."<br/>";

        $array = array(
            'alumno-fk' => $this->estudianteModel->getIDEst($rut),
            'equipo-fk' => $numequipo,
            'fecha_entrada' => $fecha,
        );

        $this->equipoModel->asignar_ingreso($array);
        redirect('funcionario/salidaAlumno');
    }

    
    //Salida Alumnos
    public function salidaAlumno(){
        $array = array(
            'noingresos' => '',
            'nodisponible' => $this->equipoModel->getOcupados(),
            'equipos' => $this->equipoModel->getEqAl(),
            'alumnos' => $this->estudianteModel->getDatosAlumnos(),
        );
        $this->load->view('funcionarios/salida',$array);
    }

    public function validar_salida(){
        $rut = $this->input->post('rut');

        $this->form_validation->set_rules('rut','Rut','required|trim|xss_clean|callback_validar_rut_sal');
        $this->form_validation->set_message('required','El campo %s no debe ser vacío');

        if($this->form_validation->run() == false){
            $array = array(
                'noingresos' => '',
                'nodisponible' => $this->equipoModel->getOcupados(),
                'equipos' => $this->equipoModel->getEqAl(),
                'alumnos' => $this->estudianteModel->getDatosAlumnos(),
            );
            $this->load->view('funcionarios/salida',$array);
        }
        else{
            $array = array(
                'noingresos' => 'nonull',
                'nodisponible' => $this->equipoModel->getOcupadoAlumno($this->estudianteModel->getIDEst($rut)),
                'equipos' => $this->equipoModel->getEqAl(),
                'alumnos' => $this->estudianteModel->getDatosAlumno($rut),
            );
            $this->load->view('funcionarios/salida',$array);
        }
    }

    public function validar_rut_sal(){
        $rut = $this->input->post('rut');

        if($this->estudianteModel->getIDEst($rut)){
            return true;
        }
        else{
            $this->form_validation->set_message('validar_rut_sal','Rut no existe en la base de datos');
            return false;
        }
    }

    public function liberar($id_oc){
        $fecha = date("Y-m-d H:i:s");
        $array = array(
            'fecha_salida' => $fecha
        );

        $this->equipoModel->setSalida($id_oc,$array);
        redirect('funcionario/index');
    }

    /* ----------          RESERVAS ACADÉMICAS          ---------- */

    //Ver Reservas Realizadas
    public function reservas(){
        $data = array(
            'reservas' => $this->reservaModel->getReservas(),
            'academicos' => $this->academicoModel->getAcademicos(),
            'asignaturas'=> $this->reservaModel->getAsignaturas(),
        );
        $this->load->view('funcionarios/reserva_acad',$data);
    }

    //Agregar Reservas
    public function add_reservas(){
        $this->load->view('funcionarios/agr_reserva_acad');
    }

    public function validar_add_reserva(){
        
        $rutac = $this->input->post('rutacad');
        $this->form_validation->set_rules('rutacad','Rut Académico','required|trim|xss_clean|callback_validaracademicoadd');
        $this->form_validation->set_rules('fec','Fecha de reserva','required');
        $this->form_validation->set_message('required','Ingrese %s');

        if($this->form_validation->run() == FALSE){
            $this->load->view('funcionarios/agr_reserva_acad');
        }
        else{
            $array = array(
                'academico_fk'=> $this->academicoModel->getID($rutac),
                'fecha_dest'=> $this->input->post('fec'),
                'lab_fk'=> $this->input->post('Laboratorio'),
                'periodo_fk'=> $this->input->post('Periodo'),
                'asignatura_fk'=> $this->input->post('Asignatura'),
            );
            $this->reservaModel->setReserva($array);
            redirect('funcionario/reservas');
        }
        
    }

    public function validaracademicoadd(){

        $rutac = $this->input->post('rutacad');
        if($this->academicoModel->consultar_academico($rutac)){
            
            return true;
        }
        else{
            $this->form_validation->set_message('validaracademicoadd','El rut ingresado no existe en la Base de Datos');
            return false;
        }
    }

    //Editar Reservas realizadas
    public function edit_reserva($id_res){
        $datos = $this->reservaModel->getDatos($id_res);
        $id_res_ac = $this->reservaModel->getIDAcad($id_res);

        $array = array(
            'id' => $datos['id'],
            'rut_edit' => $this->academicoModel->getRut($id_res_ac),
            'laboratorio_edit' => $datos['laboratorio'],
            'periodo_edit' => $datos['periodo'],
            'fecha_edit' => $datos['fecha'],
            'asignatura_edit' => $datos['asignatura'],
        );
        $this->load->view('funcionarios/ed_reserva_acad',$array);
    }
    //Validar reserva editada
    public function validar_edit_reserva(){

        $this->form_validation->set_rules('rutacad','Rut Académico','required|trim|xss_clean|callback_validaracademicoed');
        $this->form_validation->set_rules('fec','Fecha de reserva','required');
        $this->form_validation->set_message('required','Ingrese %s');

        $arrayedit = array(
            'id' => $this->input->post('id'),
            'rut_edit' => $this->input->post('rutacad'),
            'laboratorio_edit' => $this->input->post('Laboratorio'),
            'periodo_edit' => $this->input->post('Periodo'),
            'fecha_edit' => $this->input->post('fec'),
            'asignatura_edit' => $this->input->post('Asignatura')
        );

        if($this->form_validation->run() == FALSE){
            $arrayedit = array(
                'id' => $this->input->post('id'),
                'rut_edit' => $this->input->post('rutacad'),
                'laboratorio_edit' => $this->input->post('Laboratorio'),
                'periodo_edit' => $this->input->post('Periodo'),
                'fecha_edit' => $this->input->post('fec'),
                'asignatura_edit' => $this->input->post('Asignatura')
            );
            $this->load->view('funcionarios/ed_reserva_acad', $arrayedit);
        }
        else{
            $array = array(
                'academico_fk'=> $this->academicoModel->getID($this->input->post('rutacad')),
                'fecha_dest'=> $this->input->post('fec'),
                'lab_fk'=> $this->input->post('Laboratorio'),
                'periodo_fk'=> $this->input->post('Periodo'),
                'asignatura_fk'=> $this->input->post('Asignatura'),
            );
            $this->reservaModel->updateReserva($this->input->post('id'),$array);
            redirect('funcionario/reservas','refresh');
        }
        
    }

    public function validaracademicoed(){

        $rutac = $this->input->post('rutacad');
        $fecha = $this->input->post('fec');
        $actual = date("Y-m-d");
        $variable1 = $this->academicoModel->getID($rutac);

        $id = $this->input->post('id');

        if($this->academicoModel->consultar_academico($rutac)){
            if($fecha >= $actual){
                return true;
            }
            else{
                $this->form_validation->set_message('validaracademicoed','Fecha de solicitud no debe ser mayor a la fecha actual');
                return false;
            }
        }
        else{
            $this->form_validation->set_message('validaracademicoed','Rut no está en base de datos');
            return false;
        }
    }


    //Eliminar Reservas realizadas
    public function del_reserva($id){

        $this->reservaModel->delReserva($id);

        $data = array(
            'reservas' => $this->reservaModel->getReservas(),
            'academicos' => $this->academicoModel->getAcademicos(),
            'periodos'=> $this->periodoModel->getPeriodos(),
        );

        redirect('funcionario/reservas');
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