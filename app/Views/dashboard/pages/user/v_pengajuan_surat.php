<?= $this->extend('dashboard/layout/user/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>


<div class="container col-12" style="margin-top: 30px;">

    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" id="alert" role="alert">
            <strong>Perhatian..</strong> Jika status surat anda telah disetujui, maka anda dapat menghubungi admin melalui whatsapp untuk mengambil surat
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card card-primary" style="padding: 20px; box-sizing: border-box; border-radius: 10px;">

            <div style="margin-bottom: 20px;">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" data-whatever="@mdo"><i class="fa-solid fa-plus"></i> Tambah</button>
                </div>
                <div class="mt-1 mb-4 dis-block">
                    <span>Filter</span>
                    <div id="filter-container">
                    </div>
                </div>
            </div>


            <table class="table table-bordered table-hover table-striped" style="text-align: center;" id="example">
                <thead class="table bg-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tgl Pengajuan</th>
                        <th scope="col">Nama Surat</th>
                        <th scope="col" width="5%">Status</th>
                        <th scope="col" width="14%">Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datapengajuan as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['tgl_pengajuan']; ?></td>
                            <td><?= $row['nama_surat']; ?></td>
                            <td>
                                <?php if ($row['status'] == 'menunggu') : ?>
                                    <span class="btn btn-primary" style="color: white; font-weight: bold;" title="Menunggu Persetujuan">
                                        <i class="fa-solid fa-hourglass-half"></i>
                                    </span>
                                <?php elseif ($row['status'] == 'selesai') : ?>
                                    <span class="btn btn-success" style="color: white; font-weight: bold;" title="Selesai">
                                        <i class="fa-solid fa-check-double"></i>
                                    </span>

                                <?php elseif ($row['status'] == 'disetujui' || $row['status'] == 'disetujui2') : ?>
                                    <span class="btn btn-success" style="color: white; font-weight: bold;" title="Disetujui">
                                        <i class="fa-solid fa-check"></i>
                                    </span>

                                <?php elseif ($row['status'] == 'diproses') : ?>
                                    <span class="btn btn-primary" style="color: white; font-weight: bold;" title="Diproses">
                                        <i class="fa-solid fa-gear"></i>
                                    </span>

                                <?php elseif ($row['status'] == 'ditolak') : ?>
                                    <span class="btn btn-danger btn-tolak" style="color: white; font-weight: bold;" title="Ditolak" data-keterangan="<?= $row['keterangan']; ?>">
                                        <i class="fa-solid fa-xmark"></i>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                if ($row['acc_admin'] != "") { ?>
                                    <a href="https:wa.me/<?= $row['no_hp']; ?>?text=Hallo,%20mohon%20maaf%20ingin%20menanyakan%20apakah%20surat%20dengan%20ID%20<?= $row['id_pengajuan_surat']; ?>%20sudah%20bisa%20di%20ambil?" class="btn btn-success btn-lihat" title="Kontak"><i class="fa-brands fa-whatsapp"></i></a>
                                <?php } ?>
                                <?php
                                if ($row['file_surat'] != "") { ?>
                                    <a href="<?= base_url(); ?>/public/Pengajuansurat/<?= $row['file_surat']; ?>" class="btn btn-primary" title="Unduh" download><i class="fa-solid fas fa-download"></i></a>
                                <?php } ?>



                                <a href="<?= base_url(); ?>/CMasyarakat/hapus_pengajuan_masyarakat/<?= $row['id_pengajuan_surat']; ?>" title="Hapus" class="btn btn-danger btn-hapus2"><i class="fa-solid fa-trash"></i></a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>



                </tbody>
            </table>
        </div>
    </div>

</div>


<!-- Form Tambah Pengajuan Suraet -->
<form action="<?= base_url(); ?>/CMasyarakat/tambah_pengajuan_surat" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penganjuan Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_pengajuan" class="col-form-label">Id Surat</label>
                        <input type="text" class="form-control" id="id_pengajuan" readonly name="id_pengajuan" required value="SRPJ-<?= $idpengajuansurat; ?>">
                    </div>

                    <div class="form-group">
                        <label for="surat_pengajuan" class="col-form-label">Surat</label>
                        <select class="form-control surat_pengajuan" style="width: 100%;" name="surat_pengajuan" required>
                            <option>-- Pilih Surat --</option>
                            <?php foreach ($datasurat as $row) : ?>
                                <option value="<?= $row['id_surat']; ?>"><?= $row['nama_surat']; ?></option>
                            <?php endforeach; ?>
                            <option>Lainnya...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filepengajuansurat">Foto KTP/KK</label>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="filepengajuansurat" name="filepengajuansurat" required accept="application/pdf">

                            <label class="custom-file-label" for="filepengajuansurat">Pilih File (.pdf)</label>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Form Tambah -->

<div class="modal fade" id="modalKeterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Penolakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="keterangan"></p>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    setTimeout(function() {
        // Closing the alert
        $('#alert').alert('close');
    }, 10000);
</script>

<div class="flash-data" data-flashdata="<?= session()->getFlashdata('tambah'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= session()->getFlashdata('hapus'); ?>"></div>
<div class="flash-data3" data-flashdata="<?= session()->getFlashdata('edit'); ?>"></div>
<div class="flash-data4" data-flashdata="<?= session()->getFlashdata('kosong'); ?>"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    const baseUrl = '<?= base_url() ?>';
    const alphabet = [{
            name: "A",
            active: false,
            disabled: true
        },
        {
            name: "B",
            active: false,
            disabled: true
        },
        {
            name: "C",
            active: false,
            disabled: true
        },
        {
            name: "D",
            active: false,
            disabled: true
        },
        {
            name: "E",
            active: false,
            disabled: true
        },
        {
            name: "F",
            active: false,
            disabled: true
        },
        {
            name: "G",
            active: false,
            disabled: true
        },
        {
            name: "H",
            active: false,
            disabled: true
        },
        {
            name: "I",
            active: false,
            disabled: true
        },
        {
            name: "J",
            active: false,
            disabled: true
        },
        {
            name: "K",
            active: false,
            disabled: true
        },
        {
            name: "L",
            active: false,
            disabled: true
        },
        {
            name: "M",
            active: false,
            disabled: true
        },
        {
            name: "N",
            active: false,
            disabled: true
        },
        {
            name: "O",
            active: false,
            disabled: true
        },
        {
            name: "P",
            active: false,
            disabled: true
        },
        {
            name: "Q",
            active: false,
            disabled: true
        },
        {
            name: "R",
            active: false,
            disabled: true
        },
        {
            name: "S",
            active: false,
            disabled: true
        },
        {
            name: "T",
            active: false,
            disabled: true
        },
        {
            name: "U",
            active: false,
            disabled: true
        },
        {
            name: "V",
            active: false,
            disabled: true
        },
        {
            name: "W",
            active: false,
            disabled: true
        },
        {
            name: "X",
            active: false,
            disabled: true
        },
        {
            name: "Y",
            active: false,
            disabled: true
        },
        {
            name: "Z",
            active: false,
            disabled: true
        },
    ];
</script>
<!-- All of javascript logic in this page are in this file -->
<script src="<?= base_url('/public/assets/js/user/pengajuanSurat.js') ?>"></script>



<?= $this->endSection(); ?>