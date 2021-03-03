<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_report extends CI_Model{
		
	function export($from, $to){
		$sql = "
			SELECT d.*, p.kasir, p.waktu FROM penjualan_detail d 
			LEFT JOIN penjualan p ON d.no_nota=p.no_nota
			WHERE SUBSTR(p.waktu, 1, 10) >= '".$from."' 
			AND SUBSTR(p.waktu, 1, 10) <= '".$to."' 
		";

		return $this->db->query($sql);
	}
	
	function export_pembelian($from, $to){
		$sql = "
			SELECT a.harga_barang AS sub_total, a.jumlah, b.kasir, b.tanggal, CONCAT(d.nama_barang, ' ',e.nama_warna) AS nama_barang  FROM pembelian_detail a 
			LEFT JOIN pembelian b ON a.no_nota=b.no_nota
			LEFT JOIN detail_barang c ON a.id_barang=c.id_barang
			LEFT JOIN produk  d ON c.id_produk=d.id
			LEFT JOIN warna e ON c.id_warna=e.id_warna
			WHERE SUBSTR(b.tanggal, 1, 10) >= '".$from."' 
			AND SUBSTR(b.tanggal, 1, 10) <= '".$to."' 
		";

		return $this->db->query($sql);
	}
}