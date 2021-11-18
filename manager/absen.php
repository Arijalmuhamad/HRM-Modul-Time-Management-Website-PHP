<?php
	include("sess_check.php");

	// deskripsi halaman
	$pagedesc = "Absensi";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
	$id = $sess_mngid;
?>
<?php

$id=$sess_mngid;
$sql_g = "SELECT * FROM employee WHERE npp='$id'";
$ress_g = mysqli_query($conn, $sql_g);
$res = mysqli_fetch_array($ress_g);
?>

<?php

$this_day = date("d");
$sql = "SELECT*FROM data_absen WHERE id_tgl='$this_day' AND npp = '$id'";
$pgws = "SELECT * FROM employee WHERE npp='$id'";
$qpgws = $conn->query($pgws);
$query_tday = $conn->query($sql);

$sql = "SELECT * FROM employee WHERE npp='". $sess_mngid ."'";
$ress = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($ress);
$wfh = $data['wfh'];

// Notifikasi Absen
	if (isset($_GET['ab'])) {
		if ($_GET['ab']==1) {
			echo "<script type='text/javascript'>
					alert('Berhasil Melakukan Absen.');
					document.location = 'absen.php';
				</script>";
		} //elseif($_GET['ab']==2) {
			//echo "<script type='text/javascript'>
				//	alert('Gagal Melakukan Absen.');
					//document.location = 'absen.php';
				//</script>";
		//}
	}
echo "<div id='page-wrapper'>
        <div class='container-fluid'>
            <div class='row'>
            <div class='col-lg-12'>
            <h1 class='page-header'>Absensi Manager</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class='row'>
        <div class='col-lg-12'><?php include('layout_alert.php'); ?></div>
    </div>


    <div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-body'>
                    <table class='table table-striped table-bordered table-hover' id='tabel-data'>
            <thead>
               <tr>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Absen Masuk</th>
                <th>Absen Pulang</th>
				<th>Jadwal WFH</th>
               </tr>
            </thead>
            <tbody>";

if ($query_tday->num_rows==0) {
       $status='../lib/img/warning.png';
       $message = "Anda Belum Mengisi Absen Hari Ini";
       $disable_in = "";
       $disable_out = " disabled='disabled'";
	   // query database mencari data pengguna

} else {

       $disable_in = " disabled='disabled'";

       $get_day= $query_tday->fetch_assoc();

       $conn->close();

       if ($get_day['jam_klr']!=="") {
       		$status='../lib/img/complete.png';
       		$message = "Absensi hari ini selesai! Terimakasih.";
       		$disable_out = " disabled='disable'";
       } else {
       		$status='../lib/img/minus.png';
       		$message = "Absen Masuk Selesai. Jangan Lupa Absen Pulang !";
       		$disable_out = "";

       }
}

echo 	"<tr>
        <td class='text-center'><img src='$status' width='30px'/></td>
        <td class='text-center'><h5>$message</h5></td>
        <td class='text-center'><button type='button' class='btn btn-warning' onclick=\"window.location.href='../manager/proses.php?absen=1';\" $disable_in>Absen Masuk</button></td>
        <td class='text-center'><button type='button' class='btn btn-danger' onclick=\"window.location.href='../manager/proses.php?absen=2';\" $disable_out>Absen Pulang</button></td>
		<td class='text-center'><h5>$wfh</h5></td>
				</tr>";
echo "</table>";

?>
<?php
include("layout_bottom.php");
?>
