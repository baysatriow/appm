<?php 

//Menghubungkan ke dalam database
include '../../../config/koneksi.php';

$pg = $_GET['pg'];

if($pg == "edit") {
    // ambil data dari formulir
    $id = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    // cek apakah password baru diinputkan atau tidak
    if(empty($password)) {
        // jika password kosong, gunakan password lama
        $query = "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', telp='$telp', level='$level' WHERE id_petugas='$id'";
    } else {
        // jika password diinputkan, gunakan password baru
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', telp='$telp', level='$level' WHERE id_petugas='$id'";
    }

    // eksekusi query untuk update data
    if(mysqli_query($koneksi, $query)) {
        // redirect ke halaman data petugas dengan pesan sukses
        header("Location: ../../?pg=setting&pesan=edit");
    } else {
        // redirect ke halaman data petugas dengan pesan gagal
        header("Location: ../../?pg=setting&pesan=gagal");
    }
}