<?php

include 'koneksi.php';

$dokter = mysqli_query($conn, "SELECT * FROM dokter");
$pasien = mysqli_query($conn, "SELECT * FROM pasien");

if (isset($_POST['submit'])) {

    mysqli_query($conn, "INSERT INTO pelayanan VALUES(
        '',
        '$_POST[dokter]',
        '$_POST[pasien]',
        '$_POST[tanggal]',
        '$_POST[diagnosa]',
        '$_POST[tindakan]',
        '$_POST[biaya]'
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
                            <?= $d['nama_dokter']; ?>
                        </option>

                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label>Pasien</label>

                <select name="pasien" class="form-control">

                    <?php while ($p = mysqli_fetch_array($pasien)) { ?>

                        <option value="<?= $p['id_pasien']; ?>">
                            <?= $p['nama_pasien']; ?>
                        </option>

                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control">
            </div>

            <div class="mb-3">
                <label>Diagnosa</label>
                <textarea name="diagnosa" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Tindakan</label>
                <textarea name="tindakan" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Biaya</label>
                <input type="number" name="biaya" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-danger">
                Simpan
            </button>

        </form>

    </div>

</body>

</html>