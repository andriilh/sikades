<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');


$routes->get('/', 'CProfile::index');
$routes->get('/CUtama/link_login', 'Cutama::link_login');
$routes->post('/CLogin/registrasi', 'CLogin::registrasi');
$routes->get('/CUtama/link_registrasi', 'Cutama::link_registrasi');
$routes->get('/CUtama/link_logout', 'Cutama::link_logout');
$routes->get('/CUtama/link_home_sekertaris', 'Cutama::link_home_sekertaris');
$routes->get('/CUtama/link_home_lurah', 'Cutama::link_home_lurah');
$routes->get('/CUtama/link_home_masyarakat', 'Cutama::link_home_masyarakat');
$routes->get('/CUtama/link_kelola_data_surat', 'Cutama::link_kelola_data_surat');
$routes->get('/CUtama/link_kelola_data_persyaratan', 'Cutama::link_kelola_data_persyaratan');
$routes->get('/CUtama/link_kelola_data_syarat', 'Cutama::link_kelola_data_syarat');
$routes->get('/CUtama/link_kelola_data_pengguna', 'Cutama::link_kelola_data_pengguna');
$routes->get('/CUtama/link_konfrimasi_registrasi', 'Cutama::link_konfrimasi_registrasi');
$routes->get('/CUtama/link_surat_masuk', 'Cutama::link_surat_masuk', ["filter"]);
$routes->get('/surat/perihal', 'Cutama::perihal_surat', ["type"]);
$routes->get('/CUtama/link_surat_keluar', 'Cutama::link_surat_keluar', ["filter"]);
$routes->get('/CUtama/link_pengajuan_surat_sekertaris', 'Cutama::link_pengajuan_surat_sekertaris', ['filter']);
$routes->get('/pengajuan_surat/nama', 'Cutama::get_nama_pengajuan_surat', ['type']);
$routes->get('/CUtama/link_konfirmasi_pengajuan_surat', 'Cutama::link_konfirmasi_pengajuan_surat', ['filter']);
$routes->get('/CUtama/link_pengajuan_saya_sekertaris', 'Cutama::link_pengajuan_saya_sekertaris');
$routes->get('/CUtama/link_ubah_profile_sekertaris', 'Cutama::link_ubah_profile_sekertaris');
$routes->get('/CUtama/link_ubah_profile_lurah', 'Cutama::link_ubah_profile_lurah');
$routes->get('/CUtama/link_ubah_profile_masyarakat', 'Cutama::link_ubah_profile_masyarakat');
$routes->get('/CUtama/link_ubah_us_ps_sekertaris', 'Cutama::link_ubah_us_ps_sekertaris');
$routes->get('/CUtama/link_ubah_us_ps_lurah', 'Cutama::link_ubah_us_ps_lurah');
$routes->get('/CUtama/link_ubah_us_ps_masyarakat', 'Cutama::link_ubah_us_ps_masyarakat');
$routes->get('/CUtama/link_pengajuan_surat_masyarakat', 'Cutama::link_pengajuan_surat_masyarakat', ['filter']);
$routes->get('/CUtama/link_lihat_file_surat_masuk_sekertaris/(:any)', 'Cutama::link_lihat_file_surat_masuk_sekertaris/$1');
$routes->get('/CUtama/link_lihat_file_pengajuan_surat_lurah/(:any)', 'Cutama::link_lihat_file_pengajuan_surat_lurah/$1');
$routes->get('/CUtama/link_lihat_file_surat_keluar_sekertaris/(:any)', 'Cutama::link_lihat_file_surat_keluar_sekertaris/$1');
$routes->get('/CUtama/link_lihat_file_surat_masuk_lurah/(:any)', 'Cutama::link_lihat_file_surat_masuk_lurah/$1');
$routes->get('/CUtama/link_lihat_file_surat_keluar_lurah/(:any)', 'Cutama::link_lihat_file_surat_keluar_lurah/$1');
$routes->get('/CUtama/link_lihat_file_pengajuan_surat_sekertaris/(:any)', 'Cutama::link_lihat_file_pengajuan_surat_sekertaris/$1');
$routes->get('/CSekertaris/download_file_surat_masuk/(:any)', 'CSekertaris::download_file_surat_masuk/$1');


$routes->post('/CSekertaris/tambah_data_surat', 'CSekertaris::tambah_data_surat');
$routes->post('/CSekertaris/tambah_data_syarat', 'CSekertaris::tambah_data_syarat');
$routes->post('/CSekertaris/tambah_data_persyaratan', 'CSekertaris::tambah_data_persyaratan');
$routes->post('/CSekertaris/tambah_data_pengguna', 'CSekertaris::tambah_data_pengguna');
$routes->post('/CSekertaris/tambah_surat_masuk', 'CSekertaris::tambah_surat_masuk');
$routes->post('/CSekertaris/tambah_surat_keluar', 'CSekertaris::tambah_surat_keluar');
$routes->post('/CMasyarakat/tambah_pengajuan_surat', 'CMasyarakat::tambah_pengajuan_surat');
$routes->post('/CSekertaris/tambah_data_pengajuan_saya', 'CSekertaris::tambah_data_pengajuan_saya');
$routes->post('/CSekertaris/ubah_data_surat', 'CSekertaris::ubah_data_surat');
$routes->post('/CSekertaris/ubah_data_syarat', 'CSekertaris::ubah_data_syarat');
$routes->post('/CSekertaris/ubah_data_persyaratan', 'CSekertaris::ubah_data_persyaratan');
$routes->post('/CSekertaris/ubah_data_pengguna', 'CSekertaris::ubah_data_pengguna');
$routes->post('/CSekertaris/ubah_profile_sekertaris', 'CSekertaris::ubah_profile_sekertaris');
$routes->post('/CLurah/ubah_profile_lurah', 'CLurah::ubah_profile_lurah');
$routes->post('/CMasyarakat/ubah_profile_masyarakat', 'CMasyarakat::ubah_profile_masyarakat');
$routes->post('/CSekertaris/ubah_surat_masuk', 'CSekertaris::ubah_surat_masuk');
$routes->post('/CSekertaris/ubah_surat_keluar', 'CSekertaris::ubah_surat_keluar');
$routes->post('/CLurah/ubah_status_surat_masuk', 'CLurah::ubah_status_surat_masuk');
$routes->post('/CLurah/ubah_status_surat_keluar', 'CLurah::ubah_status_surat_keluar');
$routes->post('/CSekertaris/ubah_us_ps_sekertaris', 'CSekertaris::ubah_us_ps_sekertaris');
$routes->post('/CLurah/ubah_us_ps_lurah', 'CLurah::ubah_us_ps_lurah');
$routes->post('/CMasyarakat/ubah_us_ps_masyarakat', 'CMasyarakat::ubah_us_ps_masyarakat');
$routes->post('/CSekertaris/cari_data_surat', 'CSekertaris::cari_data_surat');

$routes->post('/CSekertaris/cari_data_surat_masuk_sekertaris', 'CSekertaris::cari_data_surat_masuk_sekertaris');
$routes->post('/CLurah/cari_data_surat_masuk_lurah', 'CLurah::cari_data_surat_masuk_lurah');
$routes->post('/CSekertaris/cari_data_surat_keluar_sekertaris', 'CSekertaris::cari_data_surat_keluar_sekertaris');
$routes->post('/CLurah/cari_data_surat_keluar_lurah', 'CLurah::cari_data_surat_keluar_lurah');

$routes->post('/CSekertaris/cari_data_syarat', 'CSekertaris::cari_data_syarat');
$routes->post('/CSekertaris/ubah_pengajuan_surat_sekertaris', 'CSekertaris::ubah_pengajuan_surat_sekertaris');
$routes->post('/CLurah/ubah_pengajuan_surat_lurah', 'CLurah::ubah_pengajuan_surat_lurah');
$routes->post('/CSekertaris/ubah_pengajuan_saya_sekertaris', 'CSekertaris::ubah_pengajuan_saya_sekertaris');
$routes->post('/CSekertaris/cari_data_pengguna', 'CSekertaris::cari_data_pengguna');
$routes->post('/CSekertaris/cari_data_pengajuan_surat', 'CSekertaris::cari_data_pengajuan_surat');
$routes->post('/CLurah/cari_data_pengajuan_surat', 'CLurah::cari_data_pengajuan_surat');
$routes->post('/CSekertaris/cari_data_pengajuan_saya', 'CSekertaris::cari_data_pengajuan_saya');
$routes->post('/CMasyarakat/cari_data_pengajuan_surat', 'CMasyarakat::cari_data_pengajuan_surat');
$routes->post('/CSekertaris/proses_cari_data_persyaratan', 'CSekertaris::proses_cari_data_persyaratan');
$routes->get('/CSekertaris/hapus_data_surat/(:any)', 'CSekertaris::hapus_data_surat/$1');
$routes->get('/CSekertaris/hapus_data_syarat/(:any)', 'CSekertaris::hapus_data_syarat/$1');
$routes->get('/CSekertaris/hapus_data_persyaratan/(:any)', 'CSekertaris::hapus_data_persyaratan/$1');
$routes->get('/CSekertaris/hapus_data_pengguna/(:any)', 'CSekertaris::hapus_data_pengguna/$1');
$routes->get('/CSekertaris/hapus_surat_masuk/(:any)', 'CSekertaris::hapus_surat_masuk/$1');
$routes->get('/CSekertaris/hapus_surat_keluar/(:any)', 'CSekertaris::hapus_surat_keluar/$1');
$routes->get('/CMasyarakat/hapus_pengajuan_masyarakat/(:any)', 'CMasyarakat::hapus_pengajuan_masyarakat/$1');
$routes->get('/CSekertaris/hapus_data_pengajuan_saya/(:any)', 'CSekertaris::hapus_data_pengajuan_saya/$1');
$routes->get('/CSekertaris/hapus_data_konfirmasi_registrasi/(:any)', 'CSekertaris::hapus_data_konfirmasi_registrasi/$1');
$routes->get('/CSekertaris/ubah_data_konfirmasi_registrasi/(:any)', 'CSekertaris::ubah_data_konfirmasi_registrasi/$1');


$routes->get('/CLogin', 'CLogin::index');
$routes->get('/CSekertaris/printpdf_surat_masuk', 'CSekertaris::printpdf_surat_masuk');
$routes->get('/CSekertaris/printpdf_surat_keluar', 'CSekertaris::printpdf_surat_keluar');

$routes->add('/CLogin/cek_login_control', 'CLogin::cek_login_control');

$routes->get('/CUtama/link_konfirmasi_surat_masuk', 'Cutama::link_konfirmasi_surat_masuk', ['filter']);
$routes->get('/CUtama/link_konfirmasi_surat_keluar', 'Cutama::link_konfirmasi_surat_keluar', ['filter']);
// $routes->get('/CLogin', 'CLogin::cek_login_control');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
