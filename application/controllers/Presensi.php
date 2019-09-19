<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged')) {
            redirect('logout');
        }
		$this->load->helper('Parsing');
		$this->load->Model('Master');
		$this->load->Model('M_presensi');
		$this->load->Model('M_agenda');
	}
	public function index($idagenda)
	{

		$id = base64_decode($idagenda);
		$check = $this->M_agenda->check($id);
		if ($check) {
			$data = array(
				'content' => 'content/event/Presensi',
				'idagenda' => $idagenda,
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
		$nim = r($this->input->post('nim'));
		// $idagenda = 14;
		// $nim = '175150400111035';
		$data = $this->M_presensi->get($nim, $idagenda);
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
					'data' => $data[0]
				)
			);
		}
	}

	public function update()
	{
		$idagenda = r($this->input->post('id_agenda'));
		$nim = r($this->input->post('nim'));
		// $idagenda = 14;
		// $nim = '175150400111035';
		$data = array(
			'STATUS' => 'SCREENING'
		);
		$check = $this->Master->update('TB_DAFTAR', $data, array('ID_AGENDA' => $idagenda, 'NIM' => $nim));
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
				'data' => $data
			);
		}
		echo json_encode($data);
	}
}
