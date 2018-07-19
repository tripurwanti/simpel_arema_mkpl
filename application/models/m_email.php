<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_email extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getPesan($cari)
	{
		$data = $this->db->query("select * from REKAP_EMAIL WHERE id = '$_SESSION[id]' AND (kepada LIKE '%$cari%' OR subjek LIKE '%$cari%' OR pesan LIKE '%$cari%') ORDER BY tgl_kirim DESC");
		return $data;

	}
	public function insertPesan($data)
	{
    $query="INSERT INTO rekap_email (id, pengirim, kepada, subjek, pesan, tgl_kirim) VALUES
    ('$data[id]',
      '$data[pengirim]',
      '$data[kepada]',
      '$data[subjek]',
      '$data[pesan]',
      TO_DATE('$data[tgl_kirim]', 'yyyy/mm/dd hh24:mi:ss'))";
		$data = $this->db->query($query);
		return $data;
  }

}
