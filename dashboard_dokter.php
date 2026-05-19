<?php
session_start();

if (!isset($_SESSION['dokter'])) {
    header("Location:login_dokter.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Dokter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <h2>Dashboard Dokter</h2>

        <a href="tampilanpelayanan.php"
            class="btn btn-primary">

            Lihat Data Pelayanan

        </a>

        <a href="logout.php"
            class="btn btn-dark">

            Logout

        </a>

    </div>

</body>

</html>