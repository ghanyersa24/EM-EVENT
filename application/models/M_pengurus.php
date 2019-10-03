<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Pengurus extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_agenda');
	}


	public function checkPengurus($idPilihan, $nim)
	{
		$where = array('ID_PILIHAN' => $idPilihan, 'NIM' => $nim);
		$query = $this->db->select('*')
			->from('TB_PENGURUS')
			->where($where)
			->get()
			->result_array();
		return $query;
	}
	public function get($idAgenda)
	{
		$query = $this->db->select('*')
			->from('TB_PILIHAN a')
			->join('TB_PENGURUS b', 'a.ID_PILIHAN = b.ID_PILIHAN')
			->where('a.ID_AGENDA', $idAgenda)
			->get()
			->result_array();
		return $query;
	}

	public function getID($nim, $idPilihan, $idAgenda)
	{
		$query = $this->db->select("*,(select TB_PILIHAN($idAgenda)) PILIHAN")
			->from('TB_PILIHAN a')
			->join('TB_PENGURUS b', 'a.ID_PILIHAN = b.ID_PILIHAN')
			->where(array('b.ID_PILIHAN' => $idPilihan, 'b.NIM' => $nim))
			->get()
			->result_array()[0];
		return $query;
	}

	public function updatePengurus($idPilihan, $nim, $data)
	{
		$query = $this->checkPengurus($idPilihan, $nim);
		if (!empty($query)) {
			$query = $this->db->where(array('ID_PILIHAN' => $idPilihan, 'NIM' => $nim))
				->update('TB_PENGURUS', $data);
			return $query;
		} else {
			return false;
		}
	}

	public function deletePengurus($idPilihan, $nim)
	{
		$query = $this->checkPengurus($idPilihan, $nim);
		if (!empty($query)) {
			$query = $this->db->where(array('ID_PILIHAN' => $idPilihan, 'NIM' => $nim))
				->delete('TB_PENGURUS');
			return $query;
		} else {
			return false;
		}
	}

	public function checkbio($nim)
	{
		return $this->db->where('NIM',$nim)->get('TB_BIODATA')->result_array();
	}
}
