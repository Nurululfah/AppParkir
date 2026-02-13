<?php
session_start();
include '../config.php';

// Pastikan data tersedia
if (isset($_POST['id_kendaraan'])) {
    $id_kendaraan = $_POST['id_kendaraan'];
    $id_area      = $_POST['id_area'];
    $id_tarif     = $_POST['id_tarif'];
    $id_user      = $_SESSION['id_user'];
    
    // Waktu masuk adalah jam sekarang
    $waktu_masuk  = date('Y-m-d H:i:s'); 
    $waktu_keluar  = date('Y-m-d H:i:s'); 
    $durasi_jam   = 0; // Default durasi jam saat catat masuk
    $biaya_total   = 0; // Default biaya total saat catat masuk
    $status       = "Masuk"; // Default status saat catat masuk

    // Query insert (waktu_keluar biarkan NULL atau kosong dulu karena baru masuk)
    $query = "INSERT INTO tb_transaksi (id_kendaraan, waktu_masuk, waktu_keluar, id_tarif, durasi_jam, biaya_total, status, id_user, id_area)
              VALUES ('$id_kendaraan', '$waktu_masuk', '$waktu_keluar', '$id_tarif', '$durasi_jam', '$biaya_total', '$status', '$id_user', '$id_area')";

    if(mysqli_query($config, $query)){
        header("location:../transaksi.php?info=success");
    } else {
        echo "Error: " . mysqli_error($config);
    }
}
?>