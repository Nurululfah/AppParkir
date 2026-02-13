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
              <h3 class="card-title">Data Transaksi</h3>
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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  include "config.php";
                  $query = mysqli_query($config, "SELECT * FROM tb_user");
                  if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                  ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data["nama"] ?></td>
                        <td><?= $data["username"] ?></td>
                        <td><?= $data["password"] ?></td>
                        <td><?= $data["role"] ?></td>
                        <td><?= $data["status_aktif"] ?></td>
                        <td>
                          <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-ubah<?= $data['id_user']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $data['id_user']; ?>">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>

                      <!-- start Hapus  -->
                      <div class="modal fade" id="modal-hapus<?php echo $data['id_user']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus Data User</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action="cek/hapususer.php">
                              <div class="modal-body">
                                <p>Apakah Anda Yakin Akan Menghapus Data User dari <b><?= $data['nama'] ?></b>?</p>
                                <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
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
                      <div class="modal fade" id="modal-ubah<?php echo $data['id_user']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Data User</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action="cek/edituser.php">
                              <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" name="username" value="<?= $data['username']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" name="password" value="<?= $data['password']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Level</label>
                                  <select class="form-control" name="role" required>
                                    <option value="">-- Pilih Level --</option>
                                    <option value="admin" <?= ($data['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="petugas" <?= ($data['role'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                                    <option value="owner" <?= ($data['role'] == 'owner') ? 'selected' : ''; ?>>Owner</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Status</label>
                                  <select class="form-control" name="status_aktif" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="aktif" <?= ($data['status_aktif'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                                    <option value="tidak aktif" <?= ($data['status_aktif'] == 'tidak aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                  </select>
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
                  <?php }
                  } ?>
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
        <h4 class="modal-title">Input Data Kendaraan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form method="post" action="cek/inputuser.php">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="role" required>
              <option value="">-- Pilih Level --</option>
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
              <option value="owner">Owner</option>
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status_aktif" required>
              <option value="">-- Pilih Status --</option>
              <option value="aktif">Aktif</option>
              <option value="tidak aktif">Tidak Aktif</option>
            </select>
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