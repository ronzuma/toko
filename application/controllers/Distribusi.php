<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Distribusi extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_distribusi');
	}
	
	public function pilih_barang($id_toko){
 		$data['barang'] = $this->M_distribusi->barang();
		$data['toko'] = $this->M_distribusi->toko($id_toko);
		$this->load->view('distribusi', $data);
	}
	
	function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id' => $this->input->post('produk_id'), 
			'name' => $this->input->post('produk_nama'), 
			'price' => $this->input->post('produk_harga'), 
			'qty' => $this->input->post('quantity'), 
		);
		$this->cart->insert($data);
		echo $this->show_cart(); //tampilkan cart setelah added
	}
	
	function show_cart(){ //Fungsi untuk menampilkan Cart
		$output = '';
		$no = 0;
		$total_item=0;
		foreach ($this->cart->contents() as $items) {
			$total_item=$total_item+$items['qty'];
			$no++;
			$output .='
				<tr>
					<td>'.$no.'.</td>
					<td>'.$items['name'].'</td>
					<td>'.$items['qty'].'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Hapus</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="2">Total</th>
				<th colspan="3">'.$total_item.' item</th>
			</tr>
		';
		return $output;
	}
	
	function load_cart(){ //load data cart
		echo $this->show_cart();
	}
	
	function hapus_cart(){
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		$this->load_cart();
	}
	
	function batal(){
		$this->cart->destroy();
		$this->load_cart();
	}
	
	public function proses($id_toko){
		$proses = $this->M_distribusi->proses($id_toko);
		if($proses==True){
			$this->cart->destroy();
			redirect(Toko);
		}else{
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'Distribusi Barang Gagal!';
			
			$data['barang'] = $this->M_distribusi->barang();
			$data['toko'] = $this->M_distribusi->toko($id_toko);
			$this->load->view('distribusi', $data);
		}
	}
}