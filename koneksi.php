<?php

$conn = mysqli_connect("localhost", "root", "", "db_rumah_sakit");

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
