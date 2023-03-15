<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];

    if ($pesan == "sukses") {
        echo "<script type='text/javascript'>iziToast.success({
            title: 'Selamat',
            message: 'Data Berhasil diTambahkan',
            position: 'topRight'
            });
            </script>";
    }else if($pesan == "edit"){
        echo "<script type='text/javascript'>iziToast.info({
            title: 'Selamat',
            message: 'Data Berhasil diubah',
            position: 'topRight'
            });
            </script>";
    }else if($pesan == "gagal"){
        echo "<script type='text/javascript'>iziToast.info({
            title: 'Maaf!',
            message: 'Data Gagal diubah',
            position: 'topRight'
            });
            </script>";
    }else if($pesan == "hapus"){
        echo "<script type='text/javascript'>iziToast.warning({
            title: 'Selamat!',
            message: 'Data Berhasil Di Hapus',
            position: 'topRight'
            });
            </script>";
    }
}
?>
<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Petugas</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form tambah data -->
        <form method="POST" action="modul/mod_petugas/crud_petugas.php?pg=tambah">
          <div class="mb-3">
            <label for="nama_petugas" class="form-label">Nama Petugas</label>
            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="telp" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" required>
          </div>
          <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" id="level" name="level" required>
              <option value="">-- Pilih Level --</option>
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<h1 class="mt-4">Data Petugas</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href=".">
					<i class="fas fa-home"></i>
				</a></li>
    <li class="breadcrumb-item active">Data Petugas</li>
</ol>


    <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-table mx-2"></i>
                            <span> Semua Data Petugas</span>
                        </div>
                        <button type="button" class="btn btn-primary ms-auto" data-toggle="modal" data-target="#modalTambahData">Tambah Data</button>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Telepon</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = mysqli_query($koneksi, "SELECT * From petugas ORDER BY id_petugas DESC");
                                            $no = 1;
                                            while ($petugas = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $petugas['nama_petugas'] ?></td>
                                            <td><?= $petugas['username'] ?></td>
                                            <td><?= $petugas['telp'] ?></td>
                                            <td><?= $petugas['level'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditData<?= $petugas['id_petugas'] ?>"><i class="fas fa-edit"></i></button>

                                                <!-- Modal Edit Data -->
                                                <div class="modal fade" id="modalEditData<?= $petugas['id_petugas'] ?>" tabindex="-1" aria-labelledby="modalEditData<?= $petugas['id_petugas'] ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalEditData<?= $petugas['id_petugas'] ?>Label">Edit Data Petugas</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form edit data -->
                                                                <form method="POST" action="modul/mod_petugas/crud_petugas.php?pg=edit">
                                                                    <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas'] ?>">
                                                                    <div class="mb-3">
                                                                        <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                                                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $petugas['nama_petugas'] ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="username" class="form-label">Username</label>
                                                                        <input type="text" class="form-control" id="username" name="username" value="<?= $petugas['username'] ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="password" class="form-label">Password</label>
                                                                        <input type="text" class="form-control" id="password" name="password">
                                                                        <small class="form-text text-muted">Kosongkan jika tidak ingin merubah password.</small>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="telp" class="form-label">Telepon</label>
                                                                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $petugas['telp'] ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="level" class="form-label">Level</label>
                                                                        <select class="form-select" id="level" name="level" required>
                                                                            <option value="">-- Pilih Level --</option>
                                                                            <option value="admin" <?php if ($petugas['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                                                                            <option value="petugas" <?php if ($petugas['level'] == 'petugas') echo 'selected'; ?>>Petugas</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tombol Hapus -->
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusData<?= $petugas['id_petugas'] ?>"><i class="fas fa-trash"></i></a>

                                                <!-- Modal Hapus Data -->
                                                <div class="modal fade" id="modalHapusData<?= $petugas['id_petugas'] ?>" tabindex="-1" aria-labelledby="modalHapusDataLabel<?= $petugas['id_petugas'] ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalHapusDataLabel<?= $petugas['id_petugas'] ?>">Hapus Data Petugas</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data petugas <?= $petugas['nama_petugas'] ?>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="modul/mod_petugas/crud_petugas.php?pg=hapus&id=<?= $petugas['id_petugas'] ?>" class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>


                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

