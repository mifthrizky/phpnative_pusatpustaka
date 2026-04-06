<?php

// Variabel konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$db = "db_pusatpustaka";

$charset = 'utf8mb4'; // Set karakter encoding untuk koneksi

// Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Konfigurasi
$option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Aktifkan mode error exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set mode fetch default ke associative array
    PDO::ATTR_EMULATE_PREPARES => false, // Nonaktifkan emulasi prepared statements untuk keamanan
];

try {
    $koneksi = new PDO($dsn, $user, $password, $option);
    // echo "Koneksi Database berhasil";
} catch (PDOException $e) {
    die("Koneksi Database gagal: " . $e->getMessage());
}
