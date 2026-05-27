<?php

include 'koneksi.php';

$dokter = mysqli_query($conn, "SELECT * FROM Dokter");
$pasien = mysqli_query($conn, "SELECT * FROM Pasien");

if (isset($_POST['submit'])) {

    mysqli_query($conn, "INSERT INTO Pelayanan (id_pasien, id_dokter, tanggal_pelayanan, keluhan, diagnosis, tindakan, status) VALUES(
        '$_POST[pasien]',
        '$_POST[dokter]',
        '$_POST[tanggal_pelayanan]',
        '$_POST[keluhan]',
        '$_POST[diagnosis]',
        '$_POST[tindakan]',
        '$_POST[status]'
    )");

    header("Location:tampilanpelayanan.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pelayanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h2>Tambah Pelayanan</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Dokter</label>

                <select name="dokter" class="form-control">

                    <?php while ($d = mysqli_fetch_array($dokter)) { ?>

                        <option value="<?= $d['id_dokter']; ?>">
                            <?= $d['nama']; ?>
                        </option>

                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label>Pasien</label>

                <select name="pasien" class="form-control">

                    <?php while ($p = mysqli_fetch_array($pasien)) { ?>

                        <option value="<?= $p['id_pasien']; ?>">
                            <?= $p['nama']; ?>
                        </option>

                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal Pelayanan</label>
                <input type="date" name="tanggal_pelayanan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Keluhan</label>
                <textarea name="keluhan" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Diagnosis</label>
                <textarea name="diagnosis" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Tindakan</label>
                <textarea name="tindakan" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="menunggu">Menunggu</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-danger">Simpan</button>
            <a href="tampilanpelayanan.php" class="btn btn-secondary">Kembali</a>

        </form>

    </div>

</body>

</html>