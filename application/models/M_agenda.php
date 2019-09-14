<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_agenda extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function setAgenda($agenda)
	{
		$query = $this->db->insert('TB_AGENDA', $agenda);
		return $query;
	}
	public function getAgenda($id)
	{
		$where= array('ID_AGENDA' => $id);
		$query = $this->db->select('*')
							->from('TB_AGENDA')
							->where($where)
							->get()
							->result_array();
		return $query;
	}
	public function getAgendaAll($nim)
	{
		$query = $this->db->where(array('NIM'=>$nim))->get('TB_AGENDA')->result_array();
		return $query;
	}

	public function updateAgenda($id,$data)
	{
		$query=  $this->db->select('*')
				->from('TB_AGENDA')
				->where(array('ID_AGENDA' => $id, 'NIM' => $data['NIM']))
				->get()
				->result_array();
		if(!empty($query)){
			$query= $this->db->where('ID_AGENDA', $id)
								->update('TB_AGENDA',$data);
			return $query;
		}else{
			return false;
		}
	}

	public function deleteAgenda($id,$nim)
	{
		$query= $this->db->select('*')
							->from('TB_AGENDA')
							->where(array('ID_AGENDA' => $id, 'NIM' => $nim))
							->get()
							->result_array();
		if(!empty($query)){
			$query= $this->db->where(array('ID_AGENDA' => $id, 'NIM' => $nim))
								->delete('TB_AGENDA');
				return $query;
		}else{
			return false;
		}
	}

	
}
?>
