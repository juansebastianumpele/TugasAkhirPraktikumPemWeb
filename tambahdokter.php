<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5('123');

    // Insert to User table
    $query_user = mysqli_query($conn, "INSERT INTO User (username, password, role, email) VALUES ('$username', '$password', 'dokter', '$email')");

    if ($query_user) {
        $id_user = mysqli_insert_id($conn);
        // Insert to Dokter table
        mysqli_query($conn, "INSERT INTO Dokter (id_user, nama, spesialisasi, no_telepon) VALUES(
            '$id_user',
            '$_POST[nama]',
            '$_POST[spesialisasi]',
            '$_POST[no_telepon]'
        )");
        header("Location:tampilandokter.php");
    } else {
        echo "<script>alert('Gagal menyimpan! Username atau Email mungkin sudah terdaftar.');</script>";
    }
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
            <h4>Data Profil Dokter</h4>
            <div class="mb-3">
                <label>Nama Dokter</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Spesialisasi</label>
                <input type="text" name="spesialisasi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="no_telepon" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="tampilandokter.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>