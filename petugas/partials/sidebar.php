
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href=".">
                <div class="sidebar-brand-text mx-3">APPM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href=".">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Utama
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?pg=tanggapan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pengaduan</span></a>
            </li>

            <!-- Khusus Admin!!! -->
            <?php if ($petugas['level'] == "admin") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="?pg=petugas">
                    <i class="fas fa-user"></i>
                    <span>Data Petugas</span></a>
                </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Print
            </div>

                <li class="nav-item">
                    <a class="nav-link" href="modul/mod_laporan/laporan.php">
                    <i class="fas fa-print"></i>
                    <span>Laporan Pengaduan</span></a>
                </li>

            <?php } ?>
            
            <!-- Heading -->
            <div class="sidebar-heading">
                Lainnya
            </div>
            <li class="nav-item">
            <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
            <div class="small">Anda login sebagai :</div>
                <?= $petugas['nama_petugas']; ?>
            </div>

        </ul>