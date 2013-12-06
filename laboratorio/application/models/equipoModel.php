<?php
class EquipoModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getEquip($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('laboratorio-fk', $num);
		$this->db->order_by('referencia');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
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
}
?>