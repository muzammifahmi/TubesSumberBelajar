<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Soal Acak - Admin</title>

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/login-theme.css" rel="stylesheet">
  <link href="../assets/sweet_alert/dist/sweetalert.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/datatables/dataTables.bootstrap.css">
</head>

<body>

  <div class="navigasi">
    <nav class="navbar navbar-default">
      <header class="bg-white shadow-sm">
        <div class="container py-3">
          <div class="d-flex justify-content-between align-items-center w-100">
            <div>
              <h1 class="font-['Pacifico'] fs-4 text-primary mb-0">Zona Fikir</h1>
            </div>
            <div class="d-flex gap-4 ms-auto">
              <a href="#" onclick="soaljawab()" class="text-secondary text-decoration-none link-animated">Soal & Jawaban</a>
              <a href="#" onclick="manage_user()" class="text-secondary text-decoration-none link-animated">Manajer User</a>
              <a href="index.php" class="text-secondary text-decoration-none link-animated">Mulai Kuis</a>
              <a href="logout.php" class="text-secondary text-decoration-none link-animated">Logout</a>
            </div>
          </div>
        </div>
      </header>
    </nav>
  </div>

  <div class="container">
    <div class="isi">
      <div class="jumbotron text-center">
        <div id="kontenku">
          <div class="row">
            <div class="col-sm-12">
              <img src="../assets/img/quiz.png" alt="../assets/img/quiz.png" class="img img-responsive imgku">
            </div>
            <div class="col-sm-12">
              <h1 class="welcome-text">Hello, Selamat Datang.. <?= $_SESSION["user"]; ?> </h1>
              <p>Anda akan memulai Aplikasi kuis acak</p>
              <p><a class="btn btn-primary btn-lg" onclick="mulai()" href="#" role="button">Klik disini</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white py-5">
    <div class="container text-center">
      <hr class="border-secondary">
      <div class="border-top border-secondary mt-4 pt-4 text-white"></div>
      <p>&copy;<span id="tahun"></span> All rights reserved.</p>
      <script>
        document.getElementById("tahun").innerHTML = new Date().getFullYear();
      </script>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/sweet_alert/dist/sweetalert.min.js"></script>
  <script src="../assets/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/datatables/dataTables.bootstrap.min.js"></script>

  <script>
    function mulai() {
      $('#kontenku').load('ajax/soal.php');
    }

    function soaljawab() {
      $('#kontenku').load('ajax/soaljawab.php');
    }

    function manage_user() {
      $('#kontenku').load('ajax/user/user.php');
    }
  </script>

  <?php $query = mysqli_query($con, "DELETE FROM tbl_score WHERE id= '" . $_SESSION['id'] . "' "); ?>
</body>

</html>
