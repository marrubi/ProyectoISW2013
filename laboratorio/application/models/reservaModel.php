<?php
class ReservaModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getReservas(){
		$date = date("Y-m-d");
		
		$this->db->select('*');
		$this->db->from('tb-reserva');
		$this->db->join('tb-profesor','academico_fk = id_profesor');
		$this->db->join('tb-asignatura','asignatura_fk = id_asig');
		$this->db->where('fecha_dest >=',$date);
		$this->db->where('eliminado', 0);

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

	public function delReserva($id, $rut){
		$array = array(
			'eliminado' => 1,
			'rut_responsable_eli' => $rut
		);
		$this->db->where('id_res', $id);
		$this->db->update('tb-reserva',$array);

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

	public function validarRepetidosAdd($datos){
		$this->db->select('*');
		$this->db->from('tb-reserva');
		$this->db->where('lab_fk',$datos['laboratorio']);
		$this->db->where('periodo_fk',$datos['periodo']);
		$this->db->where('fecha_dest',$datos['fecha']);
		$this->db->where('eliminado',0);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function validarRepetidosEd($id,$array){
		$this->db->select('*');
		$this->db->from('tb-reserva');
		$this->db->where('lab_fk', $array['laboratorio']);
		$this->db->where('periodo_fk', $array['periodo']);
		$this->db->where('fecha_dest', $array['fecha']);
		$this->db->where('id_res !=',$id);
		$this->db->where('eliminado',0);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}
?>