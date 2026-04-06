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

        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_msg'] = 'Data kategori berhasil dihapus';
        header("Location: ../kategori.php");
        exit();
    } catch (\PDOException $e) {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_msg'] = "Gagal menghapus: " . $e->getMessage();
        header("Location: ../kategori.php");
        exit();
    }
}

// Logika Simpan
if (isset($_POST['simpan'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = trim($_POST['nama_kategori']);

    if (empty($nama_kategori)) {
        $_SESSION['alert_type'] = 'warning';
        $_SESSION['alert_msg'] = 'Nama kategori tidak boleh kosong';
        header("Location: ../kategori.php");
        exit();
    }

    try {
        if ($id_kategori == "") {
            // Check for duplicate when adding
            $check = $koneksi->prepare("SELECT COUNT(*) as count FROM kategori WHERE nama_kategori = :nama");
            $check->bindParam(':nama', $nama_kategori, PDO::PARAM_STR);
            $check->execute();
            $result = $check->fetch();

            if ($result['count'] > 0) {
                $_SESSION['alert_type'] = 'error';
                $_SESSION['alert_msg'] = 'Nama kategori sudah ada';
                header("Location: ../kategori.php");
                exit();
            }

            $stmt = $koneksi->prepare("INSERT INTO kategori (nama_kategori) VALUES (:nama)");
            $stmt->bindParam(':nama', $nama_kategori, PDO::PARAM_STR);
            $stmt->execute();
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_msg'] = 'Data kategori berhasil ditambahkan';
        } else {
            // Check for duplicate when updating (exclude current id)
            $check = $koneksi->prepare("SELECT COUNT(*) as count FROM kategori WHERE nama_kategori = :nama AND id_kategori != :id");
            $check->bindParam(':nama', $nama_kategori, PDO::PARAM_STR);
            $check->bindParam(':id', $id_kategori, PDO::PARAM_INT);
            $check->execute();
            $result = $check->fetch();

            if ($result['count'] > 0) {
                $_SESSION['alert_type'] = 'error';
                $_SESSION['alert_msg'] = 'Nama kategori sudah ada';
                header("Location: ../kategori.php");
                exit();
            }

            $stmt = $koneksi->prepare("UPDATE kategori SET nama_kategori = :nama WHERE id_kategori = :id");
            $stmt->bindParam(':nama', $nama_kategori, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id_kategori, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_msg'] = 'Data kategori berhasil diperbarui';
        }

        header("Location: ../kategori.php");
        exit();
    } catch (\PDOException $e) {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_msg'] = "Gagal menyimpan: " . $e->getMessage();
        header("Location: ../kategori.php");
        exit();
    }
}
