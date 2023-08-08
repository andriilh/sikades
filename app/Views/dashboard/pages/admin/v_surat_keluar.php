<?= $this->extend('dashboard/layout/admin/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url(); ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>

<div class="container col-12" style="margin-top: 30px;">
    <div class="col-md-12">
        <div class="card card-primary" style="padding: 20px; box-sizing: border-box; border-radius: 10px;">

            <div>
                <div class="d-flex justify-content-end" style="margin-bottom: 20px;">
                    <button type="button" class="btn btn-success" onclick="window.open('<?= site_url('CSekertaris/printpdf_surat_keluar'); ?>')"><i class="fa-solid fas fa-download"></i> Download Laporan</button>
                    <span style="margin-right: 10px;"></span>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-plus"></i> Tambah</button>
                </div>
                <div class="mt-1 mb-4 dis-block">
                    <span>Filter Berdasarkan Perihal Surat</span>
                    <div id="filter-container"></div>
                </div>
                <table class="table table-bordered table-hover table-striped" style="text-align: center;" id="example">
                    <thead class="table bg-danger">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tgl Entry</th>
                            <th scope="col">Tgl Surat</th>
                            <th scope="col">Kode Surat</th>
                            <th scope="col">No Surat</th>
                            <th scope="col">Nama Bagian</th>
                            <th scope="col">Kepada</th>
                            <th scope="col">Perihal</th>
                            <th scope="col" width="5%">Status</th>
                            <th scope="col" width="14%">Aksi</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datasuratkeluar as $row) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['tgl_entry']; ?></td>
                                <td><?= $row['tgl_surat']; ?></td>
                                <td><?= $row['kode_surat']; ?></td>
                                <td><?= $row['no_surat']; ?></td>
                                <td><?= $row['nama_bagian']; ?></td>
                                <td><?= $row['kepada']; ?></td>
                                <td><?= $row['perihal']; ?></td>
                                <td>
                                    <?php if ($row['status'] == 'menunggu') : ?>
                                        <span class="btn btn-primary" style="color: white; font-weight: bold;" title="Menunggu Persetujuan">
                                            <i class="fa-solid fa-hourglass-half"></i>
                                        </span>
                                    <?php elseif ($row['status'] == 'disetujui') : ?>
                                        <span class="btn btn-success" style="color: white; font-weight: bold;" title="Disetujui">
                                            <i class="fa-solid fa-check"></i>
                                        </span>

                                    <?php elseif ($row['status'] == 'ditolak') : ?>
                                        <span class="btn btn-danger" style="color: white; font-weight: bold;" title="Ditolak">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>/CUtama/link_lihat_file_surat_keluar_sekertaris/<?= $row['file']; ?>" class="btn btn-info btn-lihat" title="Detail"><i class=" fa-solid fa-eye"></i></a>
                                    <a href="<?= base_url(); ?>/public/Suratkeluar/<?= $row['file']; ?>" class="btn btn-success btn-lihat" title="Unduh" download><i class="fa-solid fas fa-download"></i></a>
                                    <a href="#" type="button" class="btn btn-primary btn-edit" data-id="<?= $row['id_surat_keluar']; ?>" data-kodesurat="<?= $row['kode_surat']; ?>" data-nosurat="<?= $row['no_surat']; ?>" data-tglkeluar="<?= $row['tgl_keluar']; ?>" data-tglsurat="<?= $row['tgl_surat']; ?>" data-namabagian="<?= $row['nama_bagian']; ?>" data-kepada="<?= $row['kepada']; ?>" data-perihal="<?= $row['perihal']; ?>"><i class=" fa-solid fa-pen-clip" title="Ubah"></i></a>
                                    <a href="<?= base_url(); ?>/CSekertaris/hapus_surat_keluar/<?= $row['id_surat_keluar']; ?>" class="btn btn-danger btn-hapus2" title="Hapus"><i class="fa-solid fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- Add Data Surat Keluar -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container col-11" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="card card-success">
                        <form style="padding: 20px;" method="post" action="<?= base_url(); ?>/CSekertaris/tambah_surat_keluar" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="idsuratkeluar">Id Surat</label>
                                    <input type="text" class="form-control" id="idsuratkeluar" name="idsuratkeluar" required value="SRKR-<?= $idsuratkeluar ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="kodesuratkeluar">Kode Surat</label>
                                    <input type="text" class="form-control" id="kodesuratkeluar" name="kodesuratkeluar" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nosuratkeluar">No Surat</label>
                                    <input type="text" class="form-control" id="nosuratkeluar" name="nosuratkeluar" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="tglkeluar">Tgl keluar</label>
                                    <input type="date" class="form-control" id="tglkeluar" name="tglkeluar" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tglsurat">Tgl Surat</label>
                                    <input type="date" class="form-control" id="tglsurat" name="tglsurat" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="filesuratkeluar">Berkas</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="filesuratkeluar" name="filesuratkeluar" required accept="application/pdf">

                                        <label class="custom-file-label" for="filesuratkeluar">Pilih File (.pdf)</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="namabagian">Nama Bagian</label>
                                    <input type="text" class="form-control" id="namabagian" name="namabagian" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kepada">Kepada</label>
                                    <input type="text" class="form-control" id="kepada" name="kepada" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <textarea class="form-control perihal" id="perihal" rows="4" name="perihal" required></textarea>
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="editModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container col-11" style="margin-top: 20px;">
                <div class="col-md-12">
                    <div class="card card-success">
                        <form style="padding: 20px;" method="post" action="<?= base_url(); ?>/CSekertaris/ubah_surat_keluar" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="idsuratkeluar_edit">Id Surat</label>
                                    <input type="text" class="form-control idsuratkeluar_edit" id="idsuratkeluar_edit" name="idsuratkeluar_edit" required value="SRKR-<?= $idsuratkeluar ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="kodesuratkeluar_edit">Kode Surat</label>
                                    <input type="text" class="form-control kodesuratkeluar_edit" id="kodesuratkeluar_edit" name="kodesuratkeluar_edit" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nosuratkeluar_edit">No Surat</label>
                                    <input type="text" class="form-control nosuratkeluar_edit" id="nosuratkeluar_edit" name="nosuratkeluar_edit" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="tglkeluar_edit">Tgl keluar</label>
                                    <input type="date" class="form-control tglkeluar_edit" id="tglkeluar_edit" name="tglkeluar_edit" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tglsurat_edit">Tgl Surat</label>
                                    <input type="date" class="form-control tglsurat_edit" id="tglsurat_edit" name="tglsurat_edit" required>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="namabagian_edit">Nama Bagian</label>
                                    <input type="text" class="form-control namabagian_edit" id="namabagian_edit" name="namabagian_edit" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="kepada_edit">Kepada</label>
                                    <input type="text" class="form-control kepada_edit" id="kepada_edit" name="kepada_edit" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="perihal_edit">Perihal</label>
                                <textarea class="form-control perihal_edit" id="perihal_edit" rows="4" name="perihal_edit" required></textarea>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="flash-data4" data-flashdata="<?= session()->getFlashdata('kosong'); ?>"></div>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script>
    const filterContainer = $("#filter-container");
    const clearButton =
        `<button type="button" class="btn btn-default mr-2" onclick="location.href='<?= base_url() ?>/CUtama/link_surat_keluar'">Semua</button>`;
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

    const filterButton = () => {
        alphabet.forEach((a, index) => {
            filterContainer.append(`<button class="btn btn-filter ${(!a.disabled && !a.active) ? 'btn-default' : ''} ${a.active && !a.disabled ? 'btn-danger': ''}" data-name="${a.name}" data-index="${index}" ${a.disabled ? "disabled": ""}>${a.name}</button>`)
        });
    }

    // get perihal data from db
    $.ajax({
        url: '<?php echo base_url(); ?>/surat/perihal?type=keluar',
        beforeSend: function() {
            filterContainer.append(clearButton)
            filterButton()
        },
        success: function(response) {
            filterContainer.empty();
            filterContainer.append(clearButton);
            // for all alphabet that contain 'perihal' set disabled to false 
            alphabet.forEach(al => {
                response.forEach(res => {
                    if (res.name.charAt(0).toUpperCase() === al.name) {
                        al.disabled = false
                    }
                })
            })

            // get filter data from url
            var filter = window.location.search.substring(1).split('=')[1];

            // set button to active when selected
            alphabet.forEach((element) => {
                element.active = true
                if (element.name !== filter) {
                    element.active = false;
                } else if (filter === undefined) {
                    element.active = false
                }
            });

            // render all filter button
            filterButton();

            $(document).on("click", ".btn-filter", function() {
                const name = $(this).attr("data-name");
                const index = $(this).attr("data-index");
                alphabet[index].active = true;
                alphabet.forEach((element) => {
                    if (element.name !== name) {
                        element.active = false;
                    }
                });
                location.href = `<?= base_url() ?>/CUtama/link_surat_keluar?filter=${name}`
            })
        }
    });

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {


        Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Data Surat Keluar berhasil ditambahkan',
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
            text: 'Data Surat Keluar berhasil dihapus',
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
            text: 'Data Surat Keluar berhasil diubah',
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
            const idsuratkeluar = $(this).data('id');
            const kodesurat = $(this).data('kodesurat');
            const nosurat = $(this).data('nosurat');
            const tglkeluar = $(this).data('tglkeluar');
            const tglsurat = $(this).data('tglsurat');
            const namabagian = $(this).data('namabagian');
            const kepada = $(this).data('kepada');
            const perihal = $(this).data('perihal');


            // Set data to Form Edit
            $('.idsuratkeluar_edit').val(idsuratkeluar);
            $('.kodesuratkeluar_edit').val(kodesurat);
            $('.nosuratkeluar_edit').val(nosurat);
            $('.tglkeluar_edit').val(tglkeluar);
            $('.tglsurat_edit').val(tglsurat);
            $('.namabagian_edit').val(namabagian);
            $('.kepada_edit').val(kepada);
            $('.perihal_edit').val(perihal);

            // Call Modal Edit
            $('#editModal').modal('show');


        });


    });
</script>

<?= $this->endSection(); ?>