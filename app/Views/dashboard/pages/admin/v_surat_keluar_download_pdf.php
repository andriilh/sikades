<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td,
    th {
        padding: 5px;
    }

    th {
        background-color: #CCC;
    }
</style>

<body>
    <h1 align="center">Data Surat Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl Keluar</th>
                <th>Tgl Surat</th>
                <th>Kode Surat</th>
                <th>No Surat</th>
                <th>Nama Bagian</th>
                <th>Kepada</th>
                <th>Perihal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($datasuratkeluar as $row) : ?>
                <tr>
                    <td align="center"><?= $i; ?></td>
                    <td><?= $row['tgl_keluar']; ?></td>
                    <td><?= $row['tgl_surat']; ?></td>
                    <td><?= $row['kode_surat']; ?></td>
                    <td><?= $row['no_surat']; ?></td>
                    <td><?= $row['nama_bagian']; ?></td>
                    <td><?= $row['kepada']; ?></td>
                    <td><?= $row['perihal']; ?></td>
                    <td><?= $row['status']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>