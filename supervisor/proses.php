<?php
include("sess_check.php");
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../lib/db/dbconfig.php';

/**********************************************************/
//
//				Proses untuk User Siswa
//
/**********************************************************/
if (isset($_GET['absen'])) {
	if($_GET['absen']==1){
		$month = strftime("%B");
		$day_tgl = date("d");
		$day = strftime("%A");
		$hour = date("H.i")." WIB";
		$status = "Menunggu";
		$id = $sess_spvid;
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
				header("location:../supervisor/absen.php?ab=1");
			} else {
				header("location:../supervisor/absen.php?ab=1");
			}
		}else {
			header("location:../supervisor/absen.php?ab=1");
		}

	} else {
		// Absensi pulang -> melakukan Update jam pulang
		$id_user = mysqli_real_escape_string($conn, $_SESSION['id']);
		$npp = $id = $sess_spvid;
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
				header("location:../supervisor/absen.php?ab=2");

			} else {
				header("location:../supervisor/absen.php?ab=1");
			}
		//} else {
			//header("location:../pegawai/absen.php?ab=1");
		//}

	}
}


// Aksi pembimbing buat konfirmasi absen
elseif (isset($_GET['acc_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['acc_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../supervisor/absen&ab=1");
				}else{
					//gagal update
					header("location:../supervisor/absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../supervisor/absen&ab=2");
			}

		} else {
			$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../supervisor/absen&ab=1");
				}else{
					//gagal update
					header("location:../supervisor/absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../supervisor/absen&ab=2");
			}
		}
	}
}
// Acc absen V2
elseif (isset($_POST['acc_absen2'])) {

	if (!empty($_POST['id_absen'])) {
		$count_id = count($_POST["id_absen"]);
		for($i=0; $i < $count_id; $i++)
		{
		    $item=explode(",", $_POST["id_absen"][$i]);
		    $id_absen = "$item[0]";
		    $type = "$item[1]";

		    if ($type==="in") {
				$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Dikonfirmasi";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../supervisor/absen&ab=1");
					}else{
						//gagal update
						header("location:../supervisor/absen&ab=2");
					}

				} else {
					header("location:../supervisor/absen&ab=6");
				}

			} else {
				$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Dikonfirmasi";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../supervisor/absen&ab=1");
					}else{
						//gagal update
						header("location:../supervisor/absen&ab=2");
					}

				} else {
					header("location:../supervisor/absen&ab=2");
				}
			}
		}
		$conn->close();
	} else {
		header("location:../supervisor/absen&ab=2");
	}

}
// Aksi pembimbing buat declie absen
elseif (isset($_GET['dec_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['dec_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Ditolak";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../supervisor/absen&ab=3");
				}else{
					//gagal update
					header("location:../supervisor/absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../supervisor/absen&ab=2");
			}

		} else {
			$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Ditolak";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../supervisor/absen&ab=3");
				}else{
					//gagal update
					header("location:../supervisor/absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../supervisor/absen&ab=2");
			}
		}
	}
}
// Decline absen v2
elseif (isset($_POST['dec_absen2'])) {

	if (!empty($_POST['id_absen'])) {
		$count_id = count($_POST["id_absen"]);
		for($i=0; $i < $count_id; $i++)
		{
		    $item=explode(",", $_POST["id_absen"][$i]);
		    $id_absen = "$item[0]";
		    $type = "$item[1]";

		    if ($type==="in") {
				$query = "UPDATE data_absen SET st_jam_msk=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Ditolak";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../supervisor/absen&ab=3");
					}else{
						//gagal update
						header("location:../supervisor/absen&ab=2");
					}

				} else {
					header("location:../supervisor/absen&ab=2");
				}

			} else {
				$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Ditolak";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../supervisor/absen&ab=3");
					}else{
						//gagal update
						header("location:../supervisor/absen&ab=2");
					}

				} else {
					header("location:../supervisor/absen&ab=2");
				}
			}
		}
		$conn->close();
	} else {
		header("location:../supervisor/absen&ab=2");
	}
}

/**********************************************************/
//
//				Proses Untuk Orang bandel!
//
/**********************************************************/
else {
	echo "<script>window.alert('Waaahh.. Bandel ya !! ');window.location=('../home');</script>";
}
?>
