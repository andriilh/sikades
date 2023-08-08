<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>/public/dashboard/dist/img/<?= (session()->get('gender') == 'Laki-laki') ? 'avatar5.png' : 'avatar2.png' ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('nama'); ?></a>
                <div class="status_login" style="color: white; font-style: italic;"><?= session()->get('statusUser'); ?></div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/CUtama/link_home_lurah" class="nav-link <?= (session()->get('halaman') == 'home_lurah') ? 'active' : ''; ?>">
                        <i class=" nav-icon fas fa-house"></i>
                        <p>
                            Home
                            <i class="fas right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (session()->get('halaman') == 'konfirmasi_surat_masuk' || session()->get('halaman') == 'konfirmasi_surat_keluar') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= (session()->get('halaman') == 'konfirmasi_surat_masuk' || session()->get('halaman') == 'konfirmasi_surat_keluar') ? 'active' : ''; ?> ">
                        <i class="nav-icon fa-solid fa-envelope"></i>
                        <p>
                            Konfirmasi Surat
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-primary right" style="display: <?= (session()->get('total_seluruh_surat') == 0) ? 'none' : 'inline' ?>;">
                                <?= session()->get('total_seluruh_surat'); ?>
                            </span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/CUtama/link_konfirmasi_surat_masuk" class="nav-link <?= (session()->get('halaman') == 'konfirmasi_surat_masuk') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Masuk</p>
                                <span class="badge badge-primary right" style="display: <?= (session()->get('total_surat_masuk') == 0) ? 'none' : 'inline' ?>;">
                                    <?= session()->get('total_surat_masuk'); ?>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/CUtama/link_konfirmasi_surat_keluar" class="nav-link <?= (session()->get('halaman') == 'konfirmasi_surat_keluar') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Keluar</p>
                                <span class="badge badge-primary right" style="display: <?= (session()->get('total_surat_keluar') == 0) ? 'none' : 'inline' ?>;">
                                    <?= session()->get('total_surat_keluar'); ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/CUtama/link_konfirmasi_pengajuan_surat" class="nav-link <?= (session()->get('halaman') == 'konfirmasi_pengajuan_surat') ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-list-check"></i>
                        <p>
                            Pengajuan Surat
                            <span class="badge badge-primary right" style="display: <?= (session()->get('total_pengajuan_surat') == 0) ? 'none' : 'inline' ?>;">
                                <?= session()->get('total_pengajuan_surat'); ?>
                            </span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?= (session()->get('halaman') == 'ubah_us_ps_lurah' || session()->get('halaman') == 'ubah_profile_lurah') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= (session()->get('halaman') == 'ubah_us_ps_lurah' || session()->get('halaman') == 'ubah_profile_lurah') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-gear"></i>
                        <p>
                            Pengaturan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/CUtama/link_ubah_profile_lurah" class="nav-link <?= (session()->get('halaman') == 'ubah_profile_lurah') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ubah Profile</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/CUtama/link_ubah_us_ps_lurah" class="nav-link <?= (session()->get('halaman') == 'ubah_us_ps_lurah') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Username & Password</p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/CUtama/link_logout" class="nav-link btn-logout">
                        <i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i>
                        <p>
                            Logout
                            <i class="fas right"></i>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script>
    $(document).on('click', '.btn-logout', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        console.log(href);
        Swal.fire({
            position: 'center',
            title: 'Logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: 'primary',
            cancelButtonColor: 'red',
            confirmButtonText: 'Lanjutkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })

    });
</script>