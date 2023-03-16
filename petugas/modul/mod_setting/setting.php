<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];

    if ($pesan == "sukses") {
        echo '<div class="alert alert-success">Data Pengaduan Berhasil Ditambahkan</div>';
    } else if ($pesan == "gagal") {
        echo '<div class="alert alert-danger">Data Gagal Ditambahkan</div>';
    } else if ($pesan == "error") {
        echo '<div class="alert alert-danger">Terjadi kesalahan saat mengupload file</div>';
    } else if ($pesan == "ukuran") {
        echo '<div class="alert alert-danger">Ekstensi file tidak diizinkan atau ukuran file terlalu besar, maksimal ukuran file adalah 2Mb</div>';
    }
}
	// Membuat query dan Menjalankan query 
	$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'");
	// Mendapatkan hasil query
	$setting = mysqli_fetch_assoc($query);
?>

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">User Setting</h1>
	</div>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="."><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item active" aria-current="page">Setting</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12">
		<form method="POST" action="modul/mod_setting/crud_setting.php?pg=edit">
			<div class="card" id="settings-card">
				<div class="card-header">
					Halaman ini memuat semua pengaturan aplikasi
				</div>
				<div class="card-body">
					<input name="id_petugas" type="hidden" value="<?= $setting['id_petugas'] ?>">
					<div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Lengkap</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="text" name="nama_petugas" class="form-control" value="<?= $setting['nama_petugas'] ?>" required>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Username</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="text" name="username" class="form-control" value="<?= $setting['username'] ?>" required>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="password" name="password" class="form-control">
							<small class="form-text text-muted">Kosongkan jika tidak ingin merubah password.</small>
		                </div>
		            </div>
		            <div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">No Telepon</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="text" name="telp" class="form-control" value="<?= $setting['telp'] ?>" required>
		                </div>
		            </div>
					<div class="form-group row align-items-center">
		                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Level</label>
		                <div class="col-sm-6 col-md-9">
		                    <input type="text" name="level" class="form-control" value="<?= $setting['level'] ?>" disabled>
							<small class="form-text text-muted">Level Hanya Bisa Di Ubah Oleh Administrator Lewat Console Admin.</small>
		                </div>
		            </div>
		            <!-- <div class="form-group row align-items-center">
		                <label class="form-control-label col-sm-3 text-md-right">Foto Profile</label>
		                <div class="col-sm-6 col-md-9">
		                    <div class="custom-file">
		                        <input type="file" name="logo" class="custom-file-input" id="site-logo">
		                        <label class="custom-file-label">Choose File</label>
		                    </div>
		                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
		                </div>

		            </div>
		            <div class="form-group row align-items-center">
		                <label class="form-control-label col-sm-3 text-md-right">Preview</label>
		                <div class="col-sm-6 col-md-6">
		                    <img src="../<?= $setting['photo'] ?>" class="img-thumbnail" width="100">
		                </div>
		            </div> -->
				</div>
				<div class="card-footer text-md-right">
					<button type="submit" class="btn btn-dark" id="save-btn">Save Changes</button>
            		<button class="btn btn-danger" type="button">Reset</button>
				</div>
			</div>
			</form>
		</div>
	</div>

<!-- Page Script -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>