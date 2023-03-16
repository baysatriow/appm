<?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];

        if ($pesan == "sukses") {
            echo "<script type='text/javascript'>

                iziToast.info({
                title: 'Selamat!',
                message: 'Data Berhasil Di Tambahkan',
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
            <!-- <div class="page-title-right">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                        <span class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <a href="javascript: void(0);" class="btn btn-primary ms-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a>
                </form>
            </div> -->
            <h4 class="page-title">Tulis Pengaduan</h4>
        </div>
    </div>
</div>
<!-- end page title -->

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
		  <input name="foto" class="form-control" type="file" id="foto">
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">KIRIM</button>
		</div>
    </form>
  </div>
</div>