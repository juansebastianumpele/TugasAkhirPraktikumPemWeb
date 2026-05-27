<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM Pelayanan WHERE id_pelayanan='$id'");
header("Location:tampilanpelayanan.php");
?>
