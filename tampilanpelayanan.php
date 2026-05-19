<?php

include 'koneksi.php';

$query = mysqli_query($conn, "
SELECT * FROM pelayanan
JOIN dokter ON pelayanan.id_dokter = dokter.id_dokter
JOIN pasien ON pelayanan.id_pasien = pasien.id_pasien
");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Pelayanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h2>Data Pelayanan</h2>

        <a href="tambahpelayanan.php" class="btn btn-danger mb-3">
            Tambah Pelayanan
        </a>

        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Dokter</th>
                <th>Pasien</th>
                <th>Tanggal</th>
                <th>Diagnosa</th>
                <th>Tindakan</th>
                <th>Biaya</th>
            </tr>

            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($query)) {
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_dokter']; ?></td>
                    <td><?= $d['nama_pasien']; ?></td>
                    <td><?= $d['tanggal']; ?></td>
                    <td><?= $d['diagnosa']; ?></td>
                    <td><?= $d['tindakan']; ?></td>
                    <td><?= $d['biaya']; ?></td>
                </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>