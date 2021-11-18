<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Menunggu Approval";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
	$id = $sess_pegawaiid;
?>
<?php
	// setting tanggal
	$haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
	$bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$bulans_count = count($bulans);
	// tanggal bulan dan tahun hari ini
	$hari_ini = $haries[date("l")];
	$bulan_ini = $bulans[date("n")];
	$tanggal = date("d");
	$bulan = date("m");
	$tahun = date("Y");

	$id=$sess_pegawaiid;
	$sql_g = "SELECT * FROM employee WHERE npp='$id'";
	$ress_g = mysqli_query($conn, $sql_g);
	$res = mysqli_fetch_array($ress_g);

?>

 
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Absensi Pegawai</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="1%">Hari, Tanggal</th>
											<th width="1%">Jam Masuk</th>
                                            <th width="1%">Status</th>
											<th width="1%">Jam Keluar</th>
											<th width="1%">Absensi Pulang</th>
											<th width="1%">Status</th>
										</tr>
									</thead>
									<tbody>
												<tr>
												<td class="text-center"><h5 class="text-muted"></h5></td>
												<td class="text-center"></td>
												<td class="text-center"></td>
												<td class="text-center"></td>
                                                <td class="text-center"></td>
												<td class="text-center"></td>
												<td class="text-center"></td>
                                                </tr>
									</tbody>
								</table>
							</div>
			<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>Sedang memproses…</p>
						</div>
					</div>
				</div>
			</div>    
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->


<?php
	include("layout_bottom.php");
?>