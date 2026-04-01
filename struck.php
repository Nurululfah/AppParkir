<?php
session_start();
include "config.php";

$id = $_GET['id'];

$query = mysqli_query($config, "SELECT tb_transaksi.*, 
        tb_kendaraan.plat_nomor, tb_kendaraan.pemilik, tb_kendaraan.jenis_kendaraan,
        tb_tarif.tarif_perjam,
        tb_area.nama_area,
        tb_user.nama
    FROM tb_transaksi
    INNER JOIN tb_kendaraan ON tb_transaksi.id_kendaraan = tb_kendaraan.id_kendaraan
    INNER JOIN tb_tarif ON tb_transaksi.id_tarif = tb_tarif.id_tarif
    INNER JOIN tb_area ON tb_transaksi.id_area = tb_area.id_area
    INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user
    WHERE tb_transaksi.id_parkir = '$id'
");

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Parkir</title>
    <style>
        body {
            font-family: monospace;
            font-size: 14px;
            width: 280px;
        }

        .center {
            text-align: center;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        table {
            width: 100%;
        }

        td {
            padding: 2px 0;
        }

        .right {
            text-align: right;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body onload="window.print()">

<div class="center">
    <b>PARKIR KENDARAAN</b><br>
    Jl. Seul No.235<br>
    Telp: 0812-xxxx-xxxx
</div>

<div class="line"></div>

<table>
    <tr>
        <td>No Plat</td>
        <td class="right"><?= $data['plat_nomor']; ?></td>
    </tr>
    <tr>
        <td>Jenis</td>
        <td class="right"><?= $data['jenis_kendaraan']; ?></td>
    </tr>
    <tr>
        <td>Area</td>
        <td class="right"><?= $data['nama_area']; ?></td>
    </tr>   
    <tr>
        <td>Masuk</td>
        <td class="right"><?= $data['waktu_masuk']; ?></td>
    </tr>
    <tr>
        <td>Keluar</td>
        <td class="right"><?= $data['waktu_keluar']; ?></td>
    </tr>
    <tr>
        <td>Durasi</td>
        <td class="right"><?= $data['durasi_jam']; ?> jam</td>
    </tr>
    <tr>
        <td>Petugas</td>
        <td class="right"><?= $data['nama']; ?></td>
    </tr>
</table>

<div class="line"></div>

<table>
    <tr>
        <td>Total Bayar</td>
        <td class="right"><b>Rp <?= number_format($data['biaya_total'], 0, ',', '.'); ?></b></td>
    </tr>
</table>

<div class="line"></div>

<div class="center">
    Terima Kasih 🙏<br>
    Simpan struk ini sebagai bukti resmi </br>
    pembayaran parkir Anda.
</div>

</body>
</html>