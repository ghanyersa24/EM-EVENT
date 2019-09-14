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
		$nim = '165150401111060';
		$data = array(
			'content' => 'content/Dashboard'
		);
		echo json_encode(($data));
		// $this->load->view('Template', $data);
	}

	public function set()
	{
		$nim = '165150401111060';
		$data = array(
			"ID_AGENDA" => "",
			"NIM" => $nim,
			"TB_AGENDA" => r($this->input->POST('tb_agenda')),
			"LEMBAGA" => r($this->input->POST('lembaga')),
			"DESKRIPSI" => r($this->input->POST('deskripsi')),
			"TGL_BUKA" => r($this->input->POST('tgl_buka')),
			"TGL_TUTUP" => r($this->input->POST('tgl_tutup')),
			"TGL_PENGUMUMAN" => r($this->input->POST('tgl_pengumuman')),
			"TB_PILIHAN_PENGUMUMAN" => r($this->input->POST('tb_pilihan_pengumuman')),
			"FOTO" => r($this->input->POST('foto')),
			"STATUS" => 'DRAFT',
			"YOUTUBE" => r($this->input->POST('yt')),
			"HALAMAN" => r($this->input->POST('halaman')),
			"TWIBBON" => r($this->input->POST('twibbon')),
		);
		$check = $this->Master->insert('TB_AGENDA', $data);
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
	public function get()
	{
		$nim = '165150401111060';
		$data = $this->M_agenda->getAgenda($nim);
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
		$id = $this->input->post('ID_AGENDA');
		$data = array(
			"TB_AGENDA" => r($this->input->POST('tb_agenda')),
			"LEMBAGA" => r($this->input->POST('lembaga')),
			"DESKRIPSI" => r($this->input->POST('deskripsi')),
			"TGL_BUKA" => r($this->input->POST('tgl_buka')),
			"TGL_TUTUP" => r($this->input->POST('tgl_tutup')),
			"TGL_PENGUMUMAN" => r($this->input->POST('tgl_pengumuman')),
			"TB_PILIHAN_PENGUMUMAN" => r($this->input->POST('tb_pilihan_pengumuman')),
			"FOTO" => r($this->input->POST('foto')),
			"STATUS" => 'DRAFT',
			"YOUTUBE" => r($this->input->POST('yt')),
			"HALAMAN" => r($this->input->POST('halaman')),
			"TWIBBON" => r($this->input->POST('twibbon')),
		);
		$check = $this->Master->update('TB_AGENDA', $data, array('ID_AGENDA' => $id));
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
				'data' => $check
			);
		}
		echo json_encode($data);
	}
	public function delete()
	{
		$nim = r($this->input->POST('nim'));
		$id = r($this->input->POST('id_agenda'));
		$check = $this->Master->delete('TB_AGENDA', array('NIM' => $nim, 'ID_AGENDA' => $id));
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
