 <?php
 include '../config.php';
 
 if(isset($_POST['id_tarif'])) {
    $id_tarif   = $_POST['id_tarif'];

    mysqli_query($config, "DELETE FROM tb_tarif WHERE id_tarif = '$id_tarif'") or die(mysqli_error($config));
}

header("location:../tarif.php?info=success")
 ?>