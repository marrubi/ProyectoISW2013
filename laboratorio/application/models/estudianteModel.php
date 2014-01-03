<?php
class EstudianteModel extends CI_Model{

	public function estudianteModel(){
		parent::__construct();
	}

	public function getAlumnos(){
		$this->db->select('*');
		$this->db->from('tb-alumno');
		$this->db->join('tb-carrera','carrera_fk = id_carrera');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getAlumno($id){
		$this->db->select('*');
		$this->db->from('tb-alumno');
		$this->db->join('tb-carrera','carrera_fk = id_carrera');
		$this->db->where('id_alum',$id);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getDatosAlumnos(){
		$this->db->select('id_alum,rut,nombre,carrera_fk');
		$this->db->from('tb-alumno');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}

	}

	public function getDatosAlumno($rut){
		$this->db->select('id_alum,rut,nombre,carrera_fk');
		$this->db->from('tb-alumno');
		$this->db->where('rut',$rut);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			
			$row = $query->row();
			$datos = array(
				'rut' => $row->rut,
				'nombre' => $row->nombre,
				'carrera_fk' => $row->carrera_fk,
			);
			return $datos;
		}
		else{
			return false;
		}

	}

	public function getCarreras(){
		$this->db->select('*');
		$this->db->from('tb-carrera');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getCarrera($carrera_fk){
		$this->db->select('*');
		$this->db->from('tb-carrera');
		$this->db->where('id_carrera',$carrera_fk);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->codigo;
		}
		else{
			return false;
		}
	}

	public function getIDEst($rut){
		$this->db->select('id_alum');
		$this->db->from('tb-alumno');
		$this->db->where('rut',$rut);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->id_alum;
		}
		else{
			return false;
		}
	}

	public function getAsignaturas($id_alum){
		$this->db->select('*');
		$this->db->from('tb-alumno-asignatura');
		$this->db->join('tb-asignatura','asignatura_fk = id_asig');
		$this->db->where('alumno_fk',$id_alum);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}	
	}

	public function getCantidadVisitas($id_alum){
		$this->db->select('*');
		$this->db->from('tb-alumno-equipo');
		$this->db->where('alumno-fk',$id_alum);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function getCantidadVisitasMes($id_alum){
		$mes = date("m");
		$anio = date("Y");
		$this->db->select('*');
		$this->db->from('tb-alumno-equipo');
		$this->db->where('alumno-fk',$id_alum);
		$this->db->where('YEAR(fecha_entrada)',$anio);
		$this->db->where('MONTH(fecha_entrada)',$mes);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}
}
?>