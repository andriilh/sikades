<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>



<div class="container col-12" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card card-primary" style="padding: 20px; box-sizing: border-box; border-radius: 10px;">

            <div>
                <div class="d-flex justify-content-end" style="margin-bottom: 20px;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" data-whatever="@mdo"><i class="fa-solid fa-plus"></i> Tambah</button>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped" style="text-align: center;" id="example">
                <thead class="table bg-danger">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Syarat</th>
                        <th scope="col">Nama Syarat</th>
                        <th scope="col">Aksi</th>
                    </tr>

                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($datasyarat as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['id_syarat']; ?></td>
                            <td><?= $row['nama_syarat']; ?></td>
                            <td>
                                <a href="#" title="Ubah" class="btn btn-primary btn-edit" data-id="<?= $row['id_syarat']; ?>" data-nama="<?= $row['nama_syarat']; ?>"><i class=" fa-solid fa-pen-clip"></i></a>

                                <a href="<?= base_url(); ?>/CSekertaris/hapus_data_syarat/<?= $row['id_syarat']; ?>" title="Hapus" class="btn btn-danger btn-hapus2"><i class="fa-solid fa-trash"></i></a>

                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Form Tambah Syarat -->
<form action="<?= base_url(); ?>/CSekertaris/tambah_data_syarat" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Syarat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_syarat" class="col-form-label">Id Syarat</label>
                        <input type="text" class="form-control" id="id_syarat" readonly name="id_syarat" value="SY-<?= $idsyarat; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_syarat" class="col-form-label">Nama Syarat</label>
                        <input type="text" class="form-control" id="nama_syarat" name="nama_syarat" required>
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


<!-- Form Ubah Syarat -->
<form action="<?= base_url(); ?>/CSekertaris/ubah_data_syarat" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Syarat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_syarat_edit" class="col-form-label">Id Surat</label>
                        <input type="text" class="form-control id_syarat_edit" id="id_syarat_edit" readonly name="id_syarat_edit" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_syarat_edit" class="col-form-label">Nama Surat</label>
                        <input type="text" class="form-control nama_syarat_edit" id="nama_syarat_edit" name="nama_syarat_edit" required>
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
<!-- End Form Ubah -->



<div class="flash-data" data-flashdata="<?= session()->getFlashdata('tambah'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= session()->getFlashdata('hapus'); ?>"></div>
<div class="flash-data3" data-flashdata="<?= session()->getFlashdata('edit'); ?>"></div>
<div class="flash-data4" data-flashdata="<?= session()->getFlashdata('kosong'); ?>"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


<script>
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Data Syarat berhasil ditambahkan',
            title: 'Ditambahkan',
            showConfirmButton: false,
            timer: 2000
        })
    }

    const flashData2 = $('.flash-data2').data('flashdata');
    if (flashData2) {


        Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Data Syarat berhasil dihapus',
            title: 'Dihapus',
            showConfirmButton: false,
            timer: 2000
        })
    }

    const flashData3 = $('.flash-data3').data('flashdata');
    if (flashData3) {


        Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Data Syarat berhasil diubah',
            title: 'Diubah',
            showConfirmButton: false,
            timer: 2000
        })
    }

    const flashData4 = $('.flash-data4').data('flashdata');
    if (flashData4) {

        Swal.fire({
            position: 'center',
            icon: 'warning',
            text: 'Maaf, data yang anda cari tidak ditemukan!',
            title: 'Data tidak ditemukan',
            showConfirmButton: false,
            timer: 2000
        })
    }

    $(document).on('click', '.btn-hapus2', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        console.log(href);
        Swal.fire({
            position: 'center',
            title: 'Yakin ingin menghapus?',
            text: 'Data yang dihapus tidak bisa dikembalikan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#21756E',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })

    });



    $(document).ready(function() {

        // get Edit Gejala
        $('.btn-edit').on('click', function() {
            // get data from button edit
            const id = $(this).data('id');
            const nama = $(this).data('nama');


            // Set data to Form Edit
            $('.id_syarat_edit').val(id);
            $('.nama_syarat_edit').val(nama);
            // Call Modal Edit
            $('#editModal').modal('show');


        });


    });
</script>

<?= $this->endSection(); ?>