<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

// Cek apakah form disubmit
if (isset($_POST['id_kendaraan'])) {

    $id_kendaraan = $_POST['id_kendaraan'];
    $id_area      = $_POST['id_area'];
    $id_tarif     = $_POST['id_tarif'];
    $id_user      = $_SESSION['id_user'];

    $durasi_jam   = 0; // Durasi awal 0, akan dihitung saat keluar
    $biaya_total  = 0; // Biaya awal 0, akan dihitung saat keluar
    $status       = "Masuk";

    // INSERT tanpa waktu_keluar
    $query = "INSERT INTO tb_transaksi 
              (id_kendaraan, waktu_masuk, id_tarif, durasi_jam, biaya_total, status, id_user, id_area)
              VALUES 
              ('$id_kendaraan', NOW(), '$id_tarif', '$durasi_jam', '$biaya_total', '$status', '$id_user', '$id_area')";

    // Tambah jumlah kendaraan di area
    mysqli_query($config, "UPDATE tb_area SET terisi = terisi + 1 WHERE id_area = '$id_area'");

          logAktivitas($config, $id_user, "Menambahkan data transaksi kendaraan dengan ID kendaraan $id_kendaraan");

    if(mysqli_query($config, $query)){
        header("location:../transaksi.php?info=success");
        exit;
    } else {
        echo "Error: " . mysqli_error($config);
    }
}
?>
