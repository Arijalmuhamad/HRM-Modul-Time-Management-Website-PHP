<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$reject=$_POST['reject'];
$stt = "";
$null = 0;

if($aksi=="2"){
	$stt="Rejected";
	$sql = "UPDATE izin SET
			stt_izin='". $stt ."',
			lead_app='". $null ."',
			spv_app='". $null ."',
			ket_reject='". $reject ."'
			WHERE no_izin='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_izin.php?act=update&msg=success");
	
}else{
	$stt="Menunggu Persetujuan HRD";
	$num	=1;
	$sql = "UPDATE izin SET
			stt_izin='". $stt ."',
			mng_app='". $num ."'
			WHERE no_izin='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_izin.php?act=update&msg=success");
	
}
?>