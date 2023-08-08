<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>

<div class="container col-12" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card card-primary" style="padding: 20px; box-sizing: border-box; border-radius: 10px;">

            <div>
                <div class="d-flex justify-content-end" style="margin-bottom: 20px;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-plus"></i> Tambah </button>
                </div>
                <table class="table table-bordered table-hover table-striped" style="text-align: center;" id="example">
                    <thead class="table bg-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($datamasyarakat as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['NIK']; ?></td>
                                <td><?= $row['nama_masyarakat']; ?></td>
                                <td><?= $row['jenis_kelamin']; ?></td>
                                <td><?= $row['agama']; ?></td>
                                <td>

                                    <a href="#" title="Ubah" class="btn btn-primary btn-edit" data-id="<?= $row['id_masyarakat']; ?>" data-nama="<?= $row['nama_masyarakat']; ?>" data-nik="<?= $row['NIK']; ?>" data-jk="<?= $row['jenis_kelamin']; ?>" data-tmplahir="<?= $row['tempat_lahir']; ?>" data-tgllahir="<?= $row['tgl_lahir']; ?>" data-agama="<?= $row['agama']; ?>" data-username="<?= $row['username']; ?>" data-password="<?= $row['password']; ?>" data-email="<?= $row['email']; ?>" data-nohp="<?= $row['no_hp']; ?>" data-alamat="<?= $row['alamat']; ?>"><i class=" fa-solid fa-pen-clip"></i></a>

                                    <a href="<?= base_url(); ?>/CSekertaris/hapus_data_pengguna/<?= $row['id_masyarakat']; ?>" title="Hapus" class="btn btn-danger btn-hapus2"><i class="fa-solid fa-trash"></i></a>

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

<!-- Add Data Pengguna -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container col-11" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="card card-success">
                        <form style="padding: 20px;" method="post" action="<?= base_url(); ?>/CSekertaris/tambah_data_pengguna">

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="idmasyarakat">Id Masyarakat</label>
                                    <input type="text" class="form-control" id="idmasyarakat" name="idmasyarakat" required value="MSY-<?= $idpengguna; ?>" readonly>
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
                                <div class="form-group col-md-8">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nohp">No HP</label>
                                    <input type="text" class="form-control" id="nohp" name="nohp" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control alamat" id="alamat" rows="4" name="alamat" required></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
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

<!-- Ubah Data Pengguna -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="editModal" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container col-11" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="card card-success">
                        <form style="padding: 20px;" method="post" action="<?= base_url(); ?>/CSekertaris/ubah_data_pengguna">

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="idmasyarakat_edit">Id Masyarakat</label>
                                    <input type="text" class="form-control idmasyarakat_edit" id="idmasyarakat_edit" name="idmasyarakat_edit" required readonly>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="nama_edit">Nama Lengkap</label>
                                    <input type="text" class="form-control nama_edit" id="nama_edit" name="nama_edit" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nik_edit">NIK</label>
                                    <input type="text" class="form-control nik_edit" id="nik_edit" name="nik_edit" required>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="jeniskelamin_edit">Jenis Kelamin</label>
                                    <select id="jeniskelamin_edit" class="form-control jeniskelamin_edit" name="jeniskelamin_edit" required>
                                        <option value="">Pilih...</option>
                                        <option value="Laki-laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="tempatlahir_edit">Tempat Lahir</label>
                                    <input type="text" class="form-control tempatlahir_edit" id="tempatlahir_edit" name="tempatlahir_edit" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tanggallahir_edit">Tanggal Lahir</label>
                                    <input type="date" class="form-control tanggallahir_edit" id="tanggallahir_edit" name="tanggallahir_edit" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="agama_edit">Agama</label>
                                    <select id="agama_edit" class="form-control agama_edit" name="agama_edit" required>
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
                                <div class="form-group col-md-8">
                                    <label for="email_edit">Email</label>
                                    <input type="email" class="form-control email_edit" id="email_edit" name="email_edit" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nohp_edit">No HP</label>
                                    <input type="text" class="form-control nohp_edit" id="nohp_edit" name="nohp_edit" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat_edit">Alamat</label>
                                <textarea class="form-control alamat_edit" id="alamat_edit" rows="4" name="alamat_edit" required></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username_edit">Username</label>
                                    <input type="text" class="form-control username_edit" id="username_edit" name="username_edit" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_edit">Password</label>
                                    <input type="text" class="form-control password_edit" id="password_edit" name="password_edit" required>
                                </div>
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
            text: 'Data Masyarakat berhasil ditambahkan',
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
            text: 'Data Masyarakat berhasil dihapus',
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
            text: 'Data Masyarakat berhasil diubah',
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