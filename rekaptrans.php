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
          
          <div class="col-md-8">
            <div class="row">
              <div class="col-lg-6 col-6">
                <div class="small-box bg-gradient-yellow-orange">
                  <div class="inner">
                    <h3><?= $total_kendaraan ?></h3>
                    <p>Kendaraan Aktif</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-car"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-6">
                <div class="small-box bg-gradient-yellow-orange">
                  <div class="inner">
                    <h3>150</h3>
                    <p>Slot Tersedia</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-parking"></i>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="small-box bg-gradient-yellow-orange">
                  <div class="inner">
                    <h3>150</h3>
                    <p>Data Kendaraan</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-database"></i>
                  </div>
                </div>
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

        </div></div></section>
    </div>

<?php
  include 'assets/layout/footer.php';
?>