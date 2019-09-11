<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('Parsing');
		header("content-type:application/json");
	}

	public function addbio()
	{
		$nim = r($this->input->post('nim'));
		$auth = r($this->input->post('auth'));

		$data = array(
			'NIM'               => r($this->input->post('nim')),
			'NAMA_LENGKAP'      => r($this->input->post('nama_lengkap')),
			'PANGGILAN'	        => r($this->input->post('panggilan')),
			'FAKULTAS'          => r($this->input->post('fakultas')),
			'JURUSAN'           => r($this->input->post('jurusan')),
			'PRODI'             => r($this->input->post('prodi')),
			'JENIS_KELAMIN'	    => r($this->input->post('jenis_kelamin')),
			'IPK'	            => r($this->input->post('ipk')),
			'CITA'	            => r($this->input->post('cita')),
			'TEMPAT_LAHIR'	    => r($this->input->post('tempat_lahir')),
			'TANGGAL_LAHIR'	    => r($this->input->post('tanggal_lahir')),
			'AGAMA'	            => r($this->input->post('agama')),
			'ALAMAT_ASAL'	    => r($this->input->post('alamat_asal')),
			'ALAMAT_MALANG'	    => r($this->input->post('alamat_malang')),
			'TELPON'	        => r($this->input->post('telp')),
			'LINE'	            => r($this->input->post('line')),
			'INSTAGRAM'	        => r($this->input->post('ig')),
			'EMAIL'	            => r($this->input->post('email')),
			'KONTAK_ORTU'	    => r($this->input->post('kontak_ortu')),
			'WALI'	            => r($this->input->post('wali')),
			'HOBI'	            => r($this->input->post('hobi')),
			'MOTTO'	            => r($this->input->post('motto')),
			'FASILITAS'	        => implode('~', (array) r($this->input->post('fasilitas'))),
			'JARINGAN'	        => implode('~', (array) r($this->input->post('jaringan'))),
			'KEAHLIAN'	        => implode('~', (array) r($this->input->post('keahlian'))),
			'ANAK'              => r($this->input->post('anak') . '~' . $this->input->post('dari')),
			'RIWAYAT_SAKIT'     => r($this->input->post('riwayat_sakit')),
			'DARAH'	            => r($this->input->post('darah')),
			'PDH'	            => r($this->input->post('pdh')),
			'HIJAB'	            => r($this->input->post('hijab')),
			'PORTOFOLIO'	    => r($this->input->post('portofolio')),
		);
		
		if (empty($nim)) {
			echo json_encode(array(
				'status' => 200,
				'error' => true,
				'message' => 'NIM not found',
				'data' => null
			));
		} else {
			$checkLanjutan = checkCIAM($nim, $auth);
			if ($checkLanjutan->status === true) {
				if (!$this->Userbio->checkNIM($nim, 'TB_BIODATA')) {
					$this->Userbio->updateDataNIM($nim, 'TB_BIODATA', $data);
					echo json_encode(array(
						'status' => 200,
						'error' => false,
						'message' => 'Data NIM is update',
						'data' => $data
					));
				} else {
					$this->Userbio->addBD($data);
					echo json_encode(array(
						'status' => 200,
						'error' => false,
						'message' => 'Success Insert',
						'data' => $data
					));
				}
			} else {
				echo json_encode(array(
					'status' => 200,
					'error' => true,
					'message' => 'Username Password is not verified',
					'data' => null
				));
			}
		}
	}
}
