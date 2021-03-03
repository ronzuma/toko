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
							<h1>Distribusi Barang</h1>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary card-outline">
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-sm-6 col-md-8">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>Barcode</th>
														<th>Nama Barang</th>
														<th>Stock</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($barang as $brg): ?>
													<tr>
														<td width="150">
															<?php echo $brg->barcode ?>
														</td>
														<td width="150">
															<?php echo $brg->nama_barang ?>
														</td>
														<td>
															<?php echo $brg->stok_barang ?>
														</td>												
														<td>
															<div class="center" id="form_jumlah_<?php echo $brg->barcode ;?>">
																<div class="input-group">
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant<?php echo $brg->barcode ;?>">
																			<span class="fa fa-minus"></span>
																		</button>
																	</span>
																	<input type="text" name="quant<?php echo $brg->barcode ;?>" class="form-control input-number" value="1" min="1" max="100" readonly id="<?php echo $brg->barcode ;?>">
																	
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant<?php echo $brg->barcode ;?>">
																			<span class="fa fa-plus"></span>
																		</button>
																	</span>
																</div>
																</br>
																<div class="input-group">
																	<button class="add_cart btn btn-info btn-block" data-produkid="<?php echo $brg->barcode;?>" data-produknama="<?php echo $brg->nama_barang;?>" data-produkharga="<?php echo $brg->harga_jual;?>"><i class="fa fa-check"></i> Input</button>
																</div>
															</div>
														</td>
													</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>										
										<div class="col-12 col-sm-6 col-md-4">
											<h4>Shopping Cart</h4>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Produk</th>
														<th>Harga</th>
														<th>Qty</th>
														<th>Subtotal</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody id="detail_cart">

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
			
			$('.add_cart').click(function(){
				
				var produk_id    = $(this).data("produkid");
				var produk_nama  = $(this).data("produknama");
				var produk_harga = $(this).data("produkharga");
				var quantity     = $('#' + produk_id).val();
				var form_jumlah = 'form_jumlah_' + produk_id;
				var form_check = 'form_check_' + produk_id;
				
				$.ajax({
					url : "<?php echo base_url();?>index.php/Distribusi/add_to_cart",
					method : "POST",
					data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
					success: function(data){
						$('#detail_cart').html(data);
						
						Toast.fire({
							type: 'success',
							title: 'Masuk keranjang.'
						})
					}
				});
			});
			
			
			// Load shopping cart
			$('#detail_cart').load("<?php echo base_url();?>index.php/Distribusi/load_cart");

		});

		
		//plus minus
		$('.btn-number').click(function(e){
			fieldName = $(this).attr('data-field');
			type      = $(this).attr('data-type');

			var input = $("input[name='"+fieldName+"']");
			var currentVal = parseInt(input.val());
			if(type == 'minus') {
				if(currentVal > input.attr('min')) {
					input.val(currentVal - 1).change();
				}
				if(parseInt(input.val()) == input.attr('min')) {
					$(this).attr('disabled', true);
				}
			}else if(type == 'plus') {
				if(currentVal < input.attr('max')) {
					input.val(currentVal + 1).change();
				}
			}

		});
		
		$('.input-number').change(function() {
			minValue =  parseInt($(this).attr('min'));
			maxValue =  parseInt($(this).attr('max'));
			valueCurrent = parseInt($(this).val());
			name = $(this).attr('name');
			if(valueCurrent >= minValue) {
				$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
			} else {
				alert('Sorry, the minimum value was reached');
				$(this).val($(this).data('oldValue'));
			}
		});
		
		$(function () {
			$("#example1").DataTable();
		});
	</script>
	
</body>
</html>