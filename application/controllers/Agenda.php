<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged')) {
			redirect('logout');
		}
		$this->load->model('M_agenda');
		$this->load->model('Master');
		$this->load->helper('text');
		$this->load->helper('Parsing');
	}
	public function index()
	{
		$nim = $this->session->userdata('nim');
		$data = array(
			'content' => 'content/Dashboard',
			'listagenda' => $this->M_agenda->getAgenda($nim)
		);
		$this->load->view('Template', $data);
	}

	public function set()
	{
		$nim = $this->session->userdata('nim');
		$gambar = r($this->input->POST('foto'));
		$buka = r($this->input->POST('tgl_buka'));
		$tutup = r($this->input->POST('tgl_tutup'));
		$pengumuman = r($this->input->POST('tgl_pengumuman'));

		if ($buka == "")
			$buka = date('Y-m-d H:m', strtotime($buka));

		if ($tutup == "")
			$tutup = date('Y-m-d H:m', strtotime($tutup));

		if ($pengumuman == "")
			$pengumuman = date('Y-m-d H:m', strtotime($pengumuman));

		if ($gambar == "")
			$gambar = 'https://i.postimg.cc/MHs6pZsF/em-event.jpg';
		$data = array(
			"NIM" => $nim,
			"TB_AGENDA" => r($this->input->POST('tb_agenda')),
			"LEMBAGA" => r($this->input->POST('lembaga')),
			"DESKRIPSI" => r($this->input->POST('deskripsi')),
			"TGL_BUKA" => $buka,
			"TGL_TUTUP" => $tutup,
			"TGL_PENGUMUMAN" => $pengumuman,
			"TB_PILIHAN_PENGUMUMAN" => r($this->input->POST('tb_pilihan_pengumuman')),
			"FOTO" => $gambar,
			"STATUS" => 'DRAFT',
			"YOUTUBE" => r($this->input->POST('yt')),
			"HALAMAN" => r($this->input->POST('halaman')),
			"TWIBBON" => r($this->input->POST('twibbon')),
		);
		$check = $this->Master->insert('TB_AGENDA', $data);
		if ($check) {
			$get = $this->Master->get('TB_AGENDA', $data);
			$get = $get[count($get) - 1];
			$data2 = array(
				'ID_AGENDA' => $get['ID_AGENDA'],
				'TB_PILIHAN' => 'KETUA REKRUTMEN',
				'HAK' => 'BPI'
			);
			$agenda = $this->Master->insert('TB_PILIHAN', $data2);
			if ($agenda) {
				$get = $this->Master->get('TB_PILIHAN', $data2);
				$get = $get[count($get) - 1];
				$data3 = array(
					'ID_PILIHAN' => $get['ID_PILIHAN'],
					'NIM' => $nim,
					'NAMA' => $this->session->userdata('nama')
				);
				$pilihan = $this->Master->insert('TB_PENGURUS', $data3);
				if ($pilihan) {
					$data = array(
						'status' => true,
						'message' => 'Data berhasil diinput',
						'data' => $data
					);
				}
			}
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
		$nim = $this->session->userdata('nim');
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
