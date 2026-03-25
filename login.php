<?php
session_start();
require_once "config/db.php";

// Cek jika sudah login, redirect ke dashboard
if (isset($_SESSION['id_pengguna'])) {
    header("Location: admin/dashboard.php");
    exit();
}

$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM pengguna WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['id_pengguna'] = $user['id_pengguna'];
            $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['foto'] = $user['foto'];

            header("Location: admin/dashboard.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PusatPustaka</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "outfit", sans-serif;
            background: linear-gradient(135deg, #1b5e20 0%, #4caf50 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h2 {
            font-size: 28px;
            font-weight: 700;
            color: #1b5e20;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-header p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: "outfit", sans-serif;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #1b5e20;
            box-shadow: 0 0 0 3px rgba(27, 94, 32, 0.1);
        }

        .form-control::placeholder {
            color: #999;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-check input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #1b5e20;
        }

        .form-check label {
            margin-left: 8px;
            cursor: pointer;
            color: #555;
            font-size: 14px;
            margin-bottom: 0;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
        }

        .form-footer a {
            color: #1b5e20;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #4caf50;
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: "outfit", sans-serif;
        }

        .btn-login:hover {
            box-shadow: 0 10px 20px rgba(27, 94, 32, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .login-footer p {
            color: #666;
            font-size: 13px;
            margin: 0;
        }

        .login-footer a {
            color: #1b5e20;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: #4caf50;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid;
        }

        .alert-danger {
            background-color: #ffebee;
            color: #c62828;
            border-left-color: #d32f2f;
        }

        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
            border-left-color: #4caf50;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }

            .login-header h2 {
                font-size: 24px;
            }
        }

        /* Eye Password */
        .password-group {
            position: relative;
        }

        /* Hide icon mata bawaan browser */
        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }

        /* Styling icon mata kustom */
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 40px;
            cursor: pointer;
            color: #666;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #2c342d;
        }

        .form-control[type="password"],
        .form-control[type="text"] {
            padding-right: 40px;
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
                    PusatPustaka
                </h2>
                <p>Silakan login terlebih dahulu</p>
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

            <div class="text-center mt-4">
                <a href="index.php" class="text-muted text-decoration-none small">Kembali ke Beranda</a>
            </div>

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