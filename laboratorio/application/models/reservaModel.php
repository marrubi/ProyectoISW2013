<?php
class ReservaModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getReservas(){
		$this->db->select('*');
		$this->db->from('tb-reserva');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function setReservas($data){

	}
}
?>