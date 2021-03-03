<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Toko extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_toko');
	}
	
	public function index(){
 		$data['toko'] = $this->M_toko->toko();
		$this->load->view('toko', $data);
	}

	public function tambah(){
		$id_toko=$this->input->post('id_toko');
		
		$cek =$this->M_toko->cek($id_toko);
		
		if ($cek > 0) {
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'Id Toko sudah ada!';
		} else {
			$data=array(
				'nama_toko'	=>addslashes($this->input->post('nama_toko')),
				'cp'		=>addslashes($this->input->post('cp')),
				'lokasi'	=>addslashes($this->input->post('lokasi')),
				'telp'		=>addslashes($this->input->post('telp')),
				'nik'		=>addslashes($this->input->post('nik')),
				'status'	=>addslashes($this->input->post('status')),
				'id_toko'	=>$id_toko
			);
			
			$tambah=$this->M_toko->create($data);
			if ($tambah==True){
				$data['type'] 	= 'success';
				$data['pesan'] 	= 'Tambah Toko Berhasil!';
			}else{
				$data['type'] 	= 'warning';
				$data['pesan'] 	= 'Tambah Toko Gagal!';
			}
		}

		$data['toko'] = $this->M_toko->toko();
		$this->load->view('toko', $data);
	}
	
	public function edit(){
 		$data=array(
			'nama_toko'	=>addslashes($this->input->post('nama_toko')),
			'cp'		=>addslashes($this->input->post('cp')),
			'lokasi'	=>addslashes($this->input->post('lokasi')),
			'telp'		=>addslashes($this->input->post('telp')),
			'id_toko'	=>addslashes($this->input->post('id_toko')),
			'nik'		=>addslashes($this->input->post('nik')),
			'status'	=>addslashes($this->input->post('status'))
		);
		
		$update=$this->M_toko->update($data);
		if ($update==True){
			$data['type'] 	= 'success';
			$data['pesan'] 	= 'Edit Toko Berhasil!';
		}else{
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'Edit Toko Gagal!';
		}
		
		$data['toko'] = $this->M_toko->toko();
		$this->load->view('toko', $data);
	}
	
	public function hapus(){
		$id_toko=$this->input->post('id_toko');
		$hapus=$this->M_toko->hapus($id_toko);
		if ($hapus==True){
			$data['type'] 	= 'success';
			$data['pesan'] 	= 'Hapus Toko Berhasil!';
		}else{
			$data['type'] 	= 'warning';
			$data['pesan'] 	= 'hapus Toko Gagal!';
		}
		
		$data['toko'] = $this->M_toko->toko();
		$this->load->view('toko', $data);
	}
}