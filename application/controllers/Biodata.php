<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Biodata extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->helper('Parsing');
        $this->load->model('Userbio');
    }

    //ADDBIODATA DIRI
    public function addBiodataDiri()
    {
        $nim            = r($this->input->post('nim'));
        $auth           = r($this->input->post('auth'));
        $nama_lengkap   = r($this->input->post('nama_lengkap'));
        $panggilan      = r($this->input->post('panggilan'));
        $fakultas       = r($this->input->post('fakultas'));
        $jurusan        = r($this->input->post('jurusan'));
        $prodi          = r($this->input->post('prodi'));
        $jenis_kelamin  = r($this->input->post('jenis_kelamin'));
        $ipk            = r($this->input->post('ipk'));
        $cita           = r($this->input->post('cita'));
        $tempat_lahir   = r($this->input->post('tempat_lahir'));
        $tanggal_lahir  = r($this->input->post('tanggal_lahir'));
        $agama          = r($this->input->post('agama'));
        $alamat_asal    = r($this->input->post('alamat_asal'));
        $alamat_malang  = r($this->input->post('alamat_malang'));
        $telp           = r($this->input->post('telp'));
        $line           = r($this->input->post('line'));
        $ig             = r($this->input->post('ig'));
        $email          = r($this->input->post('email'));
        $kontak_ortu    = r($this->input->post('kontak_ortu'));
        $wali           = r($this->input->post('wali'));
        $hobi           = r($this->input->post('hobi'));
        $motto          = r($this->input->post('motto'));
        $fasilitas      = implode('~', (array) r($this->input->post('fasilitas')));
        $jaringan       = implode('~', (array) r($this->input->post('jaringan')));
        $keahlian       = implode('~', (array) r($this->input->post('keahlian')));
        $anak           = r($this->input->post('anak') . '~' . $this->input->post('dari'));
        $riwayat_sakit  = r($this->input->post('riwayat_sakit'));
        $darah          = r($this->input->post('darah'));
        $pdh            = r($this->input->post('pdh'));
        $hijab          = r($this->input->post('hijab'));
        if ($hijab == 'on') {
            $hijab = 'BERHIJAB';
        } else {
            $hijab = 'TIDAK BERHIJAB';
        }

        $dataBio = array(
            'NIM'               => $nim,
            'NAMA_LENGKAP'      => $nama_lengkap,
            'PANGGILAN'            => $panggilan,
            'FAKULTAS'          => $fakultas,
            'JURUSAN'           => $jurusan,
            'PRODI'             => $prodi,
            'JENIS_KELAMIN'        => $jenis_kelamin,
            'IPK'                => $ipk,
            'CITA'                => $cita,
            'TEMPAT_LAHIR'        => $tempat_lahir,
            'TANGGAL_LAHIR'        => $tanggal_lahir,
            'AGAMA'                => $agama,
            'ALAMAT_ASAL'        => $alamat_asal,
            'ALAMAT_MALANG'        => $alamat_malang,
            'TELPON'            => $telp,
            'LINE'                => $line,
            'INSTAGRAM'            => $ig,
            'EMAIL'                => $email,
            'KONTAK_ORTU'        => $kontak_ortu,
            'WALI'                => $wali,
            'HOBI'                => $hobi,
            'MOTTO'                => $motto,
            'FASILITAS'            => $fasilitas,
            'JARINGAN'            => $jaringan,
            'KEAHLIAN'            => $keahlian,
            'ANAK'              => $anak,
            'RIWAYAT_SAKIT'     => $riwayat_sakit,
            'DARAH'                => $darah,
            'PDH'                => $pdh,
            'HIJAB'                => $hijab
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
            // var_dump($checkLanjutan);
            if ($checkLanjutan->status === true) {

                if (!$this->Userbio->checkNIM($nim, 'TB_BIODATA')) {
                    $this->Userbio->updateDataNIM($nim, 'TB_BIODATA', $dataBio);
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data NIM is update',
                        'data' => $dataBio
                    ));
                } else {
                    $this->Userbio->addBD($dataBio);
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success',
                        'data' => $dataBio
                    ));
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADDBIODATA SWOT
    // ------------------------------------------------------------------------------------------------------//
    public function addSWOT()
    {
        $nim            = r($this->input->post('nim'));
        $auth           = r($this->input->post('auth'));
        $strengths      = r($this->input->post('strengths'));
        $weaknesses     = r($this->input->post('weaknesses'));
        $opportunities  = r($this->input->post('opportunities'));
        $threats        = r($this->input->post('threats'));

        $dataSwot = array(
            'STRENGTHS' => $strengths,
            'WEAKNESS' => $weaknesses,
            'OPPORTUNITIES' => $opportunities,
            'THREATS' => $threats,
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
                $this->Userbio->updateDataNIM($nim, 'TB_BIODATA', $dataSwot);
                echo json_encode(array(
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success',
                    'data' => $dataSwot
                ));
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADDBIODATA PENDIDIKAN
    // ------------------------------------------------------------------------------------------------------//
    public function addBiodataPendidikan()
    {
        $nim            = r($this->input->post('nim'));
        $auth           = r($this->input->post('auth'));
        $jenjang_pf     = r($this->input->post('jenjang_pf'));
        $instansi_pf    = r($this->input->post('instansi_pf'));
        $tahun_pf       = r($this->input->post('tahun_pf'));
        $jenjang_pnf    = r($this->input->post('jenjang_pnf'));
        $instansi_pnf   = r($this->input->post('instansi_pnf'));
        $tahun_pnf      = r($this->input->post('tahun_pnf'));


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
                // ---------------------------PENDIDIKAN FORMAL -----------------------------
                $this->Userbio->deleteDataNIM($nim, 'TB_PENDIDIKAN_FORMAL');
                $dataPendForml = array();
                for ($i = 1; $i <= count($jenjang_pf) && $i != 11; $i++) {
                    $dataPendForml[] = array(
                        'ID_PF'     => $i,
                        'NIM'       => $nim,
                        'JENJANG'    => $jenjang_pf[$i - 1],
                        'INSTANSI'    => $instansi_pf[$i - 1],
                        'TAHUN'        => $tahun_pf[$i - 1],
                    );
                }
                $do = $this->Userbio->addPendForml($dataPendForml);
                if ($do !== false) {
                    // echo json_encode(array(
                    //     'status' => 200,
                    //     'error' => false,
                    //     'message' => 'Data Pendidikan Formal is updated',
                    //     'data' => $dataPendForml
                    // ));
                } else {
                    // echo json_encode(
                    //     array(
                    //         'status' => 500,
                    //         'error' => true,
                    //         'message' => 'Gagal melakukan fungsi Pendidikan Formal',
                    //         'data' => null
                    //     )
                    // );
                }

                // ---------------------------PENDIDIKAN NON FORMAL -----------------------------//
                $this->Userbio->deleteDataNIM($nim, 'TB_PENDIDIKAN_NON_FORMAL');
                $dataPendNon = array();
                for ($i = 1; $i <= count($jenjang_pnf) && $i != 11; $i++) {
                    $dataPendNon[] = array(
                        'ID_PNF'    => $i,
                        'NIM'       => $nim,
                        'JENJANG'    => $jenjang_pnf[$i - 1],
                        'INSTANSI'    => $instansi_pnf[$i - 1],
                        'TAHUN'        => $tahun_pnf[$i - 1],
                    );
                }
                $do = $this->Userbio->addPendNon($dataPendNon);
                if ($do !== false) {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data Pendidikan non Formal is updated',
                        'data' => $dataPendNon
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 500,
                            'error' => true,
                            'message' => 'Gagal melakukan fungsi non Pendidikan Formal'
                        )
                    );
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADDBIODATA ORGANISASI
    // ------------------------------------------------------------------------------------------------------//
    public function addBiodataOrganisasi()
    {
        $nim            = r($this->input->post('nim'));
        $auth           = r($this->input->post('auth'));
        $jabatan_po     = r($this->input->post('jabatan_po'));
        $instansi_po    = r($this->input->post('instansi_po'));
        $tahun_po       = r($this->input->post('tahun_po'));
        $jabatan_sd     = r($this->input->post('jabatan_sd'));
        $instansi_sd    = r($this->input->post('instansi_sd'));
        $tahun_sd       = r($this->input->post('tahun_sd'));

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
                // ------------------ PENGALAMAN ORGANISASI------------------//
                $this->Userbio->deleteDataNIM($nim, 'TB_PENGALAMAN_ORGANISASI');
                $dataOrgPenglm = array();
                for ($i = 1; $i <= count($jabatan_po) && $i != 11; $i++) {
                    $dataOrgPenglm[] = array(
                        'ID_PO'     => $i,
                        'NIM'       => $nim,
                        'JABATAN'    => $jabatan_po[$i - 1],
                        'INSTANSI'    => $instansi_po[$i - 1],
                        'TAHUN'        => $tahun_po[$i - 1],
                    );
                }

                $do = $this->Userbio->addOrgPenglm($dataOrgPenglm);
                if ($do !== false) {
                    // echo json_encode(array(
                    //     'status' => 200,
                    //     'error' => false,
                    //     'message' => 'Data Pengalaman Organisasi is updated',
                    //     'data' => $dataOrgPenglm
                    // ));
                } else {
                    // echo json_encode(
                    //     array(
                    //         'status' => 500,
                    //         'error' => true,
                    //         'message' => 'Gagal melakukan fungsi Pengalaman Organisasi',
                    //         'data' => null
                    //     )
                    // );
                }

                // ------------------ ORGANISASI DIIKUTI------------------//
                $this->Userbio->deleteDataNIM($nim, 'TB_ORGANISASI_DIIKUTI');
                $dataOrgIkut = array();
                for ($i = 1; $i <= count($jabatan_sd) && $i != 11; $i++) {
                    $dataOrgIkut[] = array(
                        'ID_PSD'    => $i,
                        'NIM'       => $nim,
                        'JABATAN'    => $jabatan_sd[$i - 1],
                        'INSTANSI'    => $instansi_sd[$i - 1],
                        'TAHUN'        => $tahun_sd[$i - 1],
                    );
                }

                $do = $this->Userbio->addOrgIkut($dataOrgIkut);
                if ($do !== false) {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data Organisasi Diikuti is updated',
                        'data' => $dataOrgIkut
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 500,
                            'error' => true,
                            'message' => 'Gagal melakukan fungsi Organisasi Diikuti',
                            'data' => null
                        )
                    );
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADDBIODATA KEPANITIAAN
    // ------------------------------------------------------------------------------------------------------//
    public function addBiodataKepanitiaan()
    {
        $nim            = r($this->input->post('nim'));
        $auth           = r($this->input->post('auth'));
        $jabatan_pk     = r($this->input->post('jabatan_pk'));
        $acara_pk       = r($this->input->post('acara_pk'));
        $tahun_pk       = r($this->input->post('tahun_pk'));
        $jabatan_ad     = r($this->input->post('jabatan_ad'));
        $acara_ad       = r($this->input->post('acara_ad'));
        $tahun_ad       = r($this->input->post('tahun_ad'));

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
                // ------------------ PENGALAMAN KEPANITIAAN------------------//
                $this->Userbio->deleteDataNIM($nim, 'TB_PENGALAMAN_KEPANITIAAN');
                $dataKepPenglm = array();
                for ($i = 1; $i <= count($acara_pk) && $i != 11; $i++) {
                    $dataKepPenglm[] = array(
                        'ID_PK'     => $i,
                        'NIM'       => $nim,
                        'JABATAN'    => $jabatan_pk[$i - 1],
                        'ACARA'        => $acara_pk[$i - 1],
                        'TAHUN'        => $tahun_pk[$i - 1],
                    );
                }
                $do = $this->Userbio->addKepPenglm($dataKepPenglm);
                if ($do !== false) {
                    // echo json_encode(array(
                    //     'status' => 200,
                    //     'error' => false,
                    //     'message' => 'Data Pengalaman Kepanitiaan is updated',
                    //     'data' => $dataKepPenglm
                    // ));
                } else {
                    // echo json_encode(
                    //     array(
                    //         'status' => 500,
                    //         'error' => true,
                    //         'message' => 'Gagal melakukan fungsi Pengalaman Kepanitiaan',
                    //         'data' => null
                    //     )
                    // );
                }

                // ------------------ KEPANITIAAN DIIKUTI------------------//
                $this->Userbio->deleteDataNIM($nim, 'TB_KEPANITIAAN_DIIKUTI');
                $dataKepIkut = array();
                for ($i = 1; $i <= count($acara_ad) && $i != 11; $i++) {
                    $dataKepIkut[] = array(
                        'ID_KD'     => $i,
                        'NIM'       => $nim,
                        'JABATAN'    => $jabatan_ad[$i - 1],
                        'ACARA'        => $acara_ad[$i - 1],
                        'TAHUN'        => $tahun_ad[$i - 1],
                    );
                }
                $do = $this->Userbio->addKepIkut($dataKepIkut);
                if ($do !== false) {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data Kepanitiaan Diikuti is updated',
                        'data' => $dataKepPenglm
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 500,
                            'error' => true,
                            'message' => 'Gagal melakukan fungsi Kepanitiaan Diikuti',
                            'data' => null
                        )
                    );
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADDBIODATA PRESTASI
    // ------------------------------------------------------------------------------------------------------//
    public function addBiodataPrestasi()
    {
        $nim        = r($this->input->post('nim'));
        $auth       = r($this->input->post('auth'));
        $tingkat_p  = r($this->input->post('tingkat_p'));
        $acara_p    = r($this->input->post('acara_p'));
        $tahun_p    = r($this->input->post('tahun_p'));
        $tingkat_t  = r($this->input->post('tingkat_t'));
        $acara_t    = r($this->input->post('acara_t'));
        $tahun_t    = r($this->input->post('tahun_t'));

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
                // ----------------------- PRESTASI ----------------------//
                $this->Userbio->deleteDataNIM($nim, 'TB_PRESTASI');
                $dataPrestasi = array();
                for ($i = 1; $i <= count($acara_p) && $i != 11; $i++) {
                    $dataPrestasi[] = array(
                        'ID_PRESTASI'   => $i,
                        'NIM'           => $nim,
                        'TINGKAT'        => $tingkat_p[$i - 1],
                        'ACARA'            => $acara_p[$i - 1],
                        'TAHUN'            => $tahun_p[$i - 1],
                    );
                }
                $do = $this->Userbio->addPrestasi($dataPrestasi);
                if ($do !== false) {
                    // echo json_encode(array(
                    //     'status' => 200,
                    //     'error' => false,
                    //     'message' => 'Data Prestasi is updated',
                    //     'data' => $dataPrestasi
                    // ));
                } else {
                    // echo json_encode(
                    //     array(
                    //         'status' => 500,
                    //         'error' => true,
                    //         'message' => 'Gagal melakukan fungsi Prestasi',
                    //         'data' => null
                    //     )
                    // );
                }

                // ----------------------PERFORM --------------------//
                $this->Userbio->deleteDataNIM($nim, 'TB_PERFORM');
                $dataPerform = array();
                for ($i = 1; $i <= count($acara_t) && $i != 11; $i++) {
                    $dataPerform[] = array(
                        'ID_PERFORM'    => $i,
                        'NIM'           => $nim,
                        'PERFORMER'        => $tingkat_t[$i - 1],
                        'ACARA'            => $acara_t[$i - 1],
                        'TAHUN'            => $tahun_t[$i - 1],
                    );
                }

                $do = $this->Userbio->addPerform($dataPerform);
                if ($do !== false) {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data Perform is updated',
                        'data' => $dataPerform
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 500,
                            'error' => true,
                            'message' => 'Gagal melakukan fungsi Perform',
                            'data' => null
                        )
                    );
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADD DAFTAR
    // ------------------------------------------------------------------------------------------------------//
    public function addDataDaftar()
    {
        $id_agenda = r($this->input->post('id_agenda'));
        $nim = r($this->input->post('nim'));
        $auth = r($this->input->post('auth'));
        $id_pilihan = r($this->input->post('id_pilihan'));
        $alasan = r($this->input->post('alasan'));
        $id_pilihan2 = r($this->input->post('id_pilihan2'));
        $alasan2 = r($this->input->post('alasan2'));
        $id_pilihan_diterima = 0;
        $id_c_jadwal = r($this->input->post('id_c_jadwal'));
        $status = 'DAFTAR';
        $alasan_umum = r($this->input->post('alasan_umum'));
        $target = r($this->input->post('target'));
        $ide_kreatif = r($this->input->post('ide_kreatif'));
        $portofolio = r($this->input->post('portofolio'));

        $data = array(
            'ID_AGENDA'             => $id_agenda,
            'NIM'                   => $nim,
            'ID_PILIHAN'            => $id_pilihan,
            'ALASAN'                => $alasan,
            'ID_PILIHAN2'           => $id_pilihan2,
            'ALASAN2'               => $alasan2,
            'ID_PILIHAN_DITERIMA'   => $id_pilihan_diterima,
            'ID_C_JADWAL'           => $id_c_jadwal,
            'STATUS'                => $status,
            'ALASAN_UMUM'           => $alasan_umum,
            'TARGET'                => $target,
            'IDE_KREATIF'           => $ide_kreatif,
            'PORTOFOLIO'           => $portofolio
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
                $salah = $this->Userbio->checkNIM($nim, 'TB_BIODATA');
                if ($salah) {
                    $this->Userbio->addBD(array('NIM' => $nim));
                }
                if (!$this->Userbio->checkID($id_agenda, 'ID_AGENDA', 'TB_AGENDA')) {
                    if (!$this->Userbio->checkIDNIM($id_agenda, $nim, 'ID_AGENDA', 'NIM', 'TB_DAFTAR')) {
                        $this->Userbio->deleteDataIDNIM($id_agenda, $nim, 'TB_DAFTAR');
                        $do = $this->Userbio->addDaftar($data);
                        if ($do !== false) {
                            echo json_encode(array(
                                'status' => 200,
                                'error' => false,
                                'message' => 'Data Daftar di tambahkan',
                                'data' => $data
                            ));
                        } else {
                            echo json_encode(
                                array(
                                    'status' => 500,
                                    'error' => true,
                                    'message' => 'Gagal melakukan fungsi Daftar',
                                    'data' => null
                                )
                            );
                        }
                    } else {
                        $do = $this->Userbio->addDaftar($data);
                        if ($do !== false) {
                            echo json_encode(array(
                                'status' => 200,
                                'error' => false,
                                'message' => 'Data Daftar di tambahkan',
                                'data' => $data
                            ));
                        } else {
                            echo json_encode(
                                array(
                                    'status' => 500,
                                    'error' => true,
                                    'message' => 'Gagal melakukan fungsi Daftar',
                                    'data' => null
                                )
                            );
                        }
                    }
                } else {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => true,
                        'message' => 'Data Agenda tidak Ada',
                        'data' => null
                    ));
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    // -----------------------------------ADMIN--------------------------------------------------------------//


    //ADD AGENDA
    // ------------------------------------------------------------------------------------------------------//
    public function addDataAgenda()
    {
        $nim = r($this->input->post('nim'));
        $auth = r($this->input->post('auth'));
        $tb_agenda = r($this->input->post('tb_agenda'));
        $lembaga = r($this->input->post('lembaga'));
        $deskripsi = r($this->input->post('deskripsi'));
        $tgl_buka = r($this->input->post('tgl_buka'));
        $tgl_tutup = r($this->input->post('tgl_tutup'));
        $tgl_pengumuman = r($this->input->post('tgl_pengumuman'));
        $tb_pilihan_pengumuman = r($this->input->post('tb_pilihan_pengumuman'));
        $foto = r($this->input->post('foto'));
        $status = r($this->input->post('status'));
        $youtube = r($this->input->post('yt'));
        $halaman = r($this->input->post('halaman'));
        $twibbon = r($this->input->post('twibbon'));

        $data = array(
            'ID_AGENDA'             => '',
            'NIM'                   => $nim,
            'TB_AGENDA'             => $tb_agenda,
            'LEMBAGA'               => $lembaga,
            'DESKRIPSI'             => $deskripsi,
            'TGL_BUKA'              => $tgl_buka,
            'TGL_TUTUP'             => $tgl_tutup,
            'TGL_PENGUMUMAN'        => $tgl_pengumuman,
            'TB_PILIHAN_PENGUMUMAN' => $tb_pilihan_pengumuman,
            'FOTO'                  => $foto,
            'STATUS'                => $status,
            'YOUTUBE'                => $youtube,
            'HALAMAN'                => $halaman,
            'TWIBBON'                => $twibbon,
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
                $do = $this->Userbio->addAgenda($data);
                if ($do !== false) {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data Agenda telah ditambahkan',
                        'data' => $data
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 500,
                            'error' => true,
                            'message' => 'Gagal melakukan fungsi Agenda',
                            'data' => null
                        )
                    );
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADD JADWAL
    // ------------------------------------------------------------------------------------------------------//
    public function addDataJadwal()
    {
        $nim = r($this->input->post('nim'));
        $auth = r($this->input->post('auth'));
        $id_agenda = r($this->input->post('id_agenda'));
        $jadwal = r($this->input->post('jadwal'));
        $batasan = r($this->input->post('batasan'));
        $data = array(
            'ID_C_JADWAL'   => '',
            'ID_AGENDA'     => $id_agenda,
            'JADWAL'        => $jadwal,
            'BATASAN'       => $batasan,
        );

        if (empty($id_agenda)) {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'ID AGENDA not found',
                'data' => null
            ));
        } else {
            $checkLanjutan = checkCIAM($nim, $auth);

            if ($checkLanjutan->status === true) {
                $do = $this->Userbio->addJadwal($data);
                if ($do !== false) {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data Jadwal ditambahkan',
                        'data' => $data
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 500,
                            'error' => true,
                            'message' => 'Gagal melakukan fungsi jadwal',
                            'data' => null
                        )
                    );
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //ADD PILIHAN
    // ------------------------------------------------------------------------------------------------------//
    public function addDataPilihan()
    {
        $nim = r($this->input->post('nim'));
        $auth = r($this->input->post('auth'));
        $id_agenda = r($this->input->post('id_agenda'));
        $tb_pilihan = r($this->input->post('tb_pilihan'));

        $data = array(
            'ID_PILIHAN'    => '',
            'ID_AGENDA'     => $id_agenda,
            'TB_PILIHAN'    => $tb_pilihan,
        );

        if (empty($id_agenda)) {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'ID AGENDA not found',
                'data' => null
            ));
        } else {
            $checkLanjutan = checkCIAM($nim, $auth);

            if ($checkLanjutan->status === true) {
                $do = $this->Userbio->addPilihan($data);
                if ($do !== false) {
                    echo json_encode(array(
                        'status' => 200,
                        'error' => false,
                        'message' => 'Data Pilihan di tambahkan',
                        'data' => $data
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 500,
                            'error' => true,
                            'message' => 'Gagal melakukan fungsi Pilihan',
                            'data' => null
                        )
                    );
                }
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'Account not verified',
                    'data' => null
                ));
            }
        }
    }

    //GET BIODATA
    public function getDaftar($nim, $id)
    {
        $res = $this->Userbio->waiting($nim, $id);
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

            $data = array(
                "BIODATA" => array(
                    "NIM" => $res["NIM"],
                    "AGAMA" => $res["AGAMA"]
                ),
                "JADWAL" => json_decode($res["JADWAL"]),
                "PILIHAN" => pilihan(json_decode($res["PILIHAN"],true)),
                "DAFTAR" => json_decode($res["DAFTAR"]),
                "AGENDA" => json_decode($res["AGENDA"]),
            );
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
    public function getDataBiodata($nim, $id)
    {
        $res = $this->Userbio->waiting($nim, $id);
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
            unset($res["DAFTAR"]);
            unset($res["JADWAL"]);
            unset($res["PILIHAN"]);
            $res["PENDIDIKAN_FORMAL"] = json_decode($res["PENDIDIKAN_FORMAL"]);
            $res["PENDIDIKAN_NON_FORMAL"] = json_decode($res["PENDIDIKAN_NON_FORMAL"]);
            $res["PENGALAMAN_KEPANITIAAN"] = json_decode($res["PENGALAMAN_KEPANITIAAN"]);
            $res["KEPANITIAAN_DIIKUTI"] = json_decode($res["KEPANITIAAN_DIIKUTI"]);
            $res["PENGALAMAN_ORGANISASI"] = json_decode($res["PENGALAMAN_ORGANISASI"]);
            $res["ORGANISASI_DIIKUTI"] = json_decode($res["ORGANISASI_DIIKUTI"]);
            $res["PRESTASI"] = json_decode($res["PRESTASI"]);
            $res["PERFORM"] = json_decode($res["PERFORM"]);
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

    public function getPortofolio($nim)
    {
        $data = $this->Userbio->getBiodataPortofolio($nim);
        echo json_encode(array(
            'status' => 200,
            'error' => false,
            'message' => 'Success',
            'data' => $data
        ));
    }

    //GET DAFTAR-DAFTAR
    public function getAgenda($id)
    {
        $data = $this->Userbio->getAgenda($id);
        echo json_encode(array(
            'status' => 200,
            'error' => false,
            'message' => 'Success',
            'data' => $data
        ));
    }

    public function getAgendaAll()
    {
        $data = $this->Userbio->getAllAgenda();
        echo json_encode(array(
            'status' => 200,
            'error' => false,
            'message' => 'Success',
            'data' => $data
        ));
    }



    public function getNewDaftar($id, $nim)
    {
        if (!$this->Userbio->checkNIM($nim, 'TB_DAFTAR')) {
            $data = $this->Userbio->getDaftarNewIDNIM($id, $nim);

            echo json_encode(array(
                'status' => 200,
                'error' => false,
                'message' => 'Success',
                'data' => $data
            ));
        } else {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'NIM not found',
                'data' => array()
            ));
        }
    }

    public function getDaftarAllFirst($id, $nim)
    {
        if (!$this->Userbio->checkNIM($nim, 'TB_DAFTAR')) {
            $data = $this->Userbio->getDaftarIDNIMFirst($id, $nim);

            echo json_encode(array(
                'status' => 200,
                'error' => false,
                'message' => 'Success',
                'data' => $data
            ));
        } else {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'NIM not found',
                'data' => null
            ));
        }
    }

    public function getDaftarAllSecond($id, $nim)
    {
        if (!$this->Userbio->checkNIM($nim, 'TB_DAFTAR')) {
            $data = $this->Userbio->getDaftarIDNIMSecond($id, $nim);

            echo json_encode(array(
                'status' => 200,
                'error' => false,
                'message' => 'Success',
                'data' => $data
            ));
        } else {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'NIM not found',
                'data' => null
            ));
        }
    }


    // -----------------------------------KEPERLUAN FORM ---------------------------//

    public function getPilih($id)
    {
        if (!$this->Userbio->checkID($id, 'ID_AGENDA', 'TB_AGENDA')) {
            $data = $this->Userbio->getPilihan($id);

            echo json_encode(array(
                'status' => 200,
                'error' => false,
                'message' => 'Success',
                'data' => $data
            ));
        } else {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'ID AGENDA not found',
                'data' => null
            ));
        }
    }

    public function getTiket($id)
    {
        $tiket = $this->Userbio->getTiket($id);
        echo json_encode(array(
            'status' => 200,
            'error' => false,
            'message' => 'Success',
            'data' => $tiket
        ));
    }

    public function getPilihanNew($id, $nim)
    {
        if (!$this->Userbio->checkID($id, 'ID_AGENDA', 'TB_AGENDA')) {
            $data = $this->Userbio->getNewPilihan($id, $nim);

            echo json_encode(array(
                'status' => 200,
                'error' => false,
                'message' => 'Success',
                'data' => $data
            ));
        } else {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'ID AGENDA and NIM not found',
                'data' => null
            ));
        }
    }

    //END GET BIODATA
    //UPDATE-UPDATE BIODATA
    public function updatePortofolio()
    {
        $nim = r($this->input->post('nim'));
        $portofolio = r($this->input->post('portofolio'));

        $dataBio = array(
            'PORTOFOLIO' => $portofolio,
        );

        if (empty($nim)) {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'NIM not found',
                'data' => null
            ));
        } else {
            if (!$this->Userbio->checkNIM($nim, 'TB_BIODATA')) {
                $this->Userbio->updateDataNIM($nim, 'TB_BIODATA', $dataBio);
                echo json_encode(array(
                    'status' => 200,
                    'error' => false,
                    'message' => 'Data NIM is update',
                    'data' => $dataBio
                ));
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'NIM not found',
                    'data' => null
                ));
            }
        }
    }

    public function updateDimiliki()
    {
        $nim            = r($this->input->post('nim'));
        $fasilitas      = implode('~', (array) r($this->input->post('fasilitas')));
        $jaringan       = implode('~', (array) r($this->input->post('jaringan')));
        $keahlian       = implode('~', (array) r($this->input->post('keahlian')));

        $dataBio = array(
            'FASILITAS'            => $fasilitas,
            'JARINGAN'            => $jaringan,
            'KEAHLIAN'            => $keahlian,
        );

        if (empty($nim)) {
            echo json_encode(array(
                'status' => 200,
                'error' => true,
                'message' => 'NIM not found',
                'data' => null
            ));
        } else {
            if (!$this->Userbio->checkNIM($nim, 'TB_BIODATA')) {
                $this->Userbio->updateDataNIM($nim, 'TB_BIODATA', $dataBio);
                echo json_encode(array(
                    'status' => 200,
                    'error' => false,
                    'message' => 'Data NIM is update',
                    'data' => $dataBio
                ));
            } else {
                echo json_encode(array(
                    'status' => 200,
                    'error' => true,
                    'message' => 'NIM not found',
                    'data' => null
                ));
            }
        }
    }
    //END UPDATE-UPDATE BIODATA
    //END F
}
