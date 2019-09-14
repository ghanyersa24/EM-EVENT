<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pilihan extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_agenda');
	}

	public function setPilihan($pilihan)
	{
		$query= $this->M_agenda->getAgenda($pilihan['ID_AGENDA']);
		if(!empty($query)){
			$query = $this->db->insert('TB_PILIHAN', $pilihan);
			return $query;
		}else{
			return false;
		}
	}
	public function getPilihan($idAgenda,$idPilihan)
	{
		$where= array('ID_AGENDA' => $idAgenda,'ID_PILIHAN'=>$idPilihan);
		$query = $this->db->select('*')
							->from('TB_PILIHAN')
							->where($where)
							->get()
							->result_array();
		return $query;
	}
	public function getPilihanAll($idAgenda)
	{
		$where= array('ID_AGENDA' => $idAgenda);
		$query = $this->db->select('*')
							->from('TB_PILIHAN')
							->where($where)
							->get()
							->result_array();
		return $query;
	}

	public function updatePilihan($idAgenda,$idPilihan,$data)
	{
		$query= $this->getPilihan($idAgenda,$idPilihan);
		if(!empty($query)){
			$query= $this->db->where('ID_PILIHAN', $idPilihan)
								->update('TB_PILIHAN',$data);
			return $query;
		}else{
			return false;
		}
	}

	public function deletePilihan($idAgenda,$idPilihan)
	{
		$query= $this->getPilihan($idAgenda,$idPilihan);
		if(!empty($query)){
			$query= $this->db->where('ID_PILIHAN', $idPilihan)
								->delete('TB_PILIHAN');
				return $query;
		}else{
			return false;
		}
	}

	
}
?>
