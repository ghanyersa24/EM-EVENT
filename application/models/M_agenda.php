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
		$query = $this->db->query("SELECT DISTINCT `TB_AGENDA`.`ID_AGENDA`,`TB_AGENDA`.`TB_AGENDA`,	`TB_AGENDA`.`FOTO`,	`TB_AGENDA`.`DESKRIPSI`	FROM `TB_PENGURUS` JOIN `TB_PILIHAN` ON `TB_PENGURUS`.`ID_PILIHAN` = `TB_PILIHAN`.`ID_PILIHAN` JOIN `TB_AGENDA` ON `TB_PILIHAN`.`ID_AGENDA` = `TB_AGENDA`.`ID_AGENDA` WHERE`TB_PENGURUS`.`NIM` = $nim OR `TB_AGENDA`.`NIM` = $nim")->result_array();
		return $query;
	}
	function check($id)
	{
		$query = $this->db->where(array('ID_AGENDA' => $id))->get('TB_AGENDA')->result_array();
		return $query;
	}
}
