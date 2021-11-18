<?php
require_once("koneksi.php");
session_start();

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM t_akun where username='$username' and password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $result = $result->fetch_assoc();
    $_SESSION['id_user'] = $result['id_user'];
    $_SESSION['username'] = $result['username'];
    header('location:index.php');
    exit;
  } else {
    echo "<script> alert('Username atau password salah') </script>";
  }
  $error = true;
}
