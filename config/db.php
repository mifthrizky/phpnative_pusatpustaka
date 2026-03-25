<?php

// Variabel konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$db = "db_pusatpustaka";

// Koneksi
$koneksi = mysqli_connect($host, $user, $password, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil";
}
