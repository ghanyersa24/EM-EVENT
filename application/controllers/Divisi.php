<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged')) {
			redirect('logout');
		}
		$this->load->model('M_divisi');
		$this->load->model('M_agenda');
		$this->load->model('Master');
		$this->load->model('Userbio');
		$this->load->helper('text');
		$this->load->helper('Parsing');
	}
	public function list($idagenda, $idpilihan)
	{
		$id = base64_decode($idagenda);
		$check = $this->M_agenda->check($id);
		if ($check) {
			$data = array(
				'content' => 'content/event/Divisi',
				'idagenda' => $idagenda,
				'idpilihan' => $idpilihan,
				'divisi' => $this->Master->get('TB_PILIHAN', array('ID_AGENDA' => $id))
			);
			$this->load->view('Template-detail', $data);
		} else {
			redirect('agenda');
		}
	}

	public function get()
	{
		$divisi = r($this->input->post('id_pilihan'));
		$idagenda = r($this->input->post('id_agenda'));
		// $divisi = 20;
		// $idagenda = 10;
		$data = $this->M_divisi->get($divisi, $idagenda);
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
			$get= $this->parse($data);
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data agenda berhasil diterima',
					'data' => $get
				)
			);
		}
	}

	public function getBio()
	{
		$nim = r($this->input->post('nim'));
		$idagenda = r($this->input->post('id_agenda'));
		$res = $this->Userbio->waiting($nim , $idagenda);
		if (empty($res)) {
			echo json_encode(
				array(
					'status' => 200,
					'error' => true,
					'message' => 'data tidak berhasil diterima',
					'data' => null
				)
			);
		} else {
			$res = $res[0];
			$res['DAFTAR'] = json_decode($res["DAFTAR"]);
			$res['KEPANITIAAN_DIIKUTI'] = json_decode($res["KEPANITIAAN_DIIKUTI"]);
			$res['ORGANISASI_DIIKUTI'] = json_decode($res["ORGANISASI_DIIKUTI"]);
			$res['PERFORM'] = json_decode($res["PERFORM"]);
			$res['PENDIDIKAN_FORMAL'] = json_decode($res["PENDIDIKAN_FORMAL"]);
			$res['PENGALAMAN_KEPANITIAAN'] = json_decode($res["PENGALAMAN_KEPANITIAAN"]);
			$res['PENDIDIKAN_NON_FORMAL'] = json_decode($res["PENDIDIKAN_NON_FORMAL"]);
			$res['PENGALAMAN_ORGANISASI'] = json_decode($res["PENGALAMAN_ORGANISASI"]);
			$res['PRESTASI'] = json_decode($res["PRESTASI"]);
			unset($res["JADWAL"]);
			unset($res["PILIHAN"]);
			unset($res["AGENDA"]);
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data berhasil diterima',
					'data' => $res
				)
			);
		}
	}
	public function parse($data)
	{
		if (!empty($data)) {
			$res = array();
			$i = 1;
			foreach ($data as $key) {
				$temp = array(
					'NO' => $i,
					'NAMA' => $key['NAMA_LENGKAP'],
					'FAKULTAS' => $key['FAKULTAS'],
					'TIKET' => date('d F Y', strtotime($key['JADWAL'])),
					'STATUS' => $key['STATUS'],
					'ACTION' => '<a class="waves-effect waves-light btn-small" onclick="buka('.$key['NIM'].')" style="font-size: 30px"><i class="mdi-action-visibility"></i></a>'
				);
				array_push($res, $temp);
				$i++;
			}
			return $res;
		} else {
			return $data;
		}
	}
}
