<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	public function update($table, $data, $where)
	{
		return $this->db->where($where)->update($table, $data);
	}
	public function get($table, $where)
	{
		return $this->db->select('*')->from($table)->where($where)->get()->result_array();
	}
	public function delete($table, $where)
	{
		return $this->db->where($where)->delete($table);
	}
}
