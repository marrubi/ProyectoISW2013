<?php
class LaboratorioModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getLabs(){
		$this->db->select('*');
		$this->db->from('tb-laboratorio');

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