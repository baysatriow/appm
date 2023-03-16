<?php 

include '../../../config/koneksi.php';

?>
        <!-- App css -->
        <link href="../../../assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="../../../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <!-- <link href="../../../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"> -->

        <!-- Datatables css -->
        <link href="../../../assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="../../../assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />

        <link href="../../../assets/css/custom.css" rel="stylesheet" />

<center><h2 class="mt-2">Laporan Pengaduan Masyarakat</h2></center>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>ID Pengaduan</th>
                <th>Tgl. Pengduan</th>
                <th>NIK</th>
                <th>Status</th>
            </tr>
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

<div class="mt-4 ms-5">
    <div class="noprint">
            <a class="btn btn-primary" href="../../">
                <div class="sb-nav-link-icon"><i class="fas fa-backward"></i> Kembali</div>
            </a>
        <?php
        echo
        "<script>
        window.print();
        </script>";
        ?>
        <div class="btn btn-warning ms-2" onClick="window.print();"><i class="fas fa-print"></i> Print</div>
    </div>
</div>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<!-- <script type="text/javascript">
  window.print();
</script> -->
