<?php
class EquipoModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getEquip($num){
		$this->db->select('*');
		$this->db->from('tb-equipo');
		$this->db->where('laboratorio-fk', $num);

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