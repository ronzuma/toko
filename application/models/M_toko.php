<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_toko extends CI_Model{	
	function toko(){
		$query="select * from toko";
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}

/* 	function create($d){
		$query="insert into toko(id_toko, nama_toko, cp, lokasi, telp) values('".$d['id_toko']."', '".$d['nama_toko']."', '".$d['cp']."', '".$d['lokasi']."', '".$d['telp']."');";
		return $this->db->query($query);
	} */
	
	function update($d){
		$query="update toko set nama_toko='".$d['nama_toko']."', cp='".$d['cp']."', lokasi='".$d['lokasi']."', telp='".$d['telp']."', nik='".$d['nik']."', status='".$d['status']."' where id_toko='".$d['id_toko']."';";
		return $this->db->query($query);
	}

	function hapus($d){
		$query="delete from toko where id_toko='".$d."';";
		return $this->db->query($query);
	}
	
	function cek($id_toko){
		$query="SELECT id_toko FROM toko where id_toko='".$id_toko."'";
		$hasil=$this->db->query($query)->num_rows();
		return $hasil;
	}
	
	//fungsi rollback jika terjadi kesalahan
	function create($d){
		$q_toko="insert into toko(id_toko, nama_toko, cp, lokasi, telp, nik, status) values('".$d['id_toko']."', '".$d['nama_toko']."', '".$d['cp']."', '".$d['lokasi']."', '".$d['telp']."', '".$d['nik']."', '".$d['status']."');";
		
		$q_inventory="INSERT INTO inventory(id_inventori, id_toko, barcode, id_kategori, nama_barang, harga_jual) SELECT CONCAT('".$d['id_toko']."',barcode) AS id_inventori, '".$d['id_toko']."', barcode, id_kategori, nama_barang, harga_jual FROM barang;";
		
		$this->db->trans_begin();
		$this->db->query($q_toko);
		$this->db->query($q_inventory);

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