<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_jadwal extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_agenda');
	}

	public function setJadwal($Jadwal)
	{
		$query= $this->M_agenda->getAgenda($Jadwal['ID_AGENDA']);
		if(!empty($query)){
			$query = $this->db->insert('TB_JADWAL', $Jadwal);
			return $query;
		}else{
			return false;
		}
	}
	public function getJadwal($idAgenda,$idJadwal)
	{
		$where= array('ID_AGENDA' => $idAgenda,'ID_C_JADWAL'=>$idJadwal);
		$query = $this->db->select('*')
							->from('TB_JADWAL')
							->where($where)
							->get()
							->result_array();
		return $query;
	}
	public function getJadwalAll($idAgenda)
	{
		$where= array('ID_AGENDA' => $idAgenda);
		$query = $this->db->select('*')
							->from('TB_JADWAL')
							->where($where)
							->order_by('JADWAL','ASC')
							->get()
							->result_array();
		return $query;
	}

	public function updateJadwal($idAgenda,$idJadwal,$data)
	{
		$query= $this->getJadwal($idAgenda,$idJadwal);
		if(!empty($query)){
			$query= $this->db->where('ID_C_JADWAL', $idJadwal)
								->update('TB_JADWAL',$data);
			return $query;
		}else{
			return false;
		}
	}

	public function deleteJadwal($idAgenda,$idJadwal)
	{
		$query= $this->getJadwal($idAgenda,$idJadwal);
		if(!empty($query)){
			$query= $this->db->where('ID_C_JADWAL', $idJadwal)
								->delete('TB_JADWAL');
				return $query;
		}else{
			return false;
		}
	}

	
}
?>
