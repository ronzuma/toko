<?php
class M_pembelian extends CI_Model{
	
	function tambah_pembelian($trx){
		$query="INSERT INTO dump_pembelian VALUES('".$trx['no_nota']."', '".$trx['tanggal']."','".$trx['id_barang']."','".$trx['nama_barang']."','".$trx['harga_barang']."','".$trx['jumlah']."','".$trx['user']."')";
		$hasil=$this->db->query($query);
		return $hasil;
	}

	function update_pembelian($trx){
		$query='update dump_pembelian set no_nota="'.$trx['no_nota'].'", tanggal="'.$trx['tanggal'].'", harga_barang="'.$trx['harga_barang'].'", jumlah=(jumlah+'.$trx['jumlah'].') where id_barang="'.$trx['id_barang'].'" and user="'.$trx['user'].'"';
		$hasil=$this->db->query($query);
		return $hasil;
	}
	
	function dump_pembelian($user){
		$query='select * from dump_pembelian where user="'.$user.'"';
		$hasil=$this->db->query($query)->result();
		return $hasil;
	}

	function delete_pembelian($id, $user){
		$query='delete from dump_pembelian where id_barang="'.$id.'" and user="'.$user.'"';
		$hasil=$this->db->query($query);
		return $hasil;
	}	

	function total($user){
		$query='SELECT SUM(jumlah*harga_barang) AS total FROM dump_pembelian where user="'.$user.'"';
		$hasil=$this->db->query($query)->row();
		return $hasil;
	}
	
	//fungsi rallback jika terjadi kesalahan
	function checkout($user){
		$t_dtl_pembelian='INSERT INTO pembelian_detail(no_nota, id_barang, harga_barang, jumlah) SELECT no_nota, id_barang, harga_barang, jumlah FROM dump_pembelian where user="'.$user.'";';
		
		$t_pembelian='INSERT INTO pembelian SELECT no_nota, tanggal, SUM(harga_barang*jumlah), user FROM dump_pembelian WHERE user="'.$user.'" GROUP BY no_nota;';
		
		$stok='UPDATE barang a, dump_pembelian b SET a.stock=(b.jumlah+a.stock) WHERE a.barcode=b.id_barang AND b.user="'.$user.'";';
		
		$drop='DELETE FROM dump_pembelian WHERE USER="'.$user.'";';
		
		
		$this->db->trans_begin();
		$this->db->query($t_dtl_pembelian);
		$this->db->query($t_pembelian);
		$this->db->query($stok);
		$this->db->query($drop);

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
		
		return $this->db->trans_status();
		
	}
}