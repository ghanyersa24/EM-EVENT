<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('logged')) {
		//     redirect('logout');
		// }
		$this->load->helper('Parsing');
		$this->load->model('Master');
		$this->load->helper('text');
		$this->load->model('M_agenda');
		$this->load->model('M_statistik');
	}
	public function index($idagenda)
	{
		$id = base64_decode($idagenda);
		$nim = $this->session->userdata('nim');
		$check = $this->M_agenda->check($id);
		if (!empty($check)) {
			$data = array(
				'content' => 'content/event/Statistik',
				'idagenda' => $idagenda,
				'agenda' => $check[0]['TB_AGENDA'],
				'title' => 'DATA STATISTIK',
				// 'divisi' => pilihan($this->Master->get('TB_PILIHAN', array('ID_AGENDA' => $id))),
				'listagenda' => $this->M_agenda->getAgenda($nim)
			);
			$this->load->view('Template-detail', $data);
		} else {
			redirect('agenda');
		}
	}
	public function get()
	{
		// $idagenda = r($this->input->post('id_agenda'));
		$idagenda = 12;
		$data = $this->M_statistik->get($idagenda);
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
			$send = array();
			$i = 0;
			// foreach ($data as $temp) {
			// 	if ($data[$i]["STATUS"] == 'DAFTAR') {
			// 		$send["DAFTAR"][]=$temp;
			// 	}else if($data[$i]["STATUS"]=='SCREENING'){
			// 		$send["SCREENING"][]=$temp;
			// 	}else if($data[$i]["STATUS"]=='DITERIMA'){
			// 		$send["DITERIMA"][]=$temp;
			// 	}
			// 	$i++;
			// }
			echo json_encode(
				array(
					'status' => 200,
					'error' => false,
					'message' => 'data presensi berhasil diterima',
					'data' => $data
				)
			);
		}
	}
}
