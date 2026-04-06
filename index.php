    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pusat Pustaka - Sistem Manajemen Perpustakaan Modern</title>
        <!-- Bootstrap 5 -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Barlow+Semi+Condensed:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <!-- AOS Library for animations -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" href="assets/style_index.css">
    </head>

    <body>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-premium">
            <div class="container-fluid">
                <a href="#" class="navbar-brand fw-bold fs-4">
                    <div class="brand-icon">
                        <i class="fa-solid fa-swatchbook"></i>
                    </div>
                    Pusat Pustaka
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center gap-2">
                        <li class="nav-item">
                            <a href="#hero" class="nav-link smooth-scroll">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="#fitur" class="nav-link smooth-scroll">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a href="#bagaimana" class="nav-link smooth-scroll">Cara Kerja</a>
                        </li>
                        <li class="nav-item">
                            <a href="#stats" class="nav-link smooth-scroll">Statistik</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a href="./auth/login.php" class="btn btn-cta">Login Panel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section with Animation -->
        <section id="hero" class="hero-section">
            <div class="hero-gradient"></div>
            <div class="floating-shapes">
                <!-- <div class="shape shape-1"></div> -->
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
            </div>

            <div class="container-fluid hero-content-wrapper">
                <div class="row align-items-center gx-5 py-5">
                    <div class="col-lg-6 py-5" data-aos="fade-right" data-aos-duration="1000">
                        <div class="hero-text-content">
                            <span class="badge badge-premium mb-3">
                                Solusi Manajemen Perpustakaan
                            </span>
                            <h1 class="hero-title">Revolusi Pengelolaan Perpustakaan Anda</h1>
                            <p class="hero-subtitle">Solusi intelligent untuk manajemen koleksi buku, peminjaman, dan laporan real-time. Tingkatkan efisiensi perpustakaan Anda hingga 300%.</p>

                            <div class="cta-buttons">
                                <a href="./auth/login.php" class="btn btn-hero-primary">
                                    <i class="fas fa-rocket"></i> Mulai Gratis Sekarang
                                </a>
                                <a href="#fitur" class="btn btn-hero-secondary">
                                    <i class="fas fa-play-circle"></i> Lihat Demo
                                </a>
                            </div>

                            <div class="hero-stats">
                                <div class="stat-item">
                                    <span class="stat-number">10K+</span>
                                    <span class="stat-label">Pengguna Aktif</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">50M+</span>
                                    <span class="stat-label">Buku Terkelola</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">99.9%</span>
                                    <span class="stat-label">Uptime</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="hero-animation">
                            <div class="book-stack">
                                <div class="book book-1"></div>
                                <div class="book book-2"></div>
                                <div class="book book-3"></div>
                                <div class="book book-4"></div>
                            </div>
                            <div class="floating-icons">
                                <div class="icon-float icon-1"><i class="fas fa-book"></i></div>
                                <div class="icon-float icon-2"><i class="fas fa-chart-line"></i></div>
                                <div class="icon-float icon-3"><i class="fas fa-users"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="fitur" class="features-section">
            <div class="container-lg py-5">
                <div class="section-header" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="section-title">Fitur-Fitur Unggulan</h2>
                    <p class="section-subtitle">Semua yang Anda butuhkan untuk mengelola perpustakaan</p>
                    <div class="title-underline"></div>
                </div>

                <div class="row g-4 py-5">
                    <!-- Feature 1 -->
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-card premium-card">
                            <div class="feature-icon-wrapper gradient-1">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Katalog Buku Cerdas</h3>
                                <p>Organisir koleksi buku dengan sistem kategorisasi otomatis, pencarian semantik, dan manajemen stok real-time.</p>
                                <a href="#" class="feature-link">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="feature-card premium-card">
                            <div class="feature-icon-wrapper gradient-2">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Manajemen Peminjaman</h3>
                                <p>Proses peminjaman & pengembalian otomatis, reminder notifikasi, dan tracking denda real-time untuk member.</p>
                                <a href="#" class="feature-link">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="feature-card premium-card">
                            <div class="feature-icon-wrapper gradient-3">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Analytics & Laporan</h3>
                                <p>Dashboard visual dengan grafik interaktif, laporan komprehensif, dan insights berbasis AI untuk pengambilan keputusan.</p>
                                <a href="#" class="feature-link">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-card premium-card">
                            <div class="feature-icon-wrapper gradient-4">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Keamanan Tingkat Enterprise</h3>
                                <p>Enkripsi end-to-end, backup otomatis, kontrol akses role-based, dan log audit lengkap untuk keamanan data.</p>
                                <a href="#" class="feature-link">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="feature-card premium-card">
                            <div class="feature-icon-wrapper gradient-5">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Multi-Platform</h3>
                                <p>Akses dari desktop, tablet, atau smartphone dengan sinkronisasi real-time dan offline mode untuk fleksibilitas maksimal.</p>
                                <a href="#" class="feature-link">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="feature-card premium-card">
                            <div class="feature-icon-wrapper gradient-6">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="feature-content">
                                <h3>Integrasi Mudah</h3>
                                <p>API terbuka, integrasi dengan sistem populer, plugin extensible, dan kustomisasi tanpa batas sesuai kebutuhan.</p>
                                <a href="#" class="feature-link">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="bagaimana" class="how-it-works-section">
            <div class="container-lg py-5">
                <div class="section-header" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="section-title">Bagaimana Cara Kerjanya</h2>
                    <p class="section-subtitle">Tiga langkah mudah untuk memulai perjalanan digital perpustakaan Anda</p>
                    <div class="title-underline"></div>
                </div>

                <div class="row align-items-center g-5 py-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="steps-container">
                            <div class="step-item active">
                                <div class="step-number">01</div>
                                <div class="step-info">
                                    <h3>Daftar & Setup</h3>
                                    <p>Buat akun dalam hitungan menit, pilih plan yang sesuai, dan atur preferensi perpustakaan Anda.</p>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">02</div>
                                <div class="step-info">
                                    <h3>Import Koleksi</h3>
                                    <p>Impor data buku Anda dari file atau input manual. Sistem kami mendukung berbagai format file.</p>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">03</div>
                                <div class="step-info">
                                    <h3>Mulai Operasional</h3>
                                    <p>Akses dashboard lengkap, kelola member, terima peminjaman, dan pantau laporan real-time.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="steps-visual">
                            <div class="step-visual-item">
                                <div class="visual-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                            <div class="step-arrow"><i class="fas fa-arrow-down"></i></div>
                            <div class="step-visual-item">
                                <div class="visual-icon">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </div>
                            <div class="step-arrow"><i class="fas fa-arrow-down"></i></div>
                            <div class="step-visual-item">
                                <div class="visual-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section id="stats" class="stats-section">
            <div class="stats-background"></div>
            <div class="container-lg py-5 position-relative">
                <div class="section-header-light" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="section-title-light">Dipercaya oleh Ribuan Perpustakaan</h2>
                    <div class="title-underline-light"></div>
                </div>

                <div class="row g-4 py-5">
                    <div class="col-md-6 col-lg-3" data-aos="flip-up" data-aos-delay="100">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-number">2,500+</div>
                            <div class="stat-label">Perpustakaan</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="flip-up" data-aos-delay="200">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-number">500K+</div>
                            <div class="stat-label">Member Aktif</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="flip-up" data-aos-delay="300">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="stat-number">100M+</div>
                            <div class="stat-label">Buku Terkelola</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="flip-up" data-aos-delay="400">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Kepuasan Pelanggan</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-gradient"></div>
            <div class="container-lg py-5 position-relative" data-aos="fade-up" data-aos-duration="1000">
                <div class="cta-content text-center">
                    <h2>Siap Mentransformasi Perpustakaan Anda?</h2>
                    <p>Bergabunglah dengan ribuan perpustakaan yang telah meningkatkan efisiensi operasional mereka dengan Pusat Pustaka.</p>
                    <div class="cta-buttons-group">
                        <a href="./auth/login.php" class="btn btn-cta-large">Login Sekarang</a>
                        <a href="#" class="btn btn-cta-outline">Hubungi Tim Kami</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer-section">
            <div class="container-lg py-5">
                <div class="row g-5 mb-5">
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="footer-brand">
                            <h5>Pusat Pustaka</h5>
                            <p class="fs-6">Solusi manajemen perpustakaan modern untuk era digital.</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <h6 class="text-white">Produk</h6>
                        <ul class="footer-links">
                            <li><a href="#">Fitur</a></li>
                            <li><a href="#">Harga</a></li>
                            <li><a href="#">Integrasi</a></li>
                            <li><a href="#">API</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <h6 class="text-white">Perusahaan</h6>
                        <ul class="footer-links">
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Karir</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <h6 class="text-white">Legal</h6>
                        <ul class="footer-links">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                            <li><a href="#">Security</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p>&copy; 2026 Pusat Pustaka. Semua hak cipta dilindungi. Crafted with <i class="fas fa-heart"></i> for Libraries.</p>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                easing: 'ease-in-out-cubic',
                once: true,
                offset: 100
            });

            // Smooth scroll for navigation links
            document.querySelectorAll('.smooth-scroll').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const href = link.getAttribute('href');
                    const element = document.querySelector(href);
                    if (element) {
                        element.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add animation on scroll
            window.addEventListener('scroll', () => {
                const nav = document.querySelector('.navbar-premium');
                if (window.scrollY > 50) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            });
        </script>
    </body>

    </html>