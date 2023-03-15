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
?>

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pengaduan</h1>
	</div>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="."><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
		</ol>
	</nav>

<div class="card">
  <h5 class="card-header">Tulis Pengaduan</h5>
  <div class="card-body">
    <!-- Form -->
    <form action="modul/mod_pengaduan/crud_pengaduan.php?pg=tambah" method="POST" enctype="multipart/form-data">
    	<!-- Membuat Fungsi Tanggal Hari ini -->
    	<?php 
    		//Untuk mendapatkan zona waktu Asia/Jakarta dalam PHP
    		date_default_timezone_set('Asia/Jakarta');
    		//untuk menampilkan tanggal hari ini
    		$date = date('Y-m-d');
    	?>
    	<div class="mb-3">
		  <label for="tgl_pengaduan" class="form-label">Tanggal Pengaduan</label>
		  <input name="tgl_pengaduan" type="text" class="form-control" id="tgl_pengaduan" value="<?= $date; ?>" readonly="">
		</div>
		<div class="mb-3">
		  <label for="nik" class="form-label">NIK</label>
		  <input name="nik" type="number" class="form-control" id="nik" value="<?= $masyarakat['nik'] ?>" readonly="">
		</div>
		<div class="mb-3">
		  <label for="isi_laporan" class="form-label">Isi Laporan</label>
		  <textarea name="isi_laporan" class="form-control" id="isi_laporan" rows="3"></textarea>
		</div>
		<div class="mb-3">
			<label for="foto" class="form-label">Foto</label>
			<div class="custom-file">
				<input name="foto" type="file" class="custom-file-input" id="customFile">
				<label class="custom-file-label" for="customFile">Pilih Foto</label>
			</div>
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Kirim</button>
		</div>
    </form>
  </div>
</div>