<?php
include '../config.php';
date_default_timezone_set('Asia/Jakarta');

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id_parkir = $_GET['id'];

$query = mysqli_query($config, "SELECT tb_transaksi.*, tb_tarif.tarif_perjam 
                                FROM tb_transaksi
                                INNER JOIN tb_tarif ON tb_transaksi.id_tarif = tb_tarif.id_tarif 
                                WHERE tb_transaksi.id_parkir = '$id_parkir'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan");
}

$waktu_masuk = strtotime($data['waktu_masuk']);
$get_now = mysqli_query($config, "SELECT NOW() as waktu_sekarang");
$row_now = mysqli_fetch_assoc($get_now);
$waktu_keluar = strtotime($row_now['waktu_sekarang']);

// Hitung durasi (minimal 1 jam)
$durasi = ceil(($waktu_keluar - $waktu_masuk) / 3600);
if ($durasi < 1) {
    $durasi = 1;
}

// Hitung biaya
$biaya_total = $durasi * $data['tarif_perjam'];

// Simpan query UPDATE ke variabel
$update = "UPDATE tb_transaksi SET 
        waktu_keluar = NOW(), 
        durasi_jam ='$durasi', 
        biaya_total = '$biaya_total', 
        status = 'keluar' 
    WHERE id_parkir = '$id_parkir'
";

if (mysqli_query($config, $update)) {
    
    //Ambil ID Area dari transaksi ini terlebih dahulu
    $id_area = $data['id_area']; 

    // Kurangi jumlah 'terisi' di tabel area
    $update_area = "UPDATE tb_area SET terisi = terisi - 1 WHERE id_area = '$id_area'";
    
    mysqli_query($config, $update_area);

    //Redirect setelah semua selesai
    header("location:../transaksi.php?info=success");
    exit;
} else {
    echo "Error: " . mysqli_error($config);
}