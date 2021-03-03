<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('ap_level') == 'backend'){
			redirect();
		}
		$this->load->model('M_barang');
	}

/* 	public function index(){
		$data['barang'] = $this->M_barang->get();
		$data['kategori']=$this->M_barang->kategori();
		$this->load->view('kasir',$data);
	} */
	
	public function index(){
		$this->load->view('chart_penjualan',$data);
	}
}