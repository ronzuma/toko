<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Barang extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_barang');
	}
	
	public function index(){
		$data['barang'] = $this->M_barang->master();
		$data['kategori']=$this->M_barang->kategori();
		$data['warna']=$this->M_barang->warna();
		$this->load->view('barang', $data);
	}
	
	public function type($type){
		$data['barang'] = $this->M_barang->detail_barang($type);
		$data['kategori']=$this->M_barang->kategori();
		$data['warna']=$this->M_barang->warna();
		$this->load->view('barang', $data);
	}
	
	public function tambah(){
		$data = array(
			'id_kategori'	=> $this->input->post('kategori'),
			'nama_barang'	=> $this->input->post('nama_barang'),
			'ket'			=> $this->input->post('ket')
		);
		
		$user=$this->session->userdata('ap_nama');
		$nama_barang=$this->input->post('nama_barang');
		
		$insert = $this->M_barang->tambah_barang($data);
		redirect(Barang);
	}
	
	public function edit(){
		$data = array(
			'id_barang'		=> $this->input->post('id_barang'),
			'kategori'		=> $this->input->post('kategori'),
			'nama_barang'	=> $this->input->post('nama_barang'),
			'ket'			=> $this->input->post('ket')
		);
		
		$edit = $this->M_barang->edit_barang($data);
		redirect(Barang);
	}
	
	public function hapus(){
		$id_barang=$this->input->post('id_barang');
		$delete = $this->M_barang->hapus_barang($id_barang);
		redirect(Barang);
	}
	
	public function detail($id){
		$data['kategori']=$this->M_barang->kategori();
		$data['produk']=$this->M_barang->produk();
		$data['warna']=$this->M_barang->warna();
		$data['barang'] = $this->M_barang->rincian_barang($id);
		$this->load->view('rincian_barang', $data);
	}
}