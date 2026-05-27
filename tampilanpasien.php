<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM Pasien");
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

        <div class="mb-3">
            <a href="dashboard_admin.php" class="btn btn-secondary">Kembali</a>
            <a href="tambahpasien.php" class="btn btn-success">Tambah Pasien</a>
        </div>

        <table class="table table-bordered">

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            while ($p = mysqli_fetch_array($data)) {
            ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p['nama']; ?></td>
                    <td><?= $p['tanggal_lahir']; ?></td>
                    <td><?= $p['jenis_kelamin']; ?></td>
                    <td><?= $p['alamat']; ?></td>
                    <td><?= $p['no_telepon']; ?></td>
                    <td>
                        <a href="editpasien.php?id=<?= $p['id_pasien']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapuspasien.php?id=<?= $p['id_pasien']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>