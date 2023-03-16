<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Layanan Pelaporan Pengaduan Masyarakat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- App favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- iziToast -->
  <link rel="stylesheet" href="assets/vendor/izitoast/css/iziToast.min.css">
  <script src="assets/vendor/izitoast/js/iziToast.min.js"></script>

  <!-- Main CSS Files -->
  <link href="style.css" rel="stylesheet">

</head>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <img src="logo.png" alt="" height="50">
      </div>
      <!-- <h1 class="logo"><a href="."><h1 class="brand fw-bold">LAPOR YUK!</h1></a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#hero">Beranda</a></li>
          <li><a class="getstarted" href="#" data-bs-toggle="modal" data-bs-target="#modal_petugas">Login Petugas</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Izi Toast ======= -->
  <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];

        if ($pesan == "sukses") {
            echo "<script type='text/javascript'>

                iziToast.info({
                title: 'Selamat!',
                message: 'Registrasi Berhasil',
                position: 'topRight'
                });							
                </script>";
        } else if ($pesan == "gagal-login") {
            echo "<script type='text/javascript'>iziToast.warning({
                title: 'Maaf!',
                message: 'Login Gagal, Silahkan Coba Lagi!',
                position: 'topRight'
                });
                </script>";
        } else if ($pesan == "login-dulu") {
            echo "<script type='text/javascript'>iziToast.warning({
                title: 'Maaf!',
                message: 'Anda Belum Login, Silahkan Login Terlebih Dahulu!',
                position: 'topRight'
                });
                </script>";
        } else if ($pesan == "logout") {
            echo "<script type='text/javascript'>iziToast.info({
                title: 'Selamat!',
                message: 'Anda Berhasil Logout',
                position: 'topRight'
                });
                </script>";
        } else if ($pesan == "ukuran") {
            echo '<div class="alert alert-danger">Ekstensi file tidak diizinkan atau ukuran file terlalu besar, maksimal ukuran file adalah 2Mb</div>';
        }
    }
    ?>
    <!-- ======= Modal Form ======= -->
    <!-- Modal Form Petugas -->
        <div class="modal fade" id="modal_petugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <section class="form-box-popup">
                        <div class="form-box">
                            <div class="form-value">
                                <form action="petugas/crud_web.php?pg=login" method="POST" >
                                    <h2>Login Petugas</h2>
                                    <div class="inputbox">
                                        <ion-icon name="mail-outline"></ion-icon>
                                        <input type="text" name="username" required>
                                        <label for="">Username</label>
                                    </div>
                                    <div class="inputbox">
                                        <ion-icon name="lock-closed-outline"></ion-icon>
                                        <input type="password" required name="password">
                                        <label for="">Password</label>
                                    </div>
                                    <div class="forget">
                                        <label for=""><input type="checkbox">Remember Me </label>
                                    
                                    </div>
                                    <button type="submit">Log in</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    
        <!-- Modal Form Masyarakat / Login -->
        <div class="modal fade" id="modal_masyarakat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <section class="form-box-popup">
                        <div class="form-box">
                            <div class="form-value">
                                <form action="masyarakat/crud_web.php?pg=login" method="POST" >
                                    <h2>Login Masyarakat</h2>
                                    <div class="inputbox">
                                        <ion-icon name="mail-outline"></ion-icon>
                                        <input type="text" name="username" required>
                                        <label for="">Username</label>
                                    </div>
                                    <div class="inputbox">
                                        <ion-icon name="lock-closed-outline"></ion-icon>
                                        <input type="password" required name="password">
                                        <label for="">Password</label>
                                    </div>
                                    <div class="forget">
                                        <label for=""><input type="checkbox">Remember Me </label>
                                    
                                    </div>
                                    <button>Log in</button>
                                    <div class="register">
                                        <p>Belum Punya Akun? <a href="#" data-bs-toggle="modal" data-bs-target="#modal_registrasi">Registrasi</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <!-- Modal Form Masyarakat / Registrasi -->
        <div class="modal fade" id="modal_registrasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <section class="form-box-popup">
                        <div class="form-regis">
                            <div class="form-value">
                                <form action="masyarakat/crud_web.php?pg=register" method="POST">
                                    <h2>Registrasi</h2>
                                    <div class="inputbox">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                        <input type="text" name="nama" required>
                                        <label for="">Nama Lengkap</label>
                                    </div>
                                    <div class="inputbox">
                                        <ion-icon name="person-add-outline"></ion-icon>
                                        <input type="text" name="username" required>
                                        <label for="">Username</label>
                                    </div>
                                    <div class="inputbox">
                                        <ion-icon name="lock-closed-outline"></ion-icon>
                                        <input type="nik" name="password" required>
                                        <label for="">NIK</label>
                                    </div>
                                    <div class="inputbox">
                                        <ion-icon name="lock-closed-outline"></ion-icon>
                                        <input type="password" name="password" required>
                                        <label for="">Password</label>
                                    </div>
                                    <div class="inputbox">
                                        <ion-icon name="call-outline"></ion-icon>
                                        <input type="text" name="telp" required>
                                        <label for="">Telepon</label>
                                    </div>
                                    <button type="submit">Registrasi</button>
                                    <div class="register">
                                        <p>Sudah Punya Akun? <a href="#" data-bs-toggle="modal" data-bs-target="#modal_masyarakat">Login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Layanan Aspirasi dan Pengaduan Online Masyarakat</h1>
          <h2>Sampaikan Laporan Anda Langsung kepada instansi yang berwenang</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="#" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#modal_masyarakat">Laporkan Sekarang!</a>
      </div>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-flashlight-line"></i></div>
            <h4 class="title"><a href="">Mudah dan Cepat</a></h4>
            <p class="description">Sampaikan Aspirasi Anda Dengan Mudah dan Cepat</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-repeat-line"></i></div>
            <h4 class="title"><a href="">Laporan Tanpa Batas</a></h4>
            <p class="description">Laporkan Pengaduan mu Kapan Saja dan diamana Saja Tanpa Batas Waktu dan Tempat.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-user-settings-line"></i></div>
            <h4 class="title"><a href="">Petugas Gesit</a></h4>
            <p class="description">Laporan Anda Akan Di Proses 2x24 Jam Setelah Pengiriman Laporan</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="ri-chat-check-line"></i></div>
            <h4 class="title"><a href="">Tanggapan Cepat</a></h4>
            <p class="description">Laporan Akan Di Tanggapi 2x24 Jam Setelah di Proses Oleh Petugas</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Jumlah Laporan Sekarang!</h2>
        </div>

        <div class="row justify-content-end">

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="11923" data-purecounter-duration="2" class="purecounter"></span>
              <p>Laporan Masuk</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="2" class="purecounter"></span>
              <p>Laporan Di Tanggapi</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="923" data-purecounter-duration="2" class="purecounter"></span>
              <p>Laporan Dalam Proses</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="1248" data-purecounter-duration="2" class="purecounter"></span>
              <p>Pengguna</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
          <h3>Laporkan Pengaduanmu Sekarang Juga!</h3>
          <p> Pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya. Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. Tujuannya, masyarakat memiliki satu saluran pengaduan secara Nasional. </p>
          <a class="cta-btn" href="#" data-bs-toggle="modal" data-bs-target="#modal_masyarakat">Login</a>
          <a class="cta-btn ms-2" href="#" data-bs-toggle="modal" data-bs-target="#modal_registrasi">Daftar</a>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pertanyaan Yang Sering di Tanyakan?</h2>
          <p>Berikut Adalah Beberapa Pertanyaan Yang Sering Ditanyakan Kepada Petugas</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apakah Ada Batasan Untuk Membuat Laporan? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Tidak Ada, Pengguna Bebas Untuk Mengirimkan Laporan Tanpa Perlu Khawatir Terkena Limit.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Berapa Lama Pengaduan Saya Akan Di Tanggapi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dalam Waktu Yang Normal Pengaduan Anda Dapat Kami Tanggapi 2x24 Jam Setelah Laporan di Proses.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Apakah Data Pribadi Saya Aman Jika Mendaftar Di Situs Ini? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Ya, Data Diri Anda Kami Simpan Dengan Aman dalam Database Aplikasi Kami Dengan Enkripsi Yang Tidak Dapat Di Buka Oleh Sembarang Orang
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  <!-- ======= Footer ======= -->
  <div class="container">
    <footer class="py-3 my-4">
      <p class="text-center text-muted">Copyright &copy; Aplikasi Pelaporan Pengaduan Masyarakat (APPM) by <span class="golden"><a href="https://baysatriow.me">Bayu Satrio Wibowo</a></span></p>
    </footer>
  </div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap5/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Ion Icon Form -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- Main JS File -->
  <script src="main.js"></script>

</body>

</html>