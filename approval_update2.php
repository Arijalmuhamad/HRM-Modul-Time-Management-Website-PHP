<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$reject=$_POST['reject'];
$stt = "";
$null = 0;

if($aksi=="2"){
	$stt="Rejected";
	$sql = "UPDATE lembur SET
			stt_lembur='". $stt ."',
			lead_app='". $null ."',
			ket_reject='". $reject ."'
			WHERE no_lembur='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: app_wait2.php?act=update&msg=success");
	
}else{
	$stt="Disetujui";
	$num	=1;
	$sql = "UPDATE lembur SET
			stt_lembur='". $stt ."',
			hrd_app='". $num ."'
			WHERE no_lembur='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: app_wait2.php?act=update&msg=success");
	
}
?>