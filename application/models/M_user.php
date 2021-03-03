<?php
class M_user extends CI_Model {
	function validasi_login($username, $password){
		return $this->db
			->select('a.id_user, a.username, a.password, a.nama, b.label AS level, b.level_akses AS level_caption', false)
			->join('pj_akses b', 'a.id_akses = b.id_akses', 'left')
			->where('a.username', $username)
			->where('a.password', sha1($password))
			->where('a.status', 'Aktif')
			->where('a.dihapus', 'tidak')
			->limit(1)
			->get('pj_user a');
	}

	function is_valid($u, $p){
		return $this->db
			->select('id_user')
			->where('id_user', $u)
			->where('password', $p)
			->where('status','Aktif')
			->where('dihapus','tidak')
			->limit(1)
			->get('pj_user');
	}

	function list_kasir(){
		return $this->db
			->select('id_user, nama')
			->where('status', 'Aktif')
			->where('dihapus', 'tidak')
			->order_by('nama','asc')
			->get('pj_user');
	}


	function hapus_user($id_user){
		$query="UPDATE pj_user set dihapus='ya' where id_user='".$id_user."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}

	function cek_username($username)
	{
		return $this->db
			->select('id_user')
			->where('username', $username)
			->where('dihapus', 'tidak')
			->limit(1)
			->get('pj_user');
	}

	function tambah_baru($username, $password, $nama, $id_toko, $status){
		$query="insert into pj_user(username, password, nama, id_akses, status, id_toko) values('".$username."', sha1('".$password."'), '".$nama."', '2', '".$status."', '".$id_toko."')";
		$hasil=$this->db->query($query);
		return $hasil;
	}

	function get_baris($id_user)
	{
		$sql = "
			SELECT 
				a.`id_user`,
				a.`username`,
				a.`nama`,
				a.`id_akses`,
				a.`status`,
				b.`label` 
			FROM 
				`pj_user` a 
				LEFT JOIN `pj_akses` b ON a.`id_akses` = b.`id_akses` 
			WHERE 
				a.`id_user` = '".$id_user."' 
			LIMIT 1
		";

		return $this->db->query($sql);
	}

	function update_user($username, $id_user, $nama, $id_toko, $status){
		$query="UPDATE pj_user set username='".$username."', nama='".$nama."', id_toko='".$id_toko."', status='".$status."'  where id_user='".$id_user."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}

	function cek_password($pass)
	{
		return $this->db
			->select('id_user')
			->where('password', sha1($pass))
			->where('id_user', $this->session->userdata('ap_id_user'))
			->limit(1)
			->get('pj_user');
	}
	
	function change_password($id, $pass){
		$query="UPDATE pj_user set password=sha1('".$pass."') where id_user='".$id."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}
	
	function tampil_user(){
		$query="SELECT a.*, b.nama_toko FROM pj_user a LEFT JOIN toko b ON a.id_toko=b.id_toko WHERE a.dihapus='tidak'";
		$hasil=$this->db->query($query);
		return $hasil->result();
	}
	
	function level(){
		$kat=$this->db->query("SELECT * FROM pj_akses");
		return $kat->result_array();
	}

	function toko(){
		$kat=$this->db->query("SELECT * FROM toko");
		return $kat->result_array();
	}
}