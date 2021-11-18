
<?php
	include("sess_check.php");

	// query database mencari data admin
	$sql_e = "SELECT npp FROM employee WHERE active='Aktif'";
	$ress_e = mysqli_query($conn, $sql_e);
	$e = mysqli_num_rows($ress_e);

	// wait cuti
	$sql_wait = "SELECT no_cuti FROM cuti WHERE stt_cuti='Menunggu Persetujuan HRD'";
	$ress_wait = mysqli_query($conn, $sql_wait);
	$wait = mysqli_num_rows($ress_wait);

	//wait lembur
	$sql_wait_lembur = "SELECT no_lembur FROM lembur WHERE stt_lembur='Menunggu Persetujuan HRD'";
	$ress_wait_lembur = mysqli_query($conn, $sql_wait_lembur);
	$wait_lembur = mysqli_num_rows($ress_wait_lembur);

	//wait izin
	$sql_wait_izin = "SELECT no_izin FROM izin WHERE stt_izin='Menunggu Persetujuan HRD'";
	$ress_wait_izin = mysqli_query($conn, $sql_wait_izin);
	$wait_izin = mysqli_num_rows($ress_wait_izin);

	// deskripsi halaman
	$pagedesc = "Beranda";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Beranda</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $e; ?></div>
										<div><h4>Jumlah Karyawan Aktif</h4></div>
									</div>
								</div>
							</div>
							<a href="Karyawan.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-6 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $wait; ?></div>
										<div><h4>Menunggu Persetujuan Cuti</h4></div>
									</div>
								</div>
							</div>
							<a href="app_wait.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-6 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $wait_lembur; ?></div>
										<div><h4>Menunggu Persetujuan Lembur</h4></div>
									</div>
								</div>
							</div>
							<a href="app_wait2.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-6 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $wait_izin; ?></div>
										<div><h4>Menunggu Persetujuan Izin</h4></div>
									</div>
								</div>
							</div>
							<a href="app_wait3.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>
