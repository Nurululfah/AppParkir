 <?php
 session_start();
 include '../config.php';
 include '../log_aktivitas.php';
 
 if(isset($_POST['id_parkir'])) {
    $id_parkir   = $_POST['id_parkir'];
    $id_user     = $_SESSION['id_user'];

    logAktivitas($config, $id_user, "Menghapus data transaksi dengan ID $id_parkir");

    mysqli_query($config, "DELETE FROM tb_transaksi WHERE id_parkir = '$id_parkir'") or die(mysqli_error($config));
}

header("location:../transaksi.php?info=hapus")
 ?>