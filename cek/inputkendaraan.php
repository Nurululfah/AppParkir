<?php
session_start(); //untuk mengambil ID User yang login
include '../config.php';
include '../log_aktivitas.php';

// Tangkap data dari form
$plat_nomor      = $_POST['plat_nomor'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$warna           = $_POST['warna']; 
$pemilik         = $_POST['pemilik'];
$id_user         = $_SESSION['id_user']; // Ambil ID petugas yang sedang login

// Query insert tanpa id_kendaraan (karena auto increment)
$query = "INSERT INTO tb_kendaraan (plat_nomor, jenis_kendaraan, warna, pemilik, id_user) 
          VALUES ('$plat_nomor', '$jenis_kendaraan', '$warna', '$pemilik', '$id_user')";

          logAktivitas($config, $id_user, "Menambahkan data kendaraan dengan plat nomor $plat_nomor");

if (mysqli_query($config, $query)) {
    // Jika berhasil
    header("location:../kendaraan.php?info=success");
} else {
    // Jika gagal, tampilkan pesan error untuk debug
    echo "Error: " . mysqli_error($config);
}
?>
