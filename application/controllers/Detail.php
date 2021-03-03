<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_barang');
		$this->load->model('M_rincian');
	}
	
	public function detail_barang($id){
		$data['kategori']=$this->M_barang->kategori();
		$data['produk']=$this->M_barang->produk();
		$data['produk_edit']=$this->M_barang->produk();
		$data['warna']=$this->M_barang->warna();
		$data['barang'] = $this->M_barang->rincian_barang($id);
		$this->load->view('rincian_barang', $data);
		//var_dump($data['produk']);
	}
	
	public function tambah(){
		$data = array(
			'id_barang'		=> $this->input->post('id_barang'),
			'produk'		=> $this->input->post('produk'),
			'beli'			=> $this->input->post('beli'),
			'jual'			=> $this->input->post('jual'),
			'stok'			=> $this->input->post('stok'),
			'warna'			=> $this->input->post('warna')
		);	
		$produk=$this->input->post('produk');
		$insert = $this->M_rincian->tambah_rincian($data);
		redirect('Detail/detail_barang/'.$produk);
	}
	
	public function edit(){
		$data = array(
			'id_barang'		=> $this->input->post('id_barang'),
			'produk'		=> $this->input->post('produk'),
			'beli'			=> $this->input->post('beli'),
			'jual'			=> $this->input->post('jual'),
			'stok'			=> $this->input->post('stok'),
			'warna'			=> $this->input->post('warna')
		);	
		$produk=$this->input->post('produk');
		$update = $this->M_rincian->edit_barang($data);
		redirect('Detail/detail_barang/'.$produk);
	}
	
	public function hapus(){
		$id_barang=$this->input->post('id_barang');
		$produk=$this->input->post('produk');
		$delete = $this->M_rincian->hapus_barang($id_barang);
		redirect('Detail/detail_barang/'.$produk);
	}
}