<?php
class EstudianteModel extends CI_Model{

	public function estudianteModel(){
		parent::__construct();
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
}
?>