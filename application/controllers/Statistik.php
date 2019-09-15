<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master');
		$this->load->model('M_agenda');
	}
	public function index($idencode)
	{
		$id = base64_decode($idencode);
		$check = $this->M_agenda->check($id);
		if ($check) {
			$data = array(
				'content' => 'content/event/Statistik',
				'idagenda' => $idencode,
				'divisi' => $this->Master->get('TB_PILIHAN', array('ID_AGENDA' => $id))
			);
			$this->load->view('Template-detail', $data);
		} else {
			redirect('agenda');
		}
	}
}
