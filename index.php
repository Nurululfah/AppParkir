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

  //kendaraan aktif
  $aktif = mysqli_query($config, "SELECT COUNT(*) as total FROM tb_transaksi WHERE waktu_keluar IS NULL");
  $data_aktif = mysqli_fetch_assoc($aktif);
  $total_kendaraan_aktif = $data_aktif['total'];

  //query slot tersedia
  $slot = mysqli_query($config, "SELECT SUM(kapasitas) as total_kapasitas, SUM(terisi) as total_terisi FROM tb_area");
  $data = mysqli_fetch_assoc($slot);
  $total_kapasitas = $data['total_kapasitas'];
  $total_terisi    = $data['total_terisi'];
  $slot_tersedia = $total_kapasitas - $total_terisi;

  //query data kendaraan


  //Query pendapatan
$pendapatan = mysqli_query($config, "SELECT COALESCE(SUM(biaya_total),0) as total FROM tb_transaksi WHERE DATE(waktu_keluar) = CURDATE()");
$data_pendapatan = mysqli_fetch_assoc($pendapatan);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper fade-in">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Summary Dashboard</b></h1>
            <h6>Pantau Operasional Parkir</h6>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content --> 
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-yellow-orange">
              <div class="inner">
                <h3><?= $total_kendaraan_aktif ?></h3>
                <p>Kendaraan Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-yellow-orange">
              <div class="inner">
                <h3><?= $slot_tersedia ?></h3>
                <p>Slot Tersedia</p>
              </div>
              <div class="icon">
                <i class="fas fa-parking"></i>
              </div>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-yellow-orange">
              <div class="inner">
                <h3>-</h3>
                <p>Data Kendaraan</p>
              </div>
              <div class="icon">
                <i class="fas fa-database"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-yellow-orange">
              <div class="inner">
                <h3>Rp. <?= number_format($data_pendapatan['total'], 0, ',', '.') ?></h3>
                <p>Pendapatan Hari ini</p>
              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
  include 'assets/layout/footer.php';
?>


 