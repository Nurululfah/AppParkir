 <?php
 session_start();
 include '../config.php';
 include '../log_aktivitas.php';
 
 if(isset($_POST['id_area'])) {
    $id_area   = $_POST['id_area'];
    $id_user   = $_SESSION['id_user'];

 logAktivitas($config, $id_user, "Menghapus data area dengan ID $id_area");

    mysqli_query($config, "DELETE FROM tb_area WHERE id_area = '$id_area'") or die(mysqli_error($config));
}

header("location:../area.php?info=hapus")
 ?>