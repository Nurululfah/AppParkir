 <?php
 include '../config.php';
 
 if(isset($_POST['id_area'])) {
    $id_area   = $_POST['id_area'];

    mysqli_query($config, "DELETE FROM tb_area WHERE id_area = '$id_area'") or die(mysqli_error($config));
}

header("location:../area.php?info=success")
 ?>