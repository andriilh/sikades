<?php

namespace App\Controllers;

use App\Models\MLurah;
use CodeIgniter\I18n\Time;

class CLurah extends BaseController
{
    public $mLurah;

    public function __construct()
    {
        $this->mLurah = new MLurah();

        $myTime            = new Time('now', 'Asia/Jakarta', 'id');
        $this->id          = $myTime->getYear() . $myTime->getMonth() . $myTime->getDay() . $myTime->getHour() . $myTime->getMinute() . $myTime->getSecond();
    }

    public function ubah_status_surat_masuk()
    {
        $data = [
            'status'       => $this->request->getPost('status_edit'),
        ];

        $ubahStatusSuratMasuk = $this->mLurah->proses_ubah_status_surat_masuk($data, $this->request->getPost('id_surat_masuk_edit'));

        if ($ubahStatusSuratMasuk) {
            session()->set('total_surat_masuk', session()->get('total_surat_masuk') - 1);
            session()->set('total_seluruh_surat', session()->get('total_seluruh_surat') - 1);
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_konfirmasi_surat_masuk');
        }
    }

    public function ubah_status_surat_keluar()
    {
        $data = [
            'status'       => $this->request->getPost('status_edit')
        ];

        $ubahStatusSuratKeluar = $this->mLurah->proses_ubah_status_surat_keluar($data, $this->request->getPost('id_surat_keluar_edit'));

        if ($ubahStatusSuratKeluar) {
            session()->set('total_surat_keluar', session()->get('total_surat_keluar') - 1);
            session()->set('total_seluruh_surat', session()->get('total_seluruh_surat') - 1);
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_konfirmasi_surat_keluar');
        }
    }

    public function cari_data_surat_masuk_lurah()
    {
        $cariDataSuratMasuk = $this->mLurah->proses_cari_data_surat_masuk($this->request->getPost('keyword'));
        if ($cariDataSuratMasuk == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_konfirmasi_surat_masuk');
        } else {
            session()->set('halaman', 'konfirmasi_surat_masuk');
            $data = [
                'judul_bar'      => 'SIKADES | Surat Masuk',
                'judul_halaman'  => 'Surat Masuk',
                'idsuratmasuk'   => $this->id,
                'datasuratmasuk' => $cariDataSuratMasuk
            ];

            return view('dashboard/pages/kepala/v_surat_masuk', $data);
        }
    }

    public function cari_data_surat_keluar_lurah()
    {
        $cariDataSuratKeluar = $this->mLurah->proses_cari_data_surat_keluar($this->request->getPost('keyword'));

        if ($cariDataSuratKeluar == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_konfirmasi_surat_keluar');
        } else {
            session()->set('halaman', 'konfirmasi_surat_keluar');
            $data = [
                'judul_bar'       => 'SIKADES | Surat Keluar',
                'judul_halaman'   => 'Surat Keluar',
                'idsuratkeluar'   => $this->id,
                'datasuratkeluar' => $cariDataSuratKeluar
            ];

            return view('dashboard/pages/kepala/v_surat_keluar', $data);
        }
    }

    public function ubah_profile_lurah()
    {
        $data = [
            'nama_lurah'    => $this->request->getPost('nama'),
            'nik'           => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jeniskelamin'),
            'tempat_lahir'  => $this->request->getPost('tempatlahir'),
            'tgl_lahir'     => $this->request->getPost('tgllahir'),
            'agama'         => $this->request->getPost('agama'),
            'email'         => $this->request->getPost('email'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'alamat'        => $this->request->getPost('alamat')
        ];

        $ubahDataProfileLurah = $this->mLurah->proses_ubah_data_profile_lurah($data, $this->request->getPost('idlurah'));

        if ($ubahDataProfileLurah) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_ubah_profile_lurah');
        }
    }

    public function ubah_us_ps_lurah()
    {

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $ubahDataUsPsLurah = $this->mLurah->proses_ubah_data_us_ps_lurah($data, $this->request->getPost('idlurah'));

        if ($ubahDataUsPsLurah) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_ubah_us_ps_lurah');
        }
    }

    public function ubah_pengajuan_surat_lurah()
    {
        $data = [
            'status'  => $this->request->getPost('status')
        ];

        $ubahPengajuanSurat = $this->mLurah->proses_ubah_pengajuan_surat($data, $this->request->getPost('id_pengajuan_surat'));

        if ($ubahPengajuanSurat) {
            session()->set('total_pengajuan_surat', session()->get('total_pengajuan_surat') - 1);
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_konfirmasi_pengajuan_surat');
        }
    }

    public function cari_data_pengajuan_surat()
    {
        $cariDataPengajuanSurat = $this->mLurah->proses_cari_data_pengajuan_surat($this->request->getPost('keyword'));
        if ($cariDataPengajuanSurat == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_konfirmasi_pengajuan_surat');
        } else {
            session()->set('halaman', 'konfirmasi_pengajuan_surat');

            $data = [
                'judul_bar'     => 'SIKADES | Pengajuan Surat',
                'judul_halaman' => 'Pengajuan Surat',
                'datapengajuan' => $cariDataPengajuanSurat
            ];

            return view('dashboard/pages/kepala/v_pengajuan_surat', $data);
        }
    }
}
