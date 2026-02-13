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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                <h3><?= $total_kendaraan ?></h3>
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
                <h3>150</h3>
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
                <h3>150</h3>
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
                <h3>150</h3>
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


 