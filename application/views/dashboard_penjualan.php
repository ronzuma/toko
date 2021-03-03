<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('include/header.php'); ?>
	<link rel="stylesheet" href="<?php echo config_item('assets'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
							<h1>Report Penjualan </h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Monthly Recap Report</h5>									
								</div>
								
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<p class="text-center">
												<strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
											</p>
											<div class="chart">
												<canvas id="salesChart" height="180" style="height: 180px;"></canvas>
											</div>
										</div>
									</div>
									<!-- /.row -->
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-sm-6 col-6">
											<div class="description-block border-right">
											<span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
											<h5 class="description-header">Rp.35,210.43</h5>
											<span class="description-text">TOTAL REVENUE</span>
											</div>
										</div>
										<div class="col-sm-6 col-6">
											<div class="description-block">
												<span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
												<h5 class="description-header">1200</h5>
												<span class="description-text">SISA STOCK</span>
											</div>
										</div>
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
	<!-- DataTables -->
	<script src="<?php echo config_item('assets'); ?>plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo config_item('assets'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo config_item('assets'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>

	<!-- ChartJS -->
	<script src="<?php echo config_item('assets'); ?>plugins/chart.js/Chart.min.js"></script>
	<script src="<?php echo config_item('assets'); ?>dist/js/pages/dashboard2.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){			
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});
			var type='<?php echo $type;?>';
			if (type!==''){
				Toast.fire({
					type: '<?php echo $type;?>',
					title: '<?php echo $pesan;?>'
				});
				
				window.setTimeout(function() {
					window.location.href = "<?php echo site_url('Toko'); ?>";
				}, 2000);
				
			}	
		});

		$(function () {
			$("#example1").DataTable();
		});
	</script>
	
</body>
</html>