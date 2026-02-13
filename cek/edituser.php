<?php
include '../config.php';

// Ambil data dari form
$id_user = $_POST['id_user'];
$nama    = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

// status aktif tetap 1
$status_aktif = 1;

// Query update
$query = "UPDATE tb_user 
          SET nama='$nama',
              username='$username',
              password='$password',
              role='$role',
              status_aktif='$status_aktif'
          WHERE id_user='$id_user'";

if(mysqli_query($config, $query)){
    header("location:../user.php?info=success");
} else {
    echo "Error: " . mysqli_error($config);
}
?>
