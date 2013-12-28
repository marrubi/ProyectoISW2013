<?php

class ImpresionModel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getImpresiones($inicio,$fin){
		$this->db->select('*');
		$this->db->from('tb-impresiones');
		$this->db->where('fecha >=',$inicio);
		$this->db->where('fecha <=', $fin);
		$this->db->order_by('fecha');
		$this->db->order_by('hora');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
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

	public function addImpresion($datos){
		if($this->db->insert('tb-impresiones',$datos)){
			return true;
		}
		else{
			return false;
		}
	}
}

?>