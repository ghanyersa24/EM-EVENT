<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{

	public function index()
	{
		$data = array(
			'content' => 'content/event/Statistik'
		);
		$this->load->view('Template-detail', $data);
	}
}
