<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{

	public function list($id)
	{
		$data = array(
			'content' => 'content/event/Divisi'
		);
		$this->load->view('Template-detail', $data);
	}
}
