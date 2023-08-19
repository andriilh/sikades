<?php

namespace App\Controllers;

use App\Models\MMasyarakat;
use CodeIgniter\I18n\Time;


class CMasyarakat extends BaseController
{
    public $mMasyarakat;

    public function __construct()
    {
        $this->mMasyarakat = new MMasyarakat();

        $myTime            = new Time('now', 'Asia/Jakarta', 'id');
        $this->id          = $myTime->getYear() . $myTime->getMonth() . $myTime->getDay() . $myTime->getHour() . $myTime->getMinute() . $myTime->getSecond();
    }

    public function ubah_profile_masyarakat()
    {
        $data = [
            'nama_masyarakat' => $this->request->getPost('nama'),
            'nik'             => $this->request->getPost('nik'),
            'jenis_kelamin'   => $this->request->getPost('jeniskelamin'),
            'tempat_lahir'    => $this->request->getPost('tempatlahir'),
            'tgl_lahir'       => $this->request->getPost('tgllahir'),
            'agama'           => $this->request->getPost('agama'),
            'email'           => $this->request->getPost('email'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'alamat'          => $this->request->getPost('alamat')
        ];

        $ubahDataProfileMasyarakat = $this->mMasyarakat->proses_ubah_data_profile_masyarakat($data, $this->request->getPost('idmasyarakat'));

        if ($ubahDataProfileMasyarakat) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_ubah_profile_masyarakat');
        }
    }

    public function ubah_us_ps_masyarakat()
    {

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $ubahDataUsPsMasyarakat = $this->mMasyarakat->proses_ubah_data_us_ps_masyarakat($data, $this->request->getPost('idmasyarakat'));

        if ($ubahDataUsPsMasyarakat) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_ubah_us_ps_masyarakat');
        }
    }

    public function tambah_pengajuan_surat()
    {
        $filesurat = $this->request->getFile('filepengajuansurat');
        $filesurat->move('public/Pengajuansurat');
        $namafilepengajuansurat = $filesurat->getName();
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'id_pengajuan_surat' => $this->request->getPost('id_pengajuan'),
            'NIK'                => session()->get('nik'),
            'id_surat'           => $this->request->getPost('surat_pengajuan'),
            'file'               => $namafilepengajuansurat,
            'status'             => 'menunggu',
            'tipe_pengajuan'     => 'mandiri',
            'tgl_pengajuan'      => date('Y-m-d'),
            'operator'           => session()->get('id_user')
        ];

        $tambahPengajuanSurat = $this->mMasyarakat->proses_tambah_pengajuan_surat_masyarakat($data);

        if ($tambahPengajuanSurat) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_pengajuan_surat_masyarakat');
        }
    }

    public function hapus_pengajuan_masyarakat($id_pengajuan)
    {
        $hapusPengajuan = $this->mMasyarakat->proses_hapus_pengajuan($id_pengajuan);
        if ($hapusPengajuan) {
            session()->set('total_pengajuan', session()->get('total_pengajuan') - 1);
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_pengajuan_surat_masyarakat');
        }
    }

    public function cari_data_pengajuan_surat()
    {
        $cariDataPengajuanSurat = $this->mMasyarakat->proses_cari_data_pengajuan($this->request->getPost('keyword'), session()->get('id_user'));

        if ($cariDataPengajuanSurat == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_pengajuan_surat_masyarakat');
        } else {
            session()->set('halaman', 'pengajuan_surat_masyarakat');

            $datasurat = $this->mMasyarakat->tampilkan_data_surat();
            $data = [
                'judul_bar'        => 'SIKADES | Pengajuan Surat',
                'judul_halaman'    => 'Pengajuan Surat',
                'idpengajuansurat' => $this->id,
                'datasurat'        => $datasurat,
                'datapengajuan'    => $cariDataPengajuanSurat
            ];


            return view('dashboard/pages/user/v_pengajuan_surat', $data);
        }
    }

    public function notification()
    {
        $all = $this->mMasyarakat->notifications(session()->get('nik'), 'all');
        $menunggu = $this->mMasyarakat->notifications(session()->get('nik'), 'menunggu');
        $diproses = $this->mMasyarakat->notifications(session()->get('nik'), 'diproses');
        $ditolak = $this->mMasyarakat->notifications(session()->get('nik'), 'ditolak');
        $disetujui = $this->mMasyarakat->notifications(session()->get('nik'), 'disetujui');
        $disetujui2 = $this->mMasyarakat->notifications(session()->get('nik'), 'disetujui2');
        $selesai = $this->mMasyarakat->notifications(session()->get('nik'), 'selesai');

        $data = [
            'all'       => intval($all[0]['count']),
            'menunggu'  => intval($menunggu[0]['count']),
            'diproses'  => intval($diproses[0]['count']),
            'disetujui' => intval($disetujui[0]['count']) + intval($disetujui2[0]['count']),
            'selesai'   => intval($selesai[0]['count']),
            'ditolak'   => intval($ditolak[0]['count']),
        ];

        return $this->response->setJSON($data);
    }
}
