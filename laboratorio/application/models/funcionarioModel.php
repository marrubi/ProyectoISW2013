<?php
class FuncionarioModel extends CI_Model{

	public function funcionarioModel(){
		parent::__construct();
	}

	public function login($rut,$password){
		$this->db->select('rut, password');
		$this->db->from('tb-funcionario');
		$this->db->where('rut', $rut);
		$this->db->where('password', $password);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}
}
?>