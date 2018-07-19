<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_import extends CI_Model
{
         
	function __construct()
	{
		parent::__construct();
	}
	
	function tambah_ppareatr($dataarray,$drop)
    {
    	$drop=$drop['drop'];
    	if($drop=="1")
    	{
			$truncate1 ="TRUNCATE TABLE laintr";
			$truncate2 ="TRUNCATE TABLE perencanaantr";
			$truncate3 ="TRUNCATE TABLE konstruksitr";
			$truncate4 ="delete from pp_areatr";
						
			$this->db->query($truncate1);
			$this->db->query($truncate2);
			$this->db->query($truncate3);
			$this->db->query($truncate4);
		}
    	
        for($i=0;$i<count($dataarray);$i++)
        {
        	array(
                $no=$dataarray[$i]['no'],
                $idpel=$dataarray[$i]['idpel'],
                $no_agenda=$dataarray[$i]['no_agenda'],
                $nama_pel=$dataarray[$i]['nama_pel'],
                $alamat_pel=$dataarray[$i]['alamat_pel'],
                $tarif_lama=$dataarray[$i]['tarif_lama'],
                $daya_lama=$dataarray[$i]['daya_lama'],
                $tarif_baru=$dataarray[$i]['tarif_baru'],
                $daya_baru=$dataarray[$i]['daya_baru'],
                $jns_transaksi=$dataarray[$i]['jns_transaksi'],
                $tgl_bayar=$dataarray[$i]['tgl_bayar'],
                $status_permohonan=$dataarray[$i]['status_permohonan'],
                $tgl_pk=$dataarray[$i]['tgl_pk'],
                $rayon=$dataarray[$i]['rayon'],
                $ket_perluasan=$dataarray[$i]['ket_perluasan'],
                $tgl_rynkirim=$dataarray[$i]['tgl_rynkirim'],
                $jangka_surveypp=$dataarray[$i]['jangka_surveypp'],
                $a3cs=$dataarray[$i]['a3cs'],
                $mvtic=$dataarray[$i]['mvtic'],
                $pin_iso=$dataarray[$i]['pin_iso'],
                $hang_iso=$dataarray[$i]['hang_iso'],
                $cubicle=$dataarray[$i]['cubicle'],
                $travo_50=$dataarray[$i]['travo_50'],
                $trafo_100=$dataarray[$i]['trafo_100'],
                $trafo_160=$dataarray[$i]['trafo_160'],
                $trafo_200=$dataarray[$i]['trafo_200'],
                $trafo_250=$dataarray[$i]['trafo_250'],
                $lv_panel=$dataarray[$i]['lv_panel'],
                $na2xseyb=$dataarray[$i]['na2xseyb'],
                $nyfgby=$dataarray[$i]['nyfgby'],
                $bundled=$dataarray[$i]['bundled'],
                $tgl_nodinkekon=$dataarray[$i]['tgl_nodinkekon'],
                $tgl_nodinkepeng=$dataarray[$i]['tgl_nodinkepeng'],
                $jangkabayar_nodinkekon=$dataarray[$i]['jangkabayar_nodinkekon'],
                $ket_angka=$dataarray[$i]['ket_angka'],
                $ket_uraian=$dataarray[$i]['ket_uraian'],
                $no_notadinas=$dataarray[$i]['no_notadinas'],
                $no_wo_tiang=$dataarray[$i]['no_wo_tiang'],
                $nama_pabrikan_wo_tiang=$dataarray[$i]['nama_pabrikan_wo_tiang'],
                $tgl_wo_tiang=$dataarray[$i]['tgl_wo_tiang'],

                $tgl_notdinkevendor=$dataarray[$i]['tgl_notdinkevendor'],
                $nama_vendorpelak=$dataarray[$i]['nama_vendorpelak'],
                $no_spk=$dataarray[$i]['no_spk'],
                $tgl_operasi=$dataarray[$i]['tgl_operasi'],
                $progress=$dataarray[$i]['progress'],
                $kon_a3cs=$dataarray[$i]['kon_a3cs'],
                $pin_isolator=$dataarray[$i]['pin_isolator'],
                $hang_isolator=$dataarray[$i]['hang_isolator'],
                $kon_la=$dataarray[$i]['kon_la'],
                $kon_cubicle=$dataarray[$i]['kon_cubicle'],
                $kon_trafo=$dataarray[$i]['kon_trafo'],
                $kon_lvpanel=$dataarray[$i]['kon_lvpanel'],
                $kon_bundled=$dataarray[$i]['kon_bundled'],
                
                $tgl_nyala=$dataarray[$i]['tgl_nyala'],
                $tgl_pdl=$dataarray[$i]['tgl_pdl'],
                $hpl=$dataarray[$i]['hpl'],
                $keterangan=$dataarray[$i]['keterangan']
                );
                
                $nama=str_replace("'","''",$nama_pel);
                
               	if($nama=="")
				{
					$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  				Data dengan nomer ".$no." tidak dapat dimasukan database karena tidak tercantum nama pelanggan!
								</div>";
				}
				else
				{
					if($rayon=="")
					{
						$rayon="KOSONG";
					}
				
					$query="INSERT INTO pp_areatr (idpel, no_agenda, nama_pel, alamat_pel, tarif_lama, daya_lama, tarif_baru, daya_baru, jns_transaksi, tgl_bayar, status_permohonan, tgl_pk, id_ryn, ket_perluasan, tgl_rynkirim, jangka_surveypp) VALUES ('".$idpel."','".$no_agenda."','".$nama."','".$alamat_pel."','".$tarif_lama."','".$daya_lama."','".$tarif_baru."','".$daya_baru."','".$jns_transaksi."','".$tgl_bayar."','".$status_permohonan."','".$tgl_pk."','".$rayon."','".$ket_perluasan."','".$tgl_rynkirim."','".$jangka_surveypp."')";
					
					$query1="INSERT INTO perencanaantr (a3cs,mvtic,pin_iso,hang_iso,cubicle,travo_50,trafo_100,trafo_160,trafo_200,trafo_250,lv_panel,na2xseyb,nyfgby,bundled,tgl_nodinkekon,tgl_nodinkepeng,jangkabayar_nodinkekon,ket_angka,ket_uraian,no_notadinas,no_wo_tiang,nama_pabrikan_wo_tiang,tgl_wo_tiang) VALUES('".$a3cs."','".$mvtic."','".$pin_iso."','".$hang_iso."','".$cubicle."','".$travo_50."','".$trafo_100."','".$trafo_160."','".$trafo_200."','".$trafo_250."','".$lv_panel."','".$na2xseyb."','".$nyfgby."','".$bundled."','".$tgl_nodinkekon."','".$tgl_nodinkepeng."','".$jangkabayar_nodinkekon."','".$ket_angka."','".$ket_uraian."','".$no_notadinas."','".$no_wo_tiang."','".$nama_pabrikan_wo_tiang."','".$tgl_wo_tiang."')";
					
					$query2="INSERT INTO konstruksitr (tgl_notdinkevendor,nama_vendorpelak,no_spk,tgl_operasi,progress,kon_a3cs,pin_isolator,hang_isolator,kon_la,kon_cubicle,kon_trafo,kon_lvpanel,kon_bundled) VALUES('".$tgl_notdinkevendor."','".$nama_vendorpelak."','".$no_spk."','".$tgl_operasi."','".$progress."','".$kon_a3cs."','".$pin_isolator."','".$hang_isolator."','".$kon_la."','".$kon_cubicle."','".$kon_trafo."','".$kon_lvpanel."','".$kon_bundled."')";
					
					$query3="INSERT INTO laintr (tgl_nyala,tgl_pdl,hpl,keterangan) VALUES('".$tgl_nyala."','".$tgl_pdl."','".$hpl."','".$keterangan."')";
					$this->db->query($query);
					$this->db->query($query1);
					$this->db->query($query2);
					$this->db->query($query3);
					$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
			  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  				Data berhasil di import !
								</div>";
				}
        }
    }
    
    function tambah_ppareakol($dataarray,$drop)
    {
		$drop=$drop['drop'];
    	if($drop=="1")
    	{
			$truncate1 ="TRUNCATE TABLE lainkol";
			$truncate2 ="TRUNCATE TABLE perencanaankol";
			$truncate3 ="TRUNCATE TABLE konstruksikol";
			$truncate4 ="delete from pp_areakol";
						
			$this->db->query($truncate1);
			$this->db->query($truncate2);
			$this->db->query($truncate3);
			$this->db->query($truncate4);
		}
		
        for($i=0;$i<count($dataarray);$i++)
        {
        	array(
                $no=$dataarray[$i]['no'],
                $nama_pemohon=$dataarray[$i]['nama_pemohon'],
                $no_agenda=$dataarray[$i]['no_agenda'],
                $nama_pel=$dataarray[$i]['nama_pel'],
                $alamat=$dataarray[$i]['alamat'],
                $jml_calon=$dataarray[$i]['jml_calon'],
                $total_va=$dataarray[$i]['total_va'],
                $tgl_bayar=$dataarray[$i]['tgl_bayar'],
                $status_permohonan=$dataarray[$i]['status_permohonan'],
                $tgl_pk=$dataarray[$i]['tgl_pk'],
                $rayon=$dataarray[$i]['rayon'],
                $ket_perluasan=$dataarray[$i]['ket_perluasan'],
                $tgl_rynkirim=$dataarray[$i]['tgl_rynkirim'],
                $jangka_surveypp=$dataarray[$i]['jangka_surveypp'],
				$a3cs_150=$dataarray[$i]['a3cs_150'],
				$a3cs240=$dataarray[$i]['a3cs240'],
				$mvtic240=$dataarray[$i]['mvtic240'],
				$sktm240=$dataarray[$i]['sktm240'],
				$cubicle=$dataarray[$i]['cubicle'],
				$trafo50=$dataarray[$i]['trafo50'],
				$trafo100=$dataarray[$i]['trafo100'],
				$trafo160=$dataarray[$i]['trafo160'],
				$trafo200=$dataarray[$i]['trafo200'],
				$trafo250=$dataarray[$i]['trafo250'],
				$lvpanel=$dataarray[$i]['lvpanel'],
				$na2xseyb=$dataarray[$i]['na2xseyb'],
				$nyfgby=$dataarray[$i]['nyfgby'],
				$bundled=$dataarray[$i]['bundled'],
				$tgl_nodinppdariren=$dataarray[$i]['tgl_nodinppdariren'],
				$status_kelayakan=$dataarray[$i]['status_kelayakan'],
				$tgl_nodinkekon=$dataarray[$i]['tgl_nodinkekon'],
				$tgl_nodinkepeng=$dataarray[$i]['tgl_nodinkepeng'],
				$jangkabayar_nodin=$dataarray[$i]['jangkabayar_nodin'],
				$ket_angka=$dataarray[$i]['ket_angka'],
				$ket_uraian=$dataarray[$i]['ket_uraian'],
				$no_notadinas=$dataarray[$i]['no_notadinas'],
				$no_wo_tiang=$dataarray[$i]['no_wo_tiang'],
                $nama_pabrikan_wo_tiang=$dataarray[$i]['nama_pabrikan_wo_tiang'],
                $tgl_wo_tiang=$dataarray[$i]['tgl_wo_tiang'],
				$tgl_notdinkevendor=$dataarray[$i]['tgl_notdinkevendor'],
				$nama_vendorpelak=$dataarray[$i]['nama_vendorpelak'],
				$no_spk=$dataarray[$i]['no_spk'],
				$tgl_operasi=$dataarray[$i]['tgl_operasi'],
				$kon_a3cs=$dataarray[$i]['kon_a3cs'],
				$pin_isolator=$dataarray[$i]['pin_isolator'],
				$hang_isolator=$dataarray[$i]['hang_isolator'],
				$kon_la=$dataarray[$i]['kon_la'],
				$kon_cubicle=$dataarray[$i]['kon_cubicle'],
				$kon_trafo=$dataarray[$i]['kon_trafo'],
				$kon_lvpanel=$dataarray[$i]['kon_lvpanel'],
				$kon_bundled=$dataarray[$i]['kon_bundled'],
				$tgl_nyala=$dataarray[$i]['tgl_nyala'],
				$tgl_pdl=$dataarray[$i]['tgl_pdl'],
				$hpl=$dataarray[$i]['hpl'],
				$keterangan=$dataarray[$i]['keterangan']
                );
            
				$nama=str_replace("'","''",$nama_pel);
					
					if($nama=="")
					{
						$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								Data dengan nomer ".$no." tidak dapat dimasukan database karena tidak tercantum nama pelanggan!
									</div>";
					}
					else
					{
						if($rayon=="")
						{
							$rayon="KOSONG";
						}
						
						$query="INSERT INTO pp_areakol (no, nama_pemohon, no_agenda, nama_pel, alamat, jml_calon, total_va, tgl_bayar, status_permohonan, tgl_pk, id_ryn, ket_perluasan, tgl_rynkirim, jangka_surveypp) VALUES ('".$no."','".$nama_pemohon."','".$no_agenda."','".$nama."','".$alamat."','".$jml_calon."','".$total_va."','".$tgl_bayar."','".$status_permohonan."','".$tgl_pk."','".$rayon."','".$ket_perluasan."','".$tgl_rynkirim."','".$jangka_surveypp."')";
				
						$query1="INSERT INTO perencanaankol (no, a3cs_150, a3cs240, mvtic240, sktm240, cubicle, trafo50, trafo100, trafo160, trafo200,  trafo250, lvpanel, na2xseyb, nyfgby, bundled, tgl_nodinppdariren, status_kelayakan, tgl_nodinkekon, tgl_nodinkepeng, jangkabayar_nodin, ket_angka, ket_uraian, no_notadinas,no_wo_tiang,nama_pabrikan_wo_tiang,tgl_wo_tiang) VALUES('".$no."','".$a3cs_150."','".$a3cs240."','".$mvtic240."','".$sktm240."','".$cubicle."','".$trafo50."','".$trafo100."','".$trafo160."','".$trafo200."','".$trafo250."','".$lvpanel."','".$na2xseyb."','".$nyfgby."','".$bundled."','".$tgl_nodinppdariren."','".$status_kelayakan."','".$tgl_nodinkekon."','".$tgl_nodinkepeng."','".$jangkabayar_nodin."','".$ket_angka."','".$ket_uraian."','".$no_notadinas."','".$no_wo_tiang."','".$nama_pabrikan_wo_tiang."','".$tgl_wo_tiang."')";
						
						$query2="INSERT INTO konstruksikol (no, tgl_notdinkevendor, nama_vendorpelak, no_spk, tgl_operasi, kon_a3cs, pin_isolator, hang_isolator, kon_la, kon_cubicle, kon_trafo, kon_lvpanel, kon_bundled) VALUES('".$no."','".$tgl_notdinkevendor."','".$nama_vendorpelak."','".$no_spk."','".$tgl_operasi."','".$kon_a3cs."','".$pin_isolator."','".$hang_isolator."','".$kon_la."','".$kon_cubicle."','".$kon_trafo."','".$kon_lvpanel."','".$kon_bundled."')";
						
						$query3="INSERT INTO lainkol (no,tgl_nyala,tgl_pdl,hpl,keterangan) VALUES('".$no."','".$tgl_nyala."','".$tgl_pdl."','".$hpl."','".$keterangan."')";
						$this->db->query($query);
						$this->db->query($query1);
						$this->db->query($query2);
						$this->db->query($query3);
						$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								Data berhasil di import !
									</div>";
					}
        }
    }
 
    function tambah_ppareatm($dataarray,$drop)
    {
		$drop=$drop['drop'];
    	if($drop=="1")
    	{
			$truncate1 ="TRUNCATE TABLE laintm";
			$truncate2 ="TRUNCATE TABLE perencanaantm";
			$truncate3 ="TRUNCATE TABLE konstruksitm";
			$truncate4 ="delete from pp_areatm";
						
			$this->db->query($truncate1);
			$this->db->query($truncate2);
			$this->db->query($truncate3);
			$this->db->query($truncate4);
		}
		
        for($i=0;$i<count($dataarray);$i++)
        {
        	array(
                $no=$dataarray[$i]['no'],
                $idpel=$dataarray[$i]['idpel'],
                $no_agenda=$dataarray[$i]['no_agenda'],
                $nama_pel=$dataarray[$i]['nama_pel'],
                $alamat_pel=$dataarray[$i]['alamat_pel'],
                $tarif_lama=$dataarray[$i]['tarif_lama'],
                $daya_lama=$dataarray[$i]['daya_lama'],
                $tarif_baru=$dataarray[$i]['tarif_baru'],
                $daya_baru=$dataarray[$i]['daya_baru'],
                $jns_transaksi=$dataarray[$i]['jns_transaksi'],
                $tgl_bayar=$dataarray[$i]['tgl_bayar'],
                $status_permohonan=$dataarray[$i]['status_permohonan'],
                $tgl_pk=$dataarray[$i]['tgl_pk'],
                $rayon=$dataarray[$i]['rayon'],
                $ket_perluasan=$dataarray[$i]['ket_perluasan'],
                $tgl_rynkirim=$dataarray[$i]['tgl_rynkirim'],
                $jangka_surveypp=$dataarray[$i]['jangka_surveypp'],
				$tgl_nodinppdariren=$dataarray[$i]['tgl_nodinppdariren'],
				$status_kelayakan=$dataarray[$i]['status_kelayakan'],
				$tgl_nodinkekon=$dataarray[$i]['tgl_nodinkekon'],
				$jangka_bayar=$dataarray[$i]['jangka_bayar'],
				$ket_angka=$dataarray[$i]['ket_angka'],
				$ket_uraian=$dataarray[$i]['ket_uraian'],
				$no_notadinas=$dataarray[$i]['no_notadinas'],
				$no_wo_tiang=$dataarray[$i]['no_wo_tiang'],
                $nama_pabrikan_wo_tiang=$dataarray[$i]['nama_pabrikan_wo_tiang'],
                $tgl_wo_tiang=$dataarray[$i]['tgl_wo_tiang'],
				$tgl_nodinkevendor=$dataarray[$i]['tgl_nodinkevendor'],
				$nama_vendorpelak=$dataarray[$i]['nama_vendorpelak'],
				$no_spk=$dataarray[$i]['no_spk'],
				$tgl_operasi=$dataarray[$i]['tgl_operasi'],
				$kon_a3cs=$dataarray[$i]['kon_a3cs'],
				$pin_isolator=$dataarray[$i]['pin_isolator'],
				$hang_isolator=$dataarray[$i]['hang_isolator'],
				$kon_cubicle=$dataarray[$i]['kon_cubicle'],
				$kon_trafo=$dataarray[$i]['kon_trafo'],
				$kon_lvpanel=$dataarray[$i]['kon_lvpanel'],
				$kon_sktm=$dataarray[$i]['kon_sktm'],
				$bundled=$dataarray[$i]['bundled'],
				$tgl_nyala=$dataarray[$i]['tgl_nyala'],
				$tgl_pdl=$dataarray[$i]['tgl_pdl'],
				$hpl=$dataarray[$i]['hpl'],
				$keterangan=$dataarray[$i]['keterangan']
                );
				
				$nama=str_replace("'","''",$nama_pel);
					
					if($nama=="")
					{
						$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								Data dengan nomer ".$no." tidak dapat dimasukan database karena tidak tercantum nama pelanggan!
									</div>";
					}
					else
					{
						if($rayon=="")
						{
							$rayon="KOSONG";
						}
						
						$query="INSERT INTO pp_areatm (no, idpel, no_agenda, nama_pel, alamat_pel, tarif_lama, daya_lama, tarif_baru, daya_baru, jns_transaksi, tgl_bayar, status_permohonan, tgl_pk, id_ryn, ket_perluasan, tgl_rynkirim, jangka_surveypp) VALUES ('".$no."','".$idpel."','".$no_agenda."','".$nama."','".$alamat_pel."','".$tarif_lama."','".$daya_lama."','".$tarif_baru."','".$daya_baru."','".$jns_transaksi."','".$tgl_bayar."','".$status_permohonan."','".$tgl_pk."','".$rayon."','".$ket_perluasan."','".$tgl_rynkirim."','".$jangka_surveypp."')";
            
						$query1="INSERT INTO perencanaantm (no, tgl_nodinppdariren, status_kelayakan, tgl_nodinkekon, jangka_bayar, ket_angka, ket_uraian, no_notadinas, no_wo_tiang,nama_pabrikan_wo_tiang,tgl_wo_tiang) VALUES('".$no."','".$tgl_nodinppdariren."','".$status_kelayakan."','".$tgl_nodinkekon."','".$jangka_bayar."','".$ket_angka."','".$ket_uraian."','".$no_notadinas."','".$no_wo_tiang."','".$nama_pabrikan_wo_tiang."','".$tgl_wo_tiang."')";
						
						$query2="INSERT INTO konstruksitm (no, tgl_nodinkevendor, nama_vendorpelak, no_spk, tgl_operasi, kon_a3cs, pin_isolator, hang_isolator, kon_cubicle, kon_trafo, kon_lvpanel, kon_sktm, bundled) VALUES('".$no."', '".$tgl_nodinkevendor."','".$nama_vendorpelak."','".$no_spk."','".$tgl_operasi."','".$kon_a3cs."','".$pin_isolator."','".$hang_isolator."','".$kon_cubicle."','".$kon_trafo."','".$kon_lvpanel."','".$kon_sktm."','".$bundled."')";
						
						$query3="INSERT INTO laintm (no,tgl_nyala,tgl_pdl,hpl,keterangan) VALUES('".$no."','".$tgl_nyala."','".$tgl_pdl."','".$hpl."','".$keterangan."')";
						$this->db->query($query);
						$this->db->query($query1);
						$this->db->query($query2);
						$this->db->query($query3);
						$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								Data berhasil di import !
									</div>";
					}
        }
    }
}
?>