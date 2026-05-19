<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "
    SELECT * FROM dokter
    WHERE username='$username'
    AND password='$password'
    ");

    $cek = mysqli_num_rows($query);

    if($cek > 0){

        $_SESSION['dokter'] = true;

        header("Location:dashboard_dokter.php");

    }else{

        echo "
        <script>
            alert('Login Dokter Gagal');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Dokter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5" style="max-width:500px;">

<h2 class="text-center mb-4">
    Login Dokter
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
class="btn btn-primary w-100">

    Login

</button>

</form>

</div>

</body>
</html>