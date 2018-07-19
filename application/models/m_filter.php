<?php
	class M_filter extends CI_Model
	{
		function __construct()
		 {
		  parent::__construct();
		 }
		 		
		function showfilter($data)
		{
			$jenis=$data['jenis'];
			$rayon=$data['rayon'];
			$status=$data['status'];
			$ket=$data['ket'];
			
			if ($jenis=="pelTR")
			{
				if($ket=="NYALA")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELTR WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NYALA IS NOT NULL")->result();
				}
				elseif($ket=="BELUM NYALA")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELTR WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NYALA IS NULL")->result();
				}
				elseif($ket=="USULAN")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELTR WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NODINKEKON IS NOT NULL")->result();
				}
				
			}
			elseif ($jenis=="kolektif")
			{
				if($ket=="NYALA")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELKOL WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NYALA IS NOT NULL")->result();
				}
				elseif($ket=="BELUM NYALA")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELKOL WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NYALA IS NULL")->result();
				}
				elseif($ket=="USULAN")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELKOL WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NODINKEKON IS NOT NULL")->result();
				}
			}
			elseif ($jenis=="pelTM")
			{
				if($ket=="NYALA")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELTM WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NYALA IS NOT NULL")->result();
				}
				elseif($ket=="BELUM NYALA")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELTM WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NYALA IS NULL")->result();
				}
				elseif($ket=="USULAN")
				{
					$hasil=$this->db->query("SELECT * FROM V_PELTM WHERE id_ryn='".$rayon."' AND STATUS_PERMOHONAN='".$status."' AND TGL_NODINKEKON IS NOT NULL")->result();
				}
			}
			return $hasil;
		}
		
	}
	
?>