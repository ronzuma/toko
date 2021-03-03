<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pembelian extends MY_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('M_barang');
		$this->load->model('M_pembelian');
		$this->load->model('M_supplier');
	}

	public function index(){
		$data['supplier'] = $this->M_supplier->all();
		$this->load->view('select_supplier', $data);
	}
	
	public function supplier($id_supplier){
		//generate no_nota
		$no_urut = $this->db->query("SELECT max(no_nota) as no_transaksi FROM pembelian")->row();
		$no_transaksi = $no_urut->no_transaksi;
		$noUrut = (int) substr($no_transaksi, 5);
		$noUrut++;		
		$tgl=date('dmY');		
		$char = "TR".$tgl;
		
		$user				= $this->session->userdata('ap_nama');
		$data['barang'] 	= $this->M_barang->get();
		$data['total'] 		= $this->M_pembelian->total($user);
		$data['ns'] 		= $char.sprintf("%04s", $noUrut);

		$this->load->view('pembelian',$data);
	}
	
	public function getbarang($id){
		$barang = $this->M_barang->get_by_id($id);
		$brg 	= $this->M_barang->get();
		if ($barang) {			
			echo 	'<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label class="col-sm-12 col-md-4 col-form-label">Id Barang:</label>
								<div class="col-sm-12 col-md-8">
									<input list="list_barang" class="form-control reset" value="'.$barang->barcode.'" name="id_barang" id="id_barang" autocomplete="off" onchange="showBarang(this.value)">
									<datalist id="list_barang">';
										foreach ($brg as $br):
										echo '<option value="'.$br->barcode.'">'.$br->nama_barang.'</option>';
										endforeach;
			echo					'</datalist>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label class="col-sm-12 col-md-4 col-form-label">Nama Barang :</label>
								<div class="col-sm-12 col-md-8">
									<input type="text" class="form-control reset" name="nama_barang" id="nama_barang" value="'.$barang->nama_barang.'" readonly="readonly">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row">
								<label class="col-sm-12 col-md-4 col-form-label">Harga Beli (Rp) :</label>
								<div class="col-sm-12 col-md-8">
									<input type="number" class="form-control reset" name="harga_beli" id="harga_beli" value="'.number_format( $barang->harga_modal, 0 ,'' , '.' ).'">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label class="col-sm-12 col-md-4 col-form-label">Harga Jual(Rp) :</label>
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
					</div>';
		}
	}


	public function ajax_list_transaksi(){
 		$user=$this->session->userdata('ap_nama');
		$data = array();
		$no = 1;
		$dump_pembelian=$this->M_pembelian->dump_pembelian($user);
		foreach ($dump_pembelian as $items){
			$row = array();
			$row[] = $no;
			$row[] = $items->id_barang;
			$row[] = $items->nama_barang;
			$row[] = 'Rp. ' . number_format( $items->harga_barang, 0 , '' , '.' ) . ',-';
			$row[] = $items->jumlah;
			$row[] = 'Rp. ' . number_format( ($items->jumlah*$items->harga_barang), 0 , '' , '.' ) . ',-';
			$row[] = '<a href="javascript:void()" style="color:rgb(255,128,128);
			text-decoration:none" onclick="deletebarang('."'".$items->id_barang."'".','."'".$items->jumlah."'".')"> <i class="fa fa-close"></i> Delete</a>';
			$data[] = $row;
			$no++;
		}
		
		$output = array(
			"data" => $data,
		);

		echo json_encode($output);
		
	}

	public function addbarang(){
		$no_nota=$this->input->post('kode_trx');
		
		if($no_nota==''){
			//generate Nota
			$tanggal=date('Y-m-d');
			$sql = $this->db->query("SELECT MAX(RIGHT(no_nota, 4)) as nota FROM pembelian WHERE tanggal='".$tanggal."'");
			$cek = $sql->num_rows();
			
			if($cek <> 0){        
				$data = $sql->row();      
				$kode = intval($data->nota) + 1; 
			}else{      
				$kode = 1;
			}
			
			$tgl=date('Ymd'); 
			$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
			$no_nota = "B_".$tgl.$batas;
		}
		
		$data = array(
			'no_nota'		=> $no_nota,
			'tanggal'		=> $this->input->post('tanggal'),
			'id_barang' 	=> $this->input->post('id_barang'),
			'nama_barang'	=> $this->input->post('nama_barang'),
			'harga_barang' 	=> str_replace('.', '', $this->input->post('harga_beli')),
			'jumlah' 		=> $this->input->post('qty'),
			'user'			=> $this->session->userdata('ap_nama')
		);
		
		$user=$this->session->userdata('ap_nama');
		$id_barang=$this->input->post('id_barang');
		
		$sql = $this->db->query("SELECT id_barang FROM dump_pembelian where id_barang='$id_barang' and user='$user'");
		$cek_id = $sql->num_rows();
		
		if ($cek_id > 0) {
			$insert = $this->M_pembelian->update_pembelian($data);
		}else{
			$insert = $this->M_pembelian->tambah_pembelian($data);
		}

		echo json_encode(array("status" => TRUE));
	}


	public function deletebarang($rowid){
		$user=$this->session->userdata('ap_nama');
		$this->M_pembelian->delete_pembelian($rowid, $user);
		echo json_encode(array("status" => TRUE));
	}

	public function list_data(){
		$user=$this->session->userdata('ap_nama');
		$trx=$this->M_pembelian->checkout($user);
		redirect(pembelian);
	}

}