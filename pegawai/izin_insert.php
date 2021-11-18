<?php
include("sess_check.php");

$npp	= $_POST['npp'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['mulai'];
$akhir	= $_POST['akhir'];
$tujuan = $_POST['tujuan'];
$ket	= $_POST['keterangan'];
$spv	= $_POST['spv'];


$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur+1;

$stt = "Menunggu Persetujuan Supervisor";

$id = date('dmYHis');

$pgw = "SELECT * FROM employee WHERE npp='$npp'";
$qpgw = mysqli_query($conn,$pgw);
$ress = mysqli_fetch_array($qpgw);





	$sql 	= "INSERT INTO izin (no_izin, npp, tgl_pengajuan, tgl_mulai, tgl_selesai, tujuan, durasi, keterangan, spv, stt_izin) 
				VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$tujuan', '$durasi','$ket','$spv','$stt')";
	$query 	= mysqli_query($conn,$sql);
	if($query){
		echo "<script type='text/javascript'>
				alert('Pengajuan izin berhasil!'); 
				document.location = 'izin_waitapp.php'; 
			</script>";

	}else {
		echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
				document.location = 'izin_create.php'; 
			</script>";
	}

?>