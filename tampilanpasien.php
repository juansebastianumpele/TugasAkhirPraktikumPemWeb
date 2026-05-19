<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM pasien");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Pasien</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h2>Data Pasien</h2>

        <a href="tambahpasien.php" class="btn btn-success mb-3">
            Tambah Pasien
        </a>

        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Keluhan</th>
            </tr>

            <?php
            $no = 1;
            while ($p = mysqli_fetch_array($data)) {
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p['nama_pasien']; ?></td>
                    <td><?= $p['jenis_kelamin']; ?></td>
                    <td><?= $p['umur']; ?></td>
                    <td><?= $p['alamat']; ?></td>
                    <td><?= $p['keluhan']; ?></td>
                </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>