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
							<h1>Toko </h1>
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
										  <i class="icon-copy fa fa-plus"></i> Tambah Toko
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Kode Toko</th>
											<th>Nama Toko</th>
											<th>Lokasi</th>
											<th>Officer</th>
											<th>Telp</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($toko as $tk): ?>
										<tr>
											<td width="150">
												<?php echo $tk->id_toko ?>
											</td>
											<td width="150">
												<?php echo $tk->nama_toko ?>
											</td>
											<td>
												<?php echo $tk->lokasi ?>
											</td>
											<td>
												<?php echo $tk->cp ?>
											</td>
											<td>
												<?php echo $tk->telp ?>
											</td>
											<td>
												<div class="btn-group-vertical">
													<div class="btn-group">
														<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i>
														</button>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="<?php echo site_url('Distribusi/pilih_barang/'.$tk->id_toko); ?>">Distribusi</a></li>
															<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_edit<?php echo $tk->id_toko;?>">Edit</a></li>
															<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_Delete<?php echo $tk->id_toko;?>">Delete</a></li>
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
			<?php echo form_open('Toko/tambah') ?>
			<div class="modal fade" id="modal-lg">
				<div class="modal-dialog modal-lg">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Toko</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Kode Toko</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="id_toko" id="id_toko">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Toko</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama_toko" id="nama_toko">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="lokasi" id="lokasi">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Officer</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="cp" id="cp">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">NIK</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="number" name="nik" id="nik">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Telp</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="telp" id="telp">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Status</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="status" id='status'>
												<option value='Lebui'>Lebui</option>
												<option value='Officer'>Officer</option>
											</select>
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
			
			<!-- Edit Toko -->
			<?php foreach($toko as $tk):?>
			<?php echo form_open('Toko/edit') ?>
			<div class="modal fade" id="modal_edit<?php echo $tk->id_toko;?>">
				<div class="modal-dialog modal-lg">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Toko</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Id Toko</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="id_toko" id="id_toko" value="<?php echo $tk->id_toko ?>" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Toko</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama_toko" id="nama_toko" value="<?php echo $tk->nama_toko ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="lokasi" id="lokasi" value="<?php echo $tk->lokasi ?>">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Officer</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="cp" id="cp" value="<?php echo $tk->cp ?>">
										</div>
									</div>
								</div>								
							</div>							
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">NIK</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="number" name="nik" id="nik" value="<?php echo $tk->nik ?>">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Telp</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="telp" id="telp" value="<?php echo $tk->telp ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Status</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="status" id='status'>
												<option value='Lebui' <?php if ($tk->status=='Lebui') echo 'selected'?>>Lebui</option>
												<option value='Officer' <?php if ($tk->status=='Officer') echo 'selected'?> >Officer</option>
											</select>
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
			
			<!-- Delete Toko -->
			<?php foreach($toko as $tk):?>
			<?php echo form_open('Toko/hapus') ?>
			<div class="modal fade" id="modal_Delete<?php echo $tk->id_toko;?>">
				<div class="modal-dialog modal-sm">
					<div class="modal-content bg-warning">
						<div class="modal-body">
							<input class="form-control" type="text" name="id_toko" id="id_toko" value="<?php echo $tk->id_toko ?>" hidden>
							<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
							<p>Apakah Anda Yakin Menghapus Toko <?php echo $tk->nama_toko?> ?</p>
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