<?php
class TipoHojaModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getTipoHoja(){
		$this->db->select('*');
		$this->db->from('tb-tipohoja');

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