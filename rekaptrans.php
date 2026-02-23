<?php
session_start();
include 'config.php';

  if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login'){
    header("location: login.php");//diarahkan ke halaman login jika belum login
    exit();
  }

  include 'assets/layout/header.php';
  include 'assets/layout/navbar.php';
  include 'assets/layout/sidebar.php';

  $kendaraan = mysqli_query($config, "SELECT * FROM tb_kendaraan");
  $total_kendaraan = mysqli_num_rows($kendaraan); 
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Rekap Pendapatan</b></h1>
          </div>
        </div></div></div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-8">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Data Transaksi</h3>
                      </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>
                                        <th>Durasi</th>
                                        <th>Biaya</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    include "config.php";
                                   $query = mysqli_query($config, "SELECT tb_transaksi.*, tb_kendaraan.plat_nomor, tb_kendaraan.pemilik, tb_tarif.tarif_perjam, tb_area.nama_area
                                                                    FROM tb_transaksi
                                                                    INNER JOIN tb_kendaraan ON tb_transaksi.id_kendaraan = tb_kendaraan.id_kendaraan
                                                                    INNER JOIN tb_tarif ON tb_transaksi.id_tarif = tb_tarif.id_tarif
                                                                    INNER JOIN tb_area ON tb_transaksi.id_area = tb_area.id_area
                                                                    WHERE tb_transaksi.status = 'keluar'
                                                                    ORDER BY tb_transaksi.waktu_masuk DESC
                                                                    ");
                                   if (mysqli_num_rows($query) > 0) {
                                      while ($data = mysqli_fetch_assoc($query)) {
                                  ?>
                                  <tr>
                                      <td><?= $no++; ?></td>
                                      <td><?= $data['plat_nomor'] ?> <br><small class="text-muted"><?= $data['pemilik'] ?></small></td>
                                      <td><?= $data['waktu_masuk'] ?></td>
                                      <td><?= $data['waktu_keluar'] ?></td>
                                      <td><?= $data['durasi_jam'] ?> jam</td>
                                      <td>Rp <?= number_format($data['biaya_total'], 0, ',', '.') ?></td>
                                      <td>
                                    <span class="badge badge-success"><?= ucfirst($data['status']) ?></span>
                                  </td>
                                  </tr>
                                  <?php 
                                      }
                                  } else { 
                                  ?>
                                  <tr>
                                      <td colspan="7" class="text-center">Tidak ada data transaksi.</td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

          <div class="col-md-4">
            <div class="card elevation-1" style="border-radius: 15px;">
              <div class="card-header border-0">
                <h6 class="card-title font-weight-bold">
                  <i class="fas fa-filter text-primary mr-1"></i> Filter Rekap Kustom
                </h6>
              </div>
              <div class="card-body pt-0">
                <hr class="mt-0">
                <form action="rekap_proses.php" method="GET">
                  <div class="form-group">
                    <label class="small font-weight-bold">DARI TANGGAL</label>
                    <input type="date" class="form-control" name="dari" required>
                  </div>
                  <div class="form-group">
                    <label class="small font-weight-bold">SAMPAI TANGGAL</label>
                    <input type="date" class="form-control" name="sampai" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block font-weight-bold shadow-sm">
                    <i class="fas fa-search mr-1"></i> lihat rekap
                  </button>
                </form>
              </div>
            </div>

            <div class="alert elevation-1" style="background-color: #f39c12; color: white; border-radius: 15px;">
              <h5><i class="fas fa-exclamation-triangle mr-2"></i> Catatan:</h5>
              <p class="small mb-0">
                Data yang tampil hanya mencakup kendaraan yang statusnya sudah <b>Keluar</b> dan pembayaran telah lunas.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>

<?php
  include 'assets/layout/footer.php';
?>