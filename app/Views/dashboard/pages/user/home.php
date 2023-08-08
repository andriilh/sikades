<?= $this->extend('dashboard/layout/user/template'); ?>

<?= $this->section('content'); ?>
<section class="content" style="width: 100%;">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row" style="width: 100%;">

            <!-- ./col -->
            <div class="col-lg-3 col-3">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $hometotalpengajuansurat['total_pengajuan']; ?></h3>

                        <p>
                        <h6 style="text-transform: uppercase;">Pengajuan Surat</h6>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email-unread"></i>
                    </div>
                    <a href="<?= base_url(); ?>/CUtama//link_pengajuan_surat_masyarakat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>


<?= $this->endSection(); ?>