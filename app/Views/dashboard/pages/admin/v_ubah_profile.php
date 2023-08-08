<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container col-11" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><strong>Ubah Profile</strong></h3>
            </div>
            <form style="padding: 40px 20px 20px 20px;" method="post" action="<?= base_url(); ?>/CSekertaris/ubah_profile_sekertaris">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" value="<?= $dataprofile['nama_sekertaris']; ?>" name="nama" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="idsekertaris">Id Sekertaris</label>
                        <input type="text" class="form-control" id="idsekertaris" value="<?= $dataprofile['id_sekertaris']; ?>" name="idsekertaris" required readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nik">Nomer Induk Kependudukan</label>
                        <input type="text" class="form-control" id="nik" Value="<?= $dataprofile['NIK']; ?>" readonly name="nik" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select id="jeniskelamin" class="form-control" name="jeniskelamin" required>
                            <option value="Laki-laki" <?= ($dataprofile['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>> Laki - Laki </option>
                            <option value="Perempuan" <?= ($dataprofile['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>> Perempuan </option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="tempatlahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required value="<?= $dataprofile['tempat_lahir']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tgllahir">Tgl Lahir</label>
                        <input type="date" class="form-control" id="tgllahir" name="tgllahir" value="<?= $dataprofile['tgl_lahir']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="agama">Agama</label>
                        <select id="agama" class="form-control" name="agama" required>
                            <option value="">Pilih...</option>
                            <option value="Islam" <?= ($dataprofile['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                            <option value="Protestan" <?= ($dataprofile['agama'] == 'Protestan') ? 'selected' : ''; ?>>Protestan</option>
                            <option value="Katholik" <?= ($dataprofile['agama'] == 'Katholik') ? 'selected' : ''; ?>>Katholik</option>
                            <option value="Hindu" <?= ($dataprofile['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                            <option value="Budha <?= ($dataprofile['agama'] == 'Budha') ? 'selected' : ''; ?>">Budha</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" value="<?= $dataprofile['email']; ?>" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" Value="<?= $dataprofile['no_hp']; ?>" name="no_hp" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="4" name="alamat"><?= $dataprofile['alamat']; ?></textarea>
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
            text: 'Data Profile berhasil diubah',
            title: 'Berhasil',
            showConfirmButton: false,
            timer: 2000
        })
    }
</script>
<?= $this->endSection(); ?>