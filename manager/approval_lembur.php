<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Approval lembur";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
	$id = $sess_mngid;
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Persetujuan lembur </h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
						<?php
								$Sql = "SELECT lembur.*, employee.* FROM lembur, employee WHERE lembur.npp=employee.npp AND 
										lembur.manager='$id' AND lembur.stt_lembur='Menunggu Persetujuan Manager' ORDER BY lembur.tgl_pengajuan DESC";
								$Qry = mysqli_query($conn, $Sql);
								
							?>						
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="10%">No lembur</th>
											<th width="10%">Nama Pemohon</th>
											<th width="5%">Tgl Pengajuan</th>
											<th width="5%">Jam Mulai</th>
											<th width="5%">Jam Selesai</th>
											<th width="2%">Review</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=1;
											while($data = mysqli_fetch_array($Qry)){
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['no_lembur'] .'</td>';
												echo '<td class="text-center"><a href="#myModal" data-toggle="modal" data-load-npp="'.$data['npp'].'" data-remote-target="#myModal .modal-body">'.$data['nama_emp'].'</a></td>';
                                                echo '<td class="text-center">'. IndonesiaTgl($data['tgl_pengajuan']) .'</td>';
												echo '<td class="text-center">'. $data['jam_mulai'] .'</td>';
												echo '<td class="text-center">'. $data['jam_selesai'] .'</td>';
												echo '<td class="text-center">
													  ';?>
													  <a href="approval_review2.php?no=<?php echo $data['no_lembur'];?>" class="btn btn-primary btn-xs">Review</a></td>
												<?php
													  echo '</td>';
												echo '</tr>';												
												$i++;
											}
										?>
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
	<script>
		var app = {
			code: '0'
		};
		
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('lembur_detail.php?code='+code);
						app.code = code;
						
					}
		});		

		$('[data-load-npp]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var npp = $this.data('load-npp');
					if(npp) {
						$($this.data('remote-target')).load('karyawan_detail.php?code='+npp);
						app.npp = npp;
						
					}
		});		
    </script>
<?php
	include("layout_bottom.php");
?>