<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	public function presensi()
	{
		
		$data= array(
			'content' => "content/event/Presensi"
		);
		$this->load->view('Template-detail',$data);
	}
	public function plotting()
	{
		$data = array(
			'content' => 'content/event/Plotting'
		);
		$this->load->view('Template-detail', $data);
	}
	public function statistik()
	{
		$data = array(
			'content' => 'content/event/Statistik'
		);
		$this->load->view('Template-detail', $data);
	}
}
