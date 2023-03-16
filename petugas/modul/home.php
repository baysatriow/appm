<?php 

// Menghitung Total Pengaduan
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan");
$count = mysqli_num_rows($query);

// Memghitung Total Data dengan status 0 (Pending)
$status = 0;
// Membuat query dan Menjalankan query untuk menghitung jumlah baris
$query = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_0 FROM pengaduan WHERE status='$status'");
// Mendapatkan hasil query
$row0 = mysqli_fetch_assoc($query);

// Menghitung Total Data dengan status 1 (Proses)
$status = 1;
// Membuat query dan Menjalankan query untuk menghitung jumlah baris
$query = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_1 FROM pengaduan WHERE status='$status'");
// Mendapatkan hasil query
$row1 = mysqli_fetch_assoc($query);

// Menghitung Total Data Dengan status 2 (Selesai)
$status = 2;
// Membuat query dan Menjalankan query untuk menghitung jumlah baris
$query = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_2 FROM pengaduan WHERE status='$status'");
// Mendapatkan hasil query
$row2 = mysqli_fetch_assoc($query);


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">

    <!-- Jumlah Semua Pengaduan -->
    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-file-document widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total Pengaduan Masuk</h5>
                <h3 class="mt-3 mb-3"><?=$count?></h3>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <!-- Jumlah Total Laporan Selesai -->
    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-check-bold widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Sudah Selesai</h5>
                <h3 class="mt-3 mb-3"><?=$row2['jumlah_2'];?></h3>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <!-- Jumlah  Sedang Di Proses -->
    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-reload widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Sedang Dalam Proses</h5>
                <h3 class="mt-3 mb-3"><?=$row1['jumlah_1'];?></h3>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <!-- Jumlah Sedang Pending -->
    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-format-list-bulleted widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Growth">Dalam Antrian</h5>
                <h3 class="mt-3 mb-3"><?=$row0['jumlah_0'];?></h3>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row -->
<div class="row">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Semua Pengaduan Masuk</h5>
        </div>
        <div class="card-body">
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pengaduan</th>
                    <th>Tgl. Pengduan</th>
                    <th>NIK</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = mysqli_query($koneksi, "SELECT * From pengaduan ORDER BY tgl_pengaduan DESC");
                        $no = 1;
                        while ($pengaduan = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pengaduan['id_pengaduan'] ?></td>
                        <td><?= $pengaduan['tgl_pengaduan'] ?></td>
                        <td><?= $pengaduan['nik'] ?></td>
                        <td>
                            <?php 
                                // Menentukan nilai status
                                $status = $pengaduan['status'];

                                // Menentukan keterangan status
                                if ($status == 0) {
                                    $keterangan = '<span class="badge bg-warning text-dark">Pending</span>';
                                } elseif ($status == 1) {
                                    $keterangan = '<span class="badge bg-info text-dark">Proses</span>';
                                } elseif ($status == 2) {
                                    $keterangan = '<span class="badge bg-success">Selesai</span>';
                                } else {
                                    $keterangan = 'Status tidak valid';
                                }

                                // Menampilkan keterangan status
                                echo $keterangan;

                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
