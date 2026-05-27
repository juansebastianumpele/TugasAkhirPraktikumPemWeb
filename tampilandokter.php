<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM Dokter");
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

        <div class="mb-3">
            <a href="dashboard_admin.php" class="btn btn-secondary">Kembali</a>
            <a href="tambahdokter.php" class="btn btn-primary">Tambah Dokter</a>
        </div>

        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>No Telp</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['spesialisasi']; ?></td>
                    <td><?= $d['no_telepon']; ?></td>
                    <td>
                        <a href="editdokter.php?id=<?= $d['id_dokter']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapusdokter.php?id=<?= $d['id_dokter']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>