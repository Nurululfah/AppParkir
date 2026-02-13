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
        <?php if (isset($_GET['info'])): ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- <?php if ($_GET['info'] == "gagal"): ?>
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #f8d7da; color: #842029;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h5><i class="icon fas fa-trash-alt"></i> Mohon Maaf!</h5>
                                Login gagal! Username atau password salah.
                            </div>
                        <?php elseif ($_GET['info'] == "success"): ?>
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #d1e7dd; color: #0f5132;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h5><i class="icon fas fa-check-circle"></i> Berhasil</h5>
                                Data berhasil diubah.
                            </div>
                        <?php elseif ($_GET['info'] == "login"): ?>
                            <div class="alert alert-info alert-dismissible fade show shadow-sm" style="border-radius: 12px; border: none; background-color: #cfe2ff; color: #084298;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h5><i class="icon fas fa-info-circle"></i> Mohon maaf</h5>
                                Anda harus login terlebih dahulu.
                            </div>
                        <?php endif; ?> -->
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card-tools d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-default bg-gradient-yellow-orange" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fas fa-save"></i> Catat Masuk
                </button>
               </div>
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Data Transaksi</h3>
                      </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Area</th>
                                        <th>Waktu Masuk</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    include "config.php";
                                    $query = mysqli_query($config, "SELECT * FROM tb_transaksi 
                                        INNER JOIN tb_kendaraan ON tb_transaksi.id_kendaraan = tb_kendaraan.id_kendaraan 
                                        INNER JOIN tb_tarif ON tb_transaksi.id_tarif = tb_tarif.id_tarif
                                        INNER JOIN tb_user ON tb_transaksi.id_user = tb_user.id_user 
                                        INNER JOIN tb_area ON tb_transaksi.id_area = tb_area.id_area");
                                    
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data["plat_nomor"] ?></td>
                                        <td><?= $data["nama_area"] ?></td>
                                        <td><?= $data["waktu_masuk"] ?></td>
                                        <td><?= $data["status"] ?></td>
                                        <td>
                                            <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-ubah<?= $data['id_user']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $data['id_user']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Catat Transaksi Kendaraan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="post" action="cek/inputtrans.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kendaraan Terdaftar</label>
                        <select class="form-control select2" name="id_kendaraan" required style="width: 100%;">
                            <option value="">Pilih Plat Nomor...</option>
                            <?php
                            $q_kendaraan = mysqli_query($config, "SELECT * FROM tb_kendaraan");
                            while ($kendaraan = mysqli_fetch_assoc($q_kendaraan)) {
                                echo "<option value='{$kendaraan['id_kendaraan']}'>{$kendaraan['plat_nomor']} - {$kendaraan['pemilik']} ({$kendaraan['jenis_kendaraan']})</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">
                    <!-- Area Parkir -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Area Parkir</label>
                            <select class="form-control" name="id_area" required>
                                <option value="">-- Pilih Area --</option>
                                <?php
                                $q_area = mysqli_query($config, "SELECT * FROM tb_area");
                                while ($area = mysqli_fetch_assoc($q_area)) {
                                    echo "<option value='{$area['id_area']}'>{$area['nama_area']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Tarif Berlaku -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tarif Berlaku</label>
                            <select class="form-control select2" name="id_tarif" required style="width: 100%;">
                                <option value="">Pilih Tarif...</option>
                                <?php
                                $q_tarif = mysqli_query($config, "SELECT * FROM tb_tarif");
                                while ($tarif = mysqli_fetch_assoc($q_tarif)) {
                                    echo "<option value='{$tarif['id_tarif']}'>{$tarif['jenis_kendaraan']} - Rp. {$tarif['tarif_perjam']}</option>";
                                }
                                ?>
                            </select>
                        </div>
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

<?php
include 'assets/layout/footer.php';
?>