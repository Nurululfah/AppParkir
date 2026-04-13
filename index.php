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

           <!-- <div class="col-lg-3 col-6">
           
            <div class="small-box bg-gradient-yellow-orange">
              <div class="inner">
                <h3>-</h3>
                <p>Data Kendaraan</p>
              </div>
              <div class="icon">
                <i class="fas fa-database"></i>
              </div>
            </div>
          </div> -->

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
        <?php
        // Query heatmap area parkir (slot terisi per area)
        $area = mysqli_query($config, "SELECT nama_area, terisi FROM tb_area");
        $labels_area = [];
        $data_area = [];
        while($row = mysqli_fetch_assoc($area)){
          $labels_area[] = $row['nama_area'];
          $data_area[]   = $row['terisi'];
        }

        // Query top pengguna (user paling sering parkir)
        $top_users = mysqli_query($config, "
          SELECT tb_user.nama, COUNT(tb_transaksi.id_parkir) AS total_parkir
          FROM tb_transaksi
          JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user
          GROUP BY tb_user.id_user
          ORDER BY total_parkir DESC
          LIMIT 5
        ");
        ?>
        <!-- Tambahan konten dashboard -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- Heatmap Area Parkir -->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header"><h3 class="card-title">Heatmap Area Parkir</h3></div>
                  <div class="card-body">
                    <canvas id="heatmapArea"></canvas>
                  </div>
                </div>
              </div>

              <!-- Top Pengguna -->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header"><h3 class="card-title">Top Pengguna</h3></div>
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Total Parkir</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($u = mysqli_fetch_assoc($top_users)){ ?>
                          <tr>
                            <td><?= $u['nama'] ?></td>
                            <td><?= $u['total_parkir'] ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Script Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          const ctx = document.getElementById('heatmapArea').getContext('2d');
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: <?= json_encode($labels_area) ?>,
              datasets: [{
                label: 'Slot Terisi',
                data: <?= json_encode($data_area) ?>,
                backgroundColor: function(context){
                  const value = context.raw;
                  if(value > 20) return 'red';
                  if(value > 10) return 'orange';
                  return 'green';
                }
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: { display: false }
              }
            }
          });
        </script>
        <!-- /.row -->
        <!-- Main row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
  include 'assets/layout/footer.php';
?>


 