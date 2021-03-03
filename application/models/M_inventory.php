<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_inventory extends CI_Model{	
	function barang(){
		$query="SELECT b.*, k.nama_kategori FROM barang b LEFT JOIN kategori k ON b.id_kategori=k.id_kategori";
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}
	
/* 	function create($d){
		$query="insert into barang(barcode, id_kategori, nama_barang, harga_jual, keterangan_barang) values('".$d['barcode']."', '".$d['id_kategori']."', '".$d['nama_barang']."', '".$d['harga_jual']."', '".$d['keterangan_barang']."');";
		return $this->db->query($query);
	} */
	
	function update($d){
		$query="update barang set id_kategori='".$d['id_kategori']."', nama_barang='".$d['nama_barang']."', harga_jual='".$d['harga_jual']."', keterangan_barang='".$d['keterangan_barang']."' where barcode='".$d['barcode']."';";
		return $this->db->query($query);
	}

	function hapus($barcode){
		$query="delete from barang where barcode='".$barcode."';";
		return $this->db->query($query);
	}

	function cek($barcode){
		$query="SELECT barcode FROM barang where barcode='".$barcode."'";
		$hasil=$this->db->query($query)->num_rows();
		return $hasil;
	}
	
	function kategori(){
		$trv=$this->db->query("SELECT * FROM kategori ORDER BY id_kategori ASC");
		return $trv->result_array();
	}
	
	function create($d){
		$q_create="insert into barang(barcode, id_kategori, nama_barang, harga_jual, keterangan_barang) values('".$d['barcode']."', '".$d['id_kategori']."', '".$d['nama_barang']."', '".$d['harga_jual']."', '".$d['keterangan_barang']."');";
		
		$toko = $this->db->query("select * from toko")->result();
		
		$sql="INSERT INTO inventory(id_inventori, id_toko, barcode, id_kategori, nama_barang, harga_jual) VALUES";
		foreach ($toko as $tk) {
			$id_inventori=$tk->id_toko.$d['barcode'];
			
			$sql.="('".$id_inventori."', '".$tk->id_toko."', '".$d['barcode']."', '".$d['id_kategori']."', '".$d['nama_barang']."', '".$d['harga_jual']."'), ";
		}
		$sql = rtrim($sql, ', ');		
		
 		$this->db->trans_begin();
		$this->db->query($q_create);
		$this->db->query($sql);

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