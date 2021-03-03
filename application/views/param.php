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
							<h1>Parameter</h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6">
									<div class="card card-info">
										<div class="card-header">
											<h3 class="card-title">
												<i class="fas fa-chart-pie mr-1"></i>
												Kategori
											</h3>
											<div class="card-tools">
												<ul class="nav nav-pills ml-auto">												
													<li class="nav-item">
														<a class="nav-link" data-toggle="modal" data-target="#modal-lg">
															<i class="icon-copy fa fa-plus"></i> Tambah
														</a>
														
														
													</li>
												</ul>
											</div>
										</div>
										<div class="card-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>Nama Kategori</th>
														<th>Keterangan</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($kategori as $kat): ?>
													<tr>
														<td width="150">
															<?php echo $kat->nama_kategori ?>
														</td>
														<td width="150">
															<?php echo $kat->keterangan ?>
														</td>
														<td>
															<div class="btn-group-vertical">
																<div class="btn-group">
																	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i>
																	</button>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_edit<?php echo $kat->id_kategori;?>">Edit</a></li>
																		<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_Delete<?php echo $kat->id_kategori;?>">Delete</a></li>
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
								<div class="col-12 col-sm-6 col-md-6">
									<div class="card card-success">
										<div class="card-header">
											<h3 class="card-title">
												<i class="fas fa-chart-pie mr-1"></i>
												Status Toko
											</h3>
										</div>
										<div class="card-body">
											<table id="example2" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>Status</th>
														<th>Keterangan</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($status as $sts): ?>
													<tr>
														<td width="150">
															<?php echo $sts->status ?>
														</td>
														<td width="150">
															<?php echo $sts->keterangan ?>
														</td>
														<td>
															<div class="btn-group-vertical">
																<div class="btn-group">
																	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i>
																	</button>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_edit<?php echo $sts->id_status;?>">Edit</a></li>
																		<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_Delete<?php echo $sts->id_status;?>">Delete</a></li>
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
					</div>
				</div>
			</section>
		  
		  
			<!-- Tambah Barang -->
			<?php echo form_open('Inventory/tambah') ?>
			<div class="modal fade" id="modal-lg">
				<div class="modal-dialog modal-lg">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Barcode</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="barcode" id="barcode">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama_barang" id="nama_barang">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Kategori</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="id_kategori" id='id_kategori'>
												<option value='0'>--pilih--</option>
												<?php 
													foreach ($kategori as $kat) {
														echo "<option value='$kat[id_kategori]'>$kat[nama_kategori]</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Harga Jual</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="harga_jual" id="harga_jual">
										</div>
									</div>
								</div>
							</div>						
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
										<div class="col-sm-12 col-md-10">
											<textarea class="form-control" rows="3" name="keterangan_barang" id="keterangan_barang"></textarea>
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
			
			<!-- Edit Barang -->
			<?php foreach($barang as $brg):?>
			<?php echo form_open('Inventory/edit') ?>
			<div class="modal fade" id="modal_edit<?php echo $brg->barcode;?>">
				<div class="modal-dialog modal-lg">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Barcode</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="barcode" id="barcode" value="<?php echo $brg->barcode ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama_barang" id="nama_barang" value="<?php echo $brg->nama_barang ?>">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Kategori</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="id_kategori" id='id_kategori'>
												<option value='0'>--pilih--</option>
												<?php 
												foreach ($kategori as $kat) {
													if($brg->id_kategori == $kat['id_kategori'])
													echo "<option value='$kat[id_kategori]' selected>$kat[nama_kategori]</option>";
													else
													echo "<option value='$kat[id_kategori]'>$kat[nama_kategori]</option>";
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Harga Jual</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="harga_jual" id="harga_jual" value="<?php echo $brg->harga_jual ?>">
										</div>
									</div>
								</div>
							</div>						
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
										<div class="col-sm-12 col-md-10">
											<textarea class="form-control" rows="3" name="keterangan_barang" id="keterangan_barang" placeholder="<?php echo $brg->keterangan_barang ?>"></textarea>
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
			
			<!-- Delete barang -->
			<?php foreach($barang as $brg):?>
			<?php echo form_open('Inventory/hapus') ?>
			<div class="modal fade" id="modal_Delete<?php echo $brg->barcode;?>">
				<div class="modal-dialog modal-sm">
					<div class="modal-content bg-warning">
						<div class="modal-body">
							<input class="form-control" type="text" name="barcode" id="barcode" value="<?php echo $brg->barcode ?>" hidden>
							<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
							<p>Apakah Anda Yakin Menghapus Toko <?php echo $brg->nama_barang?> ?</p>
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
					window.location.href = "<?php echo site_url('Inventory'); ?>";
				}, 2000);
				
			}	
		});

		$(function () {
			$("#example1").DataTable();
		});
		
		$(function () {
			$("#example2").DataTable();
		});
	</script>
	
</body>
</html>