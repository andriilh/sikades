<?php

namespace App\Controllers;

use App\Models\MSekertaris;
use App\Models\MLurah;
use App\Models\MMasyarakat;
use CodeIgniter\I18n\Time;

class CUtama extends BaseController
{
    public $mSekertaris;
    public $mLurah;
    public $mMasyarakat;
    public $id;

    public function __construct()
    {
        $this->mSekertaris = new MSekertaris();
        $this->mLurah      = new MLurah();
        $this->mMasyarakat = new MMasyarakat();

        $myTime            = new Time('now', 'Asia/Jakarta', 'id');
        $this->id          = $myTime->getYear() . $myTime->getMonth() . $myTime->getDay() . $myTime->getHour() . $myTime->getMinute() . $myTime->getSecond();
    }

    public function validation_login()
    {
        if (session()->get("statusUser") == "") {
            return "0";
        } else {
            if (session()->get("statusUser") == "sekertaris") {
                return "sekertaris";
            } else if (session()->get("statusUser") == "lurah") {
                return "lurah";
            } else if (session()->get("statusUser") == "masyarakat") {
                return "masyarakat";
            }
        }
    }

    public function link_login()
    {
        return view('login/index');
    }
    public function link_registrasi()
    {
        $data = ['idmasyarakat' => $this->id];
        return view('login/registrasi', $data);
    }

    public function link_lupa_kata_sandi()
    {
        return view('login/forgotpassword');
    }
    public function link_lupa_kata_sandi2()
    {
        return view('login/forgotpassword2');
    }

    public function link_logout()
    {
        session()->destroy();
        return view('login/index');
    }


    public function link_home_sekertaris()
    {
        session()->set('halaman', 'home_sekertaris');

        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }

        $totalsuratmasuk     = $this->mSekertaris->home_getTotalSuratMasuk();
        $totalsuratkeluar    = $this->mSekertaris->home_getTotalSuratKeluar();
        $totalpengajuansurat = $this->mSekertaris->home_getTotalPengajuanSurat();
        $totalpengajuansaya  = $this->mSekertaris->home_getTotalPengajuanSaya();

        $data = [
            'judul_bar'           => 'SIKADES | Home',
            'judul_halaman'       => 'Home',
            'totalsuratmasuk'     => $totalsuratmasuk,
            'totalsuratkeluar'    => $totalsuratkeluar,
            'totalpengajuansurat' => $totalpengajuansurat,
            'totalpengajuansaya'  => $totalpengajuansaya
        ];

        return view('dashboard/pages/admin/home', $data);
    }

    public function link_home_masyarakat()
    {
        if ($this->validation_login() != "masyarakat") {
            return view("login/index");
        }

        session()->set('halaman', 'home_masyarakat');
        $hometotalpengajuansurat = $this->mMasyarakat->home_getTotalPengajuanSurat(session()->get('nik'));
        $data = [
            'judul_bar'               => 'SIKADES | Home',
            'hometotalpengajuansurat' => $hometotalpengajuansurat

        ];

        return view('dashboard/pages/user/home', $data);
    }

    public function link_home_lurah()
    {
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }

        session()->set('halaman', 'home_lurah');

        $totalsuratmasuk     = $this->mLurah->getTotalSuratMasuk();
        $totalsuratkeluar    = $this->mLurah->getTotalSuratKeluar();
        $totalpengajuansurat = $this->mLurah->getTotalPengajuanSurat();

        $data = [
            'judul_bar'           => 'SIKADES | Home',
            'judul_halaman'       => 'Home',
            'totalsuratmasuk'     => $totalsuratmasuk,
            'totalsuratkeluar'    => $totalsuratkeluar,
            'totalpengajuansurat' => $totalpengajuansurat

        ];

        return view('dashboard/pages/kepala/home', $data);
    }


    public function link_kelola_data_surat()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'kelola_data_surat');

        $datasurat = $this->mSekertaris->tampilkan_data_surat();

        $data = [
            'judul_bar'     => 'SIKADES | Kelola Data Surat',
            'judul_halaman' => 'Kelola Data Surat',
            'datasurat'     => $datasurat,
            'idsurat'       => $this->id
        ];

        return view('dashboard/pages/admin/v_kelola_data_surat', $data);
    }

    public function link_kelola_data_persyaratan()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'kelola_data_persyaratan');

        $datapersyaratan = $this->mSekertaris->tampilkan_data_persyaratan();
        $selectsurat     = $this->mSekertaris->select_surat();
        $selectsyarat    = $this->mSekertaris->select_syarat();
        $selectsuratedit = $this->mSekertaris->tampilkan_data_surat();

        $data = [
            'judul_bar'       => 'SIKADES | Kelola Data Persyaratan',
            'judul_halaman'   => 'Kelola Data Persyaratan',
            'datapersyaratan' => $datapersyaratan,
            'selectsurat'     => $selectsurat,
            'selectsyarat'    => $selectsyarat,
            'idpersyaratan'   => $this->id,
            'selectsuratedit' => $selectsuratedit
        ];
        return view('dashboard/pages/admin/v_kelola_data_persyaratan', $data);
    }

    public function link_kelola_data_syarat()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'kelola_data_syarat');

        $datasyarat = $this->mSekertaris->tampilkan_data_syarat();

        $data = [
            'judul_bar'     => 'SIKADES | Kelola Data Syarat',
            'judul_halaman' => 'Kelola Data Syarat',
            'datasyarat'    => $datasyarat,
            'idsyarat'      => $this->id
        ];

        return view('dashboard/pages/admin/v_kelola_data_syarat', $data);
    }

    public function link_kelola_data_pengguna()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'kelola_data_pengguna');

        $datamasyarakat = $this->mSekertaris->tampilkan_data_masyarakat();
        $data = [
            'judul_bar'      => 'SIKADES | Kelola Data Pengguna',
            'judul_halaman'  => 'Kelola Data Pengguna',
            'datamasyarakat' => $datamasyarakat,
            'idpengguna'     => $this->id
        ];
        return view('dashboard/pages/admin/v_kelola_data_pengguna', $data);
    }



    public function link_konfrimasi_registrasi()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'konfirmasi_registrasi');

        $dataregistrasi = $this->mSekertaris->tampilkan_data_registrasi();
        $data = [
            'judul_bar'      => 'SIKADES | Permintaan Registrasi',
            'judul_halaman'  => 'Permintaan Registrasi',
            'dataregistrasi' => $dataregistrasi
        ];
        return view('dashboard/pages/admin/v_permintaan_registrasi', $data);
    }

    public function link_surat_masuk()
    {
        $filter = $this->request->getGet('filter');
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'surat_masuk');

        if ($filter === null) {
            $datasuratmasuk = $this->mSekertaris->tampilkan_data_surat_masuk();
        } else {
            $datasuratmasuk = $this->mSekertaris->tampilkan_data_surat_masuk_filter($filter);
        }

        $data = [
            'judul_bar'      => 'SIKADES | Surat Masuk',
            'judul_halaman'  => 'Surat Masuk',
            'idsuratmasuk'   => $this->id,
            'datasuratmasuk' => $datasuratmasuk
        ];

        return view('dashboard/pages/admin/v_surat_masuk', $data);
    }

    public function perihal_surat()
    {
        $type = $this->request->getGet('type');
        $dataPerihalSurat = $this->mSekertaris->tampilkan_data_perihal_surat($type);
        return $this->response->setJSON($dataPerihalSurat);
    }


    public function link_konfirmasi_surat_masuk()
    {
        $filter = $this->request->getGet('filter');
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }
        session()->set('halaman', 'konfirmasi_surat_masuk');

        $datasuratmasuk = $this->mLurah->tampilkan_data_surat_masuk($filter);

        $data = [
            'judul_bar'      => 'SIKADES | Surat Masuk',
            'judul_halaman'  => 'Surat Masuk',
            'idsuratmasuk'   => $this->id,
            'datasuratmasuk' => $datasuratmasuk
        ];

        return view('dashboard/pages/kepala/v_surat_masuk', $data);
    }

    public function link_konfirmasi_surat_keluar()
    {
        $filter = $this->request->getGet('filter');
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }
        session()->set('halaman', 'konfirmasi_surat_keluar');

        $datasuratkeluar = $this->mLurah->tampilkan_data_surat_keluar($filter);

        $data = [
            'judul_bar'       => 'SIKADES | Surat Keluar',
            'judul_halaman'   => 'Surat Keluar',
            'idsuratkeluar'   => $this->id,
            'datasuratkeluar' => $datasuratkeluar
        ];


        return view('dashboard/pages/kepala/v_surat_keluar', $data);
    }

    public function link_surat_keluar()
    {
        $filter = $this->request->getGet('filter');
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'surat_keluar');

        if ($filter === null) {
            $datasuratkeluar = $this->mSekertaris->tampilkan_data_surat_keluar();
        } else {
            $datasuratkeluar = $this->mSekertaris->tampilkan_data_surat_keluar_filter($filter);
        }

        $data = [
            'judul_bar'       => 'SIKADES | Surat Keluar',
            'judul_halaman'   => 'Surat Keluar',
            'idsuratkeluar'   => $this->id,
            'datasuratkeluar' => $datasuratkeluar
        ];

        return view('dashboard/pages/admin/v_surat_keluar', $data);
    }

    public function link_pengajuan_surat_sekertaris()
    {
        $filter = $this->request->getGet('filter');
        // return $filter;
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        session()->set('halaman', 'pengajuan_surat_sekertaris');

        $pengajuansurat = $this->mSekertaris->tampilkan_data_pengajuan_surat($filter);

        $data = [
            'judul_bar'     => 'SIKADES | Pengajuan Surat',
            'judul_halaman' => 'Pengajuan Surat',
            'datapengajuan' => $pengajuansurat
        ];

        return view('dashboard/pages/admin/v_pengajuan_surat', $data);
    }

    public function get_nama_pengajuan_surat()
    {
        $type = $this->request->getGet('type');
        if ($type === 'user') {
            $data = $this->mMasyarakat->tampilkan_nama_pengajuan_surat(session()->get('nik'));
        } elseif (explode(" ", $type)[0] === "lurah") {
            $data = $this->mLurah->tampilkan_nama_pengajuan_surat(explode(" ", $type)[1]);
        } else {
            $data = $this->mSekertaris->tampilkan_nama_pengajuan_surat($type);
        }
        return $this->response->setJSON($data);
    }

    public function link_konfirmasi_pengajuan_surat()
    {
        $filter = $this->request->getGet('filter');
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }
        session()->set('halaman', 'konfirmasi_pengajuan_surat');

        $pengajuansurat = $this->mLurah->tampilkan_data_pengajuan_surat($filter);

        $data = [
            'judul_bar'     => 'SIKADES | Pengajuan Surat',
            'judul_halaman' => 'Pengajuan Surat',
            'datapengajuan' => $pengajuansurat
        ];

        return view('dashboard/pages/kepala/v_pengajuan_surat', $data);
    }

    public function link_pengajuan_surat_masyarakat()
    {
        $filter = $this->request->getGet('filter');
        $status = $this->request->getGet('status');

        if ($this->validation_login() != "masyarakat") {
            return view("login/index");
        }

        session()->set('halaman', 'pengajuan_surat_masyarakat');
        $datasurat               = $this->mMasyarakat->tampilkan_data_surat();
        $datapengajuanmasyarakat = $this->mMasyarakat->tampilkan_data_pengajuan(session()->get('nik'), $filter, $status);

        $data = [
            'judul_bar'        => 'SIKADES | Pengajuan Surat',
            'judul_halaman'    => 'Pengajuan Surat',
            'idpengajuansurat' => $this->id,
            'datasurat'        => $datasurat,
            'datapengajuan'    => $datapengajuanmasyarakat
        ];


        return view('dashboard/pages/user/v_pengajuan_surat', $data);
    }


    public function link_pengajuan_saya_sekertaris()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }

        session()->set('halaman', 'pengajuan_saya_sekertaris');

        $pengajuansurat = $this->mSekertaris->tampilkan_data_pengajuan_saya();
        $datasurat = $this->mSekertaris->tampilkan_data_surat();

        $data = [
            'judul_bar'       => 'SIKADES | Pengajuan Saya',
            'judul_halaman'   => 'Pengajuan Saya',
            'datapengajuan'   => $pengajuansurat,
            'datasurat'       => $datasurat,
            'idpengajuansaya' => $this->id
        ];

        return view('dashboard/pages/admin/v_pengajuan_saya', $data);
    }

    public function link_ubah_profile_sekertaris()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }

        session()->set('halaman', 'ubah_profile_sekertaris');

        $dataprofilesekertaris = $this->mSekertaris->tampilkan_data_profile(session()->get('id_user'));
        $data = [
            'judul_bar'     => 'SIKADES | Ubah Profile',
            'judul_halaman' => 'Ubah Profile',
            'dataprofile'   => $dataprofilesekertaris
        ];

        return view('dashboard/pages/admin/v_ubah_profile', $data);
    }

    public function link_ubah_profile_lurah()
    {
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }

        session()->set('halaman', 'ubah_profile_lurah');

        $dataprofilelurah = $this->mLurah->tampilkan_data_profile(session()->get('id_user'));

        $data = [
            'judul_bar'     => 'SIKADES | Ubah Profile',
            'judul_halaman' => 'Ubah Profile',
            'dataprofile'   => $dataprofilelurah
        ];

        return view('dashboard/pages/kepala/v_ubah_profile', $data);
    }

    public function link_ubah_profile_masyarakat()
    {
        if ($this->validation_login() != "masyarakat") {
            return view("login/index");
        }
        session()->set('halaman', 'ubah_profile_masyarakat');

        $dataprofilemasyarakat = $this->mMasyarakat->tampilkan_data_profile(session()->get('id_user'));

        $data = [
            'judul_bar'     => 'SIKADES | Ubah Profile',
            'judul_halaman' => 'Ubah Profile',
            'dataprofile'   => $dataprofilemasyarakat
        ];
        return view('dashboard/pages/user/v_ubah_profile', $data);
    }


    public function link_ubah_us_ps_sekertaris()
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }

        session()->set('halaman', 'ubah_us_ps_sekertaris');

        $dataprofilesekertaris = $this->mSekertaris->tampilkan_data_profile(session()->get('id_user'));
        $data = [
            'judul_bar'     => 'SIKADES | Ubah Username dan Password',
            'judul_halaman' => 'Ubah Username dan Password',
            'dataprofile'   => $dataprofilesekertaris
        ];

        return view('dashboard/pages/admin/v_ubah_us_ps', $data);
    }

    public function link_ubah_us_ps_lurah()
    {
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }
        session()->set('halaman', 'ubah_us_ps_lurah');

        $dataprofilelurah = $this->mLurah->tampilkan_data_profile(session()->get('id_user'));
        $data = [
            'judul_bar'     => 'SIKADES | Ubah Username dan Password',
            'judul_halaman' => 'Ubah Username dan Password',
            'dataprofile'   => $dataprofilelurah
        ];

        return view('dashboard/pages/kepala/v_ubah_us_ps', $data);
    }

    public function link_ubah_us_ps_masyarakat()
    {
        if ($this->validation_login() != "masyarakat") {
            return view("login/index");
        }
        session()->set('halaman', 'ubah_us_ps_masyarakat');

        $dataprofilemasyarakat = $this->mMasyarakat->tampilkan_data_profile(session()->get('id_user'));
        $data = [
            'judul_bar'     => 'SIKADES | Ubah Username dan Password',
            'judul_halaman' => 'Ubah Username dan Password',
            'dataprofile'   => $dataprofilemasyarakat
        ];

        return view('dashboard/pages/user/v_ubah_us_ps', $data);
    }

    public function link_lihat_file_surat_masuk_sekertaris($namafile)
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }

        $data = [
            'judul_bar'     => 'SIKADES | Surat Masuk',
            'judul_halaman' => 'Lihat File Surat Masuk',
            'namafile'      => $namafile
        ];
        return view('dashboard/pages/admin/v_lihat_file_surat_masuk_pdf', $data);
    }

    public function link_lihat_file_surat_keluar_sekertaris($namafile)
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }

        $data = [
            'judul_bar'     => 'SIKADES | Surat Keluar',
            'judul_halaman' => 'Lihat File Surat Keluar',
            'namafile'      => $namafile
        ];
        return view('dashboard/pages/admin/v_lihat_file_surat_keluar_pdf', $data);
    }

    public function link_lihat_file_pengajuan_surat_sekertaris($namafile)
    {
        if ($this->validation_login() != "sekertaris") {
            return view("login/index");
        }
        $data = [
            'judul_bar'     => 'SIKADES | Pengajuan Surat',
            'judul_halaman' => 'Lihat File Pengajuan Surat',
            'namafile'      => $namafile
        ];
        return view('dashboard/pages/admin/v_lihat_file_pengajuan_surat_pdf', $data);
    }

    public function link_lihat_file_pengajuan_surat_lurah($namafile)
    {
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }
        $data = [
            'judul_bar'     => 'SIKADES | Pengajuan Surat',
            'judul_halaman' => 'Lihat File Pengajuan Surat',
            'namafile'      => $namafile
        ];
        return view('dashboard/pages/kepala/v_lihat_file_pengajuan_surat_pdf', $data);
    }

    public function link_lihat_file_surat_masuk_lurah($namafile)
    {
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }
        $data = [
            'judul_bar'     => 'SIKADES | Surat Masuk',
            'judul_halaman' => 'Lihat File Surat Masuk',
            'namafile'      => $namafile
        ];
        return view('dashboard/pages/kepala/v_lihat_file_surat_masuk_pdf', $data);
    }

    public function link_lihat_file_surat_keluar_lurah($namafile)
    {
        if ($this->validation_login() != "lurah") {
            return view("login/index");
        }
        $data = [
            'judul_bar'     => 'SIKADES | Surat Keluar',
            'judul_halaman' => 'Lihat File Surat Keluar',
            'namafile'      => $namafile
        ];
        return view('dashboard/pages/kepala/v_lihat_file_surat_keluar_pdf', $data);
    }
}
