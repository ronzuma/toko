<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_user');
		$this->load->model('M_barang');
	}

 	public function index(){
		$data['user'] = $this->M_user->tampil_user();
		$data['toko'] = $this->M_user->toko();
		$this->load->view('user', $data);
	}
	
	public function change_password(){
		$old=sha1($this->input->post('lama'));
		$new=$this->input->post('baru');
		$konfirmasi=$this->input->post('konfirmasi');
		$id_user=$this->session->userdata('ap_id_user');
		
		$cek=$this->M_user->is_valid($id_user, $old);
		
		$valid=$cek->num_rows();
		
		if ($valid > 0) {
			if ($new==$konfirmasi){
				$update_pass=$this->M_user->change_password($id_user, $new);
				if ($update_pass==True){
					$pesan='Ubah Password Berhasil';
					$type='success';
				}else{
					$pesan='Ubah Password Gagal';
					$type='error';
				}
			}else{
				$pesan='Password Tidak Sesuai';
				$type='error';
			}
		}else{
			$pesan='Password Salah';
			$type='error';
		}
		
		echo json_encode(array("type" => $type, "pesan" => $pesan));
	}
	

	
	public function tambah(){
		$nama		= $this->input->post('nama');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$id_toko 	= $this->input->post('id_toko');
		$status		= $this->input->post('status');
		
		$insert = $this->M_user->tambah_baru($username, $password, $nama, $id_toko, $status);
		if($insert==True){
			$pesan='Tambah User Berhasil';
			$type='success';
		}else{
			$pesan='Tambah User Gagal!';
			$type='error';
		}
		
		echo json_encode(array("type" => $type, "pesan" => $pesan));
	}
	
	public function edit(){
		$nama		= $this->input->post('nama');
		$username	= $this->input->post('username');
		$id_toko	= $this->input->post('id_toko');
		$status		= $this->input->post('status');
		$id_user	= $this->input->post('id_user');

 		$insert = $this->M_user->update_user($username, $id_user, $nama, $id_toko, $status);		
		redirect(User);
	}
	
	public function hapus(){
		$id_user=$this->input->post('kode_user');
		$delete = $this->M_user->hapus_user($id_user);
		
		redirect(User);

	}
	
	
}