<?php
session_start();
include 'config.php';
include 'log_aktivitas.php';

$username   = $_POST['username'];
$password   = $_POST['password'];

$query  = mysqli_query($config, 
          "SELECT * FROM tb_user 
           WHERE username='$username' 
           AND password='$password'");

$data = mysqli_fetch_assoc($query);

if ($data) {

    if ($data['status_aktif'] == 1) {

        $_SESSION['status'] = 'login';
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role']; 

        logAktivitas($config, $data['id_user'], "Login ke sistem");

        header("Location: index.php");

    } else {
        header("Location: login.php?info=tidak_aktif");
    }

} else {
    header("Location: login.php?info=gagal");
}
?>
