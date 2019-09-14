<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_divisi');
		$this->load->model('Userbio');
		$this->load->helper('text');
		$this->load->helper('Parsing');
	}
	public function list($id)
	{
		$data = array(
			'content' => 'content/event/Divisi'
		);
		$this->load->view('Template-detail', $data);
	}

	public function get()
	{
		$divisi = 8;
		$idagenda = 3;
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

	public function getBio()
	{
		$nim = '175030100111059';
		$idagenda = 3;
		$res = $this->Userbio->waiting($nim, $idagenda);
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
			$res['DAFTAR']=json_decode($res["DAFTAR"]);
			$res['KEPANITIAAN_DIIKUTI']=json_decode($res["KEPANITIAAN_DIIKUTI"]);
			$res['ORGANISASI_DIIKUTI']=json_decode($res["ORGANISASI_DIIKUTI"]);
			$res['PERFORM']=json_decode($res["PERFORM"]);
			$res['PENDIDIKAN_FORMAL']=json_decode($res["PENDIDIKAN_FORMAL"]);
			$res['PENGALAMAN_KEPANITIAAN']=json_decode($res["PENGALAMAN_KEPANITIAAN"]);
			$res['PENDIDIKAN_NON_FORMAL']=json_decode($res["PENDIDIKAN_NON_FORMAL"]);
			$res['PENGALAMAN_ORGANISASI']=json_decode($res["PENGALAMAN_ORGANISASI"]);
			$res['PRESTASI']=json_decode($res["PRESTASI"]);
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
}
