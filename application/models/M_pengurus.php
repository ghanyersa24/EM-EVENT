<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pengurus extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_agenda');
	}

	public function setPengurus($pengurus)
	{
		$query= $this->M_agenda->getAgenda($pengurus['ID_AGENDA']);
		if(!empty($query)){
			$query = $this->db->insert('TB_PENGURUS', $pengurus);
			return $query;
		}else{
			return false;
		}
	}
	public function checkPengurus($idPilihan,$nim)
	{
		$where= array('ID_PILIHAN'=>$idPilihan,'NIM'=>$nim);
		$query = $this->db->select('*')
							->from('TB_PENGURUS')
							->where($where)
							->get()
							->result_array();
		return $query;
	}
	public function getPengurus($idAgenda)
	{
		$query = $this->db->select('*')
							->from('TB_PENGURUS')
							->where('ID_AGENDA',$idAgenda)
							->get()
							->result_array();
		return $query;
	}

	public function updatePengurus($idPilihan,$nim,$data)
	{
		$query= $this->checkPengurus($idPilihan,$nim);
		if(!empty($query)){
			$query= $this->db->where(array('ID_PILIHAN'=>$idPilihan,'NIM'=>$nim))
								->update('TB_PENGURUS',$data);
			return $query;
		}else{
			return false;
		}
	}

	public function deletePengurus($idPilihan,$nim)
	{
		$query= $this->checkPengurus($idPilihan,$nim);
		if(!empty($query)){
			$query= $this->db->where(array('ID_PILIHAN'=>$idPilihan,'NIM'=>$nim))
								->delete('TB_PENGURUS');
				return $query;
		}else{
			return false;
		}
	}

	
}
?>
