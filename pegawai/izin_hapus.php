<?php

	include("sess_check.php");

			$npp = $sess_pegawaiid;
			$data = $_GET['no_izin'];
			$pgw = "SELECT * FROM employee WHERE npp='$npp'";
			$qpgw = mysqli_query($conn,$pgw);
			$ress = mysqli_fetch_array($qpgw);
			$cad = "SELECT * FROM izin WHERE no_izin = '$data'";
			$qcad = mysqli_query($conn,$cad);
			$hasil = mysqli_fetch_array($qcad);
			$duras = $hasil['durasi'];
			$jml = $ress['jml_izin'];
			$penjumlahan = $jml+$duras;
			$query 	= "UPDATE employee SET jml_izin='$penjumlahan' WHERE npp='$npp'";
			mysqli_query($conn,$query);


    	$Sql = 'DELETE FROM izin WHERE no_izin="'.$data.'"';
    	$Qry = mysqli_query ($conn, $Sql);
			header("location: izin_waitapp.php?act=delete&msg=success");



?>
