	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Tanggapan</h1>
	</div>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="."><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item active" aria-current="page">Tanggapan</li>
		</ol>
		</nav>

           
           <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Semua Pengaduan Yang Di Buat</h6>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>No</th>
                                    <th>ID Pengaduan</th>
                                    <th>Tgl. Pengduan</th>
                                    <th>NIK</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                  <tbody>
                                    <?php 
                                        //Ambil data nik
                                        $nik = $masyarakat['nik'];
                                        $query = mysqli_query($koneksi, "SELECT * From pengaduan WHERE nik='$nik' ORDER BY tgl_pengaduan DESC");
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
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $pengaduan['id_pengaduan'] ?>">
                                              Lihat Detail Pengaduan
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $pengaduan['id_pengaduan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Detail pengaduan</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                  <div class="modal-body">
                                                    <?php
                                                      

                                                      // Menentukan nilai id pengaduan yang ingin dilihat detailnya
                                                      $id_pengaduan = $pengaduan['id_pengaduan'];

                                                      // Membuat query untuk mendapatkan data pengaduan
                                                      $query2 = "SELECT * FROM pengaduan LEFT JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan WHERE pengaduan.id_pengaduan = '$id_pengaduan'";
                                                      $detail = mysqli_query($koneksi, $query2);

                                                      // Mendapatkan hasil query
                                                      $row = mysqli_fetch_assoc($detail);
                                                    ?>
                                                    <table class="table table-striped">
                                                      <tr>
                                                        <td>Tanggal Pengaduan</td>
                                                        <td>:</td>
                                                        <td><input type="text" class="form-control" value="<?= $row['tgl_pengaduan']; ?>" readonly></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Nomor Induk Kependudukan (NIK)</td>
                                                        <td>:</td>
                                                        <td><input type="text" class="form-control" value="<?= $row['nik']; ?>" readonly></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Isi Laporan</td>
                                                        <td>:</td>
                                                        <td><?= $row['isi_laporan']; ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Foto</td>
                                                        <td>:</td>
                                                        <td><img src="../assets/pengaduan/<?= $row['foto']; ?>" class="img-thumbnail" width="200"></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Status</td>
                                                        <td>:</td>
                                                        <td>
                                                          <?php
                                                            if ($row['status'] == 0) {
                                                              $keterangan = '<span class="badge bg-warning text-dark">Pending</span>';
                                                            } elseif ($row['status'] == 1) {
                                                              $keterangan = '<span class="badge bg-info text-dark">Proses</span>';
                                                            } elseif ($row['status'] == 2) {
                                                              $keterangan = '<span class="badge bg-success">Selesai</span>';
                                                            } else {
                                                              $keterangan = 'Status tidak valid';
                                                            }
                                                            echo $keterangan;
                                                          ?>
                                                        </td>
                                                      </tr>
                                                      
                                                      <tr>
                                                        <td>Tanggapan</td>
                                                        <td>:</td>
                                                        <td>
                                                          <?php 
                                                            if ($row['tanggapan'] == null) {
                                                              echo "Belum Ada Tanggapan";
                                                            }else{
                                                              echo $row['tanggapan'];
                                                            }
                                                        ?>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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