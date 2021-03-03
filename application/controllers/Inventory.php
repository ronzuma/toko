<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_inventory');
	}
	
	public function index(){
 		$data['barang'] = $this->M_inventory->barang();
		$data['kategori'] = $this->M_inventory->kategori();
		$this->load->view('inventory', $data);
	}
	
	public function tambah(){
		$barcode=$this->input->post('barcode');
		
		$cek =$this->M_inventory->cek($barcode);
		
		if ($cek > 0) {
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'Barcode sudah ada!';
		} else {
			$data=array(
				'barcode'			=>$barcode,
				'nama_barang'		=>addslashes($this->input->post('nama_barang')),
				'id_kategori'		=>addslashes($this->input->post('id_kategori')),
				'harga_jual'		=>addslashes($this->input->post('harga_jual')),
				'keterangan_barang'	=>addslashes($this->input->post('keterangan_barang'))
			);
			
			$tambah=$this->M_inventory->create($data);
			if ($tambah==True){
				$data['type'] 	= 'success';
				$data['pesan'] 	= 'Tambah Barang Berhasil!';
			}else{
				$data['type'] 	= 'warning';
				$data['pesan'] 	= 'Tambah Barang Gagal!';
			}
		}
			
		$data['barang'] = $this->M_inventory->barang();
		$data['kategori'] = $this->M_inventory->kategori();
		$this->load->view('inventory', $data);
	}
	
	public function edit(){
 		$data=array(
				'barcode'			=>addslashes($this->input->post('barcode')),
				'nama_barang'		=>addslashes($this->input->post('nama_barang')),
				'id_kategori'		=>addslashes($this->input->post('id_kategori')),
				'harga_jual'		=>addslashes($this->input->post('harga_jual')),
				'keterangan_barang'	=>addslashes($this->input->post('keterangan_barang'))
			);
		
		$update=$this->M_inventory->update($data);
		if ($update==True){
			$data['type'] 	= 'success';
			$data['pesan'] 	= 'Edit Barang Berhasil!';
		}else{
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'Edit Barang Gagal!';
		}
		
		$data['barang'] = $this->M_inventory->barang();
		$data['kategori'] = $this->M_inventory->kategori();
		$this->load->view('inventory', $data);
	}
	
	public function hapus(){
		$barcode=$this->input->post('barcode');
		$hapus=$this->M_inventory->hapus($barcode);
		if ($hapus==True){
			$data['type'] 	= 'success';
			$data['pesan'] 	= 'Hapus Barang Berhasil!';
		}else{
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'hapus Barang Gagal!';
		}
		
		$data['barang'] = $this->M_inventory->barang();
		$data['kategori'] = $this->M_inventory->kategori();
		$this->load->view('inventory', $data);
	}
}