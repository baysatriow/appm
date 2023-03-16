<?php
	// Membuat query dan Menjalankan query 
	$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
	// Mendapatkan hasil query
	$setting = mysqli_fetch_assoc($query);
?>

<?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];

        if ($pesan == "edit") {
            echo "<script type='text/javascript'>

                iziToast.info({
                title: 'Selamat!',
                message: 'Data Berhasil Di Ubah',
                position: 'topRight'
                });							
                </script>";
        } else if ($pesan == "gagal") {
            echo "<script type='text/javascript'>iziToast.warning({
              title: 'Maaf!',
              message: 'Data Gagal Di Tambahkan,
              position: 'topRight'
              });
              </script>";
        }else if ($pesan == "error") {
            echo "<script type='text/javascript'>iziToast.warning({
              title: 'Maaf!',
              message: 'Terjadi kesalahan saat mengupload file',
              position: 'topRight'
              });
              </script>";
        }else if ($pesan == "ukuran") {
            echo "<script type='text/javascript'>iziToast.warning({
              title: 'Maaf!',
              message: 'Ekstensi file tidak diizinkan atau ukuran file terlalu besar, maksimal ukuran file adalah 2Mb',
              position: 'topRight'
              });
              </script>";
        }
    }
    ?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Pengaturan Pengguna</h4>
        </div>
    </div>
</div>

<div class="row">
	<div class="card">
		<div class="card-body">
		<form method="POST" action="modul/mod_setting/crud_setting.php?pg=edit">
				<input type="hidden" name="id_petugas" class="form-control" value="<?= $setting['id_petugas'] ?>" required>
				<h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Data Diri</h5>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="firstname" class="form-label">Nama Lengkap</label>
							<input type="text" name="nama_petugas" class="form-control" value="<?= $setting['nama_petugas'] ?>" required>
						</div>
					</div>
				</div> <!-- end row -->

				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="useremail" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" value="<?= $setting['username'] ?>" required>
						</div>
					</div>
				</div> <!-- end row -->

				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="userpassword" class="form-label">Password</label>
							<input type="password" name="password" class="form-control">
							<small class="form-text text-muted">Kosongkan jika tidak ingin merubah password.</small>
						</div>
					</div> <!-- end col -->
				</div> <!-- end row -->

				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="userpassword" class="form-label">No Telepon</label>
							<input type="text" name="telp" class="form-control" value="<?= $setting['telp'] ?>">
						</div>
					</div> <!-- end col -->
				</div> <!-- end row -->

				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label for="" class="form-label">Level</label>
							<input type="text" name="level" class="form-control" value="<?= $setting['level'] ?>" readonly>
							<small class="form-text text-muted">Level Hanya Bisa Di Ubah Oleh Administrator Lewat Console Admin.</small>
						</div>
					</div> <!-- end col -->
				</div> <!-- end row -->
				<div class="text-end">
					<button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Page Script -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>