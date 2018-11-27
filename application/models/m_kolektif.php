<?php
class M_kolektif extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function showppareafromdb()
	{
		$hasil=$this->db->query("SELECT * FROM V_PELKOL ORDER BY NO ASC");
		return $hasil;
	}

	function showfilter($data)
	{
		$field=$data['field'];
		$key=$data['key'];
		if ($field=="NO")
		{
			$hasil=$this->db->query("SELECT * FROM V_PELKOL WHERE ".$field."='".$key."'")->result();
		}
		else
		{
			$hasil=$this->db->query("SELECT * FROM V_PELKOL WHERE ".$field." LIKE '%".$key."%'")->result();
		}
		return $hasil;
	}

	function deletedatafromdb($id)
	{
		$this->db->query("DELETE FROM konstruksikol WHERE no = '".$id."'");
		$this->db->query("DELETE FROM perencanaankol WHERE no = '".$id."'");
		$this->db->query("DELETE FROM lainkol WHERE no = '".$id."'");
		$this->db->query("DELETE FROM uploadrynkol WHERE no_pelanggan = '".$id."'");
		$query="DELETE FROM pp_areakol WHERE no = '".$id."'";
		$hasil=$this->db->query($query);
		return $hasil;
	}

	function showdataedit($id)
	{
		$hasil=$this->db->query("SELECT * FROM v_pelkol WHERE no='".$id."'");
		return $hasil;
	}

	function updatekoltodb($data)
	{
		$no=$data['a'];
		$b=$data['b'];
		$c=$data['c'];
		$d=$data['d'];
		$e=$data['e'];
		$f=$data['f'];
		$g=$data['g'];
		$h=$data['h'];
		$i=$data['i'];
		$m=$data['m'];
		$n=$data['n'];
		$o=$data['o'];
		$p=$data['p'];

		$a1=$data['a1'];
		$b1=$data['b1'];
		$c1=$data['c1'];
		$d1=$data['d1'];

		$a2=$data['a2'];
		$b2=$data['b2'];
		$c2=$data['c2'];
		$d2=$data['d2'];
		$e2=$data['e2'];
		$f2=$data['f2'];
		$g2=$data['g2'];
		$h2=$data['h2'];
		$i2=$data['i2'];
		$j2=$data['j2'];
		$k2=$data['k2'];
		$l2=$data['l2'];
		$m2=$data['m2'];
		$n2=$data['n2'];
		$o2=$data['o2'];
		$p2=$data['p2'];
		$q2=$data['q2'];
		$r2=$data['r2'];
		$s2=$data['s2'];
		$t2=$data['t2'];
		$u2=$data['u2'];
		$v2=$data['v2'];
		$w2=$data['w2'];
		$x2=$data['x2'];
		$y2=$data['y2'];
		$z2=$data['z2'];

		$a3=$data['a3'];
		$b3=$data['b3'];
		$c3=$data['c3'];
		$d3=$data['d3'];
		$e3=$data['e3'];
		$f3=$data['f3'];
		$g3=$data['g3'];
		$h3=$data['h3'];
		$i3=$data['i3'];
		$j3=$data['j3'];
		$k3=$data['k3'];
		$l3=$data['l3'];

		date_default_timezone_set('Asia/Jakarta');
			$tgl1 = $k; // tanggal bayar
			$tgl2 = $d1;
			$tgl3 = $n; // tanggal pdl
			$selisih = strtotime($tgl1) -  strtotime($tgl2);
			$selisih1 = strtotime($tgl1) -  strtotime($tgl3);
			if($tgl1=="" AND $tgl2=="")
			{
				$jangka_survey="";
			}
			elseif($tgl1=="")
			{
				$jangka_survey="TANGGAL BAYAR BELUM ADA";
			}
			elseif($tgl2=="")
			{
				$jangka_survey="TANGGAL RAYON KIRIM BELUM ADA";
			}
			else
			{
				$jangka_survey = abs($selisih/(60*60*24))." hari";
			}

			if($tgl1=="" AND $tgl3=="")
			{
				$hpl="";
			}
			elseif($tgl1=="")
			{
				$hpl="TANGGAL BAYAR BELUM ADA";
			}
			elseif($tgl3=="")
			{
				$hpl="TANGGAL PDL BELUM ADA";
			}
			else
			{
				$hpl = abs($selisih1/(60*60*24))." hari";
			}

			if($_SESSION['akses']=="PP Area")
			{
				$query="UPDATE pp_areakol SET NAMA_PEMOHON='".$b."',NO_AGENDA='".$c."',NAMA_PEL='".$d."',ALAMAT='".$e."',JML_CALON='".$f."',TOTAL_VA='".$g."',TGL_BAYAR='".$h."',STATUS_PERMOHONAN='".$i."',JANGKA_SURVEYPP='".$jangka_survey."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);

				$query1="UPDATE lainkol SET HPL='".$hpl."',TGL_PDL='".$n."',TGL_NYALA='".$m."',KETERANGAN='".$p."' WHERE no='".$no."'";
				$hasil=$this->db->query($query1);
			}
			elseif($_SESSION['akses']=="rayon")
			{
				$query="UPDATE pp_areakol SET NAMA_PEMOHON='".$b."',NO_AGENDA='".$c."',NAMA_PEL='".$d."',ALAMAT='".$e."',JML_CALON='".$f."',TOTAL_VA='".$g."',TGL_BAYAR='".$h."',STATUS_PERMOHONAN='".$i."', TGL_PK='".$a1."',ID_RYN='".$b1."',KET_PERLUASAN='".$c1."',TGL_RYNKIRIM='".$d1."',JANGKA_SURVEYPP='".$jangka_survey."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);

				$query1="UPDATE lainkol SET TGL_NYALA='".$m."',TGL_PDL='".$n."',HPL='".$hpl."',KETERANGAN='".$p."' WHERE no='".$no."'";
				$hasil=$this->db->query($query1);
			}
			elseif($_SESSION['akses']=="Perencanaan")
			{
				$query="UPDATE perencanaankol SET A3CS_150='".$b2."', A3CS240='".$c2."', MVTIC240='".$d2."', SKTM240='".$e2."', CUBICLE='".$f2."', TRAFO50='".$g2."', TRAFO100='".$h2."', TRAFO160='".$i2."', TRAFO200='".$j2."', TRAFO250='".$k2."', LVPANEL='".$l2."', NA2XSEYB='".$m2."', NYFGBY='".$n2."', BUNDLED='".$o2."', TGL_NODINPPDARIREN='".$p2."', STATUS_KELAYAKAN='".$q2."', TGL_NODINKEKON='".$r2."', TGL_NODINKEPENG='".$s2."', JANGKABAYAR_NODIN='".$t2."', KET_ANGKA='".$u2."', KET_URAIAN='".$v2."', NO_NOTADINAS='".$w2."', NO_WO_TIANG='".$x2."', NAMA_PABRIKAN_WO_TIANG='".$y2."', TGL_WO_TIANG='".$z2."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);

				$query1="UPDATE lainkol SET HPL='".$hpl."',KETERANGAN='".$p."' WHERE no='".$no."'";
				$hasil=$this->db->query($query1);
			}
			elseif($_SESSION['akses']=="Konstruksi")
			{
				$query="UPDATE konstruksikol SET TGL_NOTDINKEVENDOR='".$a3."', NAMA_VENDORPELAK='".$b3."',NO_SPK='".$c3."',TGL_OPERASI='".$d3."',KON_A3CS='".$e3."',PIN_ISOLATOR='".$f3."',HANG_ISOLATOR='".$g3."',KON_LA='".$h3."',KON_CUBICLE='".$i3."',KON_TRAFO='".$j3."',KON_LVPANEL='".$k3."',KON_BUNDLED='".$l3."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);

				$query1="UPDATE lainkol SET HPL='".$hpl."',KETERANGAN='".$p."' WHERE no='".$no."'";
				$hasil=$this->db->query($query1);
			}
			else
			{
				//pp area
				$query="UPDATE pp_areakol SET NAMA_PEMOHON='".$b."',NO_AGENDA='".$c."',NAMA_PEL='".$d."',ALAMAT='".$e."',JML_CALON='".$f."',TOTAL_VA='".$g."',TGL_BAYAR='".$h."',STATUS_PERMOHONAN='".$i."',JANGKA_SURVEYPP='".$jangka_survey."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);
				//rayon
				$query="UPDATE pp_areakol SET TGL_PK='".$a1."',ID_RYN='".$b1."',KET_PERLUASAN='".$c1."',TGL_RYNKIRIM='".$d1."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);
				//perencanaan
				$query="UPDATE perencanaankol SET A3CS_150='".$b2."', A3CS240='".$c2."', MVTIC240='".$d2."', SKTM240='".$e2."', CUBICLE='".$f2."', TRAFO50='".$g2."', TRAFO100='".$h2."', TRAFO160='".$i2."', TRAFO200='".$j2."', TRAFO250='".$k2."', LVPANEL='".$l2."', NA2XSEYB='".$m2."', NYFGBY='".$n2."', BUNDLED='".$o2."', TGL_NODINPPDARIREN='".$p2."', STATUS_KELAYAKAN='".$q2."', TGL_NODINKEKON='".$r2."', TGL_NODINKEPENG='".$s2."', JANGKABAYAR_NODIN='".$t2."', KET_ANGKA='".$u2."', KET_URAIAN='".$v2."', NO_NOTADINAS='".$w2."', NO_WO_TIANG='".$x2."', NAMA_PABRIKAN_WO_TIANG='".$y2."', TGL_WO_TIANG='".$z2."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);
				//konstruksi
				$query="UPDATE konstruksikol SET TGL_NOTDINKEVENDOR='".$a3."', NAMA_VENDORPELAK='".$b3."',NO_SPK='".$c3."',TGL_OPERASI='".$d3."',KON_A3CS='".$e3."',PIN_ISOLATOR='".$f3."',HANG_ISOLATOR='".$g3."',KON_LA='".$h3."',KON_CUBICLE='".$i3."',KON_TRAFO='".$j3."',KON_LVPANEL='".$k3."',KON_BUNDLED='".$l3."' WHERE no='".$no."'";
				$hasil=$this->db->query($query);
				//lain lain
				$query="UPDATE lainkol SET TGL_NYALA='".$m."',TGL_PDL='".$n."',HPL='".$hpl."',KETERANGAN='".$p."' WHERE no='".$no."'";

				$hasil=$this->db->query($query);
			}

			return $hasil;
		}

		function tambahpelkoltodb($data)
		{
			$no=$data['a'];
			$b=$data['b'];
			$c=$data['c'];
			$d=$data['d'];
			$e=$data['e'];
			$f=$data['f'];
			$g=$data['g'];
			$h=$data['h'];
			$i=$data['i'];
			$m=$data['m'];
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y/m/d H:i:s');

			$query="INSERT INTO pp_areakol (no, nama_pemohon, no_agenda, nama_pel, alamat, jml_calon, total_va, tgl_bayar, status_permohonan, id_ryn, tgl_input,user_input) VALUES ('".$no."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."','".$h."','".$i."','".$m."',TO_DATE('$tanggal', 'yyyy/mm/dd hh24:mi:ss'),'".$_SESSION['nama']."')";
			$query1="INSERT INTO perencanaankol (id) VALUES('')";
			$query2="INSERT INTO konstruksikol (id) VALUES('')";
			$query3="INSERT INTO lainkol (id) VALUES('')";
			$this->db->query($query);
			$this->db->query($query1);
			$this->db->query($query2);
			$this->db->query($query3);
		}

		function cekdata($no,$jenis_data)
		{
			$hasil=$this->db->query("SELECT COUNT(*) AS count FROM uploadrynkol WHERE  NO_PELANGGAN='".$no."' AND jenis_data='".$jenis_data."'");
			return $hasil;
		}

		function datafromdb($id)
		{
			$hasil=$this->db->query("SELECT * FROM uploadrynkol WHERE id='".$id."'")->result();
			return $hasil;
		}
		function simpandataupload($data)
		{
			$no=$data['no_pelanggan'];
			$data_upload=$data['gb'];
			$jenis_data=$data['jdu'];

			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('d/m/Y, H:i:s');
			$query="insert into uploadrynkol values('','".$no."','".$data_upload."','".$jenis_data."','".$tanggal."')";
			$hasil=$this->db->query($query);
			if($jenis_data=="Gambar Hasil Survey")
			{
				$query1="UPDATE pp_areakol SET gmbr='1' where NO='".$no."'";
				$this->db->query($query1);
			}
			elseif($jenis_data=="Surat Permohonan Pelanggan")
			{
				$query1="UPDATE pp_areakol SET spp='1' where NO='".$no."'";
				$this->db->query($query1);
			}
			elseif($jenis_data=="Surat Pengantar dari Rayon")
			{
				$query1="UPDATE pp_areakol SET spdr='1' where NO='".$no."'";
				$this->db->query($query1);
			}
			elseif($jenis_data=="Surat Pernyataan Pelanggan")
			{
				$query1="UPDATE pp_areakol SET sppel='1' where NO='".$no."'";
				$this->db->query($query1);
			}
			elseif($jenis_data=="Surat Persediaan Pelanggan Ketempatan Konstruksi PLN")
			{
				$query1="UPDATE pp_areakol SET sppkkpln='1' where NO='".$no."'";
				$this->db->query($query1);
			}
			elseif($jenis_data=="Analisa Cost Benefit")
			{
				$query1="UPDATE pp_areakol SET anb='1' where NO='".$no."'";
				$this->db->query($query1);
			}

			elseif($jenis_data=="Bukti Bayar")
			{
				$query1="UPDATE pp_areakol SET bb='1' where NO='".$no."'";
				$this->db->query($query1);
			}
			return $hasil;
		}

		function updatedataupload($data)
		{
			$no=$data['no_pelanggan'];
			$data_upload=$data['gb'];
			$jenis_data=$data['jdu'];

			$query="UPDATE uploadrynkol SET data_upload='".$data_upload."' WHERE NO_PELANGGAN='".$no."' AND jenis_data='".$jenis_data."'";
			$hasil=$this->db->query($query);
			return $hasil;
		}

		function datauploadfromdb($id)
		{
			$hasil=$this->db->query("SELECT * FROM uploadrynkol WHERE no_pelanggan='".$id."' ORDER BY TGL_UPLOAD ASC")->result();
			return $hasil;
		}

		function get_total_data_KOLEKTIF(){
			$hasil=$this->db->query("SELECT COUNT(*) AS total FROM V_PELKOL");
			return $hasil;
		}
		
	


		function get_total_data_GMBR_KOLEKTIF(){
			$hasil=$this->db->query("SELECT COUNT(*) AS total_survey FROM v_pelkol WHERE (gmbr is null) and (status_permohonan != 'RESTITUSI' or status_permohonan is null)");
			return $hasil;
		}

		function get_total_data_RAB_KOLEKTIF(){
			$hasil=$this->db->query("SELECT COUNT(*) AS total_rab FROM v_pelkol WHERE (no_notadinas is null and tgl_bayar is not null and gmbr is not null) and (status_permohonan != 'RESTITUSI' or status_permohonan is null)");
			return $hasil;
		}

		function get_total_data_BAYAR_KOLEKTIF(){
			$hasil=$this->db->query("SELECT COUNT(*) AS total_bayar FROM v_pelkol WHERE (tgl_bayar is null and gmbr is not null) and (status_permohonan != 'RESTITUSI' or status_permohonan is null)");
			return $hasil;
		}

		function get_total_data_PELAKSANAAN_KOLEKTIF(){
			$hasil=$this->db->query("SELECT COUNT(*) AS total_pelaksanaan FROM v_pelkol WHERE (tgl_notdinkevendor is null and no_notadinas is not null and tgl_bayar is not null and gmbr is not null) and (status_permohonan != 'RESTITUSI' or status_permohonan is null)");
			return $hasil;
		}

		function get_total_data_NYALA_KOLEKTIF(){
			$hasil=$this->db->query("SELECT COUNT(*) AS total_nyala FROM v_pelkol WHERE (tgl_nyala is null and tgl_notdinkevendor is not null and no_notadinas is not null and tgl_bayar is not null and gmbr is not null) and (status_permohonan != 'RESTITUSI' or status_permohonan is null)");
			return $hasil;
		}

		function get_data_filter_by_menu($keyword){
			if ($keyword == "survey") {
				$statementWhere = "(gmbr is null)";
			}else if ($keyword == "bayar") {
				$statementWhere = "(tgl_bayar is null and gmbr is not null)";
			}else if ($keyword == "rab") {
				$statementWhere = "(no_notadinas is null and tgl_bayar is not null and gmbr is not null)";
			}else if ($keyword == "pel") {
				$statementWhere = "(tgl_notdinkevendor is null and no_notadinas is not null and tgl_bayar is not null and gmbr is not null)";
			}else if ($keyword == "nyala") {
				$statementWhere = "(tgl_nyala is null and tgl_notdinkevendor is not null and no_notadinas is not null and tgl_bayar is not null and 				gmbr is not null)";
			}
			$hasil=$this->db->query("SELECT * FROM V_PELKOL where ".$statementWhere." and (status_permohonan != 'RESTITUSI' or status_permohonan is null)")->result();
			return $hasil;
		}

		public function get_data_filter($data, $input)
		{
			$field=$data['field'];
			$key=$data['key'];
			if ($field=="NO")
			{
				$hasil=$this->db->query("SELECT * FROM V_PELKOL WHERE ".$field."='".$key."%' AND ".$input."IS NULL")->result();
			}
			else
			{
				$hasil=$this->db->query("SELECT * FROM V_PELKOL WHERE ".$field." LIKE '%".$key."%' AND ".$input." IS NULL")->result();
			}
			return $hasil;
		}

	}
	?>
