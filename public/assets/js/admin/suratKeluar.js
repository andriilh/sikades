$(document).ready(function () {
    $('#example').DataTable();

    const filterContainer = $("#filter-container");
    const clearButton = `<button type="button" class="btn btn-default mr-2" onclick="location.href='${baseUrl}/CUtama/link_surat_keluar'">Semua</button>`;

    const filterButton = () => {
        alphabet.forEach((a, index) => {
            filterContainer.append(`<button class="btn btn-filter ${(!a.disabled && !a.active) ? 'btn-default' : ''} ${a.active && !a.disabled ? 'btn-success' : ''}" data-name="${a.name}" data-index="${index}" ${a.disabled ? "disabled" : ""}>${a.name}</button>`)
        });
    }
    // get perihal data from db
    $.ajax({
        url: `${baseUrl}/surat/perihal?type=keluar`,
        beforeSend: function () {
            filterContainer.append(clearButton)
            filterButton()
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
                location.href = `${baseUrl}/CUtama/link_surat_keluar?filter=${name}`
            })
        }
    });

    let nomorTerakhir = 0;
    let kodesuratkeluar = '';

    function getNomorTerakhir() {
        $.ajax({
            url: `${baseUrl}/surat/nomor?kode=${kodesuratkeluar}`,
            beforeSend: () => {
                $('#nosuratkeluar').prop("disabled", true);
            },
            success: (res) => {
                const nomorTerakhir = parseInt(res[0].number) + 1;
                $('#nosuratkeluar').val(zeroPad(nomorTerakhir, 3));
                $('#nosuratkeluar').prop("disabled", false);
            }
        })
    }

    getNomorTerakhir();

    $('#kodesuratkeluar').keyup(function () {
        kodesuratkeluar = $(this).val();
        if (kodesuratkeluar !== '') {
            $('#autoNumberContainer').removeClass('d-none')
        } else {
            $('#autoNumberContainer').addClass('d-none')
        }
    })
    const zeroPad = (num, places) => String(num).padStart(places, '0')

    $('#autoNumber').click(function () {
        if ($(this).prop("checked")) {
            getNomorTerakhir();
        }
    })


    // edit data
    $('#example').on('click', '.btn-edit', function () {
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

    // hapus data
    $('#example').on('click', '.btn-hapus2', function () {
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

