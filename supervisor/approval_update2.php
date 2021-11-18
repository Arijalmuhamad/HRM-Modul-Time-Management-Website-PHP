<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$mng=$_POST['mng'];
$reject=$_POST['reject'];
$stt = "";
$null = 0;

if($aksi=="2"){
	$stt="Rejected";
	$sql = "UPDATE lembur SET
			stt_lembur='". $stt ."',
			
			ket_reject='". $reject ."'
			WHERE no_lembur='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_lembur.php?act=update&msg=success");
	
}else{
	$stt="Menunggu Persetujuan Manager";
	$num	=1;
	$sql = "UPDATE lembur SET
			stt_lembur='". $stt ."',
			manager='". $mng ."',
			spv_app='". $num ."'
			WHERE no_lembur='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_lembur.php?act=update&msg=success");
	
}
?>