<?php
session_start();
require_once "../../config/db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Metode request tidak diizinkan!");
}

// Logika Delete
if (isset($_POST['hapus'])) {
    $id_kategori = $_POST['id_kategori'];

    try {
        $stmt = $koneksi->prepare("DELETE FROM kategori WHERE id_kategori = :id");
        $stmt->bindParam(':id', $id_kategori, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['flash_msg'] = "Data kategori berhasil dihapus";
        header("Location: ../kategori.php");
        exit();
    } catch (\PDOException $e) {
        die("Fatal error hapus: " . $e->getMessage());
    }
}

// Logika Simpan
if (isset($_POST['simpan'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = trim($_POST['nama_kategori']);

    if (empty($nama_kategori)) {
        $_SESSION['flash_msg'] = "Nama kategori tidak boleh kosong";
        header("Location: ../kategori.php");
        exit();
    }

    try {
        if ($id_kategori == "") {
            $stmt = $koneksi->prepare("INSERT INTO kategori (nama_kategori) VALUES (:nama)");
            $stmt->bindParam(':nama', $nama_kategori, PDO::PARAM_STR);
        } else {
            $stmt = $koneksi->prepare("UPDATE kategori SET nama_kategori = :nama WHERE id_kategori = :id");
            $stmt->bindParam(':nama', $nama_kategori, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id_kategori, PDO::PARAM_INT);
        }
        $stmt->execute();

        $_SESSION['flash_msg'] = "Data kategori berhasil disimpan";
        header("Location: ../kategori.php");
        exit();
    } catch (\PDOException $e) {
        die("Fatal error simpan: " . $e->getMessage());
    }
}
