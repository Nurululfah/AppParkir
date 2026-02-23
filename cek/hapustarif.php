 <?php
 session_start();
 include '../config.php';
 include '../log_aktivitas.php';
 
 if(isset($_POST['id_tarif'])) {
    $id_tarif   = $_POST['id_tarif'];
    $id_user    = $_SESSION['id_user'];

    logAktivitas($config, $id_user, "Menghapus data tarif dengan ID $id_tarif");

    mysqli_query($config, "DELETE FROM tb_tarif WHERE id_tarif = '$id_tarif'") or die(mysqli_error($config));
}

header("location:../tarif.php?info=success")
 ?>