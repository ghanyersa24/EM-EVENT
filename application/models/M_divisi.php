<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_divisi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get($divisi, $idagenda)
	{
		$query = $this->db->select("NAMA_LENGKAP, TB_DAFTAR.NIM, TB_DAFTAR.STATUS ,FAKULTAS, TB_DAFTAR.ID_AGENDA, TB_JADWAL.JADWAL")
						  ->from('TB_DAFTAR')
						  ->join('TB_BIODATA', 'TB_DAFTAR.NIM = TB_BIODATA.NIM')
						  ->join('TB_JADWAL', 'TB_DAFTAR.ID_C_JADWAL = TB_JADWAL.ID_C_JADWAL')
						  ->where(array('TB_DAFTAR.ID_PILIHAN' => $divisi, 'TB_DAFTAR.ID_AGENDA' => $idagenda))
						  ->order_by('(TB_DAFTAR.STATUS = "DITERIMA") DESC','TB_JADWAL.JADWAL','NAMA_LENGKAP')
						  ->get()->result_array();
		return $query;
	}
}
