<?php
include '../config.php';

$jenis_kendaraan    = $_POST['jenis_kendaraan'];
$tarif_perjam       = $_POST['tarif_perjam'];

$query  = "INSERT INTO tb_tarif ( jenis_kendaraan, tarif_perjam)
            VALUES ('$jenis_kendaraan', '$tarif_perjam')";

          logAktivitas($config, $id_user, "Menambahkan data tarif kendaraan jenis $jenis_kendaraan");

if(mysqli_query($config, $query)){
    // Jika berhasil
    header("location:../tarif.php?status=success");
} else {
    // Jika gagal, tampilkan pesan error untuk debug
    echo "Error: " . mysqli_error($config);
}
?>