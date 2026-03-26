<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PusatPustaka</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        :root {
            --sidebar-bg: #1b5e20;
            --premium-gold: #c5a021;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
            background-color: #f4f7f6;
        }

        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        #sidebar-wrapper {
            width: 280px;
            background-color: var(--sidebar-bg);
            color: white;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1000;
        }

        .sidebar-heading {
            padding: 2rem 1.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--premium-gold);
            text-align: center;
        }

        .list-group-item {
            background-color: transparent;
            color: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 1rem 1.5rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .list-group-item i {
            width: 25px;
            margin-right: 15px;
            text-decoration: none;
        }

        .list-group-item:hover,
        .list-group-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 5px solid var(--premium-gold);
        }

        #page-content-wrapper {
            flex: 1;
            padding: 15px;
            width: 100%;
            overflow-x: hidden;
        }

        .top-navbar {
            background: white;
            padding: 15px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .profile-img-nav {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .logout-item:hover {
            color: #ff4d4d !important;
        }

        @media (max-width: 769px) {
            #sidebar-wrapper {
                margin-left: -280px;
                position: fixed;
                height: 100vh;
                box-shadow: 10px 0 15px rgba(0, 0, 0, 0.1);
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }

            #wrapper.toggled::after {
                content: "";
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
        }
    </style>
</head>

<body>

    <div id="wrapper" class="d-flex">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading d-flex justify-content-between align-items-center">
                <span>
                    <i class="fa-solid fa-swatchbook"></i>
                    PusatPustaka
                </span>
                <button class="btn btn-link text-white d-md-none" id="sidebar-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-border-all"></i>Dashboard</a>

                <div class="mt-3 px-4 mb-2 small text-uppercase opacity-50">Master Data</div>
                <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-list"></i>Kategori</a>
                <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-building"></i>Penerbit</a>
                <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-book"></i>Buku</a>

                <div class="mt-3 px-4 mb-2 small text-uppercase opacity-50">Transaksi</div>
                <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-book-open"></i>Peminjaman</a>
                <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-newspaper"></i>Laporan</a>

                <div class="mt-3 px-4 mb-2 small text-uppercase opacity-50">Akun</div>
                <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fa-solid fa-user"></i>Profil</a>
                <a href="../logout.php" class="list-group-item list-group-item-action logout-item"><i class="fa-solid fa-sign-out-alt"></i>Keluar</a>


            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>