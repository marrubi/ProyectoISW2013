<?php
class AcademicoModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function getAcademicos(){
		$this->db->select('*');
		$this->db->from('tb-profesor');
		$this->db->order_by('id_profesor');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
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

	public function getID($rutac){
		$this->db->select('*');
		$this->db->from('tb-profesor');
		$this->db->where('rut', $rutac);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->id_profesor;
		}
		else{
			return false;
		}
	}

	public function getRut($id){
		$this->db->select('*');
		$this->db->from('tb-profesor');
		$this->db->where('id_profesor',$id);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->rut;
		}
		else{
			return false;
		}
	}
}
?>