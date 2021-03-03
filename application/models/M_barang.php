<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_barang extends CI_Model{
	private $primary_key = 'id_barang';
	private $table_name	= 'barang';
	
	public function __construct(){
		parent::__construct();
	}
	
	function get(){
		$query='SELECT * FROM barang';
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}
	
	public function get_by_id($id){
		$query="SELECT * FROM barang where barcode='".$id."'";
		$hasil=$this->db->query($query)->row();
		return $hasil;
	}
	
	function master(){
		$query='SELECT p.*, k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori=k.id_kategori';
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}
	
	function kategori(){
		$kat=$this->db->query("SELECT * FROM kategori");
		return $kat->result_array();
	}
	
	function warna(){
		$wr=$this->db->query("SELECT * FROM warna");
		return $wr->result_array();
	}
	
	function tambah_barang($trx){
		$query="INSERT INTO produk(nama_barang, keterangan, id_kategori) VALUES('".$trx['nama_barang']."','".$trx['ket']."','".$trx['id_kategori']."')";
		$hasil=$this->db->query($query);
		return $hasil;
	}
	
	function edit_barang($trx){
		$query="UPDATE produk set nama_barang='".$trx['nama_barang']."', id_kategori='".$trx['kategori']."', keterangan='".$trx['ket']."' where id='".$trx['id_barang']."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}
	
	function hapus_barang($id){
		$query="delete from produk where id='".$id."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}
	
	function detail_barang($type){
		$query='SELECT p.*, k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori=k.id_kategori
				WHERE p.id_kategori="'.$type.'";';
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}
	
	function rincian_barang($type){
		$query='SELECT d.*, p.nama_barang, w.nama_warna FROM detail_barang d LEFT JOIN produk p ON d.id_produk=p.id
				LEFT JOIN warna w ON d.id_warna=w.id_warna
				WHERE d.id_produk="'.$type.'";';
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}
	
	function produk(){
		$kat=$this->db->query("SELECT * FROM produk");
		return $kat->result_array();
	}
}