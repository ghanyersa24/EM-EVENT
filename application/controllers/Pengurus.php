<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged')) {
			redirect('logout');
		}
		$this->load->model('M_pengurus');
		$this->load->model('M_agenda');
		$this->load->model('Master');
		$this->load->helper('text');
		$this->load->helper('Parsing');
	}

	public function set()
	{
		$data = array(
			"ID_PILIHAN" =>  r($this->input->POST('id_pilihan')),
			"NIM" => r($this->input->POST('nim')),
			"NAMA" => r($this->input->POST('nama')),
			"TELPON" => r($this->input->POST('telpon')),
			"LINE" => r($this->input->POST('line')),
		);
		$check = $this->Master->insert('TB_PENGURUS', $data);
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
		$idagenda = r($this->input->post('id_agenda'));
		// $idagenda=15;
		$check = $this->M_agenda->check($idagenda);
		if (!empty($check)) {
			$data = $this->M_pengurus->get($idagenda);
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
				header('Content-Type: application/json');
				echo json_encode(
					array(
						'status' => 200,
						'error' => false,
						'message' => 'data berhasil diterima',
						'data' => $this->parse($data)
					)
				);
			}
		} else {
			echo json_encode(
				array(
					'status' => 200,
					'error' => true,
					'message' => 'data agenda tidak cocok',
					'data' => null
				)
			);
		}
	}

	public function getID()
	{
		$idagenda = 7;
		$nim = r($this->input->POST('nim'));
		$idpilihan = r($this->input->POST('pilihan'));
		$check = $this->M_agenda->checkAgenda($idagenda);
		if ($check) {
			$data = $this->M_pengurus->getID($nim, $idpilihan, $idagenda);
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
				$data['PILIHAN'] = json_decode($data['PILIHAN']);
				echo json_encode(
					array(
						'status' => 200,
						'error' => false,
						'message' => 'data berhasil diterima',
						'data' => $data
					)
				);
			}
		} else {
			echo json_encode(
				array(
					'status' => 200,
					'error' => true,
					'message' => 'data agenda tidak cocok',
					'data' => null
				)
			);
		}
	}

	public function update()
	{
		$idlama = r($this->input->POST('idlama'));
		$nim = r($this->input->POST('nimlama'));
		$idpilihan=r($this->input->POST('id_pilihan'));
		$data = array(
			"NIM" =>  r($this->input->POST('nim')),
			"NAMA" => r($this->input->POST('nama')),
			"TELPON" => r($this->input->POST('telpon')),
			"LINE" => r($this->input->POST('line')),
		);
		if($idpilihan !==""){
			$data["ID_PILIHAN"]= $idpilihan;
		}
		$check = $this->Master->update('TB_PENGURUS', $data, array('ID_PILIHAN' => $idlama, 'NIM' => $nim));
		if ($check) {
			$data = array(
				'error' => false,
				'message' => 'Data berhasil diupdate',
				'data' => $data
			);
		} else {
			$data = array(
				'error' => true,
				'message' => 'Data gagal diupdate',
				'data' => $data
			);
		}
		echo json_encode($data);
	}

	public function delete()
	{
		$nim = r($this->input->POST('nim'));
		$id = r($this->input->POST('id_pilihan'));
		$check = $this->Master->delete('TB_PENGURUS', array('NIM' => $nim, 'ID_PILIHAN' => $id));
		if ($check) {
			$data = array(
				'error' => false,
				'message' => 'Data berhasil dihapus',
				'data' => $check
			);
		} else {
			$data = array(
				'error' => true,
				'message' => 'Data gagal dihapus',
				'data' => $check
			);
		}
		echo json_encode($data);
	}

	private function parse($data)
	{
		$res = array();
		$i = 1;
		foreach ($data as $key) {
			$nim="'".$key['NIM']."'";
			$nama="'".$key['NAMA']."'";
			$idpilihan="'".$key['ID_PILIHAN']."'";
			$telpon="'".$key['TELPON']."'";
			$line="'".$key['LINE']."'";
			$temp = array(
				'NO' => $i,
				'NAMA' => $key['NAMA'],
				'JABATAN' => $key['TB_PILIHAN'],
				'STATUS' => $key['HAK'],
				'ACTION' => '<a href = "#!" onclick = "ubah('.$nim.','.$idpilihan.','.$nama.','.$telpon.','.$line.')" class = "secondary-content tooltipped" data - position = "right" data - tooltip = "Ubah Pengurus" > <i class="mdi-content-create"> </i></a >'
			);
			array_push($res, $temp);
			$i++;
		}
		return $res;
	}
}
