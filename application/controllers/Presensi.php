<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('Parsing');
		$this->load->Model('Master');
		$this->load->Model('M_presensi');
	}
	public function index($idagenda)
	{

		$data = array(
			'content' => "content/event/Presensi"
		);
		$this->load->view('Template-detail', $data);
	}

	public function get()
	{
		$nim = '175030100111059';
		$idagenda = 3;
		$data = $this->M_presensi->get($nim, $idagenda);
		if (empty($data)) {
			echo json_encode(
				array(
					'status' => 200,
					'error' => true,
					'message' => 'data agenda tidak berhasil diterima',
					'data' => null
				)
			);
		} else {
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data agenda berhasil diterima',
					'data' => $data
				)
			);
		}
	}

	public function update()
	{
		$id = r($this->input->post('id_agenda'));
		$nim = r($this->input->post('nim'));
		$data = array(
			'STATUS' => 'SCREENING'
		);
		$check = $this->Master->update('TB_DAFTAR', $data, array('ID_AGENDA' => $id, 'NIM' => $nim));
		if ($check) {
			$data = array(
				'status' => true,
				'message' => 'Berhasil melakukan presensi',
				'data' => $data
			);
		} else {
			$data = array(
				'status' => false,
				'message' => 'Gagal melakukan presensi',
				'data' => $check
			);
		}
		echo json_encode($data);
	}
}
