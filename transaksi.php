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

    <!-- info end -->
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card-tools d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-default bg-gradient-yellow-orange" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fas fa-save"></i> Catat Masuk
                </button>
               </div>
               <div class="card fade-in">
                  <div class="card-header">
                     <h3 class="card-title">Data Transaksi</h3>
                      </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>
                                        <th>Durasi</th>
                                        <th>Biaya</th>
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
                                        INNER JOIN tb_area ON tb_transaksi.id_area = tb_area.id_area
                                        ORDER BY tb_transaksi.waktu_masuk DESC");

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data["plat_nomor"] ?><br> <small class="text-muted"> <?= $data["pemilik"] ?><br><?= $data["nama_area"] ?> - <?= $data["jenis_kendaraan"] ?></small></td>
                                        <td><?= $data["waktu_masuk"] ?></td>
                                        <td><?= $data["waktu_keluar"] ?></td>
                                        <td><?= $data["durasi_jam"] ?> jam</td>
                                        <td>Rp <?= number_format($data["biaya_total"]) ?></td>
                                        <td>
                                            <?php if ($data["status"] == 'masuk'): ?>
                                                <span class="badge badge-warning"><?= ucfirst($data["status"]) ?></span>
                                            <?php elseif ($data["status"] == 'keluar'): ?>
                                                <span class="badge badge-success"><?= ucfirst($data["status"]) ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary"><?= ucfirst($data["status"]) ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                          <?php if ($data['status'] == 'masuk') { ?>
                                            <!-- Tombol Keluar -->
                                            <a href="cek/keluar.php?id=<?= $data['id_parkir']; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Proses kendaraan keluar?')">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </a>
                                        <?php } else { ?>
                                            <!-- Tombol Cetak Struk -->
                                            <a href="struck.php?id=<?= $data['id_parkir']; ?>"
                                                target="_blank"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-print"></i>
                                            </a>
                                        <?php } ?>
                                            <button class="btn btn-default bg-gradient-yellow-orange btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $data['id_parkir']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                     <!-- start Hapus  -->
                                    <div class="modal fade" id="modal-hapus<?php echo $data['id_parkir']; ?>">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Hapus Data Transaksi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form method="post" action="cek/hapustrans.php">
                                            <div class="modal-body">
                                                <p>Apakah Anda Yakin Akan Menghapus Data Transaksi dari <b><?= $data['pemilik'] ?></b>?</p>
                                                <input type="hidden" name="id_parkir" value="<?= $data['id_parkir']; ?>">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-default bg-gradient-yellow-orange">Hapus</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- end Hapus -->
                                    <?php }} ?>
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
                            <select class="form-control select2" name="id_kendaraan" id="kendaraan" required style="width: 100%;">
                            <option value="">Pilih Plat Nomor...</option>
                            <?php
                           $q_kendaraan = mysqli_query($config, "SELECT tb_kendaraan.*
                                                                FROM tb_kendaraan
                                                                LEFT JOIN tb_transaksi 
                                                                    ON tb_kendaraan.id_kendaraan = tb_transaksi.id_kendaraan
                                                                    AND tb_transaksi.status = 'masuk'
                                                                WHERE tb_transaksi.id_kendaraan IS NULL
                                                                ");
                            while ($kendaraan = mysqli_fetch_assoc($q_kendaraan)) {
                                echo "<option value='{$kendaraan['id_kendaraan']}'
                                        data-jenis='{$kendaraan['jenis_kendaraan']}'>
                                        {$kendaraan['plat_nomor']} - {$kendaraan['pemilik']} ({$kendaraan['jenis_kendaraan']})
                                    </option>";
                            }?>
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
                                $q_area = mysqli_query($config, "SELECT * FROM tb_area WHERE terisi < kapasitas");
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
                            <select class="form-control select2" name="id_tarif" id="tarif" required style="width: 100%;">
                                <option value="">Pilih Tarif...</option>
                                <?php
                                $q_tarif = mysqli_query($config, "SELECT * FROM tb_tarif");
                                while ($tarif = mysqli_fetch_assoc($q_tarif)) {
                                    echo "<option value='{$tarif['id_tarif']}'
                                            data-jenis='{$tarif['jenis_kendaraan']}'>
                                            {$tarif['jenis_kendaraan']} - Rp. {$tarif['tarif_perjam']}
                                        </option>";
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

<script>
// Ambil element dropdown kendaraan berdasarkan id="kendaraan" // Lalu jalankan fungsi setiap kali pilihan berubah
document.getElementById("kendaraan").addEventListener("change", function() {
    // Ambil option yang sedang dipilih
    var selectedOption = this.options[this.selectedIndex];

    // Ambil nilai data-jenis dari option kendaraan
    var jenisKendaraan = selectedOption.getAttribute("data-jenis");

    // Ambil dropdown tarif berdasarkan id="tarif"
    var tarifDropdown = document.getElementById("tarif");

    // Loop semua option yang ada di dropdown tarif
    for (var i = 0; i < tarifDropdown.options.length; i++) {

        // Cek apakah data-jenis pada tarif sama dengan jenis kendaraan yang dipilih
        if (tarifDropdown.options[i].getAttribute("data-jenis") === jenisKendaraan) {

            // Jika sama otomatis pilih tarif tersebut
            tarifDropdown.selectedIndex = i;
            // Hentikan loop karena sudah ketemu yang cocok
            break;
        } } });

  setTimeout(function() 
  {$(".alert").fadeTo(500, 0).slideUp(500, function(){
     $(this).remove(); 
    }); }, 3000);
</script>
<?php
include 'assets/layout/footer.php';
?>