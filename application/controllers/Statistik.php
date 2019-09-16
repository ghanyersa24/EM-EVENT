<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('Parsing');
		$this->load->model('Master');
		$this->load->model('M_agenda');
		$this->load->model('M_statistik');
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
	public function get()
	{
		$idagenda = r($this->input->post('id_agenda'));
		// $idagenda=1;
		$data = $this->M_statistik->get($idagenda);
		if (empty($data)) {
			echo json_encode(
				array(
					'status' => 200,
					'error' => true,
					'message' => 'data presensi tidak berhasil diterima',
					'data' => null
				)
			);
		} else {
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data presensi berhasil diterima',
					'data' => $data
				)
			);
		}
	}
}
