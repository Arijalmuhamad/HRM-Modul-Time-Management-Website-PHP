<?php
	include("sess_check.php");

	if(isset($_GET['npp'])) {
		$sql = "SELECT * FROM employee WHERE npp='". $_GET['npp'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	// deskripsi halaman
	$pagedesc = "Data Absensi";
	$menuparent = "absensi";
	include("layout_top.php");
?>
<script type="text/javascript">
	function checkNppAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_nppavailability.php",
		data:'npp='+$("#npp").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
	}
</script>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Absensi</h1>
						
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
				echo "<h2>Bulan " . strftime("%B %Y") . "<br></h2>";
				?>
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
                    					<tr>
											<th width="5%">NPP</th>
											<th width="5%">Bulan</th>
											<th width="5%">Hari</th>
											<th width="5%">Tanggal</th>
											<th width="5%">Jam Masuk</th>
											<th width="5%">Jam Keluar</th>
                    					</tr>
                 				 </thead>
					<?php
						include("dist/config/koneksi.php");
						$npp = $_GET['npp'];
						$sql = "SELECT * FROM data_absen WHERE npp='$npp'";
						$ress = mysqli_query($conn, $sql);
						while($d = mysqli_fetch_array($ress)){
					?>
									<tbody>
										<tr>
											<td class="text-center"><?php echo $d['npp']; ?></td>
											<td class="text-center"><?php echo $d['id_bln']; ?></td>
											<td class="text-center"><?php echo $d['id_hri']; ?></td>
											<td class="text-center"><?php echo $d['id_tgl']; ?></td>
											<td class="text-center"><?php echo $d['jam_msk']; ?></td>
											<td class="text-center"><?php echo $d['jam_klr']; ?></td>
										</tr>
					
									</tbody>
					<?php } ?>
                				</table>
             		
      <!-- Large modal -->
        <div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-body">
                <p>One fine body…</p>
              </div>
            </div>
          </div>
        </div>
            </div><!-- /.panel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper --

					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->

        <!-- <script type="text/javascript">
        	$(document).ready(function() {
        		$('#tabel-data').DataTable({
        			"responsive": true,
        			"processing": true,
        			"columnDefs": [
        				{ "orderable": false, "targets": [6] }
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
        						$($this.data('remote-target')).load('karyawan_detail.php?code='+code);
        						app.code = code;

        					}
        		});
            </script> -->

<!-- bottom of file -->


<?php
	include("layout_bottom.php");
?>