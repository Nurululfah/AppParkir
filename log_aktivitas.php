<?php
date_default_timezone_set("Asia/Jakarta");

function logAktivitas($config, $id_user, $aktivitas){
    $waktu_aktivitas = date("Y-m-d H:i:s");

    $log = mysqli_query($config, "INSERT INTO tb_log_aktivitas (id_user, aktivitas, waktu_aktivitas)
                                    VALUES ('$id_user', '$aktivitas', '$waktu_aktivitas')");

    return $log;
}
