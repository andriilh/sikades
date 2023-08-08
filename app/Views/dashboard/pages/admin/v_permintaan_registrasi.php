<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>

<div class="container col-12" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card card-primary" style="padding: 20px; box-sizing: border-box; border-radius: 10px;">

            <div style="margin-top: 20px;">

                <table class="table table-bordered table-hover table-striped" style="text-align: center;" id="example">
                    <thead class="table bg-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($dataregistrasi as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['NIK']; ?></td>
                                <td><?= $row['nama_masyarakat']; ?></td>
                                <td><?= $row['no_hp']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td>

                                    <a href="<?= base_url(); ?>/CSekertaris/ubah_data_konfirmasi_registrasi/<?= $row['id_masyarakat']; ?>" title="Setujui" class="btn btn-primary btn-setuju"><i class="fa-solid fa-check"></i></i></a>

                                    <a href="<?= base_url(); ?>/CSekertaris/hapus_data_konfirmasi_registrasi/<?= $row['id_masyarakat']; ?>" title="Hapus" class="btn btn-danger btn-hapus2" tittle="Hapus"><i class="fa-solid fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>


<div class="flash-data" data-flashdata="<?= session()->getFlashdata('tambah'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= session()->getFlashdata('hapus'); ?>"></div>
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
            text: 'Data Registrasi berhasil di setujui',
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
            text: 'Data Registrasi berhasil dihapus',
            title: 'Dihapus',
            showConfirmButton: false,
            timer: 2000
        })
    }

    $(document).on('click', '.btn-setuju', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        console.log(href);
        Swal.fire({
            position: 'center',
            title: 'Menyetujui',
            text: 'Data registrasi akan di setujui',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: 'blue',
            cancelButtonColor: 'red',
            confirmButtonText: 'Ya, Setuju'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })

    });


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
            const idmasyarakat = $(this).data('id');
            const nama = $(this).data('nama');
            const nik = $(this).data('nik');
            const jk = $(this).data('jk');
            const tmplahir = $(this).data('tmplahir');
            const tgllahir = $(this).data('tgllahir');
            const agama = $(this).data('agama');
            const username = $(this).data('username');
            const password = $(this).data('password');
            const email = $(this).data('email');
            const nohp = $(this).data('nohp');
            const alamat = $(this).data('alamat');

            // Call Modal Edit
            $('.idmasyarakat_edit').val(idmasyarakat);
            $('.nama_edit').val(nama);
            $('.nik_edit').val(nik);
            $('.jeniskelamin_edit').val(jk).trigger('change');
            $('.tempatlahir_edit').val(tmplahir);
            $('.tanggallahir_edit').val(tgllahir);
            $('.agama_edit').val(agama).trigger('change');
            $('.username_edit').val(username);
            $('.password_edit').val(password);
            $('.email_edit').val(email);
            $('.nohp_edit').val(nohp);
            $('.alamat_edit').val(alamat);


            $('#editModal').modal('show');


        });


    });
</script>

<?= $this->endSection(); ?>