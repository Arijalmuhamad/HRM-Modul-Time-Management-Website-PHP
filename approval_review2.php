<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Approval lembur";
	$menuparent = "approval";
	include("layout_top.php");
	$now = date('Y-m-d');
	$Sql = "SELECT lembur.*, employee.* FROM lembur, employee WHERE lembur.npp=employee.npp AND lembur.no_lembur='$_GET[no]'";
	$Qry = mysqli_query($conn, $Sql);
	$data = mysqli_fetch_array($Qry);

?>
<script type="text/javascript">
$(document).ready(function() {
    $('#aksi').change(function(){
        if($(this).val() === '2'){
            $('#reject').attr('disabled', false);
        }else{
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
                        <h1 class="page-header">Data Persetujuan lembur</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" name="lembur" action="approval_update2.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Review Pengajuan lembur</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">No. lembur</label>
										<div class="col-sm-4">
											<input type="text" name="no" class="form-control" value="<?php echo $data['no_lembur'];?>" readonly>
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
										<label class="control-label col-sm-3">Jam Mulai</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo ($data['jam_mulai']);?> " readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jam Selesai</label>
										<div class="col-sm-4">
											<input type="text" name="mulai" class="form-control" value="<?php echo ($data['jam_selesai']);?> " readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Total Jam</label>
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
										<label class="control-label col-sm-3">Keterangan Tolak</label>
										<div class="col-sm-4">
											<textarea name="reject" id="reject" class="form-control" placeholder="Keterangan Tolak" rows="3" disabled></textarea>
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