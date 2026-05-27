<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM Pasien WHERE id_pasien='$id'");
$p = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    mysqli_query($conn, "UPDATE Pasien SET 
        nama='$_POST[nama]',
        tanggal_lahir='$_POST[tanggal_lahir]',
        jenis_kelamin='$_POST[jenis_kelamin]',
        alamat='$_POST[alamat]',
        no_telepon='$_POST[no_telepon]'
        WHERE id_pasien='$id'
    ");
    header("Location:tampilanpasien.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Pasien</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="nama" class="form-control" value="<?= $p['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="<?= $p['tanggal_lahir'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L" <?= $p['jenis_kelamin']=='L'?'selected':'' ?>>Laki-laki</option>
                    <option value="P" <?= $p['jenis_kelamin']=='P'?'selected':'' ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"><?= $p['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>No Telp</label>
                <input type="text" name="no_telepon" class="form-control" value="<?= $p['no_telepon'] ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Update</button>
            <a href="tampilanpasien.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
