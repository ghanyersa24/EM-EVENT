<?php
class Userbio extends CI_Model{

    //CHECK RECHECK
    public function checkNIM($nim, $tabel)
    {
        $query = $this->db->get_where($tabel, array('NIM' => $nim));
        if($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function checkID($id, $idtabel, $tabel)
    {
        $query = $this->db->get_where($tabel, array($idtabel => $id));
        if($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function checkIDNIM($id, $nim, $idtabel, $nimtabel, $tabel)
    {
        $this->db->from($tabel);
        $array = array($idtabel => $id, $nimtabel => $nim);
        $this->db->where($array);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
    //END CHECK RECHECK

    //ADDBIODATA
    public function addBD($data)
    {
        return $this->db->insert('TB_BIODATA', $data);
    }

    public function addPendForml($data)
    {
        return $this->db->insert_batch('TB_PENDIDIKAN_FORMAL', $data);
    }

    public function addPendNon($data)
    {
        return $this->db->insert_batch('TB_PENDIDIKAN_NON_FORMAL', $data);
    }

    public function addOrgPenglm($data)
    {
        return $this->db->insert_batch('TB_PENGALAMAN_ORGANISASI', $data);
    }

    public function addOrgIkut($data)
    {
        return $this->db->insert_batch('TB_ORGANISASI_DIIKUTI', $data);
    }

    public function addKepPenglm($data)
    {
        return $this->db->insert_batch('TB_PENGALAMAN_KEPANITIAAN', $data);
    }

    public function addKepIkut($data)
    {
        return $this->db->insert_batch('TB_KEPANITIAAN_DIIKUTI', $data);
    }

    public function addPrestasi($data)
    {
        return $this->db->insert_batch('TB_PRESTASI', $data);
    }

    public function addPerform($data)
    {
        return $this->db->insert_batch('TB_PERFORM', $data);
    }

    //ADD DAFTAR
    public function addAgenda($data)
    {
        return $this->db->insert('TB_AGENDA', $data);
    }

    public function addJadwal($data)
    {
        return $this->db->insert('TB_JADWAL', $data);
    }

    public function addPilihan($data)
    {
        return $this->db->insert('TB_PILIHAN', $data);
    }

    public function addDaftar($data)
    {
        return $this->db->insert('TB_DAFTAR', $data);
    }
    //END ADD DAFTAR
    //END ADDBIODATA

    //GET BIODATA
    public function waiting($nim,$id)
    {
        $res = $this->db->query("call GETBIO($nim,$id)");
        return $res->result_array();
    }
    public function getBiodata($nim)
    {
        echo $query = $this->db->get_where('TB_BIODATA', array('NIM' => $nim));
        
    }

    public function getBiodataPortofolio($nim)
    {
        $query = $this->db->select('PORTOFOLIO')->where('NIM', $nim)->get('TB_BIODATA');
        return $query->result_array();
    }

    public function getPendForml($nim)
    {
        $query = $this->db->select('JENJANG, INSTANSI, TAHUN')->where('NIM', $nim)->get('TB_PENDIDIKAN_FORMAL');
        return $query->result_array();
    }

    public function getPendNonForml($nim)
    {
        $query = $this->db->select('JENJANG, INSTANSI, TAHUN')->where('NIM', $nim)->get('TB_PENDIDIKAN_NON_FORMAL');
        return $query->result_array();
    }

    public function getOrgPenglm($nim)
    {
        $query = $this->db->select('JABATAN, INSTANSI, TAHUN')->where('NIM', $nim)->get('TB_PENGALAMAN_ORGANISASI');
        return $query->result_array();
    }

    public function getOrgIkut($nim)
    {
        $query = $this->db->select('JABATAN, INSTANSI, TAHUN')->where('NIM', $nim)->get('TB_ORGANISASI_DIIKUTI');
        return $query->result_array();
    }

    public function getKepPenglm($nim)
    {
        $query = $this->db->select('JABATAN, ACARA, TAHUN')->where('NIM', $nim)->get('TB_PENGALAMAN_KEPANITIAAN');
        return $query->result_array();
    }

    public function getKepIkut($nim)
    {
        $query = $this->db->select('JABATAN, ACARA, TAHUN')->where('NIM', $nim)->get('TB_KEPANITIAAN_DIIKUTI');
        return $query->result_array();
    }

    public function getPrestasi($nim)
    {
        $query = $this->db->select('TINGKAT, ACARA, TAHUN')->where('NIM', $nim)->get('TB_PRESTASI');
        return $query->result_array();
    }

    public function getPerform($nim)
    {
        $query = $this->db->select('PERFORMER, ACARA, TAHUN')->where('NIM', $nim)->get('TB_PERFORM');
        return $query->result_array();
    }

    //GET DAFTAR
    public function getAgenda($id)
    {
        $query = $this->db->select('TB_AGENDA, LEMBAGA, DESKRIPSI, TGL_BUKA, TGL_TUTUP, TGL_PENGUMUMAN, TB_PILIHAN_PENGUMUMAN, FOTO, STATUS, TWIBBON')->where('ID_AGENDA', $id)->get('TB_AGENDA');
        return $query->result_array();
    }

    public function getAllAgenda()
    {
        $query = $this->db->select('ID_AGENDA, TB_AGENDA, LEMBAGA, DESKRIPSI, TGL_BUKA, TGL_TUTUP, TGL_PENGUMUMAN, TB_PILIHAN_PENGUMUMAN, FOTO, STATUS, HALAMAN, TWIBBON')->get('TB_AGENDA');
        return $query->result_array();
    }

    public function getJadwal($id)
    {
        $query = $this->db->select('*')->where('ID_AGENDA', $id)->get('TB_JADWAL');
        return $query->result_array();
    }

    public function getPilihan($id)
    {
        $query = $this->db->select('*')->where('ID_AGENDA', $id)->get('TB_PILIHAN');
        return $query->result_array();
    }

    // public function getDaftar($nim)
    // {
    //     $this->db->select('d.ID_AGENDA, a.TB_AGENDA as NAMA_ACARA, a.TGL_PENGUMUMAN, d.ID_PILIHAN, p.TB_PILIHAN as PILIHAN_PERTAMA, d.ALASAN, d.ID_PILIHAN2, p2.TB_PILIHAN as PILIHAN_KEDUA, d.ALASAN2, d.ALASAN_UMUM, d.TARGET, d.IDE_KREATIF, d.ID_C_JADWAL, j.JADWAL');
    //     $this->db->from('TB_DAFTAR d');
    //     $this->db->join('TB_AGENDA a', 'a.ID_AGENDA = d.ID_AGENDA');
    //     $this->db->join('TB_PILIHAN p', 'p.ID_PILIHAN = d.ID_PILIHAN');
    //     $this->db->join('TB_PILIHAN p2', 'p2.ID_PILIHAN = d.ID_PILIHAN2');
    //     $this->db->join('TB_JADWAL j', 'j.ID_C_JADWAL = d.ID_C_JADWAL');
    //     $this->db->where('d.NIM', $nim);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function getDaftarNewIDNIM($id, $nim)
    {

        $sql = "CALL GETPILIHAN($id,'$nim',@P);";
        
        // $sql = "CALL ISDAFTAR($id,'$nim',@P);";
                

        // $this->db->select('d.ID_AGENDA, a.TB_AGENDA as NAMA_ACARA, a.TGL_PENGUMUMAN, d.ID_PILIHAN, p.TB_PILIHAN as PILIHAN_PERTAMA, d.ALASAN, d.ID_PILIHAN2, p2.TB_PILIHAN as PILIHAN_KEDUA, d.ALASAN2, d.ALASAN_UMUM, d.TARGET, d.IDE_KREATIF, d.ID_C_JADWAL, j.JADWAL, d.STATUS');
        // $this->db->from('TB_DAFTAR d');
        // $this->db->join('TB_AGENDA a', 'a.ID_AGENDA = d.ID_AGENDA');
        // $this->db->join('TB_PILIHAN p', 'p.ID_PILIHAN = d.ID_PILIHAN');
        // $this->db->join('TB_PILIHAN p2', 'p2.ID_PILIHAN = d.ID_PILIHAN2');
        // $this->db->join('TB_JADWAL j', 'j.ID_C_JADWAL = d.ID_C_JADWAL');
        
        // $array = array('d.ID_AGENDA' => $id, 'd.NIM' => $nim);
        // $this->db->where($array);
        
        $query = $this->db->query($sql);
        header('Content-Type: application/json');
        return $query = json_decode($query->result_array()[0]['DATAS']);
    }

    public function getDaftarIDNIM($id, $nim)
    {
        $this->db->select('d.ID_AGENDA, a.TB_AGENDA as NAMA_ACARA, a.TGL_PENGUMUMAN, d.ID_PILIHAN, p.TB_PILIHAN as PILIHAN_PERTAMA, d.ALASAN, d.ID_PILIHAN2, p2.TB_PILIHAN as PILIHAN_KEDUA, d.ALASAN2, d.ALASAN_UMUM, d.TARGET, d.IDE_KREATIF, d.ID_C_JADWAL, j.JADWAL, d.STATUS');
        $this->db->from('TB_DAFTAR d');
        $this->db->join('TB_AGENDA a', 'a.ID_AGENDA = d.ID_AGENDA');
        $this->db->join('TB_PILIHAN p', 'p.ID_PILIHAN = d.ID_PILIHAN');
        $this->db->join('TB_PILIHAN p2', 'p2.ID_PILIHAN = d.ID_PILIHAN2');
        $this->db->join('TB_JADWAL j', 'j.ID_C_JADWAL = d.ID_C_JADWAL');
        
        $array = array('d.ID_AGENDA' => $id, 'd.NIM' => $nim);
        $this->db->where($array);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDaftarIDNIMFirst($id, $nim)
    {
        $this->db->select('d.ID_PILIHAN, p.TB_PILIHAN as PILIHAN_PERTAMA, d.ALASAN, d.ID_PILIHAN2, p2.TB_PILIHAN as PILIHAN_KEDUA, d.ALASAN2, d.ID_C_JADWAL, j.JADWAL, d.ALASAN_UMUM, d.TARGET, d.IDE_KREATIF');
        $this->db->from('TB_DAFTAR d');
        $this->db->join('TB_PILIHAN p', 'p.ID_PILIHAN = d.ID_PILIHAN');
        $this->db->join('TB_PILIHAN p2', 'p2.ID_PILIHAN = d.ID_PILIHAN2');
        $this->db->join('TB_JADWAL j', 'j.ID_C_JADWAL = d.ID_C_JADWAL');
        
        $array = array('d.ID_AGENDA' => $id, 'd.NIM' => $nim);
        $this->db->where($array);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDaftarIDNIMSecond($id, $nim)
    {
        $this->db->select('d.ID_PILIHAN_DITERIMA, p.TB_PILIHAN as PILIHAN_DITERIMA, d.STATUS');
        $this->db->from('TB_DAFTAR d');
        $this->db->join('TB_PILIHAN p', 'p.ID_PILIHAN = d.ID_PILIHAN_DITERIMA');
        
        $array = array('d.ID_AGENDA' => $id, 'd.NIM' => $nim);
        $this->db->where($array);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTiket($id)
    {
        $sql = "SELECT `ID_C_JADWAL`,`JADWAL`,`BATASAN`-(SELECT COUNT(*) from `TB_DAFTAR` WHERE `TB_DAFTAR`.`ID_C_JADWAL` = `TB_JADWAL`.`ID_C_JADWAL`) AS SISA FROM `TB_JADWAL` WHERE `ID_AGENDA` = $id";
		$data = $this->db->query($sql);
        return $data->result_array();
    }

    public function getBatasan($id)
    {
        $query = $this->db->select('BATASAN')->where('ID_AGENDA', $id)->get('TB_JADWAL');
        return $query->result_array();
    }

    public function getTotalDaftar($id)
    {
        $query = $this->db->select('count(*) as TOTAL')->where('ID_AGENDA', $id)->get('TB_DAFTAR');
        return $query->row_array();
    }
    //END GET DAFTAR

    public function getNewPilihan($id, $nim)
    {
        $petik = "'";
        $sql = '
            SELECT
            CONCAT(
                '.$petik.'{'.$petik.',
                '.$petik.'"ID_AGENDA" :'.$petik.'  ,`ID_AGENDA`, '.$petik.','.$petik.',
                '.$petik.'"TB_AGENDA" : "'.$petik.' ,`TB_AGENDA`, '.$petik.'",'.$petik.',
                '.$petik.'"TWIBBON" : "'.$petik.'  ,`TWIBBON` , '.$petik.'",'.$petik.',
                '.$petik.'"TGL_PENGUMUMAN" : "'.$petik.', `TGL_PENGUMUMAN`,'.$petik.'",'.$petik.',
                '.$petik.'"TGL_TUTUP" : "'.$petik.', `TGL_TUTUP`,'.$petik.'",'.$petik.',
                '.$petik.'"PORTOFOLIO" : "'.$petik.', PORTOFOLIO ,'.$petik.'",'.$petik.',
                '.$petik.'"PILIHAN" : ['.$petik.', JSON_PILIHAN ,'.$petik.']'.$petik.','.$petik.','.$petik.',
                '.$petik.'"JADWAL" : ['.$petik.', JSON_JADWAL ,'.$petik.']'.$petik.',
                '.$petik.'}'.$petik.'
            ) AS DATA
            FROM
            `TB_AGENDA`,
            (SELECT GROUP_CONCAT('.$petik.'{'.$petik.', JSON, '.$petik.'}'.$petik.' SEPARATOR '.$petik.','.$petik.') AS JSON_PILIHAN FROM (
                SELECT CONCAT(
                        '.$petik.'"ID_PILIHAN" :'.$petik.' , `ID_PILIHAN`, '.$petik.','.$petik.',
                        '.$petik.'"PILIHAN" : "'.$petik.'  , `TB_PILIHAN`, '.$petik.'"'.$petik.'
                    ) AS JSON   
                    FROM TB_PILIHAN
                WHERE `TB_PILIHAN`.`ID_AGENDA`= '.$id.'
                ) AS JSON) AS JSON_PILIHAN,
                (SELECT GROUP_CONCAT('.$petik.'{'.$petik.', JADWAL, '.$petik.'}'.$petik.' SEPARATOR '.$petik.','.$petik.') AS JSON_JADWAL FROM
                    (SELECT CONCAT(
                        '.$petik.'"ID_C_JADWAL" :'.$petik.'  ,`ID_C_JADWAL`, '.$petik.','.$petik.',
                        '.$petik.'"JADWAL" : "'.$petik.'   ,`JADWAL`, '.$petik.'",'.$petik.',
                        '.$petik.'"SISA" : '.$petik.'    , SISA
                    ) AS JADWAL
                    FROM
                    (SELECT
                        `ID_C_JADWAL`,
                        `JADWAL`,
                        BATASAN -(
                        SELECT
                            COUNT(*)
                        FROM
                            TB_DAFTAR
                        WHERE
                            `TB_DAFTAR`.`ID_C_JADWAL` = `TB_JADWAL`.`ID_C_JADWAL`
                    ) AS SISA
                    FROM
                        TB_JADWAL
                        WHERE `TB_JADWAL`.`ID_AGENDA`='.$id.') AS JADWAL) AS JADWAL) AS JSON_JADWAL,
                (SELECT PORTOFOLIO AS PORTOFOLIO FROM TB_BIODATA WHERE `TB_BIODATA`.`NIM`='.$petik.''.$nim.''.$petik.') AS PORTOFOLIO
            WHERE `TB_AGENDA`.`ID_AGENDA`='.$id.'';

        $data = $this->db->query($sql);
        header('Content-Type: application/json');
        return $data= json_decode($data->result_array()[0]['DATA']) ;

    }
    //END GET BIODATA

    //UPDATE BIODATA
    public function updateDataNIM($nim, $tabel, $data)
    {
        $this->db->where('NIM', $nim);
        $this->db->update($tabel, $data);
    }
    //END UPDATE BIODATA

    //DELETE BIODATA
    public function deleteDataNIM($nim, $tabel){
        $this->db->where('NIM', $nim);
        $this->db->delete($tabel);
    }
    
    public function deleteDataIDNIM($id, $nim, $tabel){
        $this->db->where('ID_AGENDA', $id);
        $this->db->where('NIM', $nim);
        $this->db->delete($tabel);
    }
    //END DELETE BIODATA



    public function getNimData($nim)
    {
        $query = $this->db->get_where('user', array('NIM' => $nim));
        return $query->result_array();
    }


}