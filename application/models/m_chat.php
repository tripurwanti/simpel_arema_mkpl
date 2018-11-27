<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_chat extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getPesan()
	{
		// $data = $this->db->query("select * from tbl_chat where ROWNUM <= 2 ORDER BY WAKTU ASC");
		$data = $this->db->query("SELECT * FROM (SELECT a.*, ROWNUM rnum FROM (SELECT * FROM tbl_chat ORDER BY waktu DESC) a WHERE ROWNUM <=10) WHERE rnum >=1");
		$this->db->query("UPDATE tb_pengolah SET PESAN='0' WHERE id='".$_SESSION['id']."'");

		return $data;

	}

	public function get_more_message($last){
		$next = 10 + $last;
		// $data = $this->db->query("select * from tbl_chat where ROWNUM <= '" .$next  ."' ORDER BY WAKTU ASC");
		$data = $this->db->query("SELECT * FROM (SELECT a.*, ROWNUM rnum FROM (SELECT * FROM tbl_chat ORDER BY waktu DESC) a WHERE ROWNUM <='" .$next ."') WHERE rnum >=1");
		// $data = $this->db->query("select * from tbl_chat where ROWNUM <= '" .$next ."' AND ROWNUM > '" .$last "' ORDER BY WAKTU ASC");
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
