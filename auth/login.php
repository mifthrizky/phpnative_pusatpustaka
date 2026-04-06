<?php
session_start();
require_once "../config/db.php";

// Cek jika sudah login, redirect ke dashboard
if (isset($_SESSION['id_pengguna'])) {
    header("Location: ../admin/dashboard.php");
    exit();
}

$error = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validasi
    if (empty($username) || empty($password)) {
        $error = "Username dan password tidak boleh kosong!";
    } else {
        try {
            $stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE username = :username LIMIT 1");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifikasi uname & password ada dan match
            if ($user && password_verify($password, $user['password'])) {
                // Set Session
                $_SESSION['id_pengguna'] = $user['id_pengguna'];
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['foto'] = $user['foto'];

                session_regenerate_id(true); // Mencegah session fixation
                header("Location: ../admin/dashboard.php");
                exit();
            } else {
                $error = "Username atau password salah!";
            }
        } catch (PDOException $e) {
            $error = "Terjadi kesalahan saat memproses login. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pusat Pustaka</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Barlow+Semi+Condensed:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #1e40af;
            --primary-dark: #1e3a8a;
            --primary-light: #3b82f6;
            --secondary-color: #10b981;
            --secondary-dark: #059669;
            --light-bg: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--primary-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--primary-dark);
            pointer-events: none;
            z-index: 1;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 16px;
            width: 100%;
            max-width: 450px;
            padding: 50px 40px;
            animation: slideUp 0.6s ease-out;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header h2 {
            font-family: 'Barlow Semi Condensed', serif;
            font-size: 32px;
            font-weight: 800;
            background: var(--primary-dark);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .login-header h2 i {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .login-header p {
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
            margin: 0;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 13px;
            border-left: 4px solid;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background-color: #fef2f2;
            color: #991b1b;
            border-left-color: #dc2626;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border-left-color: #22c55e;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background-color: rgba(248, 250, 252, 0.8);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(30, 64, 175, 0.08);
            background-color: white;
        }

        .form-control::placeholder {
            color: var(--text-light);
        }

        .password-group {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 42px;
            cursor: pointer;
            color: var(--text-light);
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .toggle-password:hover {
            color: var(--primary-color);
        }

        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }

        .form-control[type="password"],
        .form-control[type="text"] {
            padding-right: 45px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-check input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary-color);
            border-radius: 4px;
        }

        .form-check label {
            cursor: pointer;
            color: var(--text-dark);
            font-size: 13px;
            font-weight: 500;
            margin: 0;
        }

        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .form-footer a:hover {
            color: var(--primary-dark);
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 8px 20px rgba(30, 64, 175, 0.25);
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(30, 64, 175, 0.35);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .login-footer {
            text-align: center;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid var(--border-color);
        }

        .login-footer p {
            color: var(--text-light);
            font-size: 13px;
            margin: 0;
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            margin-left: 4px;
        }

        .login-footer a:hover {
            color: var(--secondary-color);
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 0;
            font-size: 13px;
        }

        .back-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: var(--secondary-color);
            gap: 8px;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 40px 24px;
            }

            .login-header h2 {
                font-size: 28px;
            }

            .form-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .form-footer a {
                order: 2;
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <h2>
                    <i class="fa-solid fa-swatchbook"></i>
                    Pusat Pustaka
                </h2>
                <p>Masuk ke akun Anda</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif ?>

            <!-- Alert Messages -->
            <div id="alertContainer"></div>

            <!-- Login Form -->
            <form action="" method="POST" id="loginForm">
                <!-- Username -->
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Masukkan username"
                        autocomplete="username">
                </div>

                <!-- Password -->
                <div class="form-group password-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" autocomplete="current-password">
                    <i class="fa-solid fa-eye-slash toggle-password" id="togglePassword"></i>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-footer">
                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="rememberMe"
                            name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ingat saya</label>
                    </div>
                    <a href="#" onclick="alert('Fungsi reset password akan datang'); return false;">Lupa password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" name="login" class="btn-login">LOGIN</button>
            </form>

            <!-- Back to Home -->
            <p class="back-link">
                Kembali ke <a href="../index.php">Beranda</a>
            </p>

            <!-- Footer -->
            <div class="login-footer">
                <p>Belum punya akun? <a href="#" onclick="alert('Hubungi administrator untuk registrasi'); return false;">Hubungi Admin</a></p>
            </div>
        </div>
    </div>

    <script>
        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;

            if (username === '') {
                e.preventDefault();
                showAlert('Username tidak boleh kosong', 'danger');
                return false;
            }

            if (password === '') {
                e.preventDefault();
                showAlert('Password tidak boleh kosong', 'danger');
                return false;
            }

            if (password.length < 4) {
                e.preventDefault();
                showAlert('Password minimal 4 karakter', 'danger');
                return false;
            }
        });

        function showAlert(message, type) {
            const alertContainer = document.getElementById('alertContainer');
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            alertDiv.textContent = message;
            alertContainer.innerHTML = '';
            alertContainer.appendChild(alertDiv);

            // Auto remove after 5 seconds
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Ubah tampilan icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>