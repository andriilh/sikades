<?php

namespace App\Controllers;

use App\Models\MSekertaris;
use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;

use function PHPUnit\Framework\isEmpty;

class CSekertaris extends BaseController
{
    public $mSekertaris;

    public function __construct()
    {
        $this->mSekertaris = new MSekertaris();


        $myTime            = new Time('now', 'Asia/Jakarta', 'id');
        $this->id          = $myTime->getYear() . $myTime->getMonth() . $myTime->getDay() . $myTime->getHour() . $myTime->getMinute() . $myTime->getSecond();
    }

    public function index()
    {
    }

    public function tambah_data_surat()
    {
        $data = [
            'id_surat'         => $this->request->getPost('id_surat'),
            'nama_surat'       => $this->request->getPost('nama_surat'),
            'keterangan_surat' => $this->request->getPost('keterangan_surat')
        ];

        $tambahDataSurat = $this->mSekertaris->proses_tambah_data_surat($data);
        if ($tambahDataSurat) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_kelola_data_surat');
        }
    }

    public function tambah_data_syarat()
    {
        $data = [
            'id_syarat'         => $this->request->getPost('id_syarat'),
            'nama_syarat'       => $this->request->getPost('nama_syarat')
        ];

        $tambahDataSyarat = $this->mSekertaris->proses_tambah_data_syarat($data);
        if ($tambahDataSyarat) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_kelola_data_syarat');
        }
    }

    public function tambah_data_persyaratan()
    {
        $data = [
            'id_syarat_surat' => $this->request->getPost('id_persyaratan'),
            'id_surat'        => $this->request->getPost('id_surat'),
            'id_syarat'       => $this->request->getPost('id_syarat')
        ];

        $tambahDataPersyaratan = $this->mSekertaris->proses_tambah_data_persyaratan($data);
        if ($tambahDataPersyaratan) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_kelola_data_persyaratan');
        }
    }

    public function tambah_data_pengguna()
    {
        $datamasyarakat = [
            'id_masyarakat'   => $this->request->getPost('idmasyarakat'),
            'nama_masyarakat' => $this->request->getPost('nama'),
            'NIK'             => $this->request->getPost('nik'),
            'jenis_kelamin'   => $this->request->getPost('jeniskelamin'),
            'tempat_lahir'    => $this->request->getPost('tempatlahir'),
            'tgl_lahir'       => $this->request->getPost('tanggallahir'),
            'agama'           => $this->request->getPost('agama'),
            'no_hp'           => $this->request->getPost('nohp'),
            'email'           => $this->request->getPost('email'),
            'alamat'          => $this->request->getPost('alamat')
        ];

        $tambahDataPengguna = $this->mSekertaris->proses_tambah_data_pengguna($datamasyarakat);

        $datalogin = [
            'id_user'          => $this->request->getPost('idmasyarakat'),
            'username'         => $this->request->getPost('username'),
            'password'         => $this->request->getPost('password'),
            'status_user'      => 'masyarakat'
        ];

        $tambahDatalogin = $this->mSekertaris->proses_tambah_data_login_pengguna($datalogin);

        if ($tambahDataPengguna && $tambahDatalogin) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_kelola_data_pengguna');
        }
    }

    public function tambah_surat_masuk()
    {
        $filesurat = $this->request->getFile('filesuratmasuk');
        $filesurat->move('public/Suratmasuk');

        $namafilesuratmasuk = $filesurat->getName();

        $data = [
            'id_surat_masuk' => $this->request->getPost('idsuratmasuk'),
            'kode_surat'     => $this->request->getPost('kodesuratmasuk'),
            'no_surat'       => $this->request->getPost('nosuratmasuk'),
            'tgl_masuk'      => $this->request->getPost('tglmasuk'),
            'tgl_surat'      => $this->request->getPost('tglsurat'),
            'pengirim'       => $this->request->getPost('pengirim'),
            'kepada'         => $this->request->getPost('kepada'),
            'perihal'        => $this->request->getPost('perihal'),
            'file'           => $namafilesuratmasuk,
            'status'         => 'menunggu',
            'operator'       => session()->get('id_user')
        ];

        $tambahDataSuratMasuk = $this->mSekertaris->proses_tambah_surat_masuk($data);
        if ($tambahDataSuratMasuk) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_surat_masuk');
        }
    }

    public function tambah_surat_keluar()
    {
        $filesurat = $this->request->getFile('filesuratkeluar');
        $filesurat->move('public/Suratkeluar');

        $namafilesuratkeluar = $filesurat->getName();

        $data = [
            'id_surat_keluar' => $this->request->getPost('idsuratkeluar'),
            'kode_surat'      => $this->request->getPost('kodesuratkeluar'),
            'no_surat'        => $this->request->getPost('nosuratkeluar'),
            'tgl_keluar'      => $this->request->getPost('tglkeluar'),
            'tgl_surat'       => $this->request->getPost('tglsurat'),
            'nama_bagian'     => $this->request->getPost('namabagian'),
            'kepada'          => $this->request->getPost('kepada'),
            'perihal'         => $this->request->getPost('perihal'),
            'file'            => $namafilesuratkeluar,
            'status'          => 'menunggu',
            'operator'        => session()->get('id_user')
        ];

        $tambahDataSuratKeluar = $this->mSekertaris->proses_tambah_surat_keluar($data);
        if ($tambahDataSuratKeluar) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_surat_keluar');
        }
    }

    public function tambah_data_pengajuan_saya()
    {
        $datamasyarakat = [
            'id_masyarakat'   => $this->request->getPost('idmasyarakat'),
            'nama_masyarakat' => $this->request->getPost('nama'),
            'NIK'             => $this->request->getPost('nik'),
            'jenis_kelamin'   => $this->request->getPost('jeniskelamin'),
            'tempat_lahir'    => $this->request->getPost('tempatlahir'),
            'tgl_lahir'       => $this->request->getPost('tanggallahir'),
            'agama'           => $this->request->getPost('agama'),
            'alamat'          => $this->request->getPost('alamat')
        ];

        $datalogin = [
            'id_user'          => $this->request->getPost('idmasyarakat'),
            'username'         => $this->request->getPost('nik'),
            'password'         => $this->request->getPost('nik'),
            'status_user'      => 'masyarakat',
            'status_keaktifan' => 'aktif',
        ];

        $filepengajuansaya = $this->request->getFile('filepengajuansaya');
        $filepengajuansaya->move('public/Pengajuansurat');
        $namafilepengajuansaya = $filepengajuansaya->getName();

        $datapengajuansurat = [
            'id_pengajuan_surat' => $this->request->getPost('idpengajuansaya'),
            'NIK'                => $this->request->getPost('nik'),
            'id_surat'           => $this->request->getPost('surat'),
            'file'               => $namafilepengajuansaya,
            'status'             => 'disetujui',
            'tipe_pengajuan'     => 'admin',
            'operator'           => session()->get('id_user')
        ];

        $tambahDataPengguna = $this->mSekertaris->proses_tambah_data_pengguna($datamasyarakat);
        $tambahDatalogin = $this->mSekertaris->proses_tambah_data_login_pengguna($datalogin);
        $tambahDataPengajuanSaya = $this->mSekertaris->proses_tambah_pengajuan_saya($datapengajuansurat);

        if ($tambahDataPengajuanSaya && $tambahDatalogin && $tambahDataPengguna) {
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_pengajuan_saya_sekertaris');
        }
    }

    public function ubah_data_pengguna()
    {

        $datamasyarakatedit = [
            'nama_masyarakat' => $this->request->getPost('nama_edit'),
            'NIK'             => $this->request->getPost('nik_edit'),
            'jenis_kelamin'   => $this->request->getPost('jeniskelamin_edit'),
            'tempat_lahir'    => $this->request->getPost('tempatlahir_edit'),
            'tgl_lahir'       => $this->request->getPost('tanggallahir_edit'),
            'agama'           => $this->request->getPost('agama_edit'),
            'no_hp'           => $this->request->getPost('nohp_edit'),
            'email'           => $this->request->getPost('email_edit'),
            'alamat'          => $this->request->getPost('alamat_edit')
        ];

        $ubahDataPengguna = $this->mSekertaris->proses_ubah_data_pengguna($datamasyarakatedit, $this->request->getPost('idmasyarakat_edit'));

        $datalogin = [
            'username'         => $this->request->getPost('username_edit'),
            'password'         => $this->request->getPost('password_edit')
        ];


        $ubahDatalogin = $this->mSekertaris->proses_ubah_data_login_pengguna($datalogin, $this->request->getPost('idmasyarakat_edit'));

        if ($ubahDataPengguna && $ubahDatalogin) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_kelola_data_pengguna');
        }
    }

    public function ubah_data_surat()
    {
        $data = [
            'nama_surat'       => $this->request->getPost('nama_surat_edit'),
            'keterangan_surat' => $this->request->getPost('keterangan_surat_edit')
        ];

        $ubahDataSurat = $this->mSekertaris->proses_ubah_data_surat($data, $this->request->getPost('id_surat_edit'));
        if ($ubahDataSurat) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_kelola_data_surat');
        }
    }

    public function ubah_data_konfirmasi_registrasi($id_masyarakat)
    {
        $data = [
            'status_keaktifan'       => 'aktif'
        ];

        $ubahDataKonfirmasiRegistrasi = $this->mSekertaris->proses_ubah_data_konfirmasi_registrasi($data, $id_masyarakat);
        if ($ubahDataKonfirmasiRegistrasi) {
            session()->set('total_registrasi', session()->get('total_registrasi') - 1);
            session()->setFlashdata('tambah', 'tambah');
            return redirect()->to('/CUtama/link_konfrimasi_registrasi');
        }
    }

    public function hapus_data_konfirmasi_registrasi($id_masyarakat)
    {
        $hapusDataKonfirmasiRegistrasi = $this->mSekertaris->proses_hapus_data_pengguna($id_masyarakat);
        $hapusDataKonfirmasiLogin      = $this->mSekertaris->proses_hapus_data_login_pengguna($id_masyarakat);
        if ($hapusDataKonfirmasiRegistrasi && $hapusDataKonfirmasiLogin) {
            session()->set('total_registrasi', session()->get('total_registrasi') - 1);
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_konfrimasi_registrasi');
        }
    }

    public function ubah_data_syarat()
    {
        $data = [
            'nama_syarat'       => $this->request->getPost('nama_syarat_edit')
        ];

        $ubahDataSyarat = $this->mSekertaris->proses_ubah_data_syarat($data, $this->request->getPost('id_syarat_edit'));
        if ($ubahDataSyarat) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_kelola_data_syarat');
        }
    }

    public function ubah_data_persyaratan()
    {
        $data = [
            'id_syarat'       => $this->request->getPost('id_syarat_edit')
        ];

        $ubahDataPersyaratan = $this->mSekertaris->proses_ubah_data_persyaratan($data, $this->request->getPost('id_persyaratan_edit'));

        if ($ubahDataPersyaratan) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_kelola_data_persyaratan');
        }
    }

    public function ubah_profile_sekertaris()
    {
        $data = [
            'nama_sekertaris' => $this->request->getPost('nama'),
            'nik'             => $this->request->getPost('nik'),
            'jenis_kelamin'   => $this->request->getPost('jeniskelamin'),
            'tempat_lahir'    => $this->request->getPost('tempatlahir'),
            'tgl_lahir'       => $this->request->getPost('tgllahir'),
            'agama'           => $this->request->getPost('agama'),
            'email'           => $this->request->getPost('email'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'alamat'          => $this->request->getPost('alamat')
        ];

        $ubahDataProfileSekertaris = $this->mSekertaris->proses_ubah_data_profile_sekertaris($data, $this->request->getPost('idsekertaris'));

        if ($ubahDataProfileSekertaris) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_ubah_profile_sekertaris');
        }
    }

    public function ubah_surat_masuk()
    {
        $data = [
            'tgl_masuk'  => $this->request->getPost('tglmasuk_edit'),
            'kode_surat' => $this->request->getPost('kodesuratmasuk_edit'),
            'no_surat'   => $this->request->getPost('nosuratmasuk_edit'),
            'tgl_surat'  => $this->request->getPost('tglsurat_edit'),
            'pengirim'   => $this->request->getPost('pengirim_edit'),
            'kepada'     => $this->request->getPost('kepada_edit'),
            'perihal'    => $this->request->getPost('perihal_edit'),
            'operator'   => session()->get('id_user')
        ];

        $ubahDataSuratMasuk = $this->mSekertaris->proses_ubah_surat_masuk($data, $this->request->getPost('idsuratmasuk_edit'));

        if ($ubahDataSuratMasuk) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_surat_masuk');
        }
    }

    public function ubah_surat_keluar()
    {

        $data = [
            'tgl_keluar'  => $this->request->getPost('tglkeluar_edit'),
            'kode_surat'  => $this->request->getPost('kodesuratkeluar_edit'),
            'no_surat'    => $this->request->getPost('nosuratkeluar_edit'),
            'tgl_surat'   => $this->request->getPost('tglsurat_edit'),
            'kepada'      => $this->request->getPost('kepada_edit'),
            'perihal'     => $this->request->getPost('perihal_edit'),
            'nama_bagian' => $this->request->getPost('namabagian_edit'),
            'operator'    => session()->get('id_user')
        ];

        $ubahDataSuratKeluar = $this->mSekertaris->proses_ubah_surat_keluar($data, $this->request->getPost('idsuratkeluar_edit'));

        if ($ubahDataSuratKeluar) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_surat_keluar');
        }
    }

    public function ubah_us_ps_sekertaris()
    {

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $ubahDataUsPsSekertaris = $this->mSekertaris->proses_ubah_data_us_ps_sekertaris($data, $this->request->getPost('idsekertaris'));

        if ($ubahDataUsPsSekertaris) {
            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_ubah_us_ps_sekertaris');
        }
    }

    public function hapus_data_surat($id_surat)
    {

        $hapusDataSurat = $this->mSekertaris->proses_hapus_data_surat($id_surat);
        if ($hapusDataSurat) {
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_kelola_data_surat');
        }
    }

    public function hapus_data_pengajuan_saya($id_pengajuan_saya)
    {

        $hapusDataPengajuanSaya = $this->mSekertaris->proses_hapus_data_pengajuan_saya($id_pengajuan_saya);
        if ($hapusDataPengajuanSaya) {
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_pengajuan_saya_sekertaris');
        }
    }

    public function hapus_data_syarat($id_syarat)
    {
        $hapusDataSyarat = $this->mSekertaris->proses_hapus_data_syarat($id_syarat);
        if ($hapusDataSyarat) {
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_kelola_data_syarat');
        }
    }

    public function hapus_data_persyaratan($id_persyaratan)
    {
        $hapusDataPersyaratan = $this->mSekertaris->proses_hapus_data_persyaratan($id_persyaratan);
        if ($hapusDataPersyaratan) {
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_kelola_data_persyaratan');
        }
    }

    public function hapus_data_pengguna($id_masyarakat)
    {
        $hapusDataPengguna = $this->mSekertaris->proses_hapus_data_pengguna($id_masyarakat);
        $hapusDataLoginPengguna = $this->mSekertaris->proses_hapus_data_login_pengguna($id_masyarakat);
        if ($hapusDataPengguna && $hapusDataLoginPengguna) {
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_kelola_data_pengguna');
        }
    }

    public function hapus_surat_masuk($id_surat_masuk)
    {
        $hapusDataSuratMasuk = $this->mSekertaris->proses_hapus_surat_masuk($id_surat_masuk);
        if ($hapusDataSuratMasuk) {
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_surat_masuk');
        }
    }

    public function hapus_surat_keluar($id_surat_keluar)
    {
        $hapusDataSuratKeluar = $this->mSekertaris->proses_hapus_surat_keluar($id_surat_keluar);
        if ($hapusDataSuratKeluar) {
            session()->setFlashdata('hapus', 'hapus');
            return redirect()->to('/CUtama/link_surat_keluar');
        }
    }

    public function cari_data_surat()
    {
        $cariDataSurat = $this->mSekertaris->proses_cari_data_surat($this->request->getPost('keyword'));

        if ($cariDataSurat == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_kelola_data_surat');
        } else {
            $data = [
                'judul_bar'     => 'SIKADES | Kelola Data Surat',
                'judul_halaman' => 'Kelola Data Surat',
                'datasurat'     => $cariDataSurat,
                'idsurat'       => $this->id
            ];

            return view('dashboard/pages/admin/v_kelola_data_surat', $data);
        }
    }

    public function cari_data_syarat()
    {
        $cariDataSyarat = $this->mSekertaris->proses_cari_data_syarat($this->request->getPost('keyword'));
        if ($cariDataSyarat == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_kelola_data_syarat');
        } else {
            $data = [
                'judul_bar'     => 'SIKADES | Kelola Data Syarat',
                'judul_halaman' => 'Kelola Data Syarat',
                'datasyarat'    => $cariDataSyarat,
                'idsyarat'      => $this->id
            ];

            return view('dashboard/pages/admin/v_kelola_data_syarat', $data);
        }
    }

    public function cari_data_surat_masuk_sekertaris()
    {
        $cariDataSuratMasuk = $this->mSekertaris->proses_cari_data_surat_masuk($this->request->getPost('keyword'));

        if ($cariDataSuratMasuk == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_surat_masuk');
        } else {
            session()->set('halaman', 'surat_masuk');
            $data = [
                'judul_bar'      => 'SIKADES | Surat Masuk',
                'judul_halaman'  => 'Surat Masuk',
                'idsuratmasuk'   => $this->id,
                'datasuratmasuk' => $cariDataSuratMasuk
            ];

            return view('dashboard/pages/admin/v_surat_masuk', $data);
        }
    }

    public function cari_data_surat_keluar_sekertaris()
    {
        $cariDataSuratKeluar = $this->mSekertaris->proses_cari_data_surat_keluar($this->request->getPost('keyword'));

        if ($cariDataSuratKeluar == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_surat_keluar');
        } else {
            session()->set('halaman', 'surat_keluar');
            $data = [
                'judul_bar'       => 'SIKADES | Surat Keluar',
                'judul_halaman'   => 'Surat Keluar',
                'idsuratkeluar'   => $this->id,
                'datasuratkeluar' => $cariDataSuratKeluar
            ];

            return view('dashboard/pages/admin/v_surat_keluar', $data);
        }
    }

    public function proses_cari_data_persyaratan()
    {

        $cariDataPersyaratan = $this->mSekertaris->proses_cari_data_persyaratan($this->request->getPost('keyword'));
        if ($cariDataPersyaratan == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_kelola_data_persyaratan');
        } else {
            session()->set('halaman', 'kelola_data_persyaratan');

            $selectsurat = $this->mSekertaris->select_surat();
            $selectsyarat = $this->mSekertaris->select_syarat();
            $selectsuratedit = $this->mSekertaris->tampilkan_data_surat();

            $data = [
                'judul_bar'       => 'SIKADES | Kelola Data Persyaratan',
                'judul_halaman'   => 'Kelola Data Persyaratan',
                'datapersyaratan' => $cariDataPersyaratan,
                'selectsurat'     => $selectsurat,
                'selectsyarat'    => $selectsyarat,
                'idpersyaratan'   => $this->id,
                'selectsuratedit' => $selectsuratedit
            ];
            return view('dashboard/pages/admin/v_kelola_data_persyaratan', $data);
        }
    }

    public function cari_data_pengguna()
    {
        $cariDataPengguna = $this->mSekertaris->proses_cari_data_pengguna($this->request->getPost('keyword'));
        if ($cariDataPengguna == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_kelola_data_pengguna');
        } else {
            $data = [
                'judul_bar'      => 'SIKADES | Kelola Data Pengguna',
                'judul_halaman'  => 'Kelola Data Pengguna',
                'datamasyarakat' => $cariDataPengguna,
                'idpengguna'     => $this->id
            ];

            return view('dashboard/pages/admin/v_kelola_data_pengguna', $data);
        }
    }

    public function cari_data_pengajuan_surat()
    {
        $cariDataPengajuanSurat = $this->mSekertaris->proses_cari_data_pengajuan_surat($this->request->getPost('keyword'));
        if ($cariDataPengajuanSurat == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_pengajuan_surat_sekertaris');
        } else {
            session()->set('halaman', 'pengajuan_surat_sekertaris');

            $data = [
                'judul_bar'     => 'SIKADES | Pengajuan Surat',
                'judul_halaman' => 'Pengajuan Surat',
                'datapengajuan' => $cariDataPengajuanSurat
            ];

            return view('dashboard/pages/admin/v_pengajuan_surat', $data);
        }
    }

    public function cari_data_pengajuan_saya()
    {
        $cariDataPengajuanSaya = $this->mSekertaris->proses_cari_data_pengajuan_saya($this->request->getPost('keyword'));
        if ($cariDataPengajuanSaya == null) {
            session()->setFlashdata('kosong', 'kosong');
            return redirect()->to('/CUtama/link_pengajuan_saya_sekertaris');
        } else {
            session()->set('halaman', 'pengajuan_saya_sekertaris');
            $datasurat = $this->mSekertaris->tampilkan_data_surat();

            $data = [
                'judul_bar'       => 'SIKADES | Pengajuan Saya',
                'judul_halaman'   => 'Pengajuan Saya',
                'datapengajuan'   => $cariDataPengajuanSaya,
                'datasurat'       => $datasurat,
                'idpengajuansaya' => $this->id
            ];

            return view('dashboard/pages/admin/v_pengajuan_saya', $data);
        }
    }

    public function ubah_pengajuan_surat_sekertaris()
    {
        $file = $this->request->getFile('file');
        $data = [
            'status'    => $this->request->getPost('status'),
            'acc_admin' => session()->get('id_user'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if (!isEmpty($file->getName())) {
            $file->move('public/Pengajuansurat/Masyarakat');
            $addFileSurat = [
                'file_surat'    => $file->getName()
            ];
            $data = array_merge($data, $addFileSurat);
        }


        $ubahPengajuanSurat = $this->mSekertaris->proses_ubah_pengajuan_surat($data, $this->request->getPost('id_pengajuan_surat'));

        if ($ubahPengajuanSurat) {
            session()->set('total_pengajuan', session()->get('total_pengajuan') - 1);
            session()->set('total_seluruh_pengajuan', session()->get('total_seluruh_pengajuan') - 1);

            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_pengajuan_surat_sekertaris');
        }
    }

    public function ubah_pengajuan_saya_sekertaris()
    {
        $file = $this->request->getFile('file');
        $data = [
            'status'  => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        if ($file) {
            $file->move('public/Pengajuansurat/Masyarakat');
            $addFileSurat = [
                'file_surat'    => $file->getName()
            ];
            $data = array_merge($data, $addFileSurat);
        }

        $ubahPengajuanSaya = $this->mSekertaris->proses_ubah_pengajuan_saya($data, $this->request->getPost('id_pengajuan_surat'));

        if ($ubahPengajuanSaya) {
            session()->set('total_pengajuan_saya', session()->get('total_pengajuan_saya') - 1);
            session()->set('total_seluruh_pengajuan', session()->get('total_seluruh_pengajuan') - 1);

            session()->setFlashdata('edit', 'edit');
            return redirect()->to('/CUtama/link_pengajuan_saya_sekertaris');
        }
    }

    public function printpdf_surat_masuk()
    {
        $dompPdf = new Dompdf();
        $datasuratmasuk = $this->mSekertaris->tampilkan_data_surat_masuk();

        $data = [
            'judul_bar'      => 'SIKADES | Surat Masuk',
            'judul_halaman'  => 'Surat Masuk',
            'idsuratmasuk'   => $this->id,
            'datasuratmasuk' => $datasuratmasuk
        ];
        $html = view('dashboard/pages/admin/v_surat_masuk_download_pdf', $data);

        $dompPdf->loadhtml($html);
        $dompPdf->setPaper('A4', 'landscape');
        $dompPdf->render();
        $dompPdf->stream();
    }

    public function printpdf_surat_keluar()
    {
        $dompPdf = new Dompdf();

        $datasuratkeluar = $this->mSekertaris->tampilkan_data_surat_keluar_download_pdf();

        $data = [
            'judul_bar'      => 'SIKADES | Surat Keluar',
            'judul_halaman'  => 'Surat Keluar',
            'idsuratkeluar'   => $this->id,
            'datasuratkeluar' => $datasuratkeluar
        ];

        // return view('dashboard/pages/admin/v_surat_keluar_download_pdf', $data);
        $html = view('dashboard/pages/admin/v_surat_keluar_download_pdf', $data);

        $dompPdf->loadhtml($html);
        $dompPdf->setPaper('A4', 'landscape');
        $dompPdf->render();
        $dompPdf->stream();
    }

    public function no_surat()
    {
        $kode = $this->request->getGet('kode');
        $no = $this->mSekertaris->nomorSuratTerakhir($kode);
        if ($no[0]->number == null) {
            return $this->response->setJSON([["number" => "0"]]);
        } else {
            return $this->response->setJSON($no);
        }
    }
}
