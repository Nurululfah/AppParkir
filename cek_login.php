<?php
session_start();
include 'config.php';
include 'log_aktivitas.php';

$username   = $_POST['username'];
$password   = $_POST['password'];

$query  = mysqli_query($config, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$data   = mysqli_fetch_assoc($query);

if ($data) {

    $_SESSION['status'] = 'login';//diarahkan ke halaman jika sudah login

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['role'] = $data['role']; 
    $_SESSION['status_aktif']    = $data['status_aktif'];

    logAktivitas($config, $_SESSION['id_user'], "Login ke sistem");

    header("Location: index.php");
} else {
    header("Location: login.php?info=gagal");
}


?>