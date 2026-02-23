<?php
session_start();
include 'config.php';

// Menangkap data tanggal dari URL
$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

include 'assets/layout/header.php';
include 'assets/layout/navbar.php';
include 'assets/layout/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hasil Rekap Pendapatan</h1>
                    <p class="text-muted">Periode: <b><?= $dari ?></b> s/d <b><?= $sampai ?></b></p>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="rekaptrans.php" class="btn btn-default bg-gradient-yellow-orange shadow-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card elevation-2">
                        <div class="card-header bg-gradient-yellow-orange">
                            <h3 class="card-title text-dark">Laporan Transaksi Keluar</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>
                                        <th>Durasi</th>
                                        <th>Biaya (IDR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total_semua = 0;

                                    // Query dengan filter tanggal berdasarkan waktu_keluar
                                    $query = mysqli_query($config, "SELECT tb_transaksi.*, tb_kendaraan.plat_nomor, tb_kendaraan.pemilik 
                                             FROM tb_transaksi 
                                             INNER JOIN tb_kendaraan ON tb_transaksi.id_kendaraan = tb_kendaraan.id_kendaraan 
                                             WHERE tb_transaksi.status = 'keluar' 
                                             AND DATE(tb_transaksi.waktu_keluar) BETWEEN '$dari' AND '$sampai'
                                             ORDER BY tb_transaksi.waktu_keluar ASC");

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            $total_semua += $data['biaya_total'];
                                    ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['plat_nomor'] ?> <br><small><?= $data['pemilik'] ?></small></td>
                                                <td><?= $data['waktu_masuk'] ?></td>
                                                <td><?= $data['waktu_keluar'] ?></td>
                                                <td><?= $data['durasi_jam'] ?> Jam</td>
                                                <td class="text-right"><b><?= number_format($data['biaya_total'], 0, ',', '.') ?></b></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr class="bg-default">
                                            <td colspan="5" class="text-center">Total pendapatan periode ini</td>
                                            <td class="text-right"><b>Rp <?= number_format($total_semua, 0, ',', '.') ?></b></td>
                                        </tr>
                                    <?php
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data ditemukan pada rentang tanggal tersebut.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button onclick="window.print()" class="btn btn-default shadow-sm no-print">
                                <i class="fas fa-print mr-1"></i> Cetak Laporan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'assets/layout/footer.php'; ?>