<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plotting extends CI_Controller
{

	public function index()
	{
		$data = array(
			'content' => 'content/event/Plotting'
		);
		$this->load->view('Template-detail', $data);
	}

	public function dropout()
	{
		$data = array(
			'content' => 'content/event/Dropout'
		);
		$this->load->view('Template-detail', $data);
	}
}
