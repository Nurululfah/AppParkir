<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

$jenis_kendaraan    = $_POST['jenis_kendaraan'];
$tarif_perjam       = $_POST['tarif_perjam'];
$id_user            = $_SESSION['id_user'];

$query  = "INSERT INTO tb_tarif ( jenis_kendaraan, tarif_perjam)
            VALUES ('$jenis_kendaraan', '$tarif_perjam')";

          logAktivitas($config, $id_user, "Menambahkan data tarif kendaraan jenis $jenis_kendaraan");

if(mysqli_query($config, $query)){
    // Jika berhasil
    header("location:../tarif.php?info=tambah");
} else {
    // Jika gagal, tampilkan pesan error untuk debug
    echo "Error: " . mysqli_error($config);
}
?>