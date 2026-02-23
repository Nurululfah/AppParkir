<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

$nama           = $_POST['nama'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$role           = $_POST['role'];
$status_aktif   = (int)$_POST['status_aktif'];

$id_user = $_SESSION['id_user'];


$query  = "INSERT INTO tb_user (nama, username, password, role, status_aktif)
           VALUES ('$nama', '$username', '$password', '$role', '$status_aktif')";

          logAktivitas($config, $id_user, "Menambahkan data user dengan nama $nama");

if(mysqli_query($config, $query)){
      // Jika berhasil
    header("location:../user.php?info=success");
} else {
    // Jika gagal, tampilkan pesan error untuk debug
    echo "Error: " . mysqli_error($config);
}
?>