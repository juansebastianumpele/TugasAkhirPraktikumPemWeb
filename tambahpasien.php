<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5('123');

    // Insert to User table
    $query_user = mysqli_query($conn, "INSERT INTO User (username, password, role, email) VALUES ('$username', '$password', 'pasien', '$email')");

    if ($query_user) {
        $id_user = mysqli_insert_id($conn);
        mysqli_query($conn, "INSERT INTO Pasien (id_user, nama, tanggal_lahir, jenis_kelamin, alamat, no_telepon) VALUES(
            '$id_user',
            '$_POST[nama]',
            '$_POST[tanggal_lahir]',
            '$_POST[jenis_kelamin]',
            '$_POST[alamat]',
            '$_POST[no_telepon]'
        )");
        header("Location:tampilanpasien.php");
    } else {
        echo "<script>alert('Gagal menyimpan! Username atau Email mungkin sudah terdaftar.');</script>";
    }
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
            <h4>Data Akun Login</h4>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <p class="text-muted">Password default untuk akun ini adalah: <b>123</b></p>
            
            <hr>
            <h4>Data Profil Pasien</h4>
            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="no_telepon" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            <a href="tampilanpasien.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>