<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

// ambil dari form
$id_kendaraan      = $_POST['id_kendaraan'];
$plat_nomor        = $_POST['plat_nomor'];
$jenis_kendaraan   = $_POST['jenis_kendaraan'];
$warna             = $_POST['warna'];
$pemilik           = $_POST['pemilik'];
$id_user           = $_SESSION['id_user'];

// querry update
$query = mysqli_query($config, "UPDATE tb_kendaraan 
                                SET plat_nomor='$plat_nomor',
                                    jenis_kendaraan='$jenis_kendaraan',
                                    warna='$warna',
                                    pemilik='$pemilik',
                                    id_user='$id_user'
                                WHERE id_kendaraan='$id_kendaraan'");

                                logAktivitas($config, $id_user, "Mengedit data kendaraan plat nomor $plat_nomor");

if ($query) {
    header("location:../kendaraan.php?info=success");
} else {
    echo "Error: " . mysqli_error($config);
}
