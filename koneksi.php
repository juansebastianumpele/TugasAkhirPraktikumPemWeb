<?php

$conn = mysqli_connect("localhost", "root", "", "rumah_sakit_db");

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
