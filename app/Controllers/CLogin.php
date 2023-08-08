<?php

namespace App\Controllers;


use App\Models\MLogin;
use App\Models\MSekertaris;
use App\Models\MLurah;
use App\Models\MMasyarakat;
use CodeIgniter\I18n\Time;

class CLogin extends BaseController
{
    public $mLogin;
    public $mSekertaris;
    public $mLurah;
    public $mMasyarakat;
    public $id;

    public function __construct()
    {
        $this->mLogin      = new MLogin();
        $this->mSekertaris = new MSekertaris();
        $this->mLurah      = new MLurah();
        $this->mMasyarakat = new MMasyarakat();

        $myTime   = new Time('now', 'Asia/Jakarta', 'id');
        $this->id = $myTime->getYear() . $myTime->getMonth() . $myTime->getDay() . $myTime->getHour() . $myTime->getMinute() . $myTime->getSecond();
    }

    public function index()
    {
        // Cek apakah user sudah login atau belum
        if (session()->get("statusUser") == "") {
            return view('login/index');
        } else {
            if (session()->get("statusUser") == "sekertaris") {
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
            } else if (session()->get("statusUser") == "lurah") {
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
            } else if (session()->get("statusUser") == "masyarakat") {

                $cektotalpengajuansurat = $this->mMasyarakat->getTotalPengajuanSurat(session()->get('nik'));
                $data = [
                    'judul_bar'              => 'SIKADES | Home',
                    'judul_halaman'          => 'Home',
                    'cektotalpengajuansurat' => $cektotalpengajuansurat
                ];

                return view('dashboard/pages/user/home', $data);
            }
        }
    }

    // Proses verifikasi login 
    public function cek_login_control()
    {
        $user = $this->request->getPost('username');
        $pass = $this->request->getPost('password');

        $cekLogin  = $this->mLogin->cek_login($user, $pass);

        // Kalo username sama passwordnya ketemu
        if ($cekLogin != null) {
            $cekLoginSekertaris = $this->mLogin->cek_login_sekertaris($user, $pass);
            $cekLoginMasyarakat = $this->mLogin->cek_login_masyarakat($user, $pass);
            $cekLoginLurah      = $this->mLogin->cek_login_lurah($user, $pass);

            // jika login sebagai sekertaris
            if ($cekLoginSekertaris) {
                if (($user === $cekLoginSekertaris['username']) && ($cekLoginSekertaris['password'] === $pass)) {
                    if ($cekLoginSekertaris['status_keaktifan'] == "aktif") {
                        session()->set('statusUser', $cekLoginSekertaris['status_user']);
                        session()->set('nama', $cekLoginSekertaris['nama_sekertaris']);
                        session()->set('halaman', 'home_sekertaris');
                        session()->set('id_user', $cekLoginSekertaris['id_user']);
                        session()->set('gender', $cekLoginSekertaris['jenis_kelamin']);

                        $cektotalpengajuansurat = $this->mSekertaris->getTotalPengajuanSurat();
                        session()->set('total_pengajuan', $cektotalpengajuansurat['total_pengajuan']);

                        $cektotalpengajuansaya = $this->mSekertaris->getTotalPengajuanSaya();
                        session()->set('total_pengajuan_saya', $cektotalpengajuansaya['total_pengajuan_saya']);

                        $cektotalregistrasi = $this->mSekertaris->getTotalResgitrasi();
                        session()->set('total_registrasi', $cektotalregistrasi['total_registrasi']);

                        session()->set('total_seluruh_pengajuan', $cektotalpengajuansurat['total_pengajuan'] + $cektotalpengajuansaya['total_pengajuan_saya']);

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
                    } else {
                        session()->setFlashdata('tidakaktif', 'tidakaktif');
                        return view('login/index');
                    }
                } else {
                    session()->setFlashdata('casesensitif', 'casesensitif');
                    return view('login/index');
                }
            }
            // Jika login sebagai masyarakat
            else if ($cekLoginMasyarakat) {
                if (($user === $cekLoginMasyarakat['username']) && ($cekLoginMasyarakat['password'] === $pass)) {
                    if ($cekLoginMasyarakat['status_keaktifan'] == "aktif") {
                        session()->set('statusUser', $cekLoginMasyarakat['status_user']);
                        session()->set('nama', $cekLoginMasyarakat['nama_masyarakat']);
                        session()->set('halaman', 'home_masyarakat');
                        session()->set('gender', $cekLoginMasyarakat['jenis_kelamin']);
                        session()->set('id_user', $cekLoginMasyarakat['id_user']);
                        session()->set('nik', $cekLoginMasyarakat['NIK']);

                        $cektotalpengajuansurat = $this->mMasyarakat->getTotalPengajuanSurat($cekLoginMasyarakat['NIK']);
                        session()->set('total_pengajuan', $cektotalpengajuansurat['total_pengajuan']);

                        $hometotalpengajuansurat = $this->mMasyarakat->home_getTotalPengajuanSurat($cekLoginMasyarakat['NIK']);

                        $data = [
                            'judul_bar'               => 'SIKADES | Home',
                            'judul_halaman'           => 'Home',
                            'cektotalpengajuansurat'  => $cektotalpengajuansurat,
                            'hometotalpengajuansurat' => $hometotalpengajuansurat
                        ];

                        return view('dashboard/pages/user/home', $data);
                    } else {
                        session()->setFlashdata('tidakaktif', 'tidakaktif');
                        return view('login/index');
                    }
                } else {
                    session()->setFlashdata('casesensitif', 'casesensitif');
                    return view('login/index');
                }
            }
            // Jika login sebagai lurah
            else if ($cekLoginLurah) {
                if (($user === $cekLoginLurah['username']) && ($cekLoginLurah['password'] === $pass)) {
                    if ($cekLoginLurah['status_keaktifan'] == "aktif") {
                        session()->set('statusUser', $cekLoginLurah['status_user']);
                        session()->set('nama', $cekLoginLurah['nama_lurah']);
                        session()->set('halaman', 'home_lurah');
                        session()->set('id_user', $cekLoginLurah['id_user']);
                        session()->set('gender', $cekLoginLurah['jenis_kelamin']);

                        $cektotalsuratmasuk = $this->mLurah->getTotalSuratMasuk();
                        session()->set('total_surat_masuk', $cektotalsuratmasuk['total_surat_masuk']);

                        $cektotalsuratkeluar = $this->mLurah->getTotalSuratKeluar();
                        session()->set('total_surat_keluar', $cektotalsuratkeluar['total_surat_keluar']);

                        session()->set('total_seluruh_surat', $cektotalsuratkeluar['total_surat_keluar'] + $cektotalsuratmasuk['total_surat_masuk']);

                        $cektotalpengajuansurat = $this->mLurah->getTotalPengajuanSurat();
                        session()->set('total_pengajuan_surat', $cektotalpengajuansurat['total_pengajuan_surat']);


                        $totalsuratmasuk = $this->mLurah->getTotalSuratMasuk();
                        $totalsuratkeluar = $this->mLurah->getTotalSuratKeluar();
                        $totalpengajuansurat = $this->mLurah->getTotalPengajuanSurat();

                        $data = [
                            'judul_bar'           => 'SIKADES | Home',
                            'judul_halaman'       => 'Home',
                            'totalsuratmasuk'     => $totalsuratmasuk,
                            'totalsuratkeluar'    => $totalsuratkeluar,
                            'totalpengajuansurat' => $totalpengajuansurat
                        ];

                        return view('dashboard/pages/kepala/home', $data);
                    } else {
                        session()->setFlashdata('tidakaktif', 'tidakaktif');
                        return view('login/index');
                    }
                }

                // Kalo bukan ketiganya munculin popup
                else {
                    session()->setFlashdata('casesensitif', 'casesensitif');
                    return view('login/index');
                }
            }
        }

        // Ga ketemu nih username sama passwordnya
        else {
            session()->setFlashdata('gagal', 'gagal');
            return view('login/index');
        }
    }

    public function registrasi()
    {
        // dd($this->request->getPost());

        $idmasyarakat = $this->request->getPost('idmasyarakat');
        $nama = $this->request->getPost('nama');
        $nik = $this->request->getPost('nik');
        $nohp = $this->request->getPost('nohp');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $datamasyarakat = [
            'id_masyarakat' => $idmasyarakat,
            'nama_masyarakat' => $nama,
            'NIK' => $nik,
            'no_hp' => $nohp,
            'email' => $email,

        ];

        $tambahdatapengguna = $this->mLogin->proses_tambah_data_pengguna($datamasyarakat);

        $datalogin = [
            'id_user'          => $idmasyarakat,
            'username'         => $username,
            'password'         => $password,
            'status_user'      => 'masyarakat',
            'status_keaktifan' => 'aktif'
        ];

        $tambahdatalogin = $this->mLogin->proses_tambah_data_login($datalogin);

        if ($tambahdatapengguna && $tambahdatalogin) {
            session()->setFlashdata('tambah', 'tambah');
            return view('login/index');
        }
    }
}
