<?php
include("sess_check.php");

$npp	= $_POST['npp'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['mulai'];
$akhir	= $_POST['akhir'];
$ket	= $_POST['keterangan'];
$spv	= $_POST['spv'];

$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->h;
$durasi = $dur;

$stt = "Menunggu Persetujuan Supervisor";

$id = date('dmYHis');

$pgw = "SELECT * FROM employee WHERE npp='$npp'";
$qpgw = mysqli_query($conn,$pgw);
$ress = mysqli_fetch_array($qpgw);





	$sql 	= "INSERT INTO lembur (no_lembur, npp, tgl_pengajuan, jam_mulai, jam_selesai, durasi, keterangan, spv, stt_lembur) 
				VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$durasi','$ket','$spv','$stt')";
	$query 	= mysqli_query($conn,$sql);
	if($query){
		echo "<script type='text/javascript'>
				alert('Pengajuan lembur berhasil!'); 
				document.location = 'lembur_waitapp.php'; 
			</script>";

	}else {
		echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
				document.location = 'lembur_create.php'; 
			</script>";
	}

?>