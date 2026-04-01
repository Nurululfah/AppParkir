<?php
session_start();
  include 'assets/layout/header.php';
  include 'assets/layout/navbar.php';
  include 'assets/layout/sidebar.php';
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container"> 
      <div class="row">
        <div class="col-12">
          <div class="card fade-in">
            <div class="card-header">
              <h3 class="card-title">Data Log Aktivitas</h3>
            </div>
            <!-- start card -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama / Role</th>
                    <th>Aktivitas</th>
                    <th>Waktu Aktivitas</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    include "config.php";
                    $query = mysqli_query($config, "SELECT u.nama, u.role, l.aktivitas, l.waktu_aktivitas FROM tb_log_aktivitas l JOIN tb_user u ON l.id_user = u.id_user ORDER BY l.waktu_aktivitas DESC;");//u=tb_user & l=tb_log_aktivitas
                     if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?= $data["nama"] ?><br>=> <?= $data["role"] ?></td>
                    <td><?=$data ["aktivitas"] ?></td>
                    <td><?=$data ["waktu_aktivitas"] ?></td>
                  </tr>
                  <?php }}?>
                </tbody>
              </table>

            </div>
            <!-- end card -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include 'assets/layout/footer.php';
?>
