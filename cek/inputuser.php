<?php
include '../config.php';

$nama           = $_POST['nama'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$role           = $_POST['role'];

$status_aktif   = 1;

$query  = "INSERT INTO tb_user (nama, username, password, role, status_aktif)
           VALUES ('$nama', '$username', '$password', '$role', '$status_aktif')";

if(mysqli_query($config, $query)){
      // Jika berhasil
    header("location:../user.php?info=success");
} else {
    // Jika gagal, tampilkan pesan error untuk debug
    echo "Error: " . mysqli_error($config);
}
?>