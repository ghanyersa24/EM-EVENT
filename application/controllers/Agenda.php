<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_agenda');
		$this->load->helper('text');
	}
	public function index()
	{
		$nim = '165150401111060';
		$data = array(
			'content' => 'content/Dashboard',
			'data' => $this->M_agenda->getAgendaAll($nim)
		);
		$this->load->view('Template', $data);
	}

	public function setAgenda()
	{
		$inputan = array(
			"ID_AGENDA" => "",
			"NIM" => $this->input->POST('NIM'),
			"TB_AGENDA" => $this->input->POST('tb_agenda'),
			"LEMBAGA" => $this->input->POST('lembaga'),
			"DESKRIPSI" => $this->input->POST('deskripsi'),
			"TGL_BUKA" => $this->input->POST('tgl_buka'),
			"TGL_TUTUP" => $this->input->POST('tgl_tutup'),
			"TGL_PENGUMUMAN" => $this->input->POST('tgl_pengumuman'),
			"TB_PILIHAN_PENGUMUMAN" => $this->input->POST('tb_pilihan_pengumuman'),
			"FOTO" => $this->input->POST('fotot'),
			"STATUS" => 'DRAFT',
			"YOUTUBE" => $this->input->POST('yt'),
			"HALAMAN" => $this->input->POST('halaman'),
			"TWIBBON" => $this->input->POST('twibbon'),
		);
		$inputan['NIM']='165150401111060';
		$check = $this->M_agenda->setAgenda($inputan);
		if ($check) {
			$data = array(
				'status' => true,
				'message' => 'Data berhasil diinput',
				'data' => $inputan
			);
		} else {
			$data = array(
				'status' => false,
				'message' => 'Data gagal diinputkan',
				'data' => $check
			);
		}
		echo json_encode($data);
	}
}
