<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{

	public function index()
	{
		
		$data= array(
			'content' => "content/event/Presensi"
		);
		$this->load->view('Template-detail',$data);
	}
}
