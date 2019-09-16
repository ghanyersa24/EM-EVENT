<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_statistik extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get( $idagenda)
	{
		$query = $this->db->select('TB_JADWAL.JADWAL,COUNT(NIM) JUMLAH, TB_DAFTAR.STATUS')
						  ->from('TB_DAFTAR')
						  ->join('TB_JADWAL', 'TB_DAFTAR.ID_C_JADWAL = TB_JADWAL.ID_C_JADWAL')
						  ->where(array('TB_DAFTAR.ID_AGENDA' => $idagenda))
						  ->group_by(array('TB_DAFTAR.ID_C_JADWAL','TB_DAFTAR.STATUS'))
						  ->get()->result_array();
		return $query;
	}
}
