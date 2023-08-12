<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>
<div class="container col-12" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card card-primary" style="padding: 20px; box-sizing: border-box; border-radius: 10px;">

            <div style="margin-bottom: 20px;">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-plus"></i> Tambah</button>
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
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Surat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datapengajuan as $row) { ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['NIK']; ?></td>
                            <td><?= $row['nama_masyarakat']; ?></td>
                            <td><?= $row['nama_surat']; ?></td>

                            <td>
                                <?php if ($row['status'] == 'menunggu') : ?>
                                    <span class="btn btn-info" style="color: white; font-weight: bold;" title="Menunggu Persetujuan Admin">
                                        <i class="fa-solid fa-hourglass-half"></i>
                                    </span>
                                <?php elseif ($row['status'] == 'diproses') : ?>
                                    <span class="btn btn-primary" style="color: white; font-weight: bold;" title="Diproses">
                                        <i class="fa-solid fa-gears"></i>
                                    </span>
                                <?php elseif ($row['status'] == 'selesai') : ?>
                                    <span class="btn btn-success" style="color: white; font-weight: bold;" title="Selesai">
                                        <i class="fa-solid fa-check-double"></i>
                                    </span>
                                <?php elseif ($row['status'] == 'ditolak') : ?>
                                    <span class="btn btn-success" style="color: white; font-weight: bold;" title="Ditolak">
                                        <i class="fa-solid fa-xmark"></i>
                                    </span>
                                <?php elseif ($row['status'] == 'disetujui') : ?>
                                    <span class="btn btn-success" style="color: white; font-weight: bold;" title="Disetujui Admin">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                <?php elseif ($row['status'] == 'disetujui2') : ?>
                                    <span class="btn btn-success" style="color: white; font-weight: bold;" title="Disetujui Lurah">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </span>
                                <?php endif; ?>

                            </td>

                            <td>
                                <a href="<?= base_url(); ?>/public/Pengajuansurat/<?= $row['file']; ?>" class="btn btn-success" title="Unduh" download><i class="fa-solid fas fa-download"></i></a>

                                <a href="#" title="Ubah" class="btn btn-primary btn-edit" data-nik="<?= $row['NIK']; ?>" data-id="<?= $row['id_pengajuan_surat']; ?>" data-nama="<?= $row['nama_masyarakat']; ?>" data-surat="<?= $row['nama_surat']; ?>" data-status="<?= $row['status']; ?>" data-keterangan="<?= $row['keterangan']; ?>" style="display: <?= ($row['status'] == 'selesai') ? 'none' : 'inline' ?>;"><i class=" fa-solid fa-pen-clip"></i></a>

                                <a href="<?= base_url(); ?>/CSekertaris/hapus_data_pengajuan_saya/<?= $row['id_pengajuan_surat']; ?>" title="Hapus" class="btn btn-danger btn-hapus2"><i class="fa-solid fa-trash"></i></a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>



</div>

<!-- Add Data Pengguna -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan Saya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container col-11" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="card card-success">
                        <form style="padding: 20px;" method="post" action="<?= base_url(); ?>/CSekertaris/tambah_data_pengajuan_saya" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="idpengajuansaya">Id Pengajuan Surat</label>
                                    <input type="text" class="form-control" id="idpengajuansaya" name="idpengajuansaya" required value="SRPJ-<?= $idpengajuansaya; ?>" readonly>
                                    <input type="hidden" class="form-control" id="idmasyarakat" name="idmasyarakat" required value="MSY-<?= $idpengajuansaya; ?>" readonly>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select id="jeniskelamin" class="form-control" name="jeniskelamin" required>
                                        <option value="">Pilih...</option>
                                        <option value="Laki-laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="tempatlahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tanggallahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="agama">Agama</label>
                                    <select id="agama" class="form-control" name="agama" required>
                                        <option value="">Pilih...</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="surat">Pengajuan Surat</label>
                                    <select id="surat" class="form-control" name="surat" required>
                                        <option value="">Pilih...</option>
                                        <?php foreach ($datasurat as $row) { ?>
                                            <option value="<?= $row['id_surat']; ?>"><?= $row['nama_surat']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="filepengajuansaya">Foto KTP/KK</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="filepengajuansaya" name="filepengajuansaya" required accept="application/pdf">

                                        <label class="custom-file-label" for="filepengajuansaya">Pilih File (.pdf)</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control alamat" id="alamat" rows="4" name="alamat" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>

    </div>
</div>
<!-- End Add -->

<!-- Form Ubah Pengajuan -->
<form action="<?= base_url(); ?>/CSekertaris/ubah_pengajuan_saya_sekertaris" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengajuan Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_pengajuan_surat" class="col-form-label">Id Pengajuan Surat</label>
                        <input type="text" class="form-control id_pengajuan_surat" id="id_pengajuan_surat" readonly name="id_pengajuan_surat" required>
                    </div>
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control nik" id="nik" readonly name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama</label>
                        <input type="text" class="form-control nama" id="nama" readonly name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="surat" class="col-form-label">Surat</label>
                        <input type="text" class="form-control surat" id="surat" readonly name="surat" required>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Status</label>
                        <select class="form-control status" style="width: 100%;" name="status">
                            <option>-- Pilih Status --</option>
                            <option value="menunggu">Menunggu</option>
                            <option value="disetujui">Disetujui Admin</option>
                            <option value="disetujui2">Disetujui Lurah</option>
                            <option value="ditolak">Ditolak</option>
                            <option value="diproses">Diproses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <div id="keterangan-container"></div>
                    <div id="file-surat"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Form Ubah -->



<div class="flash-data" data-flashdata="<?= session()->getFlashdata('tambah'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= session()->getFlashdata('hapus'); ?>"></div>
<div class="flash-data3" data-flashdata="<?= session()->getFlashdata('edit'); ?>"></div>

<div class="flash-data4" data-flashdata="<?= session()->getFlashdata('kosong'); ?>"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
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
<script src="<?= base_url('/public/assets/js/admin/pengajuanSaya.js') ?>"></script>

<?= $this->endSection(); ?>