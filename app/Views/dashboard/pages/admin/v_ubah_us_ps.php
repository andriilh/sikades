<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container col-11" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><strong>Ubah Username dan Password</strong></h3>
            </div>
            <form style="padding: 40px 20px 20px 20px;" method="post" action="<?= base_url(); ?>/CSekertaris/ubah_us_ps_sekertaris">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="nik">Nomer Induk Kependudukan</label>
                        <input type="text" class="form-control" id="nik" value="<?= $dataprofile['NIK']; ?>" readonly name="nik" required>
                        <input type="hidden" class="form-control" id="idsekertaris" value="<?= $dataprofile['id_sekertaris']; ?>" readonly name="idsekertaris" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" value="<?= $dataprofile['nama_sekertaris']; ?>" name="nama" readonly required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" value="<?= $dataprofile['username']; ?>" name="username" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" Value="<?= $dataprofile['password']; ?>" name="password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>

<div class="flash-data" data-flashdata="<?= session()->getFlashdata('edit'); ?>"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script>
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {

        Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Data Username berhasil diubah',
            title: 'Berhasil',
            showConfirmButton: false,
            timer: 2000
        })
    }
</script>
<?= $this->endSection(); ?>