<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_rincian extends CI_Model{
	
	function tambah_rincian($trx){
		$query="INSERT INTO detail_barang VALUES('".$trx['id_barang']."', '".$trx['produk']."', '".$trx['warna']."', '".$trx['stok']."', '".$trx['jual']."','".$trx['beli']."')";
		$hasil=$this->db->query($query);
		return $hasil;
	}
	
	function edit_barang($trx){
		$query="UPDATE detail_barang set harga_barang='".$trx['jual']."', harga_modal='".$trx['beli']."', id_produk='".$trx['produk']."', id_warna='".$trx['warna']."', stok_barang='".$trx['stok']."' where id_barang='".$trx['id_barang']."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}
	
	function hapus_barang($id){
		$query="delete from detail_barang where id_barang='".$id."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}
}