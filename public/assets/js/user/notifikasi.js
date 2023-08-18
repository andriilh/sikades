const notificationContainer = $('#notification-container');
const notificationBadge = $('#notification-badge');


$.ajax({
    url: `${base_url}/masyarakat/notification`,
    success: (res) => {
        const cardTotal = `<span class="dropdown-item dropdown-header">${res.all > 0 ? res.all + ' Total Pengajuan' : 'Kamu Belum memiliki Pengajuan'}</span>
        <div class="dropdown-divider"></div>`

        const cardMenunggu = `  <a href="${base_url}/CUtama/link_pengajuan_surat_masyarakat?status=menunggu" class="dropdown-item">
                                    <i class="fas fa-hourglass-half mr-2"></i> ${res.menunggu} Menunggu
                                </a>
                                <div class="dropdown-divider"></div>`

        const cardProses = `    <a href="${base_url}/CUtama/link_pengajuan_surat_masyarakat?status=proses" class="dropdown-item">
                                    <i class="fas fa-clock mr-2"></i> ${res.diproses} Proses
                                </a>
                                <div class="dropdown-divider"></div>`

        const cardDisetujui = ` <a href="${base_url}/CUtama/link_pengajuan_surat_masyarakat?status=disetujui" class="dropdown-item">
                                    <i class="fas fa-user-check mr-2"></i> ${res.disetujui} Disetujui
                                </a>
                                <div class="dropdown-divider"></div>`

        const cardSelesai = `   <a href="${base_url}/CUtama/link_pengajuan_surat_masyarakat?status=selesai" class="dropdown-item text-success">
                                    <i class="fas fa-check-double mr-2"></i></i> ${res.selesai} Selesai
                                </a>
                                <div class="dropdown-divider"></div>`

        const cardDitolak = `   <a href="${base_url}/CUtama/link_pengajuan_surat_masyarakat?status=ditolak" class="dropdown-item text-danger">
                                    <i class="fas fa-times-circle mr-2"></i> ${res.ditolak} Ditolak
                                </a>
                                <div class="dropdown-divider"></div>`

        const cardLihatsemua = `<a href="${base_url}/CUtama/link_pengajuan_surat_masyarakat" class="dropdown-item dropdown-footer">Lihat Semua Pengajuan</a>`

        if (res.all > 0) {
            notificationBadge.text(res.all);
            notificationBadge.removeClass('d-none');
        }

        notificationContainer.append(cardTotal);

        if (res.menunggu > 0) {
            notificationContainer.append(cardMenunggu);
        }
        if (res.diproses > 0) {
            notificationContainer.append(cardProses);
        }
        if (res.disetujui > 0) {
            notificationContainer.append(cardDisetujui);
        }
        if (res.selesai > 0) {
            notificationContainer.append(cardSelesai);
        }
        if (res.ditolak > 0) {
            notificationContainer.append(cardDitolak);
        }

        if (res.all > 0) {
            notificationContainer.append(cardLihatsemua);
        }
    }
})