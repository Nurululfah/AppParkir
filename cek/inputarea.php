<?php
session_start(); //untuk mengambil ID User yang login
include '../config.php';
include '../log_aktivitas.php';

$nama_area  = $_POST['nama_area'];
$kapasitas  = $_POST['kapasitas'];
$terisi     = 0;

$id_user    = $_SESSION['id_user'];

$query  = "INSERT INTO tb_area (nama_area, kapasitas, terisi)
            VALUES ('$nama_area', '$kapasitas', '$terisi')";

logAktivitas($config, $id_user, "Menambahkan data area dengan nama $nama_area");

if (mysqli_query($config, $query)) {
  // Jika berhasil
  header("location:../area.php?info=tambah");
} else {
  // Jika gagal, tampilkan pesan error untuk debug
  echo "Error: " . mysqli_error($config);
}
