<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manajemen Surat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- icon -->
  <link rel="shortcut icon" href="assets/dist/img/wonwoo.jpg" type="image/x-icon">
  <style>
    .bg-gradient-yellow-orange{
      background: linear-gradient(45deg, #f1c40f, #e67e22);
      color : #fff;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-warning">
    <div class="card-header text-center">
      <img src="assets/dist/img/wonwoo.jpg" alt="Logo" class="mb-3" style="width: 150px; height: auto;">
    </div>
    <div class="card-body">
      <p class="login-box-msg">App Parkir</p>
      <!-- infoo -->
      <?php if (isset($_GET['info'])): ?>
        <div class="row">
            <div class="col-12">
                <?php if ($_GET['info'] == "gagal"): ?>
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #f8d7da; color: #842029;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-trash-alt"></i> Mohon Maaf!</h5>
                        Login gagal! Username atau password salah.
                    </div>
                <?php elseif ($_GET['info'] == "logout"): ?>
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #d1e7dd; color: #0f5132;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-check-circle"></i> Terimakasih</h5>
                        Anda telah berhasil logout.
                    </div>
                    <?php elseif ($_GET['info'] == "tidak_aktif"): ?>
                    <div class="alert alert-warning alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #fff3cd; color: #856404;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Mohon Maaf</h5>
                        Akun Anda tidak aktif. Silakan hubungi administrator.
                    </div>
                <?php elseif ($_GET['info'] == "login"): ?>
                    <div class="alert alert-info alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #cfe2ff; color: #084298;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-info-circle"></i> Mohon maaf</h5>
                        Anda harus login terlebih dahulu.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- infoo end -->
          <script>
            setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
                  });
                }, 3000);
           </script>

        <form action="cek_login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-lock"></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-default bg-gradient-yellow-orange btn-block">Login</button>
          </div>
        </div>
      </form>
      </div>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
