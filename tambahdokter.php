<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {

    mysqli_query($conn, "INSERT INTO dokter VALUES(
        '',
        '$_POST[nama]',
        '$_POST[spesialis]',
        '$_POST[alamat]',
        '$_POST[telp]'
    )");

    header("Location:tampilandokter.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Dokter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h2>Tambah Dokter</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Nama Dokter</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="mb-3">
                <label>Spesialis</label>
                <input type="text" name="spesialis" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="telp" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
                Simpan
            </button>

        </form>

    </div>

</body>

</html>