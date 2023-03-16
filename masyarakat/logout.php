<?php
session_start();

// Unset semua variabel session
$_SESSION = array();

// Akhiri session
session_destroy();

// Redirect ke halaman login
header("location: ../index.php?pesan=logout");
exit;
?>
