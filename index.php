    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pusat Pustaka</title>
        <!-- Bootstrap 5 -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="assets/style_index.css">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand fw-bold text-success">
                    <i class="fa-solid fa-swatchbook"></i>
                    PusatPustaka
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a href="#beranda" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="#fitur" class="nav-link">Fitur</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a href="login.php" class="btn btn-success px-4 py-2 rounded-pill">Login Panel</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="beranda" class="hero-section">
            <div class="hero-overlay"></div>

            <div class="container hero-content-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-7 hero-content">
                        <h1 class="display-3 fw-bold mb-4">Selamat Datang di <br> <span style="color: var(--premium-gold);">Pusat Pustaka</span></h1>
                        <p class="lead mb-5 opacity-75">Kelola Buku Tanpa Ragu, Pantau Laporan Jadi Seru.</p>
                        <div class="d-flex gap-3">
                            <a href="login.php" class="btn btn-premium">Mulai Sekarang</a>
                            <a href="#fitur" class="btn btn-outline-premium">Pelajari Fitur</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Fitur -->
        <section class="py-5 bg-light" id="fitur">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Fitur Utama</h2>
                    <p class="text-muted">
                        Pusat Pustaka menawarkan berbagai fitur untuk memudahkan pengelolaan perpustakaan Anda.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="feature-card text-center">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-book"></i>
                            </div>
                            <h4>Katalog Buku</h4>
                            <p class="text-muted">
                                Kelola koleksi buku Anda dengan mudah, termasuk penambahan, pengeditan, dan penghapusan data buku.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card text-center">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-exchange"></i>
                            </div>
                            <h4>Peminjaman Buku</h4>
                            <p class="text-muted">
                                Kelola proses peminjaman dan pengembalian buku dengan mudah, termasuk penjadwalan dan notifikasi.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card text-center">
                            <div class="feature-icon mx-auto">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <h4>Laporan Realtime</h4>
                            <p class="text-muted">
                                Akses laporan terkini tentang aktivitas perpustakaan Anda, termasuk statistik peminjaman dan pengembalian.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Footer -->
        <footer class="bg-dark text-white text-center py-4">
            <div class="container">
                <p class="mb-0">&copy; 2026 Pusat Pustaka. All rights reserved.</p>
            </div>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>