<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<iframe src="<?= base_url(); ?>/public/Suratkeluar/<?= $namafile; ?>" title="Lihat Surat Masuk" width="100%" height="800px"></iframe>

<?= $this->endSection(); ?>