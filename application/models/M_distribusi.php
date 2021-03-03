<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_distribusi extends CI_Model{	
	function barang(){
		$query="SELECT * FROM barang where stock>0";
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}
	
	function toko($id){
		$query="SELECT id_toko, nama_toko FROM toko where id_toko='".$id."'";
		$hasil=$this->db->query($query)->row();
		return $hasil;
	}
	
	function proses($id_toko){
		
		$this->db->trans_begin();
		
		foreach ($this->cart->contents() as $items) {
			$this->db->query("update inventory set stock=stock+'".$items['qty']."' where id_inventori='".$id_toko.$items['id']."'");
			$this->db->query("update barang set stock=stock-'".$items['qty']."' where barcode='".$items['id']."'");
		}
		

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
		}
		else
		{
			$this->db->trans_commit();
		}
		
		return $this->db->trans_status();
	}
}