<?php
include("sess_check.php");
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../lib/db/dbconfig.php';


if (isset($_GET['absen'])) {
	if($_GET['absen']==1){
		$month = strftime("%B");
		$day_tgl = date("d");
		$day = strftime("%A");
		$hour = date("H.i")." WIB";
		$status = "Menunggu";
		$id=$sess_pegawaiid;
		$ket	= $_POST['isi_cat'];
		$sql = "INSERT INTO data_absen (
			id_absen,
			npp,
			id_bln,
			id_hri,
			id_tgl,
			jam_msk,
			st_jam_msk) VALUES (
			?,
			?,
			?,
			?,
			?,
			?,
			?)";
		if ($statement = $conn->prepare($sql)) {
			$statement->bind_param(
				"sssssss", $_SESSION['id'],$id, $month, $day, $day_tgl, $hour, $status
				);


			if ($statement->execute()) {
				// Absen sukses
				$conn->close();
				header("location:../pegawai/absen.php?ab=1");
			} else {
				header("location:../pegawai/absen.php?ab=1");
			}
		}else {
			header("location:../pegawai/absen.php?ab=1");
		}

	} else {
		// Absensi pulang -> melakukan Update jam pulang
		$id_user = mysqli_real_escape_string($conn, $_SESSION['id']);
		$npp = $sess_pegawaiid;
		$id_bln = date("m");
		$day_tgl = date("d");
		$day = date("N");
		$hour = date("H.i")." WIB";
		$status = "Menunggu";
	//	$sql = "UPDATE data_absen SET jam_klr=?, st_jam_klr=? WHERE npp='$id_user' AND id_tgl='$day_tgl' AND id_bln='$id_bln'";
		$query 	= "UPDATE data_absen SET jam_klr='$hour', st_jam_klr = '$status' WHERE npp='$npp'";
					mysqli_query($conn,$query);
		//if ($statement= $conn->prepare($sql)) {
			//$statement->bind_param(
				//"ss", $hour, $status
				//);
			if($query) {
				//$conn->close();
				header("location:../pegawai/absen.php?ab=2");

			} else {
				header("location:../pegawai/absen.php?ab=1");
			}
		//} else {
			//header("location:../pegawai/absen.php?ab=1");
		//}

	}
}
