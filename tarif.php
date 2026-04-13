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
    <?php if (isset($_GET['info'])): ?>
    <div class="row">
        <div class="col-12 d-flex justify-content-end ml-auto">
            <div style="width: 350px;">

                <?php if ($_GET['info'] == "hapus"): ?>
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" style="font-size: 14px; border-radius: 12px; border: none; background-color: #f8d7da; color: #842029;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-trash-alt"></i> Berhasil</h5>
                        Data berhasil dihapus.
                    </div>

                <?php elseif ($_GET['info'] == "tambah"): ?>
                    <div class="alert alert-info alert-dismissible fade show shadow-sm" style="font-size: 14px; border-radius: 12px; border: none; background-color: #d1e7dd; color: #0f5132;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-info-circle"></i> Sukses</h5>
                        Data berhasil ditambahkan.
                    </div>

                <?php elseif ($_GET['info'] == "edit"): ?>
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" style="font-size: 14px; border-radius: 12px; border: none; background-color: #cfe2ff; color: #084298;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h5><i class="icon fas fa-check-circle"></i> Berhasil</h5>
                        Data berhasil diubah.
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>
    <!-- infoo end -->

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card fade-in">
            <div class="card-header">
              <h3 class="card-title">Data Tarif</h3>
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
                    <th>Jenis Kendaraan</th>
                    <th>Tarif / Jam</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    include "config.php";
                    $query = mysqli_query($config, "SELECT * FROM tb_tarif");
                     if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?=$data ["jenis_kendaraan"] ?></td>
                     <td>Rp. <?= number_format($data['tarif_perjam'])?></td>
                    <td>
                     <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-ubah<?= $data['id_tarif']; ?>">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $data['id_tarif']; ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                    </td>
                  </tr>

                <!-- start Hapus  -->
                <div class="modal fade" id="modal-hapus<?php echo $data['id_tarif']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Data Tarif</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="cek/hapustarif.php">
                        <div class="modal-body">
                          <p>Apakah Anda Yakin Akan Menghapus Data Tarif dari <b><?= $data['jenis_kendaraan'] ?></b>?</p>
                           <input type="hidden" name="id_tarif" value="<?= $data['id_tarif']; ?>">
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
                <div class="modal fade" id="modal-ubah<?php echo $data['id_tarif']; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Tarif</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="cek/edittarif.php">
                       <input type="hidden" name="id_tarif" value="<?= $data['id_tarif']; ?>">
                      <div class="modal-body">
                     <div class="form-group">
                        <label>Jenis Kendaraan</label>
                          <select class="form-control" name="jenis_kendaraan" required>
                          <option value="">-- Pilih Jenis --</option>
                          <option value="motor" <?= $data['jenis_kendaraan'] == 'motor' ? 'selected' : ''; ?>>Motor</option>
                          <option value="mobil" <?= $data['jenis_kendaraan'] == 'mobil' ? 'selected' : ''; ?>>Mobil</option>
                          <option value="lainnya" <?= $data['jenis_kendaraan'] == 'lainnya' ? 'selected' : ''; ?>>Lainnya</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Tarif per Jam</label>
                           <input type="text" name="tarif_perjam" value="<?= $data['tarif_perjam']; ?>" class="form-control">
                        </div>
                        </div>
                        <div class="modal-footer justify-content-between">
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
           <div class="mt-3 px-3">
          <small class="text-muted">
            <i class="fas fa-info-circle mr-1"></i>
            Tarif ini akan otomatis dikalikan dengan lama parkir (jam) saat kendaraan keluar.
          </small>
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
        <h4 class="modal-title">Input Data Tarif</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form method="post" action="cek/inputtarif.php">
        <div class="modal-body">
           <div class="form-group">
            <label>Jenis Kendaraan</label>
            <select class="form-control" name="jenis_kendaraan" required>
              <option value="">-- Pilih Jenis --</option>
              <option value="motor">Motor</option>
              <option value="mobil">Mobil</option>
               <option value="lainnya">Lainnya</option>
            </select>
          </div>
           <div class="form-group">
            <label>Tarif per Jam</label>
            <input type="number" class="form-control"  name="tarif_perjam" step="10" min="0" required>
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

<script>
  setTimeout(function() 
  {$(".alert").fadeTo(500, 0).slideUp(500, function(){
     $(this).remove(); 
    }); }, 3000);
 </script>
<?php
  include 'assets/layout/footer.php';
?>
