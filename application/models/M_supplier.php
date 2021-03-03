<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_supplier extends CI_Model{	
	function all(){
		$query="select * from supplier";
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}
	
	function create($d){
		$query="insert into supplier(id_supplier, nama_sup, owner, alamat, telp) values('".$d['id_supplier']."', '".$d['nama_sup']."', '".$d['owner']."', '".$d['alamat']."', '".$d['telp']."');";
		return $this->db->query($query);
	}
	
	function update($d){
		$query="update supplier set nama_sup='".$d['nama_sup']."', owner='".$d['owner']."', alamat='".$d['alamat']."', telp='".$d['telp']."' where id_supplier='".$d['id_supplier']."';";
		return $this->db->query($query);
	}

	function hapus($d){
		$query="delete from supplier where id_supplier='".$d['id_supplier']."';";
		return $this->db->query($query);
	}
	
	function cek($id_supplier){
		$query="SELECT id_supplier FROM supplier where id_supplier='".$id_supplier."'";
		$hasil=$this->db->query($query)->num_rows();
		return $hasil;
	}

}