<?php
	include("sess_check.php");

	// deskripsi halaman
	$pagedesc = "Buat Pengajuan";
	$menuparent = "lembur";
	include("layout_top.php");
	$now = date('Y-m-d');
	$npp = $sess_spvid;
?>
<script>

</script>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pengajuan Lembur</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" name="izin" action="lembur_insert.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Form Pengajuan lembur</h3></div>
								<div class="panel-body">
									<div class="form-group">
                                    <label class="control-label col-sm-3">Tanggal Lembur</label>
										<div class="col-sm-4">
											<input type="date" name="mulai" class="form-control" required>
											<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>" required>
											<input type="hidden" name="npp" class="form-control" value="<?php echo $npp;?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jam Mulai</label>
										<div class="col-sm-4">
											<input type="time" name="mulai" class="form-control" required>
											<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>" required>
											<input type="hidden" name="npp" class="form-control" value="<?php echo $npp;?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jam Selesai</label>
										<div class="col-sm-4">
											<input type="time" name="akhir" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan <br>yang Dikerjakan</label>
										<div class="col-sm-4">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Manager</label>
										<div class="col-sm-4">
											<select name="mng" id="mng" class="form-control" required>
											<option value="" selected>======== Pilih Manager ========</option>
												<?php
													$mySql = "SELECT * FROM employee WHERE hak_akses='Manager' AND active='Aktif' ORDER BY nama_emp";
													$myQry = mysqli_query($conn, $mySql);
													$dataLeader = $result['npp'];
													while ($leaderData = mysqli_fetch_array($myQry)) {
														if ($leaderData['npp']== $dataLeader) {
														$cek = " selected";
														} else { $cek=""; }
														echo "<option value='$leaderData[npp]' $cek>".$leaderData['nama_emp']."</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Kirim</button>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>
