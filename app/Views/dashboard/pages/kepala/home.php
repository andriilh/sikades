<?= $this->extend('dashboard/layout/kepala/template'); ?>

<?= $this->section('content'); ?>
<section class="content" style="width: 100%;">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row" style="width: 100%;">
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $totalsuratmasuk['total_surat_masuk']; ?></h3>
                        <p>
                        <h6 style="text-transform: uppercase;">Surat Masuk</h6>
                        </p>
                    </div>
                    <div class=" icon">
                        <i class="ion ion-email"></i>

                    </div>
                    <a href="<?= base_url(); ?>/CUtama/link_konfirmasi_surat_masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $totalsuratkeluar['total_surat_keluar']; ?></h3>

                        <p>
                        <h6 style="text-transform: uppercase;">Surat Keluar</h6>
                        </p>
                    </div>
                    <div class="icon">
                        <!-- <i class="ion ion-stats-bars"></i> -->
                        <i class="ion ion-paper-airplane"></i>
                    </div>
                    <a href="<?= base_url(); ?>/CUtama/link_konfirmasi_surat_keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalpengajuansurat['total_pengajuan_surat']; ?></h3>

                        <p>
                        <h6 style="text-transform: uppercase;">Total Pengajuan</h6>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email-unread"></i>

                    </div>
                    <a href="<?= base_url(); ?>/CUtama/link_konfirmasi_pengajuan_surat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<?= $this->endSection(); ?>