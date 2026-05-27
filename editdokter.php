<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM Dokter WHERE id_dokter='$id'");
$d = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    mysqli_query($conn, "UPDATE Dokter SET 
        nama='$_POST[nama]',
        spesialisasi='$_POST[spesialisasi]',
        no_telepon='$_POST[no_telepon]'
        WHERE id_dokter='$id'
    ");
    header("Location:tampilandokter.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Dokter</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nama Dokter</label>
                <input type="text" name="nama" class="form-control" value="<?= $d['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Spesialisasi</label>
                <input type="text" name="spesialisasi" class="form-control" value="<?= $d['spesialisasi'] ?>" required>
            </div>
            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="no_telepon" class="form-control" value="<?= $d['no_telepon'] ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="tampilandokter.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
