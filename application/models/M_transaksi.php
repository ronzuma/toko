<?php
class M_transaksi extends CI_Model{
	
	//fungsi rollback jika terjadi kesalahan
	function checkout($sql, $trx, $nota){
		$penjualan="INSERT INTO penjualan VALUES('".$trx['nota']."', now(), '".$trx['nominal']."','".$trx['kasir']."')";
		
 		$stok='UPDATE detail_barang a, penjualan_detail b 
			SET a.stok_barang=(a.stok_barang-b.jumlah) 
			WHERE a.id_barang=b.kode_barang AND b.no_nota="'.$nota.'";';
		
		$this->db->trans_begin();
		$this->db->query($sql);
		$this->db->query($penjualan);
		$this->db->query($stok);

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