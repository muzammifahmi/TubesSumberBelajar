<?php 
session_start();
require "../../../koneksi.php";
if (!isset($_SESSION["login"]) || $_SESSION['user'] != 'admin') {
  header("Location: ".base_url."login.php");
  exit;
}

$id = $_POST['id'];
$password = $_POST['password'];
$password = password_hash($password,PASSWORD_DEFAULT);
$query = "UPDATE users SET password='$password' WHERE id = '$id' ";
$result=mysqli_query($con, $query);
echo json_encode(array("status" => TRUE));

?>