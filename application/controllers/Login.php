<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_agenda');
		$this->load->model('Master');
		$this->load->helper('text');
		$this->load->helper('Parsing');
	}
	public function index()
	{
		$data = array(
			'content' => 'content/Login'
		);
		$this->load->view('Login', $data);
	}

	
	

	
	
}
