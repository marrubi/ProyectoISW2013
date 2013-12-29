<?php
class EquipoModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function consultarAlumno($idest){
		$this->db->select('*');
		$this->db->from('tb-alumno-equipo');
		$this->db->where('fecha_salida is null');
		$this->db->where('alumno-fk',$idest);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function getEquip($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('laboratorio_fk', $num);
		$this->db->order_by('referencia');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getEqAl(){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('laboratorio_fk', '1');
		$this->db->or_where('laboratorio_fk','2');
		$this->db->order_by('referencia');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getEquiposDisponibles($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('laboratorio_fk', $num);
		$this->db->order_by('referencia');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getDisponibles($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('laboratorio_fk',$num);
		$this->db->where('uso-fk','1');
		$this->db->order_by('referencia');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getOcupados(){
		$this->db->select('*');
		$this->db->from('tb-alumno-equipo');
		$this->db->where('fecha_salida is null');
		$this->db->order_by('id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getOcupadoAlumno($id_alumno){
		$this->db->select('*');
		$this->db->from('tb-alumno-equipo');
		$this->db->where('fecha_salida is null');
		$this->db->where('alumno-fk',$id_alumno);
		$this->db->order_by('id');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getLaboratorio($id_equipo){
		$this->db->select('laboratorio_fk');
		$this->db->from('tb-equipo');
		$this->db->where('id_eq',$id_equipo);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->laboratorio_fk;
		}
		else{
			return false;
		}
	}

	public function getSumaDisponibles($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('estado-fk', '1');
		$this->db->where('uso-fk','1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function getSumaNoDisponibles($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('estado-fk', '1');
		$this->db->where('uso-fk','2');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function getSumaHabilitados($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('estado-fk', '1');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function getSumaInhabilitados($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('estado-fk', '2');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function asignar_ingreso($dato){
		if($this->db->insert('tb-alumno-equipo',$dato)){
			return true;
		}
		else{
			return false;
		}
	}

	public function setSalida($id,$datofecha){
		$this->db->where('id',$id);
		$this->db->update('tb-alumno-equipo',$datofecha);
		return true;
	}
}
?>