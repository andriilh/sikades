<?= $this->extend('dashboard/layout/kepala/template'); ?>

<?= $this->section('content'); ?>
<iframe src="<?= base_url(); ?>/public/Pengajuansurat/<?= $namafile; ?>" title="Lihat Pengajuan Surat" width="100%" height="800px"></iframe>

<?= $this->endSection(); ?>