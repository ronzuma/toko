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
							<h1>Rincian Barang </h1>
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
											  <i class="icon-copy fa fa-plus"></i> Tambah Barang
											</button>
										</div>
									</div>
									
									<div class="card-body">
										<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Kode Barang</th>
												<th>Nama Barang</th>
												<th>Warna</th>
												<th>Stok</th>
												<th>Harga Jual</th>
												<th>Harga Beli</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($barang as $brg): ?>
											<tr>
												<td width="150">
													<?php echo $brg->id_barang ?>
												</td>
												<td>
													<?php echo $brg->nama_barang ?>
												</td>
												<td>
													<?php echo $brg->nama_warna ?>
												</td>
												<td>
													<?php echo $brg->stok_barang ?>
												</td>
												<td>
													<?php echo number_format($brg->harga_barang, 0 , '' , '.' );?>
												</td>
												<td>
													<?php echo number_format($brg->harga_modal, 0 , '' , '.' );?>
												</td>
												<td>
													<div class="btn-group-vertical">
														<div class="btn-group">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i>
															</button>
															<ul class="dropdown-menu">
																<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_edit<?php echo $brg->id_barang;?>">Edit</a></li>
																<li><a class="dropdown-item" data-toggle="modal" data-target="#modal_Delete<?php echo $brg->id_barang;?>">Delete</a></li>
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
			
			<!-- Tambah Barang -->
			<?php echo form_open('Detail/tambah'); ?>
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
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Kode Barang</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="text" name="id_barang" id="id_barang">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Produk</label>
								<div class="col-sm-12 col-md-10">
									<select class="form-control" name="produk" id='produk'>
										<option value='0'>--pilih--</option>
										<?php 
											foreach ($produk as $produk) {
												echo "<option value='$produk[id]'>$produk[nama_barang]</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Harga Beli</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="beli" id="beli">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Harga Jual</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="jual" id="jual">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Stok</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="stok" id="stok">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Warna</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="warna" id='warna'>
												<option value='0'>--pilih--</option>
												<?php 
													foreach ($warna as $wr) {
														echo "<option value='$wr[id_warna]'>$wr[nama_warna]</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>					
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button class="btn btn-success notika-btn-success" >Simpan</button>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close() ?>
			
			<!-- Edit Barang -->
			<?php foreach($barang as $brg):?>
			<?php echo form_open('Barang/edit') ?>
			<div class="modal fade" id="modal_edit<?php echo $brg->id_barang;?>">
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
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Kode Barang</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="text" name="id_barang" id="id_barang" value="<?php echo $brg->id_barang ?>" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Produk</label>
								<div class="col-sm-12 col-md-10">
									<select class="form-control" name="produk" id='produk'>
										<option value='0'>--pilih--</option>
										<?php 
											foreach ($produk as $produk) {
												if($brg->id_produk == $kat['id'])
												echo "<option value='$produk[id]' selected>$produk[nama_barang]</option>";
												else
												echo "<option value='$produk[id]'>$produk[nama_barang]</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Harga Beli</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="beli" id="beli" value="<?php echo $brg->harga_modal ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Harga Jual</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="jual" id="jual" value="<?php echo $brg->harga_barang ?>">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Stok</label>
										<div class="col-sm-12 col-md-8">
											<input class="form-control" type="number" name="stok" id="stok" value="<?php echo $brg->stok_barang ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 col-md-4 col-form-label">Warna</label>
										<div class="col-sm-12 col-md-8">
											<select class="form-control" name="warna" id='warna'>
												<option value='0'>--pilih--</option>
												<?php 
													foreach ($warna as $wr) {
														if($brg->warna == $wr['nama_warna'])
														echo "<option value='$wr[nama_warna]' selected>$wr[nama_warna]</option>";
														else
														echo "<option value='$wr[nama_warna]'>$wr[nama_warna]</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>					
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button class="btn btn-success notika-btn-success">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close() ?>			
			<?php endforeach; ?>
			
			<!-- Delete Barang -->
			<?php foreach($barang as $brg):?>
			<?php echo form_open('Barang/hapus') ?>
			<div class="modal fade" id="modal_Delete<?php echo $brg->id_barang;?>">
				<div class="modal-dialog modal-sm">
					<div class="modal-content bg-warning">
						<div class="modal-body">
							<input class="form-control" type="text" name="id_barang" id="id_barang" value="<?php echo $brg->id_barang ?>" hidden>
							<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
							<p>Apakah Anda Yakin Menghapus Data Barang <?php echo $brg->nama_barang?> ?.</p>
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
	</script>
	
</body>
</html>