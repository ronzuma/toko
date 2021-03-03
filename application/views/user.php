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
							<h1>Management User </h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary card-outline">
								
								<div class="card">
									<div class="card-header">
										<div class="col-sm-3">
											<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
											  <i class="icon-copy fa fa-plus"></i> Tambah User
											</button>
										</div>
									</div>
									
									<div class="card-body">
										<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Nama Lengkap</th>
												<th>Username</th>
												<th>Toko</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($user as $brg): ?>
											<tr>
												<td width="150">
													<?php echo $brg->nama ?>
												</td>
												<td>
													<?php echo $brg->username ?>
												</td>
												<td>
													<?php echo $brg->nama_toko ?>
												</td>
												<td>
													<?php echo $brg->status ?>
												</td>
												<td>
													<div class="btn-group-vertical">
														<div class="btn-group">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i>
															</button>
															<ul class="dropdown-menu">
																<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_edit<?php echo $brg->id_user;?>">Edit</a></li>
																<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_Delete<?php echo $brg->id_user;?>">Delete</a></li>
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
			</section>
			
			<!-- Tambah User -->
			<div class="modal fade" id="modal-lg">
				<div class="modal-dialog modal-lg">
					<form id='form_tambah_user'>
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah User</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama" id="nama">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Username</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="text" name="username" id="username">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Password</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="password" name="password" id="password">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Toko</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="id_toko" id='id_toko'>
												<option value='0'>--pilih--</option>
												<?php 
													foreach ($toko as $tk) {
														echo "<option value='$tk[id_toko]'>$tk[nama_toko]</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Status</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="status" id='status'>
												<option value='Aktif'>Aktif</option>
												<option value='Non Aktif'>Non Aktif</option>
											</select>
										</div>
									</div>
								</div>
							</div>												
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button class="btn btn-success notika-btn-success" onclick="tambah_user()" data-dismiss="modal">Simpan</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		
			<!-- Edit User -->
			<?php foreach($user as $brg):?>
			<?php echo form_open('User/edit') ?>
			<div class="modal fade" id="modal_edit<?php echo $brg->id_user;?>">
				<div class="modal-dialog modal-lg">

					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit User</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="nama" id="nama" value="<?php echo $brg->nama ?>">
											<input class="form-control" type="text" name="id_user" id="id_user" value="<?php echo $brg->id_user ?>" hidden>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Username</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="username" id="username" value="<?php echo $brg->username ?>">
										</div>
									</div>
								</div>								
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Hak Akses</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="id_toko" id='id_toko'>
												<option value='0'>--pilih--</option>
												<?php 
													foreach ($toko as $kat) {
														if($brg->id_toko == $kat['id_toko'])
														echo "<option value='$kat[id_toko]' selected>$kat[nama_toko]</option>";
														else
														echo "<option value='$kat[id_toko]'>$kat[nama_toko]</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Status</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="status" id='status'>
												<option value='Aktif' <?php if ($brg->status=='Aktif') echo 'selected'?>>Aktif</option>
												<option value='Non Aktif' <?php if ($brg->status=='Non Aktif') echo 'selected'?> >Non Aktif</option>
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
			
			<!-- Delete User -->
			<?php foreach($user as $brg):?>
			<?php echo form_open('User/hapus') ?>
			<div class="modal fade" id="modal_Delete<?php echo $brg->id_user;?>">
				<div class="modal-dialog modal-sm">
					<div class="modal-content bg-warning">
						<div class="modal-body">
							<input class="form-control" type="text" name="kode_user" id="kode_user" value="<?php echo $brg->id_user ?>" hidden>
							<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
							<p>Apakah Anda Yakin Menghapus Nama User <?php echo $brg->nama?> ?.</p>
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
	<script>
		$(function () {
			$("#example1").DataTable();
		});
		
		function tambah_user(){
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});

			$.ajax({
				url : "<?= site_url('User/tambah')?>",
				type: "POST",
				data: $("#form_tambah_user").serialize(),
				success: function(data){
					var json = data,
					obj = JSON.parse(json);

					Toast.fire({
						type: obj.type,
						title: obj.pesan
					})
					
					if (obj.type=='success'){
						window.location.href="<?= site_url('User')?>";
					}
				}
			});
		}
		
	</script>
	
</body>
</html>