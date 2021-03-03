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
							<h1>Supplier </h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<div class="col-sm-3">
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
										  <i class="icon-copy fa fa-plus"></i> Tambah Supplier
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>kode Supplier</th>
												<th>Nama Supplier</th>
												<th>Alamat</th>
												<th>Owner</th>
												<th>Telp</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($supplier as $sp): ?>
											<tr>
												<td width="150">
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
													<?php echo $sp->telp ?>
												</td>
												<td>
													<div class="btn-group-vertical">
														<div class="btn-group">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i>
															</button>
															<ul class="dropdown-menu">
																<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_edit<?php echo $sp->id_supplier;?>">Edit</a></li>
																<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_Delete<?php echo $sp->id_supplier;?>">Delete</a></li>
															</ul>
														</div>
													</div>
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
			
			<!-- Tambah Toko -->
			<?php echo form_open('Supplier/tambah') ?>
			<div class="modal fade" id="modal-lg">
				<div class="modal-dialog modal-lg">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Supplier</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Kode Supplier</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="id_supplier" id="id_supplier">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Supplier</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama_sup" id="nama_sup">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="alamat" id="alamat">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Owner</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="owner" id="owner">
										</div>
									</div>
								</div>								
							</div>							
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Telp</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="number" name="telp" id="telp">
										</div>
									</div>
								</div>								
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button class="btn btn-success notika-btn-success">Tambah</button>
						</div>
					</div>

				</div>
			</div>		
			<?php echo form_close() ?>
			
			<!-- Edit Supplier -->
			<?php foreach($supplier as $sp):?>
			<?php echo form_open('Supplier/edit') ?>
			<div class="modal fade" id="modal_edit<?php echo $sp->id_supplier;?>">
				<div class="modal-dialog modal-lg">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Supplier</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Id Supplier</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="id_supplier" id="id_supplier" value="<?php echo $sp->id_supplier ?>" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Supplier</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama_sup" id="nama_sup" value="<?php echo $sp->nama_sup ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo $sp->alamat ?>">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Owner</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="owner" id="owner" value="<?php echo $sp->owner ?>">
										</div>
									</div>
								</div>								
							</div>							
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Telp</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="number" name="telp" id="telp" value="<?php echo $sp->telp ?>">
										</div>
									</div>
								</div>								
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button class="btn btn-success notika-btn-success">Edit</button>
						</div>
					</div>

				</div>
			</div>		
			<?php echo form_close() ?>	
			<?php endforeach; ?>
			
			<!-- Delete Supplier -->
			<?php foreach($supplier as $sp):?>
			<?php echo form_open('Supplier/hapus') ?>
			<div class="modal fade" id="modal_Delete<?php echo $sp->id_supplier;?>">
				<div class="modal-dialog modal-sm">
					<div class="modal-content bg-warning">
						<div class="modal-body">
							<input class="form-control" type="text" name="id_supplier" id="id_supplier" value="<?php echo $sp->id_supplier ?>" hidden>
							<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
							<p>Apakah Anda Yakin Menghapus Toko <?php echo $sp->nama_sup?> ?</p>
							<div class="row">
								<div class="col-sm-6">
									<button class="btn btn-block btn-danger">Delete</button>
								</div>
								<div class="col-sm-6">									
									<button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close() ?>	
			<?php endforeach; ?>
			
		</div>
		<?php $this->load->view('include/footer.php'); ?>
	</div>
	<?php $this->load->view('include/plugin.php'); ?>
	<!-- DataTables -->
	<script src="<?php echo config_item('assets'); ?>plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo config_item('assets'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo config_item('assets'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
	<script>
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
					window.location.href = "<?php echo site_url('Supplier'); ?>";
				}, 2000);
				
			}	
		});
		
		$(function () {
			$("#example1").DataTable();
		});
	</script>
	
</body>
</html>