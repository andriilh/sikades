$(document).ready(function () {
    $('#example').DataTable();

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    const filterContainer = $("#filter-container");
    const clearButton = `<button type="button" class="btn btn-default mr-2" onclick="location.href='${baseUrl}/CUtama/link_pengajuan_surat_masyarakat'">Semua</button>`;

    const filterButton = () => {
        alphabet.forEach((a, index) => {
            filterContainer.append(`<button class="btn btn-filter ${(!a.disabled && !a.active) ? 'btn-default' : ''} ${a.active && !a.disabled ? 'btn-success' : ''}" data-name="${a.name}" data-index="${index}" ${a.disabled ? "disabled" : ""}>${a.name}</button>`)
        });
    }
    // get perihal data from db
    $.ajax({
        url: `${baseUrl}/pengajuan_surat/nama?type=user`,
        beforeSend: function () {
            filterContainer.append(clearButton);
            filterButton();
        },
        success: function (response) {
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
            $(document).on("click", ".btn-filter", function () {
                const name = $(this).attr("data-name");
                const index = $(this).attr("data-index");
                alphabet[index].active = true;
                alphabet.forEach((element) => {
                    if (element.name !== name) {
                        element.active = false;
                    }
                });
                location.href = `${baseUrl}/CUtama/link_pengajuan_surat_masyarakat?filter=${name}`
            })
        }
    });

    // edit data
    $('#example').on('click', '.btn-tolak', function () {
        // get data from button edit
        const keterangan = $(this).data('keterangan');

        // Call Modal Edit
        $('#modalKeterangan').modal('show');
        $('#keterangan').text(keterangan);
    });

    // hapus data
    $('#example').on('click', '.btn-hapus2', function () {
        e.preventDefault();
        const href = $(this).attr('href');
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

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            text: 'Data Pengajuan berhasil ditambahkan',
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
            text: 'Data Pengajuan berhasil dihapus',
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
            text: 'Data Pengajuan berhasil diubah',
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
            text: 'Data tidak ditemukan!',
            title: 'Tidak ditemukan!',
            showConfirmButton: false,
            timer: 2000
        })
    }
});