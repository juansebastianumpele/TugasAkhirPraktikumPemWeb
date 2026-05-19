<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM dokter");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Dokter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h2>Data Dokter</h2>

        <a href="tambahdokter.php" class="btn btn-primary mb-3">
            Tambah Dokter
        </a>

        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Spesialis</th>
                <th>Alamat</th>
                <th>No Telp</th>
            </tr>

            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_dokter']; ?></td>
                    <td><?= $d['spesialis']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td><?= $d['no_telp']; ?></td>
                </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>