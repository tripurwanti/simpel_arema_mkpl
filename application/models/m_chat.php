<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_chat extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getPesan()
	{
		$data = $this->db->query("select * from tbl_chat ORDER BY WAKTU ASC");
		$this->db->query("UPDATE tb_pengolah SET PESAN='0' WHERE id='".$_SESSION['id']."'");

		return $data;

	}
	public function insertPesan($data)
	{
		$pesan=$data['pesan'];
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y/m/d H:i:s');
		if($_SESSION['rayon']=="Area")
		{
			$bagian=$_SESSION['akses'];
		}
		else
		{
			$bagian=$_SESSION['rayon'];
		}
		$query="INSERT INTO TBL_CHAT (NAMA, BAGIAN, WAKTU, PESAN, FOTO) VALUES ('".$_SESSION['nama']."','".$bagian."','".$tanggal."','".$pesan."','".$_SESSION['foto']."')";
		$data = $this->db->query($query);
		return $data;
	}
}
