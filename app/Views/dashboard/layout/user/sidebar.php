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
                    <a href="<?= base_url(); ?>/CUtama/link_home_masyarakat" class="nav-link <?= (session()->get('halaman') == 'home_masyarakat') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-house"></i>
                        <p>
                            Home
                            <i class="fas right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url(); ?>/CUtama/link_pengajuan_surat_masyarakat" class="nav-link <?= (session()->get('halaman') == 'pengajuan_surat_masyarakat') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Pengajuan Surat
                            <i class="fas right"></i>
                            <span class="badge badge-primary right" style="display: <?= (session()->get('total_pengajuan') == 0) ? 'none' : 'inline' ?>;">
                                <?= session()->get('total_pengajuan'); ?>
                            </span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?= (session()->get('halaman') == 'ubah_profile_masyarakat' || session()->get('halaman') == 'ubah_us_ps_masyarakat') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= (session()->get('halaman') == 'ubah_profile_masyarakat' || session()->get('halaman') == 'ubah_us_ps_masyarakat') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-gear"></i>
                        <p>
                            Pengaturan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="<?= base_url(); ?>/CUtama/link_ubah_profile_masyarakat" class="nav-link <?= (session()->get('halaman') == 'ubah_profile_masyarakat') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ubah Profile</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>/CUtama/link_ubah_us_ps_masyarakat" class="nav-link <?= (session()->get('halaman') == 'ubah_us_ps_masyarakat') ? 'active' : ''; ?>">
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