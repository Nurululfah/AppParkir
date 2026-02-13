<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

if(isset($_POST['id_kendaraan'])) {
    $id_user        = $_SESSION['id_user'];
    $id_kendaraan   = $_POST['id_kendaraan'];

    mysqli_query($config, "DELETE FROM tb_kendaraan WHERE id_kendaraan = '$id_kendaraan'") or die(mysqli_error($config));
}
    logAktivitas($config, $id_user, "Menghapus data kendaraan ID $id_kendaraan");

header("location:../kendaraan.php?info=success")
?>