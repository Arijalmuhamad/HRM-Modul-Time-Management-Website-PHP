<?php
// memulai session

// membaca nilai variabel session
//$chk_sess = $_SESSION['admin'];
// memanggil file koneksi
include("dist/config/koneksi.php");
	$npp = $_GET['npp'];
	$query = mysql_query("SELECT * FROM data_absensi WHERE npp='$npp'");
?>
