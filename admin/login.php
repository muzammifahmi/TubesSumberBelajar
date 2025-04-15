<?php
session_start();
require "../koneksi.php";

// Redirect jika sudah login
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

$error = false;

// Proses login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST["username"])));
    $password = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST["password"])));

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $query);

        // Cek username
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            // Cek password
            if (password_verify($password, $row["password"])) {
                // Set session
                $_SESSION["login"] = true;
                $_SESSION["user"] = $row["username"];
                $_SESSION["id"] = $row["id"];
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Zona Fikir</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-primary {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
        }

        .text-primary {
            color: #2563eb !important;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
        }

        .link-animated {
            position: relative;
            transition: color 0.3s ease;
        }

        .link-animated::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 2px;
            background-color: #2563eb;
            transition: width 0.3s ease;
        }

        .link-animated:hover {
            color: #2563eb;
        }

        .link-animated:hover::after {
            width: 100%;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
        rel="stylesheet" />
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
        rel="stylesheet" />
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: "Inter", sans-serif;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body class="min-vh-100 d-flex flex-column">
    <header class="bg-white shadow-sm">
        <div class="container py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="font-['Pacifico'] fs-4 text-primary mb-0">Zona Fikir</h1>
                </div>
                <nav>
                    <div class="d-flex gap-4">
                        <a href="#" class="text-secondary text-decoration-none link-animated">Tentang</a>
                        <a href="#" class="text-secondary text-decoration-none link-animated">Kontak</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <main
        class="flex-grow-1 d-flex align-items-center justify-content-center p-4 position-relative">
        <div class="position-absolute top-0 start-0 w-100 h-100 z-0">
            <img
                src="https://readdy.ai/api/search-image?query=modern%20abstract%20background%20with%20soft%20gradient%20colors%2C%20minimalist%20geometric%20shapes%2C%20clean%20and%20professional%20design%20style%2C%20perfect%20for%20login%20page%20background%2C%20subtle%20patterns&width=1920&height=1080&seq=1&orientation=landscape"
                class="w-100 h-100 object-fit-cover opacity-50"
                alt="Background" />
        </div>
        <div
            class="bg-white bg-opacity-95 rounded shadow p-4 p-md-5 position-relative"
            style="max-width: 450px; backdrop-filter: blur(8px)">
            <div class="text-center mb-4">
                <h1 class="font-['Pacifico'] fs-2 text-primary">Zona Fikir</h1>
                <p class="text-secondary">Platform Pembelajaran Online</p>
            </div>
            <h2 class="fs-4 fw-semibold text-dark mb-4 text-center">
                Masuk ke Akun Anda
            </h2>
            <?php if ($error) : ?>
                <div class="alert alert-danger" role="alert">
                    Username atau password salah!
                </div>
            <?php endif; ?>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="ri-user-line"></i>
                        </span>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-control"
                            placeholder="Masukkan username"
                            required />
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="ri-lock-line"></i>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required />
                        <button
                            class="btn btn-outline-secondary"
                            type="button"
                            id="togglePassword">
                            <i class="ri-eye-off-line" id="passwordIcon"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2">
                    Masuk
                </button>
            </form>
            <div class="mt-4 pt-4 border-top">
                <p class="text-center text-secondary">
                    Belum memiliki akun?
                    <a href="#" class="text-primary text-decoration-none fw-medium">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div
                class="border-top border-secondary mt-4 pt-4 text-center text-secondary">
                <p class="mb-0">&copy; 2025 Zona Fikir. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password");
            const passwordIcon = document.getElementById("passwordIcon");
            togglePassword.addEventListener("click", function() {
                const type =
                    passwordInput.getAttribute("type") === "password" ?
                    "text" :
                    "password";
                passwordInput.setAttribute("type", type);
                if (type === "password") {
                    passwordIcon.classList.remove("ri-eye-line");
                    passwordIcon.classList.add("ri-eye-off-line");
                } else {
                    passwordIcon.classList.remove("ri-eye-off-line");
                    passwordIcon.classList.add("ri-eye-line");
                }
            });
        });
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- sweetalert -->
    <script src="../assets/sweet_alert/dist/sweetalert.min.js"></script>

</body>

</html>