 <?php
$page = basename($_SERVER['PHP_SELF'], '.php');
?>
<style>
.nav-sidebar .nav-link.active {
  background: linear-gradient(135deg, #f1c40f, #e67e22);
  color: #fff;
  border-radius: 6px;
}

.nav-sidebar .nav-link.active .nav-icon {
  color: #fff;
}
</style>

 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
  <!-- <a href="" class="d-flex flex-column align-items-center justify-content-center text-decoration-none mb-2">
  <img src="assets/dist/img/wonwoo.jpg" alt="Logo" class="mb-3" style="width: 120px; height: auto;">
</a> -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if ($_SESSION['role'] == 'admin') : ?>
          <li class="nav-item">
           <a href="index.php" class="nav-link <?= ($page == 'index') ? 'active' : '' ?>">
              <i class="nav-icon fab fa-microsoft"></i>
              <p>Dashboard</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="user.php" class="nav-link <?= ($page == 'user') ? 'active' : '' ?>">
              <i class="far fa-user nav-icon"></i>
              <p>User</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="tarif.php" class="nav-link <?= ($page == 'tarif') ? 'active' : '' ?>">
              <i class="fas fa-money-bill-wave nav-icon"></i>
              <p>Tarif</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="area.php" class="nav-link <?= ($page == 'area') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>Area</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kendaraan.php" class="nav-link <?= ($page == 'kendaraan') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-car"></i>
              <p> Data Kendaraan</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="aktivitas.php" class="nav-link <?= ($page == 'aktivitas') ? 'active' : '' ?>">
              <i class="fas fa-chart-line nav-icon"></i>
              <p>Log Aktivitas</p>
            </a>
          </li>
          <?php endif; ?>
          
          <?php if ($_SESSION['role'] == 'petugas') : ?>
          <!-- <li class="nav-item">
            <a href="cetak.php" class="nav-link <?= ($page == 'cetak') ? 'active' : '' ?>">
              <i class="fas fa-receipt nav-icon"></i>
              <p>Cetak Struck</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="transaksi.php" class="nav-link <?= ($page == 'transaksi') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>Transaksi</p>
            </a>
          </li>  
          <?php endif; ?>

          <?php if ($_SESSION['role'] == 'owner') : ?>
          <li class="nav-item">
            <a href="rekaptrans.php" class="nav-link <?= ($page == 'rekaptrans') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>Rekap Transaksi</p>
            </a>
          </li>  
          <?php endif; ?>

     </ul>
    </nav>
    <div style="position: absolute;bottom: 15px;left: 15px;right: 15px;">
      <a href="logout.php" style="display: flex;align-items: center;gap: 10px;background: #fdecea;color: 
      #e3342f;padding: 12px 15px;border-radius: 8px;text-decoration: none;font-weight: 600;">
        <i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  