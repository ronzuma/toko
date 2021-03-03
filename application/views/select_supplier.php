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
							<h1>Pembelian dari Supplier </h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary ">
								
								

									
									<div class="card-body">
										<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>kode Supplier</th>
												<th>Nama Supplier</th>
												<th>Alamat</th>
												<th>Owner</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($supplier as $sp): ?>
											<tr>
												<td>
													<?php echo $sp->id_supplier ?>
												</td>
												<td width="150">
													<?php echo $sp->nama_sup ?>
												</td>
												<td>
													<?php echo $sp->alamat ?>
												</td>
												<td>
													<?php echo $sp->owner ?>
												</td>												
												<td>													
													<a type="button" class="btn btn-info" href="<?php echo site_url('Pembelian/supplier/').$sp->id_supplier; ?>">
														 Proses
													</a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
										</table>
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
	<script>
		$(function () {
			$("#example1").DataTable();
		});
	</script>
	
</body>
</html>