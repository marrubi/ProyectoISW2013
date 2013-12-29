<?php

class ImpresionModel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getImpresionesToday(){
		$hoy = date("Y-m-d");
		$this->db->select('*');
		$this->db->from('tb-impresiones');
		$this->db->where('fecha',$hoy);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function compHojas($cantidad){
		$this->db->select('max_hojas');
		$this->db->from('tb-impresora');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
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