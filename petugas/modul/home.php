
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Page Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

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
                            <!-- Content Row -->
                    <div class="row">

                        <!-- Jumlah Pengaduan-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pengaduan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$count?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Sedang Diproses -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                             Sudah Selesai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$row2['jumlah_2'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  Jumlah Dalam  -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                SSedang Dalam Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$row1['jumlah_1'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$row0['jumlah_0'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengaduan Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    
                    