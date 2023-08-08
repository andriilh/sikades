<?= $this->extend('dashboard/layout/kepala/template'); ?>

<?= $this->section('content'); ?>
<iframe src="<?= base_url(); ?>/public/Suratkeluar/<?= $namafile; ?>" title="Lihat Surat Keluar" width="100%" height="800px"></iframe>

<?= $this->endSection(); ?>