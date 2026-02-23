<?php
include '../config.php';

$nama_area  = $_POST['nama_area'];
$kapasitas  = $_POST['kapasitas'];
$terisi     = $_POST['kapasitas'];

$query  = "INSERT INTO tb_area (nama_area, kapasitas, terisi)
            VALUES ('$nama_area', '$kapasitas', '$terisi')";

          logAktivitas($config, $id_user, "Menambahkan data area dengan nama $nama_area");

if(mysqli_query($config, $query)){
      // Jika berhasil
    header("location:../area.php?info=success");
} else {
    // Jika gagal, tampilkan pesan error untuk debug
    echo "Error: " . mysqli_error($config);
}

?>