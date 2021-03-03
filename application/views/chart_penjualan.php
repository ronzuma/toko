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
							<h1>Transaksi </h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">

								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
										<span class="text-bold text-lg">Rp. 18,230.00</span>
										</p>

									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
									<canvas id="sales-chart" height="200"></canvas>
									</div>

									<div class="d-flex flex-row justify-content-end">
									<span class="mr-2">
									<i class="fas fa-square text-primary"></i> Lebui Pelembak
									</span>

									<span>
									<i class="fas fa-square text-gray"></i> Lebui Kebon Bawak
									</span>
									</div>
								</div>
							</div>
						<!-- /.card -->


						</div>
					</div>
				</div>
			</section>
		</div>
		<?php $this->load->view('include/footer.php'); ?>
	</div>
	<?php $this->load->view('include/plugin.php'); ?>
	


<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo config_item('assets'); ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo config_item('assets'); ?>dist/js/pages/dashboard3.js"></script>
</body>
</html>