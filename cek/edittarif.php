<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

$id_tarif           = $_POST['id_tarif'];
$jenis_kendaraan    = $_POST['jenis_kendaraan'];
$tarif_perjam       = $_POST['tarif_perjam'];

$id_user = $_SESSION['id_user'];

$query  = "UPDATE tb_tarif SET id_tarif='$id_tarif', jenis_kendaraan='$jenis_kendaraan', tarif_perjam='$tarif_perjam' WHERE id_tarif='$id_tarif'";

          logAktivitas($config, $id_user, "Mengedit data tarif dengan ID $id_tarif");

if(mysqli_query($config, $query)){
    header("location:../tarif.php?info=success");
} else {
    echo "Error: " . mysqli_error($config);
}

?>