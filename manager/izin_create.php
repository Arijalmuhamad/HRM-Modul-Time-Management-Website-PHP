<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Buat Pengajuan";
	$menuparent = "izin";
	include("layout_top.php");
	$now = date('Y-m-d');
	$npp = $sess_mngid;
?>

<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pengajuan Izin Dinas</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" name="izin" action="izin_insert.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Form Pengajuan izin</h3></div>
								<div class="panel-body">

									<div class="form-group">
										<label class="control-label col-sm-3">Mulai izin</label>
										<div class="col-sm-4">
											<input type="date" name="mulai" class="form-control" required>
											<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>" required>
											<input type="hidden" name="npp" class="form-control" value="<?php echo $npp;?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Akhir izin</label>
										<div class="col-sm-4">
											<input type="date" name="akhir" class="form-control" required>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-sm-3">Tujuan</label>
										<div class="col-sm-4">
											<input name="tujuan" class="form-control" placeholder="Tujuan" rows="3" required></input>
										</div>
                  					</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
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