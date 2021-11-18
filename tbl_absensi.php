<?php
// memulai session

// membaca nilai variabel session
$chk_sess = $_SESSION['admin'];
// memanggil file koneksi
include("dist/config/koneksi.php");
$npp = $_GET['npp'];
$sql = "SELECT * FROM data_absen WHERE npp='$npp'";
$d = mysqli_query($conn, $sql);
?>
