<?php
class HerramientasModel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	//Listado de herramientas disponibles
	public function getHerramientasLibres(){
		$this->db->select('*');
		$this->db->from('tb-herramienta');
		$this->db->join('tb-tipoherramienta','tipo_fk = id_tipo');
		$this->db->where('uso_fk',1);
		$this->db->where('eliminado',0);
		$this->db->where('habilitado',1);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}

	}

	//Datos de una herramienta específica
	public function getHerramienta($id){
		$this->db->select('*');
		$this->db->from('tb-herramienta');
		$this->db->join('tb-tipoherramienta','tipo_fk = id_tipo');
		$this->db->where('uso_fk',1);
		$this->db->where('habilitado',1);
		$this->db->where('eliminado',0);
		$this->db->where('id_herramienta',$id);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			$array = array(
				'id' => $row->id_herramienta,
				'serie' => $row->n_inventario,
				'marca' => $row->marca,
				'modelo' => $row->modelo
			);
			return $array;
		}
		else{
			return false;
		}
	}

	//Listado de herramientas asignadas a un académico
	public function getHerramientasOcupadas(){
		$this->db->select('*');
		$this->db->from('tb-profesor-herramienta');
		$this->db->join('tb-herramienta','herramienta_fk = id_herramienta');
		$this->db->join('tb-profesor', 'academico_fk = id_profesor');
		$this->db->where('fecha_devolucion is null');
		$this->db->where('habilitado',1);
		$this->db->where('eliminado',0);
		$this->db->order_by('fecha_solicitud');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}

	}

	//Modifica estado de uso a no disponible
	public function setUso($id){
		$array = array(
			'uso_fk' => 2
		);
		$this->db->where('id_herramienta',$id);
		$this->db->update('tb-herramienta',$array);
		return true;
	}

	//Modifica estado de uso a disponible
	public function unsetUso($id){
		$array = array(
			'uso_fk' => 1
		);
		$this->db->where('id_herramienta',$id);
		$this->db->update('tb-herramienta',$array);
		return true;
	}

	//Ingresa el prestamo a la base de datos
	public function setPrestamo($dato){
		if($this->db->insert('tb-profesor-herramienta',$dato)){
			return true;
		}
		else{
			return false;
		}
	}

	//Obtiene el id de una herramienta a partir del préstamo consultado
	public function getIDHerramienta($id_prestamo){
		$this->db->select('herramienta_fk');
		$this->db->from('tb-profesor-herramienta');
		$this->db->where('id',$id_prestamo);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			$row = $query->row();
			return $row->herramienta_fk; 
		}
		else{
			return false;
		}
	}

	//Registra la devolución de la herramienta
	public function setDevolucion($id,$dato){
		$this->db->where('id',$id);
		$this->db->update('tb-profesor-herramienta',$dato);
		return true;
	}

	//Consulta herramientas totales en la base de datos
	public function getHerramientasTotales(){
		$this->db->select('*');
		$this->db->from('tb-herramienta');
		$this->db->join('tb-tipoherramienta','tipo_fk = id_tipo');
		$this->db->where('eliminado',0);
		$this->db->order_by('id_herramienta');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	//Retorna los datos de una herramienta no eliminada
	public function getHerramientasBaja($id){
		$this->db->select('*');
		$this->db->from('tb-herramienta');
		$this->db->join('tb-tipoherramienta','tipo_fk = id_tipo');
		$this->db->where('eliminado',0);
		$this->db->where('id_herramienta',$id);
		$this->db->order_by('id_herramienta');

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	//Modifica datos habilitacion inhabilitacion en registro
	public function setInhHab($dato){
		if($this->db->insert('tb-hab-inhab-inventario',$dato)){
			return true;
		}
		else{
			return false;
		}
	}

	public function setEstado($id_herr,$dato){
		$this->db->where('id_herramienta',$id_herr);
		$this->db->update('tb-herramienta',$dato);
		return true;
	}
}	
?>