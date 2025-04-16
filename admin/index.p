<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Zona Fikir</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <a href="#" onclick="soaljawab()" class="text-secondary text-decoration-none link-animated">Soal</a>
                        <a href="#" onclick="manage_user()" class="text-secondary text-decoration-none link-animated">User</a>
                        <a href="index.php" class="text-secondary text-decoration-none link-animated">Kuis</a>
                        <a href="logout.php" class="text-secondary text-decoration-none link-animated">Logout</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <main class="flex-grow-1 p-4">
        <div class="container">
            <div class="row g-4">
                <!-- User Profile Section -->
                <div class="col-lg-3">
                    <div class="bg-white rounded shadow p-4">
                        <div class="text-center mb-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                <i class="ri-user-line ri-2x text-primary"></i>
                            </div>
                            <h3 class="fs-5 fw-semibold">Sarah Anderson</h3>
                            <p class="text-secondary mb-0">Level: Intermediate</p>
                        </div>
                        <div class="border-top pt-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-secondary">Quizzes Completed</span>
                                <span class="fw-semibold">24</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-secondary">Average Score</span>
                                <span class="fw-semibold">85%</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-secondary">Points Earned</span>
                                <span class="fw-semibold">1,250</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Quiz List Section -->
                <div class="isi">
      <div class="jumbotron">
        <div id="kontenku"></div> // konten 
        <div id="kontenku">
          <div class="row">

            <div class="col-sm-12">
              <img src="../assets/img/quiz.png" alt="../assets/img/quiz.png" class="img img-responsive imgku">
            </div>
            <div class="col-sm-12 text-center">
              <h1>Hello, Selamat Datang.. <?= $_SESSION["user"]; ?> </h1>
              <p>Anda akan memulai Aplikasi kuis acak</p>
              <p><a class="btn btn-primary btn-lg" onclick="mulai()" href="#" role="button">Klik disini</a></p>
            </div>

          </div>
        </div>




      </div>
    </div>

    </main>
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-3">
                    <h3 class="font-['Pacifico'] fs-4 mb-3">Zona Fikir</h3>
                    <p class="text-secondary">Platform pembelajaran online terbaik untuk mengembangkan kemampuan dan pengetahuan Anda.</p>
                </div>
                <div class="col-md-3">
                    <h4 class="fs-5 fw-semibold mb-3">Layanan</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Kursus Online</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Webinar</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Konsultasi</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4 class="fs-5 fw-semibold mb-3">Perusahaan</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Karir</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4 class="fs-5 fw-semibold mb-3">Hubungi Kami</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center text-secondary mb-2">
                            <i class="ri-map-pin-line me-2"></i>
                            Jakarta, Indonesia
                        </li>
                        <li class="d-flex align-items-center text-secondary mb-2">
                            <i class="ri-phone-line me-2"></i>
                            +62 821 2345 6789
                        </li>
                        <li class="d-flex align-items-center text-secondary mb-2">
                            <i class="ri-mail-line me-2"></i>
                            info@zonafikir.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-top border-secondary mt-4 pt-4 text-center text-secondary">
                <p class="mb-0">&copy; 2025 Zona Fikir. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quiz start functionality
            const quizButtons = document.querySelectorAll('.btn-primary');
            quizButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quizCard = this.closest('.border.rounded');
                    const quizTitle = quizCard.querySelector('.fs-5.fw-semibold').textContent;
                    const quizTime = quizCard.querySelector('.text-secondary').textContent;
                    const questionsCount = quizCard.querySelector('.text-secondary i').nextSibling.textContent.trim();
                    // Create modal for quiz confirmation
                    const modal = document.createElement('div');
                    modal.className = 'position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center';
                    modal.style.zIndex = '1050';
                    modal.innerHTML = `
<div class="bg-white rounded shadow p-4" style="max-width: 400px;">
<h4 class="fs-5 fw-semibold mb-3">Start Quiz</h4>
<p class="mb-3">Are you ready to start "${quizTitle}"?</p>
<p class="text-secondary mb-4">
<i class="ri-time-line me-2"></i>${quizTime}
<br>
<i class="ri-question-line me-2"></i>${questionsCount}
</p>
<div class="d-flex justify-content-end gap-2">
<button class="btn btn-outline-secondary !rounded-button" onclick="this.closest('.position-fixed').remove()">Cancel</button>
<button class="btn btn-primary !rounded-button">Begin Quiz</button>
</div>
</div>
`;
                    document.body.appendChild(modal);
                });
            });
            // Search functionality
            const searchInput = document.querySelector('input[type="text"]');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const quizCards = document.querySelectorAll('.col-md-6');
                quizCards.forEach(card => {
                    const title = card.querySelector('.fs-5').textContent.toLowerCase();
                    const category = card.querySelector('.badge').textContent.toLowerCase();
                    const description = card.querySelector('p').textContent.toLowerCase();
                    if (title.includes(searchTerm) || category.includes(searchTerm) || description.includes(searchTerm)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
            // Category filter
            const categorySelect = document.querySelector('select');
            categorySelect.addEventListener('change', function() {
                const selectedCategory = this.value;
                const quizCards = document.querySelectorAll('.col-md-6');
                quizCards.forEach(card => {
                    const category = card.querySelector('.badge').textContent;
                    if (selectedCategory === 'All Categories' || category === selectedCategory) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script>
    function mulai() {
        // Memuat konten soal dari file soal.php
        $('#kontenku').load('ajax/soal.php', function(response, status, xhr) {
            if (status === "error") {
                alert("Gagal memuat konten soal: " + xhr.status + " " + xhr.statusText);
            }
        });
    }

    function soaljawab() {
        // Memuat konten soal jawab dari file soaljawab.php
        $('#kontenku').load('ajax/soaljawab.php', function(response, status, xhr) {
            if (status === "error") {
                alert("Gagal memuat konten soal jawab: " + xhr.status + " " + xhr.statusText);
            }
        });
    }

    function manage_user() {
        // Memuat konten manajemen user dari file user.php
        $('#kontenku').load('ajax/user/user.php', function(response, status, xhr) {
            if (status === "error") {
                alert("Gagal memuat konten user: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
    </script>
  <?php $query = mysqli_query($con, "DELETE FROM tbl_score WHERE id= '" . $_SESSION['id'] . "' "); ?>
</body>

</html>