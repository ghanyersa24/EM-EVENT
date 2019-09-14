<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengurus');
		$this->load->model('M_agenda');
		$this->load->model('Master');
		$this->load->helper('text');
		$this->load->helper('Parsing');
	}

	public function setPilihan()
	{
		$idagenda = 20;
		$data = array(
			"ID_PILIHAN" =>  "",
			"ID_AGENDA" => $idagenda,
			"TB_PILIHAN" => r($this->input->POST('pilihan')),
			"HAK" => r($this->input->POST('hak')),
		);
		$check = $this->Master->insert('TB_PILIHAN', $data);
		if ($check) {
			$data = array(
				'status' => true,
				'message' => 'Data berhasil diinput',
				'data' => $data
			);
		} else {
			$data = array(
				'status' => false,
				'message' => 'Data gagal diinputkan',
				'data' => $data
			);
		}
		echo json_encode($data);
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
		$idlama = r($this->input->POST('idlama'));
		$idagenda = r($this->input->POST('idagenda'));
		$data = array(
			"ID_PILIHAN" =>  r($this->input->POST('id_pilihan')),
			"TB_PILIHAN" => r($this->input->POST('pilihan')),
			"HAK" => r($this->input->POST('hak')),
		);
		$check = $this->Master->update('TB_PILIHAN', $data, array('ID_PILIHAN' => $idlama, 'ID_AGENDA' => $idagenda));
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
		$idagenda = 20;
		$id = r($this->input->POST('id_pilihan'));
		$check = $this->Master->delete('TB_PILIHAN', array('ID_PILIHAN' => $id, 'ID_AGENDA' => $idagenda));
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
