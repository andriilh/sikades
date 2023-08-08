<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" style="text-align: center;">
        <div class="container-fluid">
            <?php if (session()->get('halaman') != 'home_masyarakat') {
            ?>
                <h1 style="font-size: 30px; font-weight: bold;"><?= $judul_halaman; ?></h1>
            <?php
            } ?>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <?= $this->renderSection('content'); ?>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>