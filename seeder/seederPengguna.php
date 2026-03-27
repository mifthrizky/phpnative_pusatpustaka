<?php
// BLOKIR AKSES BROWSER
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    die("Akses Ditolak: Script ini hanya dapat dieksekusi melalui antarmuka Command Line (CLI).\n");
}

// Gunakan __DIR__ untuk mengunci path relatif terhadap lokasi file seeder
require_once __DIR__ . '/../config/db.php';

$pengguna_awal = [
    [
        'nama_lengkap' => 'Administrator Utama',
        'username' => 'admin',
        'password' => 'admin123', // Akan di-hash
        'role' => 'admin'
    ],
    [
        'nama_lengkap' => 'Petugas Perpustakaan 1',
        'username' => 'petugas1',
        'password' => 'petugas123', // Akan di-hash
        'role' => 'petugas'
    ]
];

// ANSI Color Codes untuk Terminal
$warna_reset  = "\033[0m";
$warna_hijau  = "\033[32m";
$warna_kuning = "\033[33m";
$warna_merah  = "\033[31m";
$warna_cyan   = "\033[36m";

echo "\n{$warna_cyan}=== Memulai Proses Seeding Database ==={$warna_reset}\n\n";

foreach ($pengguna_awal as $user) {
    // Pengecekan Duplikasi
    $check_query = "SELECT id_pengguna FROM pengguna WHERE username = ?";
    $stmt_check = $koneksi->prepare($check_query);
    $stmt_check->bind_param("s", $user['username']);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo "{$warna_kuning}[LEWATI]{$warna_reset} Username '{$user['username']}' sudah ada di database.\n";
        continue;
    }

    // Hashing Password
    $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

    // Eksekusi Insert
    $insert_query = "INSERT INTO pengguna (nama_lengkap, username, password, role) VALUES (?, ?, ?, ?)";
    $stmt_insert = $koneksi->prepare($insert_query);
    $stmt_insert->bind_param("ssss", $user['nama_lengkap'], $user['username'], $hashed_password, $user['role']);

    if ($stmt_insert->execute()) {
        echo "{$warna_hijau}[SUKSES]{$warna_reset} Pengguna '{$user['username']}' ({$user['role']}) berhasil ditambahkan.\n";
    } else {
        echo "{$warna_merah}[GAGAL]{$warna_reset} Pengguna '{$user['username']}' gagal ditambahkan. Error: " . $stmt_insert->error . "\n";
    }
}

echo "\n{$warna_cyan}=== Seeding Selesai ==={$warna_reset}\n\n";
