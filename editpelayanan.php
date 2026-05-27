<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['dokter'])) {
    header("Location:login.php");
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM Pelayanan WHERE id_pelayanan='$id'");
$p = mysqli_fetch_array($query);

$dokter = mysqli_query($conn, "SELECT * FROM Dokter");
$pasien = mysqli_query($conn, "SELECT * FROM Pasien");

if (isset($_POST['submit'])) {
    if (isset($_SESSION['admin'])) {
        $biaya = isset($_POST['biaya']) ? $_POST['biaya'] : 0;
        mysqli_query($conn, "UPDATE Pelayanan SET 
            id_dokter='$_POST[dokter]',
            id_pasien='$_POST[pasien]',
            tanggal_pelayanan='$_POST[tanggal_pelayanan]',
            keluhan='$_POST[keluhan]',
            diagnosis='$_POST[diagnosis]',
            tindakan='$_POST[tindakan]',
            status='$_POST[status]',
            biaya='$biaya'
            WHERE id_pelayanan='$id'
        ");
    } else {
        // Dokter only updates diagnosis, tindakan, and status
        mysqli_query($conn, "UPDATE Pelayanan SET 
            diagnosis='$_POST[diagnosis]',
            tindakan='$_POST[tindakan]',
            status='$_POST[status]'
            WHERE id_pelayanan='$id'
        ");
    }
    header("Location:tampilanpelayanan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Proses / Edit Pelayanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2><?= isset($_SESSION['admin']) ? 'Edit' : 'Proses' ?> Pelayanan</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Dokter</label>
                <select name="dokter" class="form-control" <?= isset($_SESSION['admin']) ? 'required' : 'disabled' ?>>
                    <?php while ($d = mysqli_fetch_array($dokter)) { ?>
                        <option value="<?= $d['id_dokter'] ?>" <?= $p['id_dokter']==$d['id_dokter']?'selected':'' ?>><?= $d['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Pasien</label>
                <select name="pasien" class="form-control" <?= isset($_SESSION['admin']) ? 'required' : 'disabled' ?>>
                    <?php while ($ps = mysqli_fetch_array($pasien)) { ?>
                        <option value="<?= $ps['id_pasien'] ?>" <?= $p['id_pasien']==$ps['id_pasien']?'selected':'' ?>><?= $ps['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Pelayanan</label>
                <input type="date" name="tanggal_pelayanan" class="form-control" value="<?= $p['tanggal_pelayanan'] ?>" <?= isset($_SESSION['admin']) ? 'required' : 'readonly' ?>>
            </div>
            <div class="mb-3">
                <label>Keluhan</label>
                <textarea name="keluhan" class="form-control" <?= isset($_SESSION['admin']) ? '' : 'readonly' ?>><?= $p['keluhan'] ?></textarea>
            </div>
            
            <hr>
            <h4>Bagian Medis (Diisi Dokter)</h4>
            <div class="mb-3">
                <label>Diagnosis</label>
                <textarea name="diagnosis" class="form-control"><?= $p['diagnosis'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Tindakan</label>
                <textarea name="tindakan" class="form-control"><?= $p['tindakan'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Status Pelayanan</label>
                <select name="status" class="form-control" required>
                    <option value="menunggu" <?= $p['status']=='menunggu'?'selected':'' ?>>Menunggu / Belum Selesai</option>
                    <option value="selesai" <?= $p['status']=='selesai'?'selected':'' ?>>Selesai Ditangani</option>
                </select>
            </div>

            <?php if (isset($_SESSION['admin'])) { ?>
            <hr>
            <h4>Bagian Administrasi (Diisi Admin)</h4>
            <div class="mb-3">
                <label>Total Biaya (Rp)</label>
                <input type="number" name="biaya" class="form-control" value="<?= isset($p['biaya']) ? $p['biaya'] : 0 ?>" required>
                <small class="text-muted">Isi biaya jika status pelayanan sudah Selesai.</small>
            </div>
            <?php } ?>

            <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
            <a href="tampilanpelayanan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
