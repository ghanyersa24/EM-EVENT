<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_statistik extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get($idagenda)
	{
		$query = $this->db->select('')
			->from('TB')
			->get()->result_array();
		return $query;
	}
}
