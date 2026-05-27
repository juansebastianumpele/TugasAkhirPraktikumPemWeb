<?php
include 'koneksi.php';
$id = $_GET['id'];
$p = mysqli_fetch_array(mysqli_query($conn, "SELECT id_user FROM Pasien WHERE id_pasien='$id'"));
if ($p && $p['id_user']) {
    mysqli_query($conn, "DELETE FROM User WHERE id_user='".$p['id_user']."'");
} else {
    mysqli_query($conn, "DELETE FROM Pasien WHERE id_pasien='$id'");
}
header("Location:tampilanpasien.php");
?>
