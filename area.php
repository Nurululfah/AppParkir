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
   <!-- infoo -->
      <!-- <?php if (isset($_GET['info'])): ?>
        <div class="row">
            <div class="col-12">
                <?php if ($_GET['info'] == "gagal"): ?>
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #f8d7da; color: #842029;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-trash-alt"></i> Mohon Maaf!</h5>
                        Login gagal! Username atau password salah.
                    </div>
                <?php elseif ($_GET['info'] == "success"): ?>
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #d1e7dd; color: #0f5132;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-check-circle"></i>Berhasil</h5>
                        Data berhasil di ubah
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
    <?php endif; ?> -->
    <!-- infoo end -->

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Area</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-default bg-gradient-yellow-orange" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fas fa-plus"></i> tambah
                </button>
              </div>
            </div>
            <!-- start card -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Area</th>
                    <th>Kapasitas</th>
                    <th>Terisi</th>
                    <th>Sisa Slot</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    include "config.php";
                    $query = mysqli_query($config, "SELECT * FROM tb_area");
                     if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?=$data ["nama_area"] ?></td>
                    <td><?= $data['kapasitas']; ?></td>
                    <?php
                      $kapasitas = (int) $data['kapasitas'];
                      $terisi    = (int) $data['terisi'];
                      // Hitung sisa slot parkir
                      // Rumus: kapasitas - terisi
                      $sisa      = $kapasitas - $terisi;
                      // Hitung persentase keterisian area parkir
                      // Digunakan untuk menampilkan progress bar
                      // Rumus: (terisi / kapasitas) x 100
                      $persen = ($kapasitas > 0) ? ($terisi / $kapasitas) * 100 : 0;
                      ?>
                      <td style="min-width:180px">
                        <small><b><?= $terisi ?></b> / <?= $kapasitas ?> Slot</small>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-info" role="progressbar" style="width: <?= $persen ?>%"></div>
                        </div>
                      </td>
                      <td>
                        <span class="badge badge-success">
                          <?= $sisa ?> Tersedia
                        </span>
                      </td>
                    <td>
                     <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-ubah<?= $data['id_area']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $data['id_area']; ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                    </td>
                  </tr>

                <!-- start Hapus  -->
                <div class="modal fade" id="modal-hapus<?php echo $data['id_area']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Data User</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="cek/hapusarea.php">
                        <div class="modal-body">
                          <p>Apakah Anda Yakin Akan Menghapus Data Area dari <b><?= $data['nama_area'] ?></b>?</p>
                           <input type="hidden" name="id_area" value="<?= $data['id_area']; ?>">
                          </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default bg-gradient-yellow-orange" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-default bg-gradient-yellow-orange">Hapus</button>
                       </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end Hapus -->

                  <!-- start modalEdit  -->
                <div class="modal fade" id="modal-ubah<?php echo $data['id_area']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Area</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                   <form method="post" action="cek/editarea.php">
                      <input type="hidden" name="id_area" value="<?= $data['id_area']; ?>">
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Nama Area</label>
                          <input type="text" name="nama_area" value="<?= $data['nama_area']; ?>" class="form-control">
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Kapasitas</label>
                              <input type="number" name="kapasitas" value="<?= $data['kapasitas']; ?>" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Terisi</label>
                              <input type="number" name="terisi" value="<?= $data['terisi']; ?>" class="form-control">
                            </div>
                          </div>
                        </div> </div> <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default bg-gradient-yellow-orange" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-default bg-gradient-yellow-orange">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end ModalEdit -->
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

<!-- start modalT -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Input Area</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="cek/inputarea.php">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama area</label>
            <input type="text" class="form-control" name="nama_area" required>
            </div>
         <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Kapasitas</label>
            <input type="number" class="form-control" name="kapasitas" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Terisi</label>
            <input type="number" class="form-control" name="terisi">
          </div>
        </div>
      </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default bg-gradient-yellow-orange" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-default bg-gradient-yellow-orange">Simpan</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- end modalT -->

<?php
  include 'assets/layout/footer.php';
?>
