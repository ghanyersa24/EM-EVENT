<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plotting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('Parsing');
		$this->load->Model('Master');
		$this->load->Model('M_plotting');
		$this->load->Model('M_agenda');
	}
	public function index($idagenda)
	{
		$id = base64_decode($idagenda);
		$check = $this->M_agenda->check($id);
		if ($check) {
			$data = array(
				'content' => 'content/event/Plotting',
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
		$data = $this->M_plotting->get($nim, $idagenda);
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
			$data['PILIHAN'] = json_decode($data['PILIHAN']);
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
		$id_pilihan = r($this->input->post('id_pilihan'));
		$data = array(
			'STATUS' => 'DITERIMA',
			'ID_PILIHAN_DITERIMA' => $id_pilihan
		);
		$check = $this->Master->update('TB_DAFTAR', $data, array('ID_AGENDA' => $id, 'NIM' => $nim));
		if ($check) {
			$data = array(
				'status' => true,
				'message' => 'Berhasil diterima',
				'data' => $data
			);
		} else {
			$data = array(
				'status' => false,
				'message' => 'Tidak berhasil diterima',
				'data' => $check
			);
		}
		echo json_encode($data);
	}

	public function updateDrop()
	{
		$id = r($this->input->post('id_agenda'));
		$nim = r($this->input->post('nim'));
		$data = array(
			'STATUS' => 'DITERIMA',
			'ID_PILIHAN_DITERIMA' => 0
		);
		$check = $this->Master->update('TB_DAFTAR', $data, array('ID_AGENDA' => $id, 'NIM' => $nim));
		if ($check) {
			$data = array(
				'status' => true,
				'message' => 'Berhasil diterima',
				'data' => $data
			);
		} else {
			$data = array(
				'status' => false,
				'message' => 'Tidak berhasil diterima',
				'data' => $check
			);
		}
		echo json_encode($data);
	}

	public function dropout()
	{
		$data = array(
			'content' => 'content/event/Dropout'
		);
		$this->load->view('Template-detail', $data);
	}
}
