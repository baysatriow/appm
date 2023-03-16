<?php 

//Menghubungkan ke dalam database
include '../../../config/koneksi.php';

$pg = $_GET['pg'];

if($pg == "edit") {
    // ambil data dari formulir
    $id = $_POST['id_masyarakat'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];

    // cek apakah password baru diinputkan atau tidak
    if(empty($password)) {
        // jika password kosong, gunakan password lama
        $query = "UPDATE masyarakat SET nama='$nama', username='$username', telp='$telp' WHERE id_masyarakat='$id'";
    } else {
        // jika password diinputkan, gunakan password baru
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE masyarakat SET nama='$nama', username='$username', password='$password', telp='$telp' WHERE id_masyarakat='$id'";
    }

    // eksekusi query untuk update data
    if(mysqli_query($koneksi, $query)) {
        // redirect ke halaman data masyarakat dengan pesan sukses
        header("Location: ../../?pg=setting");
    } else {
        // redirect ke halaman data masyarakat dengan pesan gagal
        header("Location: ../../?pg=setting&pesan=gagal");
    }
}
