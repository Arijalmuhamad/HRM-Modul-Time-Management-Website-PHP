<?php

	include("sess_check.php");

			$npp = $sess_pegawaiid;
			$data = $_GET['no_cuti'];
			$pgw = "SELECT * FROM employee WHERE npp='$npp'";
			$qpgw = mysqli_query($conn,$pgw);
			$ress = mysqli_fetch_array($qpgw);
			$cad = "SELECT * FROM cuti WHERE no_cuti = '$data'";
			$qcad = mysqli_query($conn,$cad);
			$hasil = mysqli_fetch_array($qcad);
			$duras = $hasil['durasi'];
			$jml = $ress['jml_cuti'];
			$penjumlahan = $jml+$duras;
			$query 	= "UPDATE employee SET jml_cuti='$penjumlahan' WHERE npp='$npp'";
			mysqli_query($conn,$query);


    	$Sql = 'DELETE FROM cuti WHERE no_cuti="'.$data.'"';
    	$Qry = mysqli_query ($conn, $Sql);
			header("location: cuti_waitapp.php?act=delete&msg=success");



?>
