<?php
class HerramientasModel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getHerramientasLibres(){
		$this->db->select('*');
		$this->db->from('tb-herramienta');
		$this->db->where('uso_fk',1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}

	}

	public function getHerramientasOcupadas(){
		$this->db->select('*');
		$this->db->from('tb-profesor-herramienta');
		$this->db->where('fecha_devolucion is null');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}

	}
}	
?>