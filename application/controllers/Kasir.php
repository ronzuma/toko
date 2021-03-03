<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('ap_level') == 'backend'){
			redirect();
		}
		$this->load->model('M_transaksi');
	}
	
	public function getbarang($id){
		$this->load->model('M_barang');
		$barang = $this->M_barang->get_by_id($id);
		if ($barang) {
			if ($barang->stok_barang == '0') {
				$disabled = 'disabled';
			}else{
				$disabled = '';
			}
			
			echo 	'<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label class="col-sm-12 col-md-4 col-form-label">Nama Barang :</label>
								<div class="col-sm-12 col-md-8">
									<input type="text" class="form-control reset" name="nama_barang" id="nama_barang" value="'.$barang->nama_barang.'" readonly="readonly">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label class="col-sm-12 col-md-4 col-form-label">Harga (Rp) :</label>
								<div class="col-sm-12 col-md-8">
									<input type="text" class="form-control reset" name="harga_barang" id="harga_barang" value="'.number_format( $barang->harga_barang, 0 ,'' , '.' ).'" readonly="readonly">
								</div>
							</div>
						</div>
					</div>
					<div class="row">								
						<div class="col-sm-6">
							<div class="form-group row">
								<label class="col-sm-12 col-md-4 col-form-label">Quantity :</label>
								<div class="col-sm-12 col-md-8">
									<input type="number" class="form-control reset" autocomplete="off" onchange="subTotal(this.value)" onkeyup="subTotal(this.value)" id="qty" min="0" max="'.$barang->stok_barang.'" '.$disabled.' name="qty" placeholder="Isi qty...">
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
					</div>';
		}
	}


	public function ajax_list_transaksi(){
		$data = array();
		$no = 1; 
		foreach ($this->cart->contents() as $items){
			$row = array();
			$row[] = $no;
			$row[] = $items["id"];
			$row[] = $items["name"];
			$row[] = 'Rp. ' . number_format( $items['price'], 0 , '' , '.' ) . ',-';
			$row[] = $items["qty"];
			$row[] = 'Rp. ' . number_format( $items['subtotal'], 0 , '' , '.' ) . ',-';
			$row[] = '<a href="javascript:void()" style="color:rgb(255,128,128);
			text-decoration:none" onclick="deletebarang('."'".$items["rowid"]."'".','."'".$items['subtotal']."'".')"> <i class="fa fa-close"></i> Delete</a>';
			$data[] = $row;
			$no++;
		}
		
		$output = array(
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function addbarang(){
		$data = array(
			'id' => $this->input->post('id_barang'),
			'name' => $this->input->post('nama_barang'),
			'price' => str_replace('.', '', $this->input->post('harga_barang')),
			'qty' => $this->input->post('qty')
		);
		
		$insert = $this->cart->insert($data);

		echo json_encode(array("status" => TRUE));
	}


	public function deletebarang($rowid){
		$this->cart->update(
			array(
				'rowid'=>$rowid,
				'qty'=>0,
			)
		);
		echo json_encode(array("status" => TRUE));
	}

	public function list_data(){
		$this->load->model('M_transaksi');
		
		//generate Nota
		$tanggal=date('Y-m-d');
		$sql = $this->db->query("SELECT MAX(RIGHT(no_nota, 4)) as nota FROM penjualan WHERE DATE_FORMAT(waktu, '%Y-%m-%d')='".$tanggal."'");
		$cek = $sql->num_rows();
		
		if($cek <> 0){        
			$data = $sql->row();      
			$kode = intval($data->nota) + 1; 
		}else{      
			$kode = 1;
		}
		
		$tgl=date('Ymd'); 
		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
		$nota = "S_".$tgl.$batas;

		$sql='INSERT INTO penjualan_detail VALUES ';
		foreach ($this->cart->contents() as $items){
			$id= $items["id"];
			$nama = $items["name"];
			$harga = $items['price'];
			$qty = $items["qty"];
			$sub_total = $items['subtotal'];

			$sql .= '("'.$nota.'", "'.$id.'", "'.$nama.'", "'.$qty.'", "'.$harga.'", "'.$sub_total.'"), ';
		}
		$sql = rtrim($sql, ', ');

		$trx = array (
			'nota'		=>$nota,
			'nominal'	=>$this->cart->total(),
			'kasir'		=>$this->session->userdata('ap_nama')
		);

		$detail_trx = $this->M_transaksi->checkout($sql, $trx, $nota);

  		if ($detail_trx==True){
			$this->cart->destroy();
		}

		redirect(penjualan);
	}

}