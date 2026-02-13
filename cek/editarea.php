<?php
session_start();
include '../config.php';

$id_area        = $_POST['id_area'];
$nama_area      = $_POST['nama_area'];
$kapasitas      = $_POST['kapasitas'];
$terisi         = $_POST['terisi'];
$id_user        = $_SESSION['id_user'];

$query  = mysqli_query($config, "UPDATE tb_area SET id_area='$id_area', nama_area='$nama_area', kapasitas='$kapasitas', terisi='$terisi' WHERE id_area='$id_area'");

if ($query) {
    header("location:../area.php?info=success");
} else {
    echo "Error: " . mysqli_error($config);
}
?>