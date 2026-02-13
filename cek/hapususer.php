<?php
include '../config.php';

if(isset($_POST['id_user'])) {
    $id_user   = $_POST['id_user'];

    mysqli_query($config, "DELETE FROM tb_user WHERE id_user = '$id_user'") or die(mysqli_error($config));
}

header("location:../user.php?info=success")
?>