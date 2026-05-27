<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM Dokter");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rumah Sakit - Jadwal Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Sistem Informasi Rumah Sakit</h1>
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>

        <h2 class="mt-5 mb-4">Jadwal Praktik Dokter</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Jadwal Pelayanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['spesialisasi']; ?></td>
                            <td>Senin - Jumat (08:00 - 15:00)</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="alert alert-info mt-4">
            Hubungi pihak rumah sakit untuk pembuatan janji temu di luar jadwal yang tertera.
        </div>

    </div>

</body>

</html>