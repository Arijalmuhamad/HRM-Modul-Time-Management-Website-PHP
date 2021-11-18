<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Approval izin";
	$menuparent = "approval";
	include("layout_top.php");
	$now = date('Y-m-d');
	$Sql = "SELECT izin.*, employee.* FROM izin, employee WHERE izin.npp=employee.npp AND izin.no_izin='$_GET[no]'";
	$Qry = mysqli_query($conn, $Sql);
	$data = mysqli_fetch_array($Qry);

?>
<script type="text/javascript">
$(document).ready(function() {
    $('#aksi').change(function(){
        if($(this).val() === '2'){
            $('#mng').attr('disabled', 'disabled');
            $('#reject').attr('disabled', false);
        }else{
            $('#mng').attr('disabled', false);
            $('#reject').attr('disabled', 'disabled');
        }
    });

});
</script>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Persetujuan izin Dinas</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" name="izin" action="approval_update3.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Review Pengajuan izin</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">No. izin</label>
										<div class="col-sm-4">
											<input type="text" name="no" class="form-control" value="<?php echo $data['no_izin'];?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Pemohon</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo $data['nama_emp'];?> " readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Pengajuan</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo IndonesiaTgl($data['tgl_pengajuan']);?> " readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Mulai</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo IndonesiaTgl($data['tgl_mulai']);?> " readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Selesai</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo IndonesiaTgl($data['tgl_selesai']);;?> " readonly>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-sm-3">Tujuan</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo $data['tujuan'];?> " readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Durasi</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo $data['durasi'];?> " readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" readonly><?php echo $data['keterangan'];?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Aksi</label>
										<div class="col-sm-4">
											<select name="aksi" id="aksi" class="form-control" required>
												<option value="" selected>---- Pilih Aksi ----</option>
												<option value="1">Setujui</option>
												<option value="2">Tolak</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Manager</label>
										<div class="col-sm-4">
											<select name="mng" id="mng" class="form-control" disabled>
												<?php
													$sql_don = "SELECT * FROM employee WHERE hak_akses='Manager' AND active='Aktif' ORDER BY nama_emp ASC";
													$ress_don = mysqli_query($conn, $sql_don);
													while($li = mysqli_fetch_array($ress_don)) {
														echo '<option value="'. $li['npp'] .'">'. $li['nama_emp'].'</option>';
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan Tolak</label>
										<div class="col-sm-4">
											<textarea name="reject" id="reject" class="form-control" placeholder="Keterangan Reject" rows="3" disabled></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
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