<?php
class PeriodoModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getPeriodos(){
		$this->db->select('*');
		$this->db->from('tb-periodo');
		$this->db->order_by('id_per');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
}