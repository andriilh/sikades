<?php

namespace App\Models;

use CodeIgniter\Model;

class MMasyarakat extends Model
{
    public function tampilkan_data_profile($id)
    {
        return $this->db->table('masyarakat')
            ->join('login', 'login.id_user=masyarakat.id_masyarakat')
            ->where('id_masyarakat', $id)
            ->get()->getRowArray();
    }

    public function tampilkan_data_pengajuan($id, $filter)
    {
        if ($filter === null) {
            return $this->db->table('pengajuan_surat')
                ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
                ->join('sekertaris', 'sekertaris.id_sekertaris=pengajuan_surat.acc_admin', 'left')
                ->where('pengajuan_surat.NIK', $id)
                ->get()->getResultArray();
        } else {
            return $this->db->query("SELECT * FROM pengajuan_surat
            JOIN surat ON surat.id_surat = pengajuan_surat.id_surat 
            LEFT JOIN sekertaris ON sekertaris.id_sekertaris = pengajuan_surat.acc_admin
            WHERE pengajuan_surat.NIK = '" . $id . "'
            AND nama_surat LIKE '" . $filter . "%'")->getResultArray();
        }
    }

    public function tampilkan_nama_pengajuan_surat($id)
    {
        return $this->db->query("SELECT nama_surat AS name FROM pengajuan_surat
        JOIN masyarakat ON masyarakat.NIK = pengajuan_surat.NIK
        JOIN surat ON surat.id_surat = pengajuan_surat.id_surat 
        JOIN sekertaris ON sekertaris.id_sekertaris = pengajuan_surat.acc_admin
        WHERE masyarakat.NIK = '" . $id . "'")->getResultObject();
    }

    public function tampilkan_data_surat()
    {
        return $this->db->table('surat')
            ->join('syarat_surat', 'syarat_surat.id_surat=surat.id_surat')
            ->get()->getResultArray();
    }

    public function proses_ubah_data_profile_masyarakat($data, $id)
    {
        return $this->db->table('masyarakat')->where('id_masyarakat', $id)->update($data);
    }

    public function proses_ubah_data_us_ps_masyarakat($data, $id)
    {
        return $this->db->table('login')->where('id_user', $id)->update($data);
    }

    public function proses_tambah_pengajuan_surat_masyarakat($data)
    {
        return $this->db->table('pengajuan_surat')->insert($data);
    }

    public function proses_hapus_pengajuan($id)
    {
        return $this->db->table('pengajuan_surat')->where('id_pengajuan_surat', $id)->delete();
    }

    public function getTotalPengajuanSurat($nik)
    {
        $query = $this->db->query("SELECT COUNT(id_pengajuan_surat) AS total_pengajuan FROM pengajuan_surat WHERE (status='disetujui' OR status='disetujui2' OR status='diproses') AND tipe_pengajuan='mandiri' AND NIK='$nik'");
        return $query->getRowArray();
    }

    public function home_getTotalPengajuanSurat($nik)
    {
        $query = $this->db->query("SELECT COUNT(id_pengajuan_surat) AS total_pengajuan FROM pengajuan_surat WHERE tipe_pengajuan='mandiri' AND NIK='$nik'");
        return $query->getRowArray();
    }

    public function proses_cari_data_pengajuan($keyword, $id)
    {
        return $this->db->table('pengajuan_surat')
            ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
            ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
            ->join('sekertaris', 'sekertaris.id_sekertaris=pengajuan_surat.acc_admin', 'left')
            ->like('nama_surat', $keyword)
            ->where('masyarakat.id_masyarakat', $id)
            ->where('pengajuan_surat.tipe_pengajuan', 'mandiri')
            ->get()->getResultArray();
    }
}
