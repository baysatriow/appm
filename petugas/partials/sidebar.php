<ul class="side-nav">

<li class="side-nav-title side-nav-item">Navigation</li>

<li class="side-nav-item">
    <a href="." class="side-nav-link">
         <i class="uil-home-alt"></i>
        <span> Dashboard</span>
    </a>
</li> 

<li class="side-nav-title side-nav-item">Menu Utama</li>

<li class="side-nav-item">
    <a href="?pg=tanggapan" class="side-nav-link">
        <i class="uil-calender"></i>
        <span> Tanggapan</span>
    </a>
</li>

<?php if ($petugas['level'] == "admin") {
            ?>

                <li class="side-nav-title side-nav-item">Master Data</li>
                
                <li class="side-nav-item">
                    <a href="?pg=petugas" class="side-nav-link">
                        <i class="uil-user"></i>
                        <span> Data Petugas</span>
                    </a>
                </li>

                <li class="side-nav-item">
                <li class="side-nav-title side-nav-item">Print</li>

                <li class="side-nav-item">
                    <a href="modul/mod_laporan/laporan.php" target="_blank" class="side-nav-link">
                        <i class="uil-globe"></i>
                        <span> Laporan Pengaduan</span>
                    </a>
                </li>

                </li>
            <?php } ?>

        <li class="side-nav-title side-nav-item">User</li>

        <li class="side-nav-item">
            <a href="?pg=setting" class="side-nav-link">
                <i class="uil-user"></i>
                <span class="badge bg-secondary text-light float-end">New</span>
                <span> User Setting </span>
            </a>
        </li>
                                
        <li class="side-nav-item">
            <a href="logout.php" class="side-nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="mdi mdi-logout me-1"></i>
                <span> Logoout </span>
            </a>
        </li>


        </ul>