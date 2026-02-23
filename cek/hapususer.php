<?php
session_start();
include '../config.php';
include '../log_aktivitas.php';

if(isset($_POST['id_user'])) {

    $id_user = $_POST['id_user'];

    // simpan log dulu
    logAktivitas($config, $id_user, "Menghapus data user dengan ID $id_user");

    // baru hapus user
    mysqli_query($config, "DELETE FROM tb_user WHERE id_user = '$id_user'") 
    or die(mysqli_error($config));
}

header("location:../user.php?info=success");
?>