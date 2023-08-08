<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPSTORM_META\type;

class MLurah extends Model
{
    public function tampilkan_data_surat_masuk($filter)
    {
        if ($filter === null) {
            return $this->db->table('surat_masuk')
                ->orderBy('status', 'desc')
                ->orderBy('id_surat_masuk', 'desc')
                ->get()->getResultArray();
        } else {
            return $this->db->query('SELECT * FROM surat_masuk WHERE surat_masuk.perihal LIKE "' . $filter . '%"')->getResultArray();
        }
    }

    public function tampilkan_data_surat_keluar($filter)
    {
        if ($filter === null) {
            return $this->db->table('surat_keluar')
                ->orderBy('status', 'desc')
                ->orderBy('id_surat_keluar', 'desc')
                ->get()->getResultArray();
        } else {
            return $this->db->query('SELECT * FROM surat_keluar WHERE surat_keluar.perihal LIKE "' . $filter . '%"')->getResultArray();
        }
    }

    public function proses_ubah_status_surat_masuk($data, $id)
    {
        return $this->db->table('surat_masuk')->where('id_surat_masuk', $id)->update($data);
    }

    public function proses_ubah_status_surat_keluar($data, $id)
    {
        return $this->db->table('surat_keluar')->where('id_surat_keluar', $id)->update($data);
    }

    public function proses_cari_data_surat_masuk($keyword)
    {

        $query = $this->db->query("SELECT * FROM surat_masuk WHERE status='menunggu' AND (kode_surat LIKE '%$keyword%' OR no_surat LIKE '%$keyword%' OR pengirim LIKE '%$keyword%' OR kepada LIKE '%$keyword%')");
        return $query->getResultArray();
    }

    public function proses_cari_data_surat_keluar($keyword)
    {
        $query = $this->db->query(" SELECT * FROM surat_keluar WHERE status='menunggu' AND (kode_surat LIKE '%$keyword%' OR no_surat LIKE '%$keyword%' OR nama_bagian LIKE '%$keyword%' OR kepada LIKE '%$keyword%')");
        return $query->getResultArray();
    }

    public function tampilkan_data_profile($id)
    {
        return $this->db->table('lurah')
            ->join('login', 'login.id_user=lurah.id_lurah')
            ->where('id_lurah', $id)
            ->get()->getRowArray();
    }

    public function proses_ubah_data_profile_lurah($data, $id)
    {
        return $this->db->table('lurah')->where('id_lurah', $id)->update($data);
    }

    public function proses_ubah_data_us_ps_lurah($data, $id)
    {
        return $this->db->table('login')->where('id_user', $id)->update($data);
    }

    public function getTotalSuratMasuk()
    {
        $query = $this->db->query("SELECT COUNT(id_surat_masuk) AS total_surat_masuk FROM surat_masuk WHERE status='menunggu'");
        return $query->getRowArray();
    }

    public function getTotalSuratKeluar()
    {
        $query = $this->db->query("SELECT COUNT(id_surat_keluar) AS total_surat_keluar FROM surat_keluar WHERE status='menunggu'");
        return $query->getRowArray();
    }

    public function getTotalPengajuanSurat()
    {
        $query = $this->db->query("SELECT COUNT(id_pengajuan_surat) AS total_pengajuan_surat FROM pengajuan_surat WHERE status='disetujui'");
        return $query->getRowArray();
    }

    public function tampilkan_data_pengajuan_surat($filter)
    {
        if ($filter === null) {
            return $this->db->table('pengajuan_surat')
                ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
                ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
                ->orderBy('id_pengajuan_surat', 'desc')
                ->get()->getResultArray();
        } else {
            return $this->db->query("SELECT * FROM pengajuan_surat
            JOIN masyarakat ON masyarakat.NIK=pengajuan_surat.NIK
            JOIN surat ON surat.id_surat = pengajuan_surat.id_surat
            WHERE surat.nama_surat LIKE '" . $filter . "%'")->getResultArray();
        }
    }

    public function tampilkan_nama_pengajuan_surat($type)
    {
        switch ($type) {
            case 'pengajuan':
                $query = $this->db->table('pengajuan_surat')
                    ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
                    ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
                    ->select('nama_surat AS name')
                    ->get()->getResultObject();
                break;
            case 'surat_masuk':
                $query = $this->db->table('surat_masuk')
                    ->orderBy('status', 'desc')
                    ->orderBy('id_surat_masuk', 'desc')
                    ->select('perihal AS name')
                    ->get()->getResultObject();
                break;
            case 'surat_keluar':
                $query = $this->db->table('surat_keluar')
                    ->orderBy('status', 'desc')
                    ->orderBy('id_surat_keluar', 'desc')
                    ->select('perihal AS name')
                    ->get()->getResultObject();
                break;

            default:
                $query = [];
                break;
        }
        return $query;
    }

    public function proses_ubah_pengajuan_surat($data, $id)
    {
        return $this->db->table('pengajuan_surat')->where('id_pengajuan_surat', $id)->update($data);
    }

    public function proses_cari_data_pengajuan_surat($keyword)
    {
        return $this->db->table('pengajuan_surat')
            ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
            ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
            ->like('masyarakat.nama_masyarakat', $keyword)
            ->orLike('masyarakat.NIK', $keyword)
            ->where('status', 'disetujui')
            ->orderBy('id_pengajuan_surat', 'desc')
            ->get()->getResultArray();
    }
}
