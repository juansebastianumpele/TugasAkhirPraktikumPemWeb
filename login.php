<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "
    SELECT * FROM User
    WHERE username='$username'
    AND password='$password'
    ");

    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);
        
        session_unset(); // Bersihkan session lama agar role tidak bertumpuk
        
        if ($data['role'] == 'admin') {
            $_SESSION['admin'] = true;
            $_SESSION['id_user'] = $data['id_user'];
            header("Location:dashboard_admin.php");
        } else if ($data['role'] == 'dokter') {
            $_SESSION['dokter'] = true;
            $_SESSION['id_user'] = $data['id_user'];
            header("Location:dashboard_dokter.php");
        } else if ($data['role'] == 'pasien') {
            $_SESSION['pasien'] = true;
            $_SESSION['id_user'] = $data['id_user'];
            header("Location:dashboard_pasien.php");
        }

    } else {

        echo "
        <script>
            alert('Login gagal. Username atau password salah.');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container mt-5" style="max-width:500px;">

        <h2 class="text-center mb-4">
            Login
        </h2>

        <form method="POST">

            <div class="mb-3">
                <label>Username</label>

                <input type="text"
                    name="username"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>

                <input type="password"
                    name="password"
                    class="form-control">
            </div>

            <button type="submit"
                name="login"
                class="btn btn-dark w-100 mb-2">
                Login
            </button>
            <a href="index.php" class="btn btn-outline-secondary w-100">Kembali ke Beranda</a>

        </form>

    </div>

</body>

</html>