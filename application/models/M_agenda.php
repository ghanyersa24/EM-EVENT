<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_agenda extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getAgenda($nim)
	{
		$query = $this->db->where(array('NIM' => $nim))->get('TB_AGENDA')->result_array();
		return $query;
	}
	function checkAgenda($id)
	{
		$query = $this->db->where(array('ID_AGENDA'=>$id))->get('TB_AGENDA')->result_array();
		if (!empty($query)) {
			return true;
		} else {
			return false;
		}
	}
}
