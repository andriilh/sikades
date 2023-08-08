<?php

namespace App\Models;

use CodeIgniter\Model;

class MSekertaris extends Model
{

    public function proses_tambah_data_surat($data)
    {
        return $this->db->table('surat')->insert($data);
    }

    public function proses_tambah_data_syarat($data)
    {
        return $this->db->table('syarat')->insert($data);
    }

    public function proses_tambah_data_persyaratan($data)
    {
        return $this->db->table('syarat_surat')->insert($data);
    }

    public function proses_tambah_data_pengguna($data)
    {
        return $this->db->table('masyarakat')->insert($data);
    }

    public function proses_tambah_data_login_pengguna($data)
    {
        return $this->db->table('login')->insert($data);
    }

    public function proses_tambah_surat_masuk($data)
    {
        return $this->db->table('surat_masuk')->insert($data);
    }

    public function proses_tambah_surat_keluar($data)
    {
        return $this->db->table('surat_keluar')->insert($data);
    }

    public function proses_tambah_pengajuan_saya($data)
    {
        return $this->db->table('pengajuan_surat')->insert($data);
    }

    public function tampilkan_data_surat()
    {
        return $this->db->table('surat')
            ->get()->getResultArray();
    }

    public function tampilkan_data_syarat()
    {
        return $this->db->table('syarat')
            ->get()->getResultArray();
    }

    public function tampilkan_data_surat_masuk()
    {
        return $this->db->table('surat_masuk')
            ->orderBy('id_surat_masuk', 'desc')
            ->get()->getResultArray();
    }

    public function tampilkan_data_surat_masuk_filter($filter)
    {
        $query = $this->db->query('SELECT * FROM surat_masuk WHERE surat_masuk.perihal LIKE "' . $filter . '%"');
        return $query->getResultArray();
    }

    public function tampilkan_data_surat_masuk_download_pdf()
    {
        $query = $this->db->query("SELECT * FROM surat_masuk INNER JOIN sekertaris ON sekertaris.id_sekertaris=surat_masuk.operator WHERE EXTRACT(YEAR FROM tgl_entry)=YEAR(CURRENT_TIMESTAMP) AND EXTRACT(MONTH FROM tgl_entry)=MONTH(CURRENT_TIMESTAMP) ORDER BY id_surat_masuk DESC");
        return $query->getResultArray();
    }

    public function tampilkan_data_surat_keluar_download_pdf()
    {
        $query = $this->db->query("SELECT * FROM surat_keluar INNER JOIN sekertaris ON sekertaris.id_sekertaris=surat_keluar.operator WHERE EXTRACT(YEAR FROM tgl_entry)=YEAR(CURRENT_TIMESTAMP) AND EXTRACT(MONTH FROM tgl_entry)=MONTH(CURRENT_TIMESTAMP) ORDER BY id_surat_keluar DESC");
        return $query->getResultArray();
    }

    public function tampilkan_data_surat_keluar()
    {
        return $this->db->table('surat_keluar')
            ->orderBy('id_surat_keluar', 'desc')
            ->get()->getResultArray();
    }

    public function tampilkan_data_surat_keluar_filter($filter)
    {
        $query = $this->db->query('SELECT * FROM surat_keluar WHERE surat_keluar.perihal LIKE "' . $filter . '%"');
        return $query->getResultArray();
    }

    public function tampilkan_data_perihal_surat($type)
    {
        if ($type === "masuk") {
            $query = $this->db->query("SELECT perihal AS name FROM surat_masuk ORDER BY perihal ASC");
        }
        if ($type === "keluar") {
            $query = $this->db->query("SELECT perihal AS name FROM surat_keluar ORDER BY perihal ASC");
        }
        return $query->getResultObject();
    }


    public function tampilkan_data_persyaratan()
    {
        return $this->db->table('syarat_surat')
            ->join('surat', 'surat.id_surat=syarat_surat.id_surat')
            ->join('syarat', 'syarat.id_syarat=syarat_surat.id_syarat')
            ->get()->getResultArray();
    }

    public function tampilkan_data_masyarakat()
    {
        return $this->db->table('masyarakat')
            ->join('login', 'login.id_user=masyarakat.id_masyarakat')
            ->where('status_keaktifan', 'aktif')
            ->get()->getResultArray();
    }

    public function tampilkan_data_registrasi()
    {
        return $this->db->table('masyarakat')
            ->join('login', 'login.id_user=masyarakat.id_masyarakat')
            ->where('status_keaktifan', 'tidak aktif')
            ->where('status_user', 'masyarakat')
            ->orderBy('id_masyarakat', 'DESC')
            ->get()->getResultArray();
    }

    public function proses_ubah_data_surat($data, $id)
    {
        return $this->db->table('surat')->where('id_surat', $id)->update($data);
    }

    public function proses_ubah_data_syarat($data, $id)
    {
        return $this->db->table('syarat')->where('id_syarat', $id)->update($data);
    }

    public function proses_ubah_data_persyaratan($data, $id)
    {
        return $this->db->table('syarat_surat')->where('id_syarat_surat', $id)->update($data);
    }

    public function proses_ubah_surat_masuk($data, $id)
    {
        return $this->db->table('surat_masuk')->where('id_surat_masuk', $id)->update($data);
    }
    public function proses_ubah_data_konfirmasi_registrasi($data, $id)
    {
        return $this->db->table('login')->where('id_user', $id)->update($data);
    }

    public function proses_ubah_surat_keluar($data, $id)
    {
        return $this->db->table('surat_keluar')->where('id_surat_keluar', $id)->update($data);
    }


    public function proses_ubah_data_pengguna($data, $id)
    {
        return $this->db->table('masyarakat')->where('id_masyarakat', $id)->update($data);
    }

    public function proses_ubah_data_login_pengguna($data, $id)
    {
        return $this->db->table('login')->where('id_user', $id)->update($data);
    }

    public function proses_ubah_data_profile_sekertaris($data, $id)
    {
        return $this->db->table('sekertaris')->where('id_sekertaris', $id)->update($data);
    }

    public function proses_ubah_data_us_ps_sekertaris($data, $id)
    {
        return $this->db->table('login')->where('id_user', $id)->update($data);
    }

    public function proses_hapus_data_surat($id)
    {
        return $this->db->table('surat')->where('id_surat', $id)->delete();
    }

    public function proses_hapus_data_syarat($id)
    {
        return $this->db->table('syarat')->where('id_syarat', $id)->delete();
    }

    public function proses_hapus_data_persyaratan($id)
    {
        return $this->db->table('syarat_surat')->where('id_syarat_surat', $id)->delete();
    }

    public function proses_hapus_data_pengguna($id)
    {
        return $this->db->table('masyarakat')->where('id_masyarakat', $id)->delete();
    }

    public function proses_hapus_data_login_pengguna($id)
    {
        return $this->db->table('login')->where('id_user', $id)->delete();
    }

    public function proses_hapus_surat_masuk($id)
    {
        return $this->db->table('surat_masuk')->where('id_surat_masuk', $id)->delete();
    }

    public function proses_hapus_surat_keluar($id)
    {
        return $this->db->table('surat_keluar')->where('id_surat_keluar', $id)->delete();
    }

    public function proses_hapus_data_pengajuan_saya($id)
    {
        return $this->db->table('pengajuan_surat')->where('id_pengajuan_surat', $id)->delete();
    }

    public function proses_cari_data_surat($keyword)
    {
        return $this->db->table('surat')
            ->like('nama_surat', $keyword)
            ->orLike('keterangan_surat', $keyword)
            ->get()->getResultArray();
    }

    public function proses_cari_data_pengajuan_surat($keyword)
    {
        return $this->db->table('pengajuan_surat')
            ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
            ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
            ->like('masyarakat.nama_masyarakat', $keyword)
            ->orLike('masyarakat.NIK', $keyword)
            ->where('status !=', 'disetujui2')
            ->get()->getResultArray();
    }

    public function proses_cari_data_pengajuan_saya($keyword)
    {

        return $this->db->table('pengajuan_surat')
            ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
            ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
            ->like('masyarakat.nama_masyarakat', $keyword)
            ->orLike('masyarakat.NIK', $keyword)
            ->orLike('surat.nama_surat', $keyword)
            ->where('status !=', 'menunggu')
            ->where('tipe_pengajuan', 'admin')
            ->get()->getResultArray();
    }

    public function proses_cari_data_surat_masuk($keyword)
    {
        return $this->db->table('surat_masuk')
            ->like('no_surat', $keyword)
            ->like('kode_surat', $keyword)
            ->orLike('pengirim', $keyword)
            ->orLike('kepada', $keyword)
            ->get()->getResultArray();
    }

    public function proses_cari_data_surat_keluar($keyword)
    {
        return $this->db->table('surat_keluar')
            ->like('no_surat', $keyword)
            ->like('kode_surat', $keyword)
            ->orLike('nama_bagian', $keyword)
            ->orLike('kepada', $keyword)
            ->get()->getResultArray();
    }

    public function proses_cari_data_syarat($keyword)
    {
        return $this->db->table('syarat')
            ->like('nama_syarat', $keyword)
            ->orLike('id_syarat', $keyword)
            ->get()->getResultArray();
    }

    public function proses_cari_data_pengguna($keyword)
    {
        return $this->db->table('masyarakat')
            ->join('login', 'login.id_user=masyarakat.id_masyarakat')
            ->like('nama_masyarakat', $keyword)
            ->orLike('NIK', $keyword)
            ->get()->getResultArray();
    }

    public function proses_cari_data_persyaratan($keyword)
    {
        return $this->db->table('syarat_surat')
            ->join('surat', 'surat.id_surat=syarat_surat.id_surat')
            ->join('syarat', 'syarat.id_syarat=syarat_surat.id_syarat')
            ->like('nama_syarat', $keyword)
            ->orLike('nama_surat', $keyword)
            ->get()->getResultArray();
    }

    public function select_surat()
    {
        $query = $this->db->query("
            SELECT surat.id_surat, surat.nama_surat 
            FROM surat 
                WHERE surat.id_surat NOT IN (
                    SELECT syarat_surat.id_surat FROM syarat_surat
                )
        ");
        return $query->getResultArray();
    }

    public function getTotalResgitrasi()
    {
        $query = $this->db->query("SELECT COUNT('id_masyarakat') AS total_registrasi FROM masyarakat INNER JOIN login ON masyarakat.id_masyarakat=login.id_user WHERE status_keaktifan='tidak aktif'");
        return $query->getRowArray();
    }

    public function getTotalPengajuanSurat()
    {
        $query = $this->db->query("SELECT COUNT(id_pengajuan_surat) AS total_pengajuan FROM pengajuan_surat WHERE status='menunggu' AND tipe_pengajuan='mandiri'");
        return $query->getRowArray();
    }

    public function getTotalPengajuanSaya()
    {
        $query = $this->db->query("SELECT COUNT(id_pengajuan_surat) AS total_pengajuan_saya FROM pengajuan_surat WHERE status='disetujui2' AND tipe_pengajuan='admin'");
        return $query->getRowArray();
    }

    public function select_syarat()
    {
        return $this->db->table('syarat')
            ->get()->getResultArray();
    }

    public function tampilkan_data_profile($id)
    {
        return $this->db->table('sekertaris')
            ->join('login', 'login.id_user=sekertaris.id_sekertaris')
            ->where('id_sekertaris', $id)
            ->get()->getRowArray();
    }

    public function tampilkan_data_pengajuan_surat($filter)
    {
        if ($filter === null) {
            return $this->db->table('pengajuan_surat')
                ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
                ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
                ->where('tipe_pengajuan', 'mandiri')
                ->get()->getResultArray();
        } else {
            return $this->db->query("SELECT * FROM pengajuan_surat 
            JOIN masyarakat ON masyarakat.NIK = pengajuan_surat.NIK 
            JOIN surat ON surat.id_surat = pengajuan_surat.id_surat 
            WHERE tipe_pengajuan = 'mandiri'
            AND surat.nama_surat LIKE '".$filter."%'")
            ->getResultArray();
        }
    }

    public function tampilkan_nama_pengajuan_surat($type)
    {
        $query = $this->db->query("SELECT nama_surat AS name FROM pengajuan_surat 
        JOIN masyarakat ON masyarakat.NIK = pengajuan_surat.NIK 
        JOIN surat ON surat.id_surat = pengajuan_surat.id_surat 
        WHERE tipe_pengajuan = '" . $type . "'");
        return $query->getResultObject();
    }


    public function tampilkan_data_pengajuan_saya()
    {
        return $this->db->table('pengajuan_surat')
            ->join('masyarakat', 'masyarakat.NIK=pengajuan_surat.NIK')
            ->join('surat', 'surat.id_surat=pengajuan_surat.id_surat')
            ->where('tipe_pengajuan', 'admin')
            ->get()->getResultArray();
    }

    public function proses_ubah_pengajuan_surat($data, $id)
    {
        return $this->db->table('pengajuan_surat')->where('id_pengajuan_surat', $id)->update($data);
    }

    public function proses_ubah_pengajuan_saya($data, $id)
    {
        return $this->db->table('pengajuan_surat')->where('id_pengajuan_surat', $id)->update($data);
    }

    public function home_getTotalSuratMasuk()
    {
        $query = $this->db->query("SELECT COUNT(id_surat_masuk) AS total_surat_masuk FROM surat_masuk");
        return $query->getRowArray();
    }

    public function home_getTotalSuratKeluar()
    {
        $query = $this->db->query("SELECT COUNT(id_surat_keluar) AS total_surat_keluar FROM surat_keluar");
        return $query->getRowArray();
    }
    public function home_getTotalPengajuanSurat()
    {
        $query = $this->db->query("SELECT COUNT(id_pengajuan_surat) AS total_pengajuan_surat FROM pengajuan_surat WHERE tipe_pengajuan='mandiri'");
        return $query->getRowArray();
    }

    public function home_getTotalPengajuanSaya()
    {
        $query = $this->db->query("SELECT COUNT(id_pengajuan_surat) AS total_pengajuan_saya FROM pengajuan_surat WHERE tipe_pengajuan='admin'");
        return $query->getRowArray();
    }
}
