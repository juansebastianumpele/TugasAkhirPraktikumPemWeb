<?php
include 'koneksi.php';

$data = mysqli_query($conn, "
SELECT * FROM jadwal_dokter
JOIN dokter
ON jadwal_dokter.id_dokter = dokter.id_dokter
");
?>

<!DOCTYPE html>
<html>

<head>

    <title>Jadwal Dokter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container mt-5">

        <h2 class="jadwal-title">
            Jadwal Pelayanan Dokter
        </h2>

        <a href="tambahjadwal.php"
            class="btn btn-warning mb-3">

            Tambah Jadwal

        </a>

        <div class="jadwal-card">

            <table class="table table-bordered table-warning">

                <tr>
                    <th>No</th>
                    <th>Nama Dokter</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                </tr>

                <?php
                $no = 1;

                while ($d = mysqli_fetch_array($data)) {
                ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['nama_dokter']; ?></td>
                        <td><?= $d['hari']; ?></td>
                        <td><?= $d['jam_mulai']; ?></td>
                        <td><?= $d['jam_selesai']; ?></td>
                    </tr>

                <?php } ?>

            </table>

        </div>

        <div class="alert-jadwal mt-4">

            Jadwal dokter digunakan untuk mengatur
            jam pelayanan pasien di rumah sakit.

        </div>

    </div>

</body>

</html>