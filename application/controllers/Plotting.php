<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plotting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged')) {
			redirect('logout');
		}
		$this->load->helper('Parsing');
		$this->load->helper('text');
		$this->load->Model('Master');
		$this->load->Model('M_plotting');
		$this->load->Model('M_agenda');
	}
	public function index($idagenda)
	{
		$id = base64_decode($idagenda);
		$nim = $this->session->userdata('nim');
		$check = $this->M_agenda->check($id);
		if (!empty($check)) {
			$data = array(
				'content' => 'content/event/Plotting',
				'idagenda' => $idagenda,
				'agenda' => $check[0]['TB_AGENDA'],
				'title' => 'PLOTTING',
				'divisi' => $this->Master->get('TB_PILIHAN', array('ID_AGENDA' => $id)),
				'listagenda' => $this->M_agenda->getAgenda($nim)
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
		// $idagenda=10;
		// $nim='175150400111035';
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
			$data[0]['PILIHAN'] = json_decode($data[0]['PILIHAN']);
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data agenda berhasil diterima',
					'data' => $data[0]
				)
			);
		}
	}

	public function update()
	{
		$idagenda = r($this->input->post('id_agenda'));
		$nim = r($this->input->post('nim'));
		// $idagenda = 10;
		// $nim = '175150400111035';
		$id_pilihan = r($this->input->post('id_pilihan'));
		$data = array(
			'STATUS' => 'DITERIMA',
			'ID_PILIHAN_DITERIMA' => $id_pilihan
		);
		$check = $this->Master->update('TB_DAFTAR', $data, array('ID_AGENDA' => $idagenda, 'NIM' => $nim));
		if ($check) {
			$data = array(
				'error' => false,
				'message' => 'Berhasil diterima',
				'data' => $data
			);
		} else {
			$data = array(
				'error' => true,
				'message' => 'Tidak berhasil diterima',
				'data' => $check
			);
		}
		echo json_encode($data);
	}

	public function updateDrop()
	{

		$idagenda = r($this->input->post('id_agenda'));
		$nim = r($this->input->post('nim'));
		// $idagenda = 10;
		// $nim = '175150400111035';
		$data = array(
			'STATUS' => 'SCREENING',
			'ID_PILIHAN_DITERIMA' => 0
		);
		$check = $this->Master->update('TB_DAFTAR', $data, array('ID_AGENDA' => $idagenda, 'NIM' => $nim));
		if ($check) {
			$data = array(
				'error' => false,
				'message' => 'Data Berhasil di Drop out',
				'data' => $data
			);
		} else {
			$data = array(
				'error' => true,
				'message' => 'Data gagal di Drop out',
				'data' => $check
			);
		}
		echo json_encode($data);
	}

	public function dropout($idagenda)
	{
		$id = base64_decode($idagenda);
		$nim = $this->session->userdata('nim');
		$check = $this->M_agenda->check($id);
		if (!empty($check)) {
			$data = array(
				'content' => 'content/event/Dropout',
				'idagenda' => $idagenda,
				'agenda' => $check[0]['TB_AGENDA'],
				'title' => 'DROP OUT',
				'divisi' => $this->Master->get('TB_PILIHAN', array('ID_AGENDA' => $id)),
				'listagenda' => $this->M_agenda->getAgenda($nim)
			);
			$this->load->view('Template-detail', $data);
		} else {
			redirect('agenda');
		}
	}
}
