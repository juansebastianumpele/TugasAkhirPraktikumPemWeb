<?php
include 'koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($conn, "SELECT id_user FROM Dokter WHERE id_dokter='$id'"));
if ($d && $d['id_user']) {
    mysqli_query($conn, "DELETE FROM User WHERE id_user='".$d['id_user']."'");
} else {
    mysqli_query($conn, "DELETE FROM Dokter WHERE id_dokter='$id'");
}
header("Location:tampilandokter.php");
?>
