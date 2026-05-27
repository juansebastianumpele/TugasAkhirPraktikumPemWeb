<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Dashboard Admin</h1>
            <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-menu bg-dokter">
                    <h3>Dokter</h3>
                    <p>Kelola data dokter rumah sakit</p>
                    <a href="tampilandokter.php" class="btn btn-light mt-3">Lihat Data</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-menu bg-pasien">
                    <h3>Pasien</h3>
                    <p>Kelola data pasien rumah sakit</p>
                    <a href="tampilanpasien.php" class="btn btn-light mt-3">Lihat Data</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-menu bg-pelayanan">
                    <h3>Pelayanan</h3>
                    <p>Kelola pelayanan pasien</p>
                    <a href="tampilanpelayanan.php" class="btn btn-light mt-3">Lihat Data</a>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
