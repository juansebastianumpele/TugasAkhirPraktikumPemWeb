<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pasien'])) {
    header("Location:login.php");
}

$id_user = $_SESSION['id_user'];
$p_query = mysqli_query($conn, "SELECT id_pasien FROM Pasien WHERE id_user='$id_user'");
$p_data = mysqli_fetch_array($p_query);
if (!$p_data) {
    die("<div style='margin: 50px auto; text-align: center; font-family: sans-serif;'><h2>Error: Akun Anda belum tertaut dengan biodata.</h2><p>Silakan hubungi Admin untuk memperbarui data akun Anda.</p><a href='login.php'>Kembali ke Login</a></div>");
}
$id_pasien = $p_data['id_pasien'];

$dokter = mysqli_query($conn, "SELECT * FROM Dokter");

if (isset($_POST['submit'])) {
    $id_dokter = $_POST['dokter'];
    $tanggal = $_POST['tanggal_pelayanan'];
    $keluhan = $_POST['keluhan'];
    $status = 'menunggu';

    mysqli_query($conn, "INSERT INTO Pelayanan (id_pasien, id_dokter, tanggal_pelayanan, keluhan, status) VALUES ('$id_pasien', '$id_dokter', '$tanggal', '$keluhan', '$status')");
    
    header("Location:tampilanpelayanan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Konsultasi Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Booking Konsultasi Online</h2>
        <div class="alert alert-info">
            Silakan pilih dokter dan jadwal untuk melakukan booking pelayanan kesehatan Anda secara online.
        </div>
        <form method="POST">
            <div class="mb-3">
                <label>Pilih Dokter</label>
                <select name="dokter" class="form-control" required>
                    <?php while ($d = mysqli_fetch_array($dokter)) { ?>
                        <option value="<?= $d['id_dokter'] ?>"><?= $d['nama'] ?> - <?= $d['spesialisasi'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Pelayanan</label>
                <input type="date" name="tanggal_pelayanan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Keluhan (Jelaskan secara singkat)</label>
                <textarea name="keluhan" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Daftar Konsultasi</button>
            <a href="tampilanpelayanan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
