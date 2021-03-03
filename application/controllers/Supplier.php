<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends MY_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('M_supplier');
	}

	public function index(){
		$data['supplier'] = $this->M_supplier->all();
		$this->load->view('supplier', $data);
	}
	
	public function tambah(){
		$id_supplier=$this->input->post('id_supplier');
		
		$cek =$this->M_supplier->cek($id_supplier);
		
		if ($cek > 0) {
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'id supplier sudah ada!';
		} else {
			$data=array(
				'id_supplier'	=>$id_supplier,
				'nama_sup'		=>addslashes($this->input->post('nama_sup')),
				'owner'			=>addslashes($this->input->post('owner')),
				'alamat'		=>addslashes($this->input->post('alamat')),
				'telp'			=>addslashes($this->input->post('telp'))
			);
			
			$tambah=$this->M_supplier->create($data);
			if ($tambah==True){
				$data['type'] 	= 'success';
				$data['pesan'] 	= 'Tambah Supplier Berhasil!';
			}else{
				$data['type'] 	= 'warning';
				$data['pesan'] 	= 'Tambah Supplier Gagal!';
			}
		}
			
		$data['supplier'] = $this->M_supplier->all();
		$this->load->view('supplier', $data);
	}
	
	public function edit(){
 		$data=array(
			'nama_sup'		=>addslashes($this->input->post('nama_sup')),
			'owner'			=>addslashes($this->input->post('owner')),
			'alamat'		=>addslashes($this->input->post('alamat')),
			'telp'			=>addslashes($this->input->post('telp')),
			'id_supplier'	=>addslashes($this->input->post('id_supplier'))
		);
		
		$update=$this->M_supplier->update($data);
		if ($update==True){
			$data['type'] 	= 'success';
			$data['pesan'] 	= 'Edit Supplier Berhasil!';
		}else{
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'Edit Supplier Gagal!';
		}
		
		$data['supplier'] = $this->M_supplier->all();
		$this->load->view('supplier', $data);
	}
	
	public function hapus(){
		$id_supplier=$this->input->post('id_supplier');
		$hapus=$this->M_supplier->hapus($id_supplier);
		if ($hapus==True){
			$data['type'] 	= 'success';
			$data['pesan'] 	= 'Hapus Supplier Berhasil!';
		}else{
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'hapus Supplier Gagal!';
		}
		
		$data['supplier'] = $this->M_supplier->all();
		$this->load->view('supplier', $data);
	}

}