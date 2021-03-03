<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('include/header.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php $this->load->view('include/navbar.php'); ?>
		<?php $this->load->view('include/sidebar.php'); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Laporan Pembelian </h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-12">
							<div class="card card-success card-outline">
								<div class="card">
									<div class="card-header">
									</div>
									<div class="card-body">
										<?php echo form_open('Report', array('id' => 'FormLaporan')); ?>
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group row">
														<label class="col-sm-12 col-md-4 col-form-label">Dari Tanggal:</label>
														<div class="col-sm-12 col-md-8">
															<input type='text' name='from' class='form-control' id='tanggal_dari' value="<?php echo date('Y-m-d'); ?>">
														</div>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="form-group row">
														<label class="col-sm-12 col-md-4 col-form-label">Sampai Tanggal:</label>
														<div class="col-sm-12 col-md-8">
															<input type='text' name='to' class='form-control' id='tanggal_sampai' value="<?php echo date('Y-m-d'); ?>">
														</div>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group row">													
														<div class="col-sm-12 col-md-12">
															<button type="submit" class="btn btn-success notika-btn-success" style='margin-left: 0px;'>Tampilkan</button>
														</div>
													</div>
												</div>
											</div>
										<?php echo form_close(); ?>
										<br />
										<div id='result'></div>
									</div>
								</div>
							</div>
						</div>					
					</div>	
				</div>
			</section>
		</div>
		<?php $this->load->view('include/footer.php'); ?>
	</div>
	<?php $this->load->view('include/plugin.php'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo config_item('assets'); ?>datetimepicker/jquery.datetimepicker.css"/>
	<script src="<?php echo config_item('assets'); ?>datetimepicker/jquery.datetimepicker.js"></script>
	<script>
		$('#tanggal_dari').datetimepicker({
			lang:'en',
			timepicker:false,
			format:'Y-m-d',
			closeOnDateSelect:true
		});
		$('#tanggal_sampai').datetimepicker({
			lang:'en',
			timepicker:false,
			format:'Y-m-d',
			closeOnDateSelect:true
		});
		
		$(document).ready(function(){
			$('#FormLaporan').submit(function(e){
				e.preventDefault();
				var TanggalDari = $('#tanggal_dari').val();
				var TanggalSampai = $('#tanggal_sampai').val();
				if(TanggalDari == '' || TanggalSampai == '')
				{
					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html('Oops !');
					$('#ModalContent').html("Tanggal harus diisi !");
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
					$('#ModalGue').modal('show');
				}
				else
				{
					var URL = "<?php echo site_url('Report/detail_pembelian'); ?>/" + TanggalDari + "/" + TanggalSampai;
					$('#result').load(URL);
				}
			});
		});
	</script>
</body>
</html>