<?php
require_once '../layouts/header.php';

// Ambil data untuk statistik
$jml_buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku"))['total'];
$jml_kategori = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kategori"))['total'];
$jml_peminjaman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman"))['total'];
$jml_pengguna = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total from pengguna"))['total'];
?>

<div class="row">
    <!-- Total Buku -->
    <div class="col-md-3 mb-4">
        <card class=" card card-custom bg-white p-3">
            <div class="d-flex align-items-center">
                <div class="feature-icon text-success mb-0 me-3">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <div class="text-muted mb-0">Total Buku</div>
                    <div class="h4 mb-0"><?= $jml_buku ?></div>
                </div>
            </div>
        </card>
    </div>
    <!-- Total Kategori -->
    <div class="col-md-3 mb-4">
        <card class=" card card-custom bg-white p-3">
            <div class="d-flex align-items-center">
                <div class="feature-icon text-primary mb-0 me-3">
                    <i class="fas fa-list"></i>
                </div>
                <div>
                    <div class="text-muted mb-0">Total Kategori</div>
                    <div class="h4 mb-0"><?= $jml_kategori ?></div>
                </div>
            </div>
        </card>
    </div>
    <!-- Total Peminjaman -->
    <div class="col-md-3 mb-4">
        <card class=" card card-custom bg-white p-3">
            <div class="d-flex align-items-center">
                <div class="feature-icon text-warning mb-0 me-3">
                    <i class="fas fa-book-open"></i>
                </div>
                <div>
                    <div class="text-muted mb-0">Total Peminjaman</div>
                    <div class="h4 mb-0"><?= $jml_peminjaman ?></div>
                </div>
            </div>
        </card>
    </div>
    <!-- Total Pengguna -->
    <div class="col-md-3 mb-4">
        <card class=" card card-custom bg-white p-3">
            <div class="d-flex align-items-center">
                <div class="feature-icon text-info mb-0 me-3">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <div class="text-muted mb-0">Total Pengguna</div>
                    <div class="h4 mb-0"><?= $jml_pengguna ?></div>
                </div>
            </div>
        </card>
    </div>
</div>

<?php
require_once '../layouts/footer.php';
?>