<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged')) {
			redirect('logout');
		}
		$this->load->model('M_jadwal');
		$this->load->model('Master');
		$this->load->helper('text');
		$this->load->helper('Parsing');
	}


	public function set()
	{

		$idagenda = $this->input->post('id_agenda');
		$tanggal = date('Y-m-d',strtotime($this->input->POST('jadwal')));
		$data = array(
			"ID_C_JADWAL" =>  "",
			"ID_AGENDA" => $idagenda,
			"JADWAL" => $tanggal,
			"BATASAN" => r($this->input->POST('batasan')),
		);
		$check = $this->Master->insert('TB_JADWAL', $data);
		if ($check) {
			$data = array(
				'error' => false,
				'message' => 'Data berhasil diinput',
				'data' => $data
			);
		} else {
			$data = array(
				'error' => true,
				'message' => 'Data gagal diinputkan',
				'data' => $data
			);
		}
		echo json_encode($data);
	}

	public function get()
	{
		$idagenda = $this->input->post('id_agenda');
		$data = $this->M_jadwal->getJadwalAll($idagenda);
		if (empty($data)) {
			echo json_encode(
				array(
					'status' => 200,
					'error' => true,
					'message' => 'data tidak berhasil diterima',
					'data' => null
				)
			);
		} else {
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data berhasil diterima',
					'data' => $data
				)
			);
		}
	}

	public function getID()
	{
		$idpilihan = 16;
		$data = $this->Master->get('TB_PILIHAN', array('ID_PILIHAN' => $idpilihan));
		if (empty($data)) {
			echo json_encode(
				array(
					'status' => 200,
					'error' => true,
					'message' => 'data tidak berhasil diterima',
					'data' => null
				)
			);
		} else {
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data berhasil diterima',
					'data' => $data
				)
			);
		}
	}

	public function update()
	{
		$idlama = r($this->input->POST('id_jadwal'));
		$tanggal = date('Y-m-d',strtotime($this->input->POST('jadwal')));
		$data = array(
			"JADWAL" => $tanggal,
			"BATASAN" => r($this->input->POST('batasan')),
		);
		$check = $this->Master->update('TB_JADWAL', $data, array('ID_C_JADWAL' => $idlama));
		if ($check) {
			$data = array(
				'status' => true,
				'message' => 'Data berhasil diupdate',
				'data' => $data
			);
		} else {
			$data = array(
				'status' => false,
				'message' => 'Data gagal diupdate',
				'data' => $data
			);
		}
		echo json_encode($data);
	}

	public function delete()
	{
		$id = r($this->input->POST('id_jadwal'));
		$check = $this->Master->delete('TB_JADWAL', array('ID_C_JADWAL' => $id));
		if ($check) {
			$data = array(
				'status' => true,
				'message' => 'Data berhasil dihapus',
				'data' => $check
			);
		} else {
			$data = array(
				'status' => false,
				'message' => 'Data gagal dihapus',
				'data' => $check
			);
		}
		echo json_encode($data);
	}
}
