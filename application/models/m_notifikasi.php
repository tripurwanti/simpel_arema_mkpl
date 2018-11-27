<?php  ?>
<?php 
class m_notifikasi extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function get_notif()
	{
		$data = $this->db->query("SELECT * FROM (SELECT a.*, ROWNUM rnum FROM (SELECT * FROM tb_notifikasi ORDER BY timesecond DESC) a WHERE ROWNUM <=10) WHERE rnum >=1");
		//TAMBAHAN
		// $this->db->query("UPDATE tb_pengolah SET PESAN='0' WHERE id='".$_SESSION['id']."'");

		return $data;

	}

	public function get_more_notif($last){
		$next = 10 + $last;
		// $data = $this->db->query("select * from tbl_chat where ROWNUM <= '" .$next  ."' ORDER BY WAKTU ASC");
		$data = $this->db->query("SELECT * FROM (SELECT a.*, ROWNUM rnum FROM (SELECT * FROM tb_notifikasi ORDER BY timesecond DESC) a WHERE ROWNUM <='" .$next ."') WHERE rnum >=1");
		// $data = $this->db->query("select * from tbl_chat where ROWNUM <= '" .$next ."' AND ROWNUM > '" .$last "' ORDER BY WAKTU ASC");
		$this->db->query("UPDATE tb_pengolah SET PESAN='0' WHERE id='".$_SESSION['id']."'");
		return $data;
	}

	public function insert_notif($data)
	{
		$query="INSERT INTO TB_NOTIFIKASI (WAKTU, NAMA_PEL, NAMA_RAYON, ALAMAT_PEL, KETERANGAN, TIMESECOND, JENIS, JENIS_TRANSAKSI, DAYA) VALUES ('".$data['waktu']."','".$data['nama']."','".$data['nama_rayon']."','".$data['alamat']."','".$data['keterangan']."','".$data['tanggal_second']."','".$data['jenis_pelanggan']."','".$data['jenis_transaksi']."','".$data['daya_baru']."')";
		$data = $this->db->query($query);
		return $data;
	}
}

 ?>