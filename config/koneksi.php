<?php 
 
 $server = "localhost";
 $user	 = "root";
 $pass	 = "";
 $db	 = "appm";

$koneksi = mysqli_connect($server, $user, $pass, $db);
 
// Kondisi Cek Koneksi
if (mysqli_connect_errno()){
	echo "Connection Error : " . mysqli_connect_error();
}
 
?>