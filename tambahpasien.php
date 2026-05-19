<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {

    mysqli_query($conn, "INSERT INTO pasien VALUES(
        '',
        '$_POST[nama]',
        '$_POST[jk]',
        '$_POST[umur]',
        '$_POST[alamat]',
        '$_POST[keluhan]'
    )");

    header("Location:tampilanpasien.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pasien</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Tambah Pasien</h2>

        <form method="POST">

            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>

                <select name="jk" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Umur</label>
                <input type="number" name="umur" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label><?php

                                        include 'koneksi.php';

                                        if (isset($_POST['submit'])) {

                                            mysqli_query($conn, "INSERT INTO pasien VALUES(
        '',
        '$_POST[nama]',
        '$_POST[jk]',
        '$_POST[umur]',
        '$_POST[alamat]',
        '$_POST[keluhan]'
    )");

                                            header("Location:tampilanpasien.php");
                                        }

                                        ?>

                <!DOCTYPE html>
                <html>

                <head>
                    <title>Tambah Pasien</title>

                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

                    <link rel="stylesheet" href="style.css">
                </head>

                <body>

                    <div class="container mt-5">

                        <h2>Tambah Pasien</h2>

                        <form method="POST">

                            <div class="mb-3">
                                <label>Nama Pasien</label>
                                <input type="text" name="nama" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Jenis Kelamin</label>

                                <select name="jk" class="form-control">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Umur</label>
                                <input type="number" name="umur" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Keluhan</label>
                                <textarea name="keluhan" class="form-control"></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">
                                Simpan
                            </button>

                        </form>

                    </div>

                </body>

                </html>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Keluhan</label>
                <textarea name="keluhan" class="form-control"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>

</body>

</html>