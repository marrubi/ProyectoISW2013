<?php

class ImpresionModel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function getImpresionesToday(){
		$hoy = date("Y-m-d");
		$this->db->select('*');
		$this->db->from('tb-impresiones');
		$this->db->join('tb-alumno','alumno_fk = id_alum');
		$this->db->join('tb-tipohoja','tipo_fk = id_tipohoja');
		$this->db->where('fecha',$hoy);
		$this->db->order_by('id_imp');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function maxHojas(){
		$this->db->select('max_hojas');
		$this->db->from('tb-impresora');
		$this->db->where('estado_imp', 1);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->max_hojas;
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

	public function discountImp($id_imp,$array){
		$this->db->where('id_imp',$id_imp);
		$this->db->update('tb-impresora', $array);
	}

	public function getIDImp(){
		$this->db->select('id_imp');
		$this->db->from('tb-impresora');
		$this->db->where('estado_imp', 1);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->id_imp;
		}
		else{
			return false;
		}
	}

	public function getImpresoras(){
		$this->db->select('*');
		$this->db->from('tb-impresora');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function getImpresoraActiva(){
		$this->db->select('*');
		$this->db->from('tb-impresora');
		$this->db->where('estado_imp', 1);

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