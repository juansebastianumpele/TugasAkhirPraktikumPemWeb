<?php
include 'koneksi.php';

$username = 'admin';
$password_plain = 'admin123';
$password = md5($password_plain);
$role = 'admin';
$email = 'admin@rumah-sakit.com';

$pesan = "";

// Cek apakah admin sudah ada
$cek = mysqli_query($conn, "SELECT * FROM User WHERE username='$username' OR role='admin'");
if (mysqli_num_rows($cek) > 0) {
    $pesan = "<div class='alert alert-warning'>Akun admin sudah ada di database. Anda bisa langsung login.</div>";
} else {
    // Insert ke tabel User
    $query = "INSERT INTO User (username, password, role, email) VALUES ('$username', '$password', '$role', '$email')";
    
    if (mysqli_query($conn, $query)) {
        $pesan = "<div class='alert alert-success'>
                    Seeder berhasil! Akun admin telah ditambahkan ke database.<br><br>
                    <strong>Username :</strong> $username <br>
                    <strong>Password :</strong> $password_plain <br>
                    <strong>Role :</strong> $role <br>
                    <strong>Email :</strong> $email
                  </div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Terjadi kesalahan: " . mysqli_error($conn) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeder Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0 text-center">Database Seeder - Akun Admin</h4>
            </div>
            <div class="card-body">
                <?= $pesan ?>
                <div class="text-center mt-4">
                    <a href="login.php" class="btn btn-outline-dark">Kembali ke Halaman Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
