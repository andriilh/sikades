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

        <div class="row">
            <div class="col-lg-4 col-3">
                <h3>Syarat Pengajuan Surat</h3>
                <input type="text" class="form-control my-3" placeholder="Cari Surat" id="searchSyarat" onkeyup="search()">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <?php
                        $count = 0;
                        foreach ($persyaratan as $p) {
                            $count += 1;
                        ?>
                            <div class="collapse-wrapper">
                                <div class="card-header" id="<?= 'heading-' . $count ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#<?= 'collapse' . $count ?>" aria-expanded="false" aria-controls="<?= 'collapse' . $count ?>">
                                            <?= $p['nama_surat']; ?>
                                        </button>
                                    </h2>
                                </div>
                                <div id="<?= 'collapse' . $count ?>" class="collapse" aria-labelledby="<?= 'heading-' . $count ?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Syarat untuk mengajukan <?= $p['keterangan_surat'] ?> adalah:
                                        <ul>
                                            <li><?= $p['nama_syarat']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>

<script src="<?= base_url('/public/assets/js/user/home.js'); ?>"></script>

<?= $this->endSection(); ?>