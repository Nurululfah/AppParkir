<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

// Ambil data dari form
$id_user = $_POST['id_user'];
$nama    = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];
$status_aktif = (int)$_POST['status_aktif'];

// Query update
$query = "UPDATE tb_user 
          SET nama='$nama',
              username='$username',
              password='$password',
              role='$role',
              status_aktif='$status_aktif'
          WHERE id_user='$id_user'";

    logAktivitas($config, $id_user, "Mengedit data user dengan nama $nama");

if(mysqli_query($config, $query)){
    header("location:../user.php?info=edit");
} else {
    echo "Error: " . mysqli_error($config);
}
?>
