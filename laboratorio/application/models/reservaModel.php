<?php
class ReservaModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getReservas(){
		$date = date("Y-m-d");
		
		$this->db->select('*');
		$this->db->from('tb-reserva');
		$this->db->where('fecha_dest >=',$date);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function updateReserva($id,$arrayedit){
		$this->db->where('id_res',$id);
		$this->db->update('tb-reserva',$arrayedit);
		return true;
	}

	public function getIDAcad($id){
		$this->db->select('*');
		$this->db->from('tb-reserva');
		$this->db->where('id_res', $id);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->academico_fk;
		}
		else{
			return false;
		}
	}

	public function setReserva($dato){
		if($this->db->insert('tb-reserva',$dato)){
			return true;
		}
		else{
			return false;
		}
	}

	public function delReserva($id){
		$this->db->where('id_res', $id);
		$this->db->delete('tb-reserva');

		return true;
	}

	public function getDatos($id){
		$this->db->select('*');
		$this->db->from('tb-reserva');
		$this->db->where('id_res',$id);
		$this->db->limit(1);

		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			$row = $query->row();
			$array = array(
				'id' => $row->id_res,
				'academico' => $row->academico_fk,
				'periodo' => $row->periodo_fk,
				'asignatura' => $row->asignatura_fk,
				'fecha' => $row->fecha_dest,
				'laboratorio' => $row->lab_fk
			);
			return $array;
		}
		else{
			return false;
		}
	}

	public function getAsignaturas(){
		$this->db->select('id_asig,nombre');
		$this->db->from('tb-asignatura');
		$this->db->order_by('id_asig');

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