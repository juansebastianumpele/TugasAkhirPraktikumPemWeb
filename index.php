<!DOCTYPE html>
<html>

<head>
    <title>Rumah Sakit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>
                Sistem Informasi Rumah Sakit
            </h1>

            <div>

                <a href="login.php" class="btn btn-dark">
                    Login Admin
                </a>

                <a href="login_dokter.php" class="btn btn-primary">
                    Login Dokter
                </a>

                <a href="login_pasien.php" class="btn btn-success">
                    Login Pasien
                </a>

            </div>

        </div>

        <div class="row g-4">

            <div class="col-md-3">

                <div class="card-menu bg-dokter">

                    <h3>Dokter</h3>

                    <p>
                        Kelola data dokter rumah sakit
                    </p>

                    <a href="tampilandokter.php"
                        class="btn btn-light mt-3">

                        Lihat Data

                    </a>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card-menu bg-pasien">

                    <h3>Pasien</h3>

                    <p>
                        Kelola data pasien rumah sakit
                    </p>

                    <a href="tampilanpasien.php"
                        class="btn btn-light mt-3">

                        Lihat Data

                    </a>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card-menu bg-pelayanan">

                    <h3>Pelayanan</h3>

                    <p>
                        Kelola pelayanan pasien
                    </p>

                    <a href="tampilanpelayanan.php"
                        class="btn btn-light mt-3">

                        Lihat Data

                    </a>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card-menu bg-warning">

                    <h3>Jadwal</h3>

                    <p>
                        Jadwal dan jam pelayanan dokter
                    </p>

                    <a href="tampiljadwal.php"
                        class="btn btn-light mt-3">

                        Lihat Jadwal

                    </a>

                </div>

            </div>

        </div>

        <div class="mt-5">

            <div class="alert alert-info">

                <h5>Akun Demo</h5>

                <hr>

                <p>
                    <b>Admin</b><br>
                    Username : admin<br>
                    Password : admin123
                </p>

                <p>
                    <b>Dokter</b><br>
                    Username : dokter1<br>
                    Password : 123
                </p>

                <p>
                    <b>Pasien</b><br>
                    Username : pasien1<br>
                    Password : 123
                </p>

            </div>

        </div>

    </div>

</body>

</html>