<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pasien'])) {
    header("Location:login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location:tampilanpelayanan.php");
    exit();
}

$id = $_GET['id'];
$query = mysqli_query($conn, "
    SELECT Pelayanan.*, Dokter.nama AS nama_dokter 
    FROM Pelayanan 
    JOIN Dokter ON Pelayanan.id_dokter = Dokter.id_dokter 
    WHERE id_pelayanan='$id'
");

$p = mysqli_fetch_array($query);

$alert_script = "";
$hide_content = false;

// Validasi
if (!$p || $p['status'] != 'selesai' || $p['biaya'] <= 0 || $p['status_pembayaran'] == 'lunas') {
    $hide_content = true;
    $alert_script = "
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak',
            text: 'Tagihan sudah lunas atau tidak valid.',
            confirmButtonColor: '#198754'
        }).then(() => {
            window.location='tampilanpelayanan.php';
        });
    ";
} else if (isset($_POST['bayar'])) {
    $update = mysqli_query($conn, "UPDATE Pelayanan SET status_pembayaran='lunas' WHERE id_pelayanan='$id'");
    if ($update) {
        $hide_content = true;
        $alert_script = "
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Pembayaran Anda telah diterima. Terima kasih.',
                confirmButtonColor: '#198754'
            }).then(() => {
                window.location='tampilanpelayanan.php';
            });
        ";
    } else {
        $alert_script = "
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal memproses pembayaran.',
                confirmButtonColor: '#dc3545'
            });
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Pelayanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0 text-center">Konfirmasi Pembayaran</h4>
            </div>
            <div class="card-body">
                <?php if ($hide_content): ?>
                    <div class="text-center my-4">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Memproses...</span>
                        </div>
                        <p class="mt-2 text-muted">Memproses permintaan Anda...</p>
                    </div>
                <?php else: ?>
                <p>Silakan tinjau rincian tagihan Anda di bawah ini:</p>
                <table class="table table-borderless">
                    <tr>
                        <td width="35%"><strong>Tanggal Pelayanan</strong></td>
                        <td width="5%">:</td>
                        <td><?= $p['tanggal_pelayanan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Dokter</strong></td>
                        <td>:</td>
                        <td><?= $p['nama_dokter'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Keluhan</strong></td>
                        <td>:</td>
                        <td><?= $p['keluhan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Diagnosis</strong></td>
                        <td>:</td>
                        <td><?= $p['diagnosis'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tindakan</strong></td>
                        <td>:</td>
                        <td><?= $p['tindakan'] ?></td>
                    </tr>
                    <tr class="table-active">
                        <td><strong>Total Tagihan</strong></td>
                        <td>:</td>
                        <td class="fs-4 text-danger fw-bold">Rp <?= number_format($p['biaya'], 0, ',', '.') ?></td>
                    </tr>
                </table>

                <hr>

                <form method="POST">
                    <div class="d-grid gap-2">
                        <button type="submit" name="bayar" class="btn btn-success btn-lg">Bayar Sekarang</button>
                        <a href="tampilanpelayanan.php" class="btn btn-outline-secondary">Batal / Kembali</a>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (!empty($alert_script)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?= $alert_script ?>
        });
    </script>
    <?php endif; ?>
</body>
</html>
