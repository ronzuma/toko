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
						<div class="col-md-12">
							<div class="card card-primary">
								<div class="card-header">
									
								</div>
								<div class="card-body">
									<form class="form-horizontal" id="form_transaksi" role="form">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group row">
													<label class="col-sm-12 col-md-4 col-form-label">Id Barang:</label>
													<div class="col-sm-12 col-md-8">
														<input list="list_barang" class="form-control reset" placeholder="Isi id..." name="id_barang" id="id_barang" autocomplete="off" onchange="showBarang(this.value)">
														<datalist id="list_barang">
															<?php foreach ($barang as $barang): ?>
															<option value="<?= $barang->id_barang ?>"><?= $barang->nama_barang ?></option>
															<?php endforeach ?>
														</datalist>
													</div>
												</div>
											</div>
										</div>
										<div id="barang">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group row">
														<label class="col-sm-12 col-md-4 col-form-label">Nama Barang :</label>
														<div class="col-sm-12 col-md-8">
															<input type="text" class="form-control reset" name="nama_barang" id="nama_barang" readonly="readonly">
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group row">
														<label class="col-sm-12 col-md-4 col-form-label">Harga (Rp) :</label>
														<div class="col-sm-12 col-md-8">
															<input type="text" class="form-control reset" name="harga_barang" id="harga_barang" readonly="readonly">
														</div>
													</div>
												</div>
											</div>
											<div class="row">								
												<div class="col-sm-6">
													<div class="form-group row">
														<label class="col-sm-12 col-md-4 col-form-label">Quantity :</label>
														<div class="col-sm-12 col-md-8">
															<input type="number" class="form-control reset" autocomplete="off" onchange="subTotal(this.value)" onkeyup="subTotal(this.value)" id="qty" min="0" name="qty" placeholder="Isi qty...">
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group row">
														<label class="col-sm-12 col-md-4 col-form-label">Sub-Total (Rp):</label>
														<div class="col-sm-12 col-md-8">
															<input type="text" class="form-control reset" name="sub_total" id="sub_total" readonly="readonly">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">								
											<div class="col-sm-6">
												<div class="form-group row">
													<div class="col-sm-12 col-md-4">
													</div>
													<div class="col-sm-12 col-md-8">
														<button type="button" class="btn btn-primary" id="tambah" onclick="addbarang()">
															<i class="fa fa-cart-plus"></i> Tambah
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
									<div class="row">
										<div class="col-sm-12">
											<table id="table_transaksi" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>Id Barang</th>
														<th>Nama Barang</th>
														<th>Harga</th>
														<th>Quantity</th>
														<th>Sub-Total</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>	
									<?php echo form_open('Kasir/list_data') ?>
									<div class="row">
										<div class="col-sm-12">
											<div class='alert alert-info TotalBayar'>
												<h2>Total : <span id='TotalBayar'><?php echo number_format($this->cart->total(), 0 , '' , '.' );?></span></h2>										
												<input type="hidden" name="total" id="total" value="<?= number_format($this->cart->total(), 0 , '' , '.' ); ?>">
											</div>
										</div>										
									</div>
									<div class="row">
										<div class="col-sm-5">
											<div class="form-group row">
												<label class="col-sm-12 col-md-4 col-form-label">Bayar (Rp) :</label>
												<div class="col-sm-12 col-md-8">
													<input type="text" class="form-control input-lg uang" 
													name="bayar" placeholder="0" autocomplete="off"
													id="bayar" onkeyup="showKembali(this.value)">
												</div>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="form-group row">
												<label class="col-sm-12 col-md-4 col-form-label">Kembali (Rp) :</label>
												<div class="col-sm-12 col-md-8">
													<input type="text" class="form-control input-lg" 
													name="kembali" id="kembali" placeholder="0"
													readonly="readonly">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-5">
											<div class="form-group row">
												<label class="col-sm-12 col-md-4 col-form-label"></label>
												<div class="col-sm-12 col-md-8">
													<button class="btn btn-success notika-btn-success" id="selesai" disabled="disabled">
														Selesai <i class="fa fa-angle-double-right"></i>
													</button>
												</div>
											</div>
										</div>
										
									</div>
									<?php echo form_close(); ?>	
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
	
	<script type="text/javascript">
		function showBarang(str){
			if (str == "") {
				$('#nama_barang').val('');
				$('#harga_barang').val('');
				$('#qty').val('');
				$('#sub_total').val('');
				$('#reset').hide();
				return;
			} else { 
				if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
				// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("barang").innerHTML = 
						xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "<?= base_url('index.php/kasir/getbarang') ?>/"+str,true);
				xmlhttp.send();
			}
		}
		
		function subTotal(qty){
			var harga = $('#harga_barang').val().replace(".", "").replace(".", "");
			$('#sub_total').val(convertToRupiah(harga*qty));
		}
		
		function convertToRupiah(angka){
			var rupiah = '';    
			var angkarev = angka.toString().split('').reverse().join('');
			for(var i = 0; i < angkarev.length; i++) 
			if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
			return rupiah.split('',rupiah.length-1).reverse().join('');
		}
		
		var table;
		$(document).ready(function() {
			showKembali($('#bayar').val());
			table = $('#table_transaksi').DataTable({ 
				paging: false,
				"info": false,
				"searching": false,
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' 
				// server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
				"url": "<?= site_url('kasir/ajax_list_transaksi')?>",
				"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
					{ 
					"targets": [ 0,1,2,3,4,5,6 ], //last column
					"orderable": false, //set not orderable
					},
				],
			});
		});
		
		function reload_table(){
			table.ajax.reload(null,false); //reload datatable ajax 
		}
		
		function addbarang(){
			var id_barang = $('#id_barang').val();
			var qty = $('#qty').val();
			if (id_barang == '') {
				$('#id_barang').focus();
			}else if(qty == ''){
				$('#qty').focus();
			}else{
				// ajax adding data to database
				$.ajax({
					url : "<?= site_url('kasir/addbarang')?>",
					type: "POST",
					data: $('#form_transaksi').serialize(),
					dataType: "JSON",
					success: function(data)
					{
						//reload ajax table
						reload_table();
					},
						error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error adding data');
					}
				});
				showTotal();
				showKembali($('#bayar').val());
				//mereset semua value setelah btn tambah ditekan
				$('.reset').val('');
			};
		}
		
		function deletebarang(id,sub_total){
			// ajax delete data to database
			$.ajax({
				url : "<?= site_url('kasir/deletebarang')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					reload_table();
				},
					error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
			
			var ttl = $('#total').val().replace(".", "");
			$('#total').val(convertToRupiah(ttl-sub_total));
			showKembali($('#bayar').val());
		}
		
		function showTotal(){
			var total = $('#total').val().replace(".", "").replace(".", "");
			var sub_total = $('#sub_total').val().replace(".", "").replace(".", "");
			$('#total').val(convertToRupiah((Number(total)+Number(sub_total))));
			$('#TotalBayar').text(convertToRupiah((Number(total)+Number(sub_total))));
		}
		
		//maskMoney
		$('.uang').maskMoney({
			thousands:'.', 
			decimal:',', 
			precision:0
		});
		
		function showKembali(str){
			var total = $('#total').val().replace(".", "").replace(".", "");
			var bayar = str.replace(".", "").replace(".", "");
			var kembali = bayar-total;
			$('#kembali').val(convertToRupiah(kembali));
			if (kembali >= 0) {
				$('#selesai').removeAttr("disabled");
			}else{
				$('#selesai').attr("disabled","disabled");
			};
			if (total == '0') {
				$('#selesai').attr("disabled","disabled");
			};
		}
	
	</script>
</body>
</html>