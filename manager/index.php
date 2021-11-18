<?php
	include("sess_check.php");

	$id=$sess_mngid;

	$sql_g = "SELECT * FROM employee WHERE npp='$id'";
	$ress_g = mysqli_query($conn, $sql_g);
	$res = mysqli_fetch_array($ress_g);

	$sqla = "SELECT * FROM cuti WHERE npp='$id' AND hrd_app=1";
	$ressa = mysqli_query($conn, $sqla);
	$a = mysqli_num_rows($ressa);

	$sqlb = "SELECT * FROM cuti WHERE npp='$id' AND stt_cuti!='Rejected'";
	$ressb = mysqli_query($conn, $sqlb);
	$b = mysqli_num_rows($ressb);

	$sqlc = "SELECT * FROM cuti WHERE npp='$id' AND stt_cuti='Rejected'";
	$ressc = mysqli_query($conn, $sqlc);
	$c = mysqli_num_rows($ressc);

	//approval cuti d e
	$sqld = "SELECT * FROM cuti WHERE manager='$id' AND stt_cuti='Menunggu Persetujuan Manager'";
	$ressd = mysqli_query($conn, $sqld);
	$d = mysqli_num_rows($ressd);

	$sqle = "SELECT * FROM cuti WHERE manager='$id'";
	$resse = mysqli_query($conn, $sqle);
	$e = mysqli_num_rows($resse);




	//pengajuan lembur h i j
	$sqlh = "SELECT * FROM lembur WHERE npp='$id' AND hrd_app=1";
	$ressh = mysqli_query($conn, $sqlh);
	$h = mysqli_num_rows($ressh);

	$sqli = "SELECT * FROM lembur WHERE npp='$id' AND stt_lembur!='Rejected'";
	$ressi = mysqli_query($conn, $sqli);
	$i = mysqli_num_rows($ressi);

	$sqlj = "SELECT * FROM lembur WHERE npp='$id' AND stt_lembur='Rejected'";
	$ressj = mysqli_query($conn, $sqlj);
	$j = mysqli_num_rows($ressj);

	//approval lembur k l
	$sqlk = "SELECT * FROM lembur WHERE manager='$id' AND stt_lembur='Menunggu Persetujuan Manager'";
	$ressk = mysqli_query($conn, $sqlk);
	$k = mysqli_num_rows($ressk);

	$sqll = "SELECT * FROM lembur WHERE manager='$id'";
	$ressl = mysqli_query($conn, $sqll);
	$l = mysqli_num_rows($ressl);

	//pengajuan izin mno
	$sqlm = "SELECT * FROM izin WHERE npp='$id' AND hrd_app=1";
	$ressm = mysqli_query($conn, $sqlm);
	$m = mysqli_num_rows($ressm);

	$sqln = "SELECT * FROM izin WHERE npp='$id' AND stt_izin!='Rejected'";
	$ressn = mysqli_query($conn, $sqln);
	$n = mysqli_num_rows($ressn);

	$sqlo = "SELECT * FROM izin WHERE npp='$id' AND stt_izin='Rejected'";
	$resso = mysqli_query($conn, $sqlo);
	$o = mysqli_num_rows($resso);

	//approval izin pq
	$sqlp = "SELECT * FROM izin WHERE manager='$id' AND stt_izin='Menunggu Persetujuan Manager'";
	$ressp = mysqli_query($conn, $sqlp);
	$p = mysqli_num_rows($ressp);

	$sqlq = "SELECT * FROM izin WHERE manager='$id'";
	$ressq = mysqli_query($conn, $sqlq);
	$q = mysqli_num_rows($ressq);


	// deskripsi halaman
	$pagedesc = "Beranda";
	include("layout_top.php");
	include("dist/function/format_rupiah.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal">
							<div class="panel panel-default">
								<div class="panel-body">
								<h2 align="center">Selamat Datang, <?php echo $res['nama_emp'];?>!</h2>
								<hr/>
								<center><img src="../foto/<?php echo $res['foto_emp']?>" width="120px"></center>
								<hr/>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal">
							<div class="panel panel-default">
								<div class="panel-body">
								<h2 align="center">Setujui Pengajuan</h2>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $d; ?></div>
										<div><h4>Cuti</h4></div>
										<div><h4>Menunggu Disetujui</h4></div>
									</div>
								</div>
							</div>
							<a href="approval_cuti.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $k; ?></div>
										<div><h4>Lembur</h4></div>
										<div><h4>Menunggu Disetujui</h4></div>
									</div>
								</div>
							</div>
							<a href="approval_lembur.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $p; ?></div>
										<div><h4>Izin Dinas</h4></div>
										<div><h4>Menunggu Disetujui</h4></div>
									</div>
								</div>
							</div>
							<a href="approval_izin.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

				</div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal">
							<div class="panel panel-default">
								<div class="panel-body">
								<h2 align="center">Pengajuan Cuti Diri</h2>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $a; ?></div>
										<div><h4>Disetujui</h4></div>
									</div>
								</div>
							</div>
							<a href="cuti_app.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $b; ?></div>
										<div><h4>Menunggu Persetujuan</h4></div>
									</div>
								</div>
							</div>
							<a href="cuti_waitapp.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-minus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $c; ?></div>
										<div><h4>Ditolak</h4></div>
									</div>
								</div>
							</div>
							<a href="cuti_reject.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal">
							<div class="panel panel-default">
								<div class="panel-body">
								<h2 align="center">Pengajuan Lembur Diri</h2>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $h; ?></div>
										<div><h4>Disetujui</h4></div>
									</div>
								</div>
							</div>
							<a href="lembur_app.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $i; ?></div>
										<div><h4>Menunggu Persetujuan</h4></div>
									</div>
								</div>
							</div>
							<a href="lembur_waitapp.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-minus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $j; ?></div>
										<div><h4>Ditolak</h4></div>
									</div>
								</div>
							</div>
							<a href="lembur_reject.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

				</div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal">
							<div class="panel panel-default">
								<div class="panel-body">
								<h2 align="center">Pengajuan Izin Dinas Diri</h2>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-check-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $m; ?></div>
										<div><h4>Disetujui</h4></div>
									</div>
								</div>
							</div>
							<a href="izin_app.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-plus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $n; ?></div>
										<div><h4>Menunggu Persetujuan</h4></div>
									</div>
								</div>
							</div>
							<a href="izin_waitapp.php">
								<div class="panel-footer">
									<span class="pull-left">Lihat Rincian</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div><!-- /.panel-green -->

					<div class="col-lg-4 col-md-4">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-minus-circle fa-3x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $o; ?></div>
										<div><h4>Ditolak</h4></div>
									</div>
								</div>
							</div>
							<a href="cuti_reject.php">
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
