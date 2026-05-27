<?php
session_start();
include 'koneksi.php';

$where = "";
if (isset($_SESSION['dokter'])) {
    $id_user = $_SESSION['id_user'];
    $d_query = mysqli_query($conn, "SELECT id_dokter FROM Dokter WHERE id_user='$id_user'");
    $d_data = mysqli_fetch_array($d_query);
    if (!$d_data) {
        die("<div style='margin: 50px auto; text-align: center; font-family: sans-serif;'><h2>Error: Akun Dokter Anda belum tertaut dengan biodata.</h2><p>Silakan hubungi Admin untuk memperbarui data akun Anda.</p><a href='login.php'>Kembali ke Login</a></div>");
    }
    $id_dokter = $d_data['id_dokter'];
    $where = "WHERE Pelayanan.id_dokter = '$id_dokter'";
} else if (isset($_SESSION['pasien'])) {
    $id_user = $_SESSION['id_user'];
    $p_query = mysqli_query($conn, "SELECT id_pasien FROM Pasien WHERE id_user='$id_user'");
    $p_data = mysqli_fetch_array($p_query);
    if (!$p_data) {
        die("<div style='margin: 50px auto; text-align: center; font-family: sans-serif;'><h2>Error: Akun Pasien Anda belum tertaut dengan biodata.</h2><p>Silakan hubungi Admin untuk memperbarui data akun Anda.</p><a href='login.php'>Kembali ke Login</a></div>");
    }
    $id_pasien = $p_data['id_pasien'];
    $where = "WHERE Pelayanan.id_pasien = '$id_pasien'";
}

$query = mysqli_query($conn, "
SELECT Pelayanan.*, Dokter.nama AS nama_dokter, Pasien.nama AS nama_pasien 
FROM Pelayanan
JOIN Dokter ON Pelayanan.id_dokter = Dokter.id_dokter
JOIN Pasien ON Pelayanan.id_pasien = Pasien.id_pasien
$where
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

        <div class="mb-3">
            <?php if (isset($_SESSION['admin'])) { ?>
                <a href="dashboard_admin.php" class="btn btn-secondary">Kembali</a>
                <a href="tambahpelayanan.php" class="btn btn-danger">Tambah Pelayanan (Offline)</a>
            <?php } else if (isset($_SESSION['dokter'])) { ?>
                <a href="dashboard_dokter.php" class="btn btn-secondary">Kembali</a>
            <?php } else if (isset($_SESSION['pasien'])) { ?>
                <a href="dashboard_pasien.php" class="btn btn-secondary">Kembali</a>
                <a href="booking.php" class="btn btn-danger">Booking Konsultasi (Online)</a>
            <?php } ?>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Dokter</th>
                <th>Pasien</th>
                <th>Tanggal Pelayanan</th>
                <th>Keluhan</th>
                <th>Diagnosis</th>
                <th>Tindakan</th>
                <th>Status</th>
                <th>Biaya</th>
                <th>Pembayaran</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            while ($d = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_dokter']; ?></td>
                    <td><?= $d['nama_pasien']; ?></td>
                    <td><?= $d['tanggal_pelayanan']; ?></td>
                    <td><?= $d['keluhan']; ?></td>
                    <td><?= $d['diagnosis']; ?></td>
                    <td><?= $d['tindakan']; ?></td>
                    <td><?= ucfirst($d['status']); ?></td>
                    <td>Rp <?= number_format(isset($d['biaya']) ? $d['biaya'] : 0, 0, ',', '.'); ?></td>
                    <td>
                        <?php if ((isset($d['status_pembayaran']) ? $d['status_pembayaran'] : 'belum') == 'lunas') { ?>
                            <span class="badge bg-success">Lunas</span>
                        <?php } else { ?>
                            <span class="badge bg-warning text-dark">Belum Lunas</span>
                        <?php } ?>
                    </td>
                    
                    <td>
                        <?php if (isset($_SESSION['admin'])) { ?>
                            <a href="editpelayanan.php?id=<?= $d['id_pelayanan']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="hapuspelayanan.php?id=<?= $d['id_pelayanan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        <?php } else if (isset($_SESSION['dokter'])) { ?>
                            <a href="editpelayanan.php?id=<?= $d['id_pelayanan']; ?>" class="btn btn-sm btn-primary">Proses</a>
                        <?php } else if (isset($_SESSION['pasien'])) { 
                            if ($d['status'] == 'selesai' && (isset($d['biaya']) ? $d['biaya'] : 0) > 0 && (isset($d['status_pembayaran']) ? $d['status_pembayaran'] : 'belum') == 'belum') { ?>
                                <a href="bayarpelayanan.php?id=<?= $d['id_pelayanan']; ?>" class="btn btn-sm btn-success">Bayar</a>
                            <?php } else if ((isset($d['status_pembayaran']) ? $d['status_pembayaran'] : 'belum') == 'lunas') { ?>
                                <span class="text-success fw-bold">✓ Selesai</span>
                            <?php } else { ?>
                                <span class="text-muted">-</span>
                            <?php } 
                        } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>