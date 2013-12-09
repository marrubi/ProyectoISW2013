<?php
class AcademicoModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function consultar_academico($rut){
		$this->db->select('*');
		$this->db->from('tb-profesor');
		$this->db->where('rut', $rut);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
}
?>