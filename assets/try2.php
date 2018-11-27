<?php  ?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_import extends CI_Controller
{
	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation','upload'));
		if ( !isset($_SESSION['login_app']) ) {
			redirect('c_login');
		}
		if($_SESSION['akses']!="admin")
		{
			redirect('c_admin');
		}
	}

	public function index()
	{	
		$data['title']="Import";
		$data['side1']="";
		$data['side2']="active";
		$data['side3']="";
		$data['side4']="";

		$this->template->display('v_import',$data);
	}

	public function changedate($date){
		if ($date == "") {
			$datechange = "";
		}
		else {
			$pecah = explode("/", $date);
			$day = intval($pecah[0]);
			$month = intval($pecah[1]);
			if ($day == 1) {
				if ($month == 2 || $month == 4 || $month == 6 || $month == 9 || $month == 11) {
					$daytrue = 31;
					$month = $month-1;

					$daystring = strval($daytrue);
					$monthstring = strval($month);
					$datechange = $pecah[2]."-".$monthstring."-".$daystring;
				}
				else if ($month == 3) {
					$daytrue = 29;
					$month = $month-1;

					$daystring = strval($daytrue);
					$monthstring = strval($month);
					$datechange = $pecah[2]."-".$monthstring."-".$daystring;
				}
				else if ($month == 5 || $month == 7 || $month == 8 || $month == 12){
					$daytrue = 30;
					$month = $month-1;	
					
					$daystring = strval($daytrue);
					$monthstring = strval($month);
					$datechange = $pecah[2]."-".$monthstring."-".$daystring;
				}
				else if ($month == 1){
					$daytrue = 31;
					$month = 12;
					$year = intval($pecah[2])-1;

					$daystring = strval($daytrue);
					$monthstring = strval($month);
					$yearstring = strval($year);
					$datechange = $yearstring."-".$monthstring."-".$daystring;
				}

			}
			else {
				$day = intval($pecah[0])-1;
				$daystring = strval($day);
				$datechange = $pecah[2]."-".$pecah[1]."-".$daystring;
			}

			
		}
		return $datechange;

	}

	public function explode ($numb){
		if ($numb== "") {
			$expl = "";
		}
		else {
			$expl = explode("-", $numb);
		}
		return $expl[0];
	}



	public function do_upload()
	{
		$config['upload_path'] = './assets/temp_upload/';
		$config['allowed_types'] = 'xls';

		$this->upload->initialize($config);			            
		if ( ! $this->upload->do_upload('xlsimport'))
		{
			$data = array('error' => $this->upload->display_errors());
			$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			Data gagal di import !
			</div>";
		}
		else
		{
			$data = array('error' => false);
			$upload_data = $this->upload->data();
			$this->load->library('excel_reader');
			$this->excel_reader->setOutputEncoding('CP1251');
			$file =  $upload_data['full_path'];
			$this->excel_reader->read($file);
			error_reporting(E_ALL ^ E_NOTICE);
			   	$this->load->library('form_validation'); //load library form_validation
			   	$this->form_validation->set_rules('jenis_monitoring', 'Jenis Monitoring', 'required'); //cek, validasi username
			   	if($this->form_validation->run() == TRUE)
			   	{
			   		$drop['drop']=$this->input->post('drop');
			   		$jns=$this->input->post('jenis_monitoring');
			   		if($jns=="pelTR")
			   		{
						// Sheet 1
			   			$data = $this->excel_reader->sheets[0] ;
			   			$dataexcel = Array();
			   			for ($i = 12; $i <= $data['numRows']; $i++) 
			   			{
			   				if($data['cells'][$i][1] == '') break;

			   				$dataexcel[$i-12]['no'] = $data['cells'][$i][1];

			   				$dataexcel[$i-12]['idpel'] = $data['cells'][$i][2];
			   				$dataexcel[$i-12]['idpel'] = $this->explode($dataexcel[$i-12]['idpel']);

			   				$dataexcel[$i-12]['no_agenda'] = $data['cells'][$i][3];
			   				$dataexcel[$i-12]['no_agenda'] = $this->explode($dataexcel[$i-12]['no_agenda']);
			   				
			   				$dataexcel[$i-12]['nama_pel'] = $data['cells'][$i][4];
			   				$dataexcel[$i-12]['alamat_pel'] = $data['cells'][$i][5];
			   				$dataexcel[$i-12]['tarif_lama'] = $data['cells'][$i][6];
			   				$dataexcel[$i-12]['daya_lama'] = $data['cells'][$i][7];
			   				$dataexcel[$i-12]['tarif_baru'] = $data['cells'][$i][8];
			   				$dataexcel[$i-12]['daya_baru'] = $data['cells'][$i][9];
			   				$dataexcel[$i-12]['jns_transaksi'] = $data['cells'][$i][10];

			   				$dataexcel[$i-12]['tgl_bayar'] = $data['cells'][$i][11];
			   				$dataexcel[$i-12]['tgl_bayar'] = $this->changedate($dataexcel[$i-12]['tgl_bayar']);

			   				$dataexcel[$i-12]['status_permohonan'] = $data['cells'][$i][12];

			   				$dataexcel[$i-12]['tgl_pk'] = $data['cells'][$i][13];
			   				$dataexcel[$i-12]['tgl_pk'] = $this->changedate($dataexcel[$i-12]['tgl_pk']);

			   				$dataexcel[$i-12]['rayon'] = $data['cells'][$i][15];
			   				$dataexcel[$i-12]['ket_perluasan'] = $data['cells'][$i][16];

			   				$dataexcel[$i-12]['tgl_rynkirim'] = $data['cells'][$i][17];
			   				$dataexcel[$i-12]['tgl_rynkirim'] = $this->changedate($dataexcel[$i-12]['tgl_rynkirim']);

			   				$dataexcel[$i-12]['jangka_surveypp'] = $data['cells'][$i][18];
			   				$dataexcel[$i-12]['a3cs'] = $data['cells'][$i][19];
			   				$dataexcel[$i-12]['mvtic'] = $data['cells'][$i][20];
			   				$dataexcel[$i-12]['pin_iso'] = $data['cells'][$i][21];
			   				$dataexcel[$i-12]['hang_iso'] = $data['cells'][$i][22];
			   				$dataexcel[$i-12]['cubicle'] = $data['cells'][$i][23];
			   				$dataexcel[$i-12]['travo_50'] = $data['cells'][$i][24];
			   				$dataexcel[$i-12]['trafo_100'] = $data['cells'][$i][25];
			   				$dataexcel[$i-12]['trafo_160'] = $data['cells'][$i][26];
			   				$dataexcel[$i-12]['trafo_200'] = $data['cells'][$i][27];
			   				$dataexcel[$i-12]['trafo_250'] = $data['cells'][$i][28];
			   				$dataexcel[$i-12]['lv_panel'] = $data['cells'][$i][29];
			   				$dataexcel[$i-12]['na2xseyb'] = $data['cells'][$i][30];
			   				$dataexcel[$i-12]['nyfgby'] = $data['cells'][$i][31];
			   				$dataexcel[$i-12]['bundled'] = $data['cells'][$i][32];

			   				$dataexcel[$i-12]['tgl_nodinkekon'] = $data['cells'][$i][33];
			   				$dataexcel[$i-12]['tgl_nodinkekon'] = $this->changedate($dataexcel[$i-12]['tgl_nodinkekon']);

			   				$dataexcel[$i-12]['tgl_nodinkepeng'] = $data['cells'][$i][34];
			   				$dataexcel[$i-12]['tgl_nodinkepeng'] = $this->changedate($dataexcel[$i-12]['tgl_nodinkepeng']);

			   				$dataexcel[$i-12]['jangkabayar_nodinkekon'] = $data['cells'][$i][35];

			   				$dataexcel[$i-12]['ket_angka'] = $data['cells'][$i][36];
			   				$dataexcel[$i-12]['ket_uraian'] = $data['cells'][$i][37];

			   				$dataexcel[$i-12]['no_notadinas'] = $data['cells'][$i][38];
			   				$dataexcel[$i-12]['no_wo_tiang'] = $data['cells'][$i][39];
			   				$dataexcel[$i-12]['nama_pabrikan_wo_tiang'] = $data['cells'][$i][40];

			   				$dataexcel[$i-12]['tgl_wo_tiang'] = $data['cells'][$i][41];
			   				$dataexcel[$i-12]['tgl_wo_tiang'] = $this->changedate($dataexcel[$i-12]['tgl_wo_tiang']);

			   				$dataexcel[$i-12]['tgl_notdinkevendor'] = $data['cells'][$i][42];
			   				$dataexcel[$i-12]['tgl_notdinkevendor'] = $this->changedate($dataexcel[$i-12]['tgl_notdinkevendor']);

			   				$dataexcel[$i-12]['nama_vendorpelak'] = $data['cells'][$i][43];
			   				$dataexcel[$i-12]['no_spk'] = $data['cells'][$i][44];

			   				$dataexcel[$i-12]['tgl_operasi'] = $data['cells'][$i][45];
			   				$dataexcel[$i-12]['tgl_operasi'] = $this->changedate($dataexcel[$i-12]['tgl_operasi']);

			   				$dataexcel[$i-12]['progress'] = $data['cells'][$i][46];

			   				$dataexcel[$i-12]['kon_a3cs'] = $data['cells'][$i][47];
			   				$dataexcel[$i-12]['pin_isolator'] = $data['cells'][$i][48];
			   				$dataexcel[$i-12]['hang_isolator'] = $data['cells'][$i][49];
			   				$dataexcel[$i-12]['kon_la'] = $data['cells'][$i][50];
			   				$dataexcel[$i-12]['kon_cubicle'] = $data['cells'][$i][51];
			   				$dataexcel[$i-12]['kon_trafo'] = $data['cells'][$i][52];
			   				$dataexcel[$i-12]['kon_lvpanel'] = $data['cells'][$i][53];
			   				$dataexcel[$i-12]['kon_bundled'] = $data['cells'][$i][54];

			   				$dataexcel[$i-12]['tgl_nyala'] = $data['cells'][$i][55];
			   				$dataexcel[$i-12]['tgl_nyala'] = $this->changedate($dataexcel[$i-12]['tgl_nyala']);

			   				$dataexcel[$i-12]['tgl_pdl'] = $data['cells'][$i][56];
			   				$dataexcel[$i-12]['tgl_pdl'] = $this->changedate($dataexcel[$i-12]['tgl_pdl']);

			   				// $dataexcel[$i-12]['hpl'] = $data['cells'][$i][57];
			   				$tgl5 = $dataexcel[$i-12]['tgl_bayar'];
			   				$tgl6 = $dataexcel[$i-12]['tgl_pdl'];
			   				$selisih3 = strtotime($tgl6) -  strtotime($tgl5);
			   				if($tgl5=="")
			   				{
			   					$hari2="TANGGAL BAYAR BELUM ADA";
			   				}
			   				elseif($tgl6=="")
			   				{
			   					$hari2="TANGGAL PDL BELUM ADA";
			   				}
			   				else
			   				{
			   					$hari2 = floor(abs($selisih3/(60*60*24)))." hari";
			   				}

			   				$dataexcel[$i-12]['hpl'] = $hari2;

			   				$dataexcel[$i-12]['keterangan'] = $data['cells'][$i][58];
			   			}
			   			$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			   			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			   			Ada kesalahan saat memasukan data ke database !
			   			</div>";	       
			   			delete_files($upload_data['file_path']);
			   			$this->load->model('m_import');
			   			$this->m_import->tambah_ppareatr($dataexcel,$drop);
			   		}
			   		elseif($jns=="kolektif")
			   		{
						// Sheet 2

			   			$data = $this->excel_reader->sheets[2] ;
			   			$dataexcel = Array();
			   			for ($i = 11; $i <= $data['numRows']; $i++) 
			   			{
			   				if($data['cells'][$i][1] == '') break;

			   				$dataexcel[$i-11]['no'] = $data['cells'][$i][1];
			   				$dataexcel[$i-11]['nama_pemohon'] = $data['cells'][$i][2];
			   				// $dataexcel[$i-11]['no_agenda'] = $data['cells'][$i][3];
			   				$dataexcel[$i-11]['no_agenda'] = $data['cells'][$i][3];
			   				$dataexcel[$i-11]['no_agenda'] = $this->explode($dataexcel[$i-11]['no_agenda']);

			   				$dataexcel[$i-11]['nama_pel'] = $data['cells'][$i][4];
			   				$dataexcel[$i-11]['alamat'] = $data['cells'][$i][5];
			   				$dataexcel[$i-11]['jml_calon'] = $data['cells'][$i][6];
			   				$dataexcel[$i-11]['total_va'] = $data['cells'][$i][7];

			   				$dataexcel[$i-11]['tgl_bayar'] = $data['cells'][$i][8];
			   				$dataexcel[$i-11]['tgl_bayar'] = $this->changedate($dataexcel[$i-11]['tgl_bayar']);
			   				
			   				$dataexcel[$i-11]['status_permohonan'] = $data['cells'][$i][9];

			   				$dataexcel[$i-11]['tgl_pk'] = $data['cells'][$i][10];
			   				$dataexcel[$i-11]['tgl_pk'] = $this->changedate($dataexcel[$i-11]['tgl_pk']);

			   				$dataexcel[$i-11]['rayon'] = $data['cells'][$i][12];
			   				$dataexcel[$i-11]['ket_perluasan'] = $data['cells'][$i][13];
			   				
			   				$dataexcel[$i-11]['tgl_rynkirim'] = $data['cells'][$i][14];
			   				$dataexcel[$i-11]['tgl_rynkirim'] = $this->changedate($dataexcel[$i-11]['tgl_rynkirim']);

			   				$dataexcel[$i-11]['jangka_surveypp'] = $data['cells'][$i][15];
			   				$dataexcel[$i-11]['a3cs_150'] = $data['cells'][$i][16];
			   				$dataexcel[$i-11]['a3cs240'] = $data['cells'][$i][17];
			   				$dataexcel[$i-11]['mvtic240'] = $data['cells'][$i][18];
			   				$dataexcel[$i-11]['sktm240'] = $data['cells'][$i][19];
			   				$dataexcel[$i-11]['cubicle'] = $data['cells'][$i][20];
			   				$dataexcel[$i-11]['trafo50'] = $data['cells'][$i][21];
			   				$dataexcel[$i-11]['trafo100'] = $data['cells'][$i][22];
			   				$dataexcel[$i-11]['trafo160'] = $data['cells'][$i][23];
			   				$dataexcel[$i-11]['trafo200'] = $data['cells'][$i][24];
			   				$dataexcel[$i-11]['trafo250'] = $data['cells'][$i][25];
			   				$dataexcel[$i-11]['lvpanel'] = $data['cells'][$i][26];
			   				$dataexcel[$i-11]['na2xseyb'] = $data['cells'][$i][27];
			   				$dataexcel[$i-11]['nyfgby'] = $data['cells'][$i][28];
			   				$dataexcel[$i-11]['bundled'] = $data['cells'][$i][29];

			   				$dataexcel[$i-11]['tgl_nodinppdariren'] = $data['cells'][$i][30];
			   				$dataexcel[$i-11]['tgl_nodinppdariren'] = $this->changedate($dataexcel[$i-11]['tgl_nodinppdariren']);

			   				$dataexcel[$i-11]['status_kelayakan'] = $data['cells'][$i][31];
			   				$dataexcel[$i-11]['tgl_nodinkekon'] = $data['cells'][$i][32];
			   				$dataexcel[$i-11]['tgl_nodinkekon'] = $this->changedate($dataexcel[$i-11]['tgl_nodinkekon']);

			   				$dataexcel[$i-11]['tgl_nodinkepeng'] = $data['cells'][$i][33];
			   				$dataexcel[$i-11]['tgl_nodinkepeng'] = $this->changedate($dataexcel[$i-12]['tgl_nodinkepeng']);

			   				$dataexcel[$i-11]['jangkabayar_nodin'] = $data['cells'][$i][34];
			   				$dataexcel[$i-11]['ket_angka'] = $data['cells'][$i][35];
			   				$dataexcel[$i-11]['ket_uraian'] = $data['cells'][$i][36];
			   				$dataexcel[$i-11]['no_notadinas'] = $data['cells'][$i][37];
			   				$dataexcel[$i-11]['no_wo_tiang'] = $data['cells'][$i][38];
			   				$dataexcel[$i-11]['nama_pabrikan_wo_tiang'] = $data['cells'][$i][39];

			   				$dataexcel[$i-11]['tgl_wo_tiang'] = $data['cells'][$i][40];
			   				$dataexcel[$i-11]['tgl_wo_tiang'] = $this->changedate($dataexcel[$i-12]['tgl_wo_tiang']);

			   				$dataexcel[$i-11]['tgl_notdinkevendor'] = $data['cells'][$i][41];
			   				$dataexcel[$i-11]['tgl_notdinkevendor'] = $this->changedate($dataexcel[$i-11]['tgl_notdinkevendor']);

			   				$dataexcel[$i-11]['nama_vendorpelak'] = $data['cells'][$i][42];
			   				$dataexcel[$i-11]['no_spk'] = $data['cells'][$i][43];

			   				$dataexcel[$i-11]['tgl_operasi'] = $data['cells'][$i][44];
			   				$dataexcel[$i-11]['tgl_operasi'] = $this->changedate($dataexcel[$i-11]['tgl_operasi']);

			   				$dataexcel[$i-11]['kon_a3cs'] = $data['cells'][$i][45];
			   				$dataexcel[$i-11]['pin_isolator'] = $data['cells'][$i][46];
			   				$dataexcel[$i-11]['hang_isolator'] = $data['cells'][$i][47];
			   				$dataexcel[$i-11]['kon_la'] = $data['cells'][$i][48];
			   				$dataexcel[$i-11]['kon_cubicle'] = $data['cells'][$i][49];
			   				$dataexcel[$i-11]['kon_trafo'] = $data['cells'][$i][50];
			   				$dataexcel[$i-11]['kon_lvpanel'] = $data['cells'][$i][51];
			   				$dataexcel[$i-11]['kon_bundled'] = $data['cells'][$i][52];

			   				$dataexcel[$i-11]['tgl_nyala'] = $data['cells'][$i][53];
			   				$dataexcel[$i-11]['tgl_nyala'] = $this->changedate($dataexcel[$i-11]['tgl_nyala']);

			   				$dataexcel[$i-11]['tgl_pdl'] = $data['cells'][$i][54];
			   				$dataexcel[$i-11]['tgl_pdl'] = $this->changedate($dataexcel[$i-11]['tgl_pdl']);
			   				
			   				// $dataexcel[$i-11]['hpl'] = $data['cells'][$i][55];
			   				$tgl5 = $dataexcel[$i-11]['tgl_bayar'];
			   				$tgl6 = $dataexcel[$i-11]['tgl_pdl'];
			   				$selisih3 = strtotime($tgl6) -  strtotime($tgl5);
			   				if($tgl5=="")
			   				{
			   					$hari2="TANGGAL BAYAR BELUM ADA";
			   				}
			   				elseif($tgl6=="")
			   				{
			   					$hari2="TANGGAL PDL BELUM ADA";
			   				}
			   				else
			   				{
			   					$hari2 = floor(abs($selisih3/(60*60*24)))." hari";
			   				}

			   				$dataexcel[$i-11]['hpl'] = $hari2;
			   				$dataexcel[$i-11]['keterangan'] = $data['cells'][$i][56];
			   			}
			   			$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			   			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			   			Ada kesalahan saat memasukan data ke database !
			   			</div>";	       
			   			delete_files($upload_data['file_path']);
			   			$this->load->model('m_import');
			   			$this->m_import->tambah_ppareakol($dataexcel,$drop);
			   		}
			   		elseif($jns=="pelTM")
			   		{
						// Sheet 3
			   			$data = $this->excel_reader->sheets[3] ;
			   			$dataexcel = Array();
			   			for ($i = 10; $i <= $data['numRows']; $i++) 
			   			{
			   				if($data['cells'][$i][1] == '') break;

			   				$dataexcel[$i-10]['no'] = $data['cells'][$i][1];
			   				// $dataexcel[$i-10]['idpel'] = $data['cells'][$i][2];
			   				// $dataexcel[$i-10]['no_agenda'] = $data['cells'][$i][3];
			   				
			   				
			   				$dataexcel[$i-10]['idpel'] = $data['cells'][$i][2];
			   				$dataexcel[$i-10]['idpel'] = $this->explode($dataexcel[$i-10]['idpel']);

			   				$dataexcel[$i-10]['no_agenda'] = $data['cells'][$i][3];
			   				$dataexcel[$i-10]['no_agenda'] = $this->explode($dataexcel[$i-10]['no_agenda']);

			   				$dataexcel[$i-10]['nama_pel'] = $data['cells'][$i][4];
			   				$dataexcel[$i-10]['alamat_pel'] = $data['cells'][$i][5];
			   				$dataexcel[$i-10]['tarif_lama'] = $data['cells'][$i][6];
			   				$dataexcel[$i-10]['daya_lama'] = $data['cells'][$i][7];
			   				$dataexcel[$i-10]['tarif_baru'] = $data['cells'][$i][8];
			   				$dataexcel[$i-10]['daya_baru'] = $data['cells'][$i][9];
			   				$dataexcel[$i-10]['jns_transaksi'] = $data['cells'][$i][10];

			   				$dataexcel[$i-10]['tgl_bayar'] = $data['cells'][$i][11];
			   				$dataexcel[$i-10]['tgl_bayar'] = $this->changedate($dataexcel[$i-10]['tgl_bayar']);

			   				$dataexcel[$i-10]['status_permohonan'] = $data['cells'][$i][12];

			   				$dataexcel[$i-10]['tgl_pk'] = $data['cells'][$i][13];
			   				$dataexcel[$i-10]['tgl_pk'] = $this->changedate($dataexcel[$i-10]['tgl_pk']);

			   				$dataexcel[$i-10]['rayon'] = $data['cells'][$i][15];
			   				$dataexcel[$i-10]['ket_perluasan'] = $data['cells'][$i][16];

			   				$dataexcel[$i-10]['tgl_rynkirim'] = $data['cells'][$i][17];
			   				$dataexcel[$i-10]['tgl_rynkirim'] = $this->changedate($dataexcel[$i-10]['tgl_rynkirim']);

			   				$dataexcel[$i-10]['jangka_surveypp'] = $data['cells'][$i][18];

			   				$dataexcel[$i-10]['tgl_nodinppdariren']=$data['cells'][$i][19];
			   				$dataexcel[$i-10]['tgl_nodinppdariren'] = $this->changedate($dataexcel[$i-10]['tgl_nodinppdariren']);
			   				

			   				$dataexcel[$i-10]['status_kelayakan']=$data['cells'][$i][20];
			   				
			   				$dataexcel[$i-10]['tgl_nodinkekon']=$data['cells'][$i][21];
			   				$dataexcel[$i-10]['tgl_nodinkekon'] = $this->changedate($dataexcel[$i-10]['tgl_nodinkekon']);


			   				$dataexcel[$i-10]['jangka_bayar']=$data['cells'][$i][22];
			   				$dataexcel[$i-10]['ket_angka']=$data['cells'][$i][23];
			   				$dataexcel[$i-10]['ket_uraian']=$data['cells'][$i][24];
			   				$dataexcel[$i-10]['no_notadinas']=$data['cells'][$i][25];
			   				$dataexcel[$i-10]['no_wo_tiang'] = $data['cells'][$i][26];
			   				$dataexcel[$i-10]['nama_pabrikan_wo_tiang'] = $data['cells'][$i][27];

			   				$dataexcel[$i-10]['tgl_wo_tiang'] = $data['cells'][$i][28];
			   				$dataexcel[$i-10]['tgl_wo_tiang'] = $this->changedate($dataexcel[$i-12]['tgl_wo_tiang']);

			   				$dataexcel[$i-10]['tgl_nodinkevendor']=$data['cells'][$i][29];
			   				$dataexcel[$i-10]['tgl_nodinkevendor'] = $this->changedate($dataexcel[$i-10]['tgl_nodinkevendor']);

			   				
			   				$dataexcel[$i-10]['nama_vendorpelak']=$data['cells'][$i][30];
			   				$dataexcel[$i-10]['no_spk']=$data['cells'][$i][31];

			   				$dataexcel[$i-10]['tgl_operasi']=$data['cells'][$i][32];
			   				$dataexcel[$i-10]['tgl_operasi'] = $this->changedate($dataexcel[$i-10]['tgl_operasi']);
			   				

			   				$dataexcel[$i-10]['kon_a3cs']=$data['cells'][$i][33];
			   				$dataexcel[$i-10]['pin_isolator']=$data['cells'][$i][34];
			   				$dataexcel[$i-10]['hang_isolator']=$data['cells'][$i][35];
			   				$dataexcel[$i-10]['kon_cubicle']=$data['cells'][$i][36];
			   				$dataexcel[$i-10]['kon_trafo']=$data['cells'][$i][37];
			   				$dataexcel[$i-10]['kon_lvpanel']=$data['cells'][$i][38];
			   				$dataexcel[$i-10]['kon_sktm']=$data['cells'][$i][39];
			   				$dataexcel[$i-10]['bundled']=$data['cells'][$i][40];

			   				$dataexcel[$i-10]['tgl_nyala']=$data['cells'][$i][41];
			   				$dataexcel[$i-10]['tgl_nyala'] = $this->changedate($dataexcel[$i-10]['tgl_nyala']);

			   				$dataexcel[$i-10]['tgl_pdl']=$data['cells'][$i][42];
			   				$dataexcel[$i-10]['tgl_pdl'] = $this->changedate($dataexcel[$i-10]['tgl_pdl']);
			   				

			   				// $dataexcel[$i-10]['hpl']=$data['cells'][$i][43];
			   				$tgl5 = $dataexcel[$i-10]['tgl_bayar'];
			   				$tgl6 = $dataexcel[$i-10]['tgl_pdl'];
			   				$selisih3 = strtotime($tgl6) -  strtotime($tgl5);
			   				if($tgl5=="")
			   				{
			   					$hari2="TANGGAL BAYAR BELUM ADA";
			   				}
			   				elseif($tgl6=="")
			   				{
			   					$hari2="TANGGAL PDL BELUM ADA";
			   				}
			   				else
			   				{
			   					$hari2 = floor(abs($selisih3/(60*60*24)))." hari";
			   				}

			   				$dataexcel[$i-10]['hpl'] = $hari2;
			   				$dataexcel[$i-10]['keterangan']=$data['cells'][$i][44];
			   			}
			   			$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			   			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			   			Ada kesalahan saat memasukan data ke database !
			   			</div>";	       
			   			delete_files($upload_data['file_path']);
			   			$this->load->model('m_import');
			   			$this->m_import->tambah_ppareatm($dataexcel, $drop);
			   		}
			   	}elseif ($jns=="all") {
			   		// Sheet 1
			   		$data = $this->excel_reader->sheets[0] ;
			   		$dataexcel = Array();
			   		for ($i = 12; $i <= $data['numRows']; $i++) 
			   		{
			   			if($data['cells'][$i][1] == '') break;

			   			$dataexcel[$i-12]['no'] = $data['cells'][$i][1];

			   			$dataexcel[$i-12]['idpel'] = $data['cells'][$i][2];
			   			$dataexcel[$i-12]['idpel'] = $this->explode($dataexcel[$i-12]['idpel']);

			   			$dataexcel[$i-12]['no_agenda'] = $data['cells'][$i][3];
			   			$dataexcel[$i-12]['no_agenda'] = $this->explode($dataexcel[$i-12]['no_agenda']);
			   			
			   			$dataexcel[$i-12]['nama_pel'] = $data['cells'][$i][4];
			   			$dataexcel[$i-12]['alamat_pel'] = $data['cells'][$i][5];
			   			$dataexcel[$i-12]['tarif_lama'] = $data['cells'][$i][6];
			   			$dataexcel[$i-12]['daya_lama'] = $data['cells'][$i][7];
			   			$dataexcel[$i-12]['tarif_baru'] = $data['cells'][$i][8];
			   			$dataexcel[$i-12]['daya_baru'] = $data['cells'][$i][9];
			   			$dataexcel[$i-12]['jns_transaksi'] = $data['cells'][$i][10];

			   			$dataexcel[$i-12]['tgl_bayar'] = $data['cells'][$i][11];
			   			$dataexcel[$i-12]['tgl_bayar'] = $this->changedate($dataexcel[$i-12]['tgl_bayar']);

			   			$dataexcel[$i-12]['status_permohonan'] = $data['cells'][$i][12];

			   			$dataexcel[$i-12]['tgl_pk'] = $data['cells'][$i][13];
			   			$dataexcel[$i-12]['tgl_pk'] = $this->changedate($dataexcel[$i-12]['tgl_pk']);

			   			$dataexcel[$i-12]['rayon'] = $data['cells'][$i][15];
			   			$dataexcel[$i-12]['ket_perluasan'] = $data['cells'][$i][16];

			   			$dataexcel[$i-12]['tgl_rynkirim'] = $data['cells'][$i][17];
			   			$dataexcel[$i-12]['tgl_rynkirim'] = $this->changedate($dataexcel[$i-12]['tgl_rynkirim']);

			   			$dataexcel[$i-12]['jangka_surveypp'] = $data['cells'][$i][18];
			   			$dataexcel[$i-12]['a3cs'] = $data['cells'][$i][19];
			   			$dataexcel[$i-12]['mvtic'] = $data['cells'][$i][20];
			   			$dataexcel[$i-12]['pin_iso'] = $data['cells'][$i][21];
			   			$dataexcel[$i-12]['hang_iso'] = $data['cells'][$i][22];
			   			$dataexcel[$i-12]['cubicle'] = $data['cells'][$i][23];
			   			$dataexcel[$i-12]['travo_50'] = $data['cells'][$i][24];
			   			$dataexcel[$i-12]['trafo_100'] = $data['cells'][$i][25];
			   			$dataexcel[$i-12]['trafo_160'] = $data['cells'][$i][26];
			   			$dataexcel[$i-12]['trafo_200'] = $data['cells'][$i][27];
			   			$dataexcel[$i-12]['trafo_250'] = $data['cells'][$i][28];
			   			$dataexcel[$i-12]['lv_panel'] = $data['cells'][$i][29];
			   			$dataexcel[$i-12]['na2xseyb'] = $data['cells'][$i][30];
			   			$dataexcel[$i-12]['nyfgby'] = $data['cells'][$i][31];
			   			$dataexcel[$i-12]['bundled'] = $data['cells'][$i][32];

			   			$dataexcel[$i-12]['tgl_nodinkekon'] = $data['cells'][$i][33];
			   			$dataexcel[$i-12]['tgl_nodinkekon'] = $this->changedate($dataexcel[$i-12]['tgl_nodinkekon']);

			   			$dataexcel[$i-12]['tgl_nodinkepeng'] = $data['cells'][$i][34];
			   			$dataexcel[$i-12]['tgl_nodinkepeng'] = $this->changedate($dataexcel[$i-12]['tgl_nodinkepeng']);

			   			$dataexcel[$i-12]['jangkabayar_nodinkekon'] = $data['cells'][$i][35];

			   			$dataexcel[$i-12]['ket_angka'] = $data['cells'][$i][36];
			   			$dataexcel[$i-12]['ket_uraian'] = $data['cells'][$i][37];

			   			$dataexcel[$i-12]['no_notadinas'] = $data['cells'][$i][38];
			   			$dataexcel[$i-12]['no_wo_tiang'] = $data['cells'][$i][39];
			   			$dataexcel[$i-12]['nama_pabrikan_wo_tiang'] = $data['cells'][$i][40];

			   			$dataexcel[$i-12]['tgl_wo_tiang'] = $data['cells'][$i][41];
			   			$dataexcel[$i-12]['tgl_wo_tiang'] = $this->changedate($dataexcel[$i-12]['tgl_wo_tiang']);

			   			$dataexcel[$i-12]['tgl_notdinkevendor'] = $data['cells'][$i][42];
			   			$dataexcel[$i-12]['tgl_notdinkevendor'] = $this->changedate($dataexcel[$i-12]['tgl_notdinkevendor']);

			   			$dataexcel[$i-12]['nama_vendorpelak'] = $data['cells'][$i][43];
			   			$dataexcel[$i-12]['no_spk'] = $data['cells'][$i][44];

			   			$dataexcel[$i-12]['tgl_operasi'] = $data['cells'][$i][45];
			   			$dataexcel[$i-12]['tgl_operasi'] = $this->changedate($dataexcel[$i-12]['tgl_operasi']);

			   			$dataexcel[$i-12]['progress'] = $data['cells'][$i][46];

			   			$dataexcel[$i-12]['kon_a3cs'] = $data['cells'][$i][47];
			   			$dataexcel[$i-12]['pin_isolator'] = $data['cells'][$i][48];
			   			$dataexcel[$i-12]['hang_isolator'] = $data['cells'][$i][49];
			   			$dataexcel[$i-12]['kon_la'] = $data['cells'][$i][50];
			   			$dataexcel[$i-12]['kon_cubicle'] = $data['cells'][$i][51];
			   			$dataexcel[$i-12]['kon_trafo'] = $data['cells'][$i][52];
			   			$dataexcel[$i-12]['kon_lvpanel'] = $data['cells'][$i][53];
			   			$dataexcel[$i-12]['kon_bundled'] = $data['cells'][$i][54];

			   			$dataexcel[$i-12]['tgl_nyala'] = $data['cells'][$i][55];
			   			$dataexcel[$i-12]['tgl_nyala'] = $this->changedate($dataexcel[$i-12]['tgl_nyala']);

			   			$dataexcel[$i-12]['tgl_pdl'] = $data['cells'][$i][56];
			   			$dataexcel[$i-12]['tgl_pdl'] = $this->changedate($dataexcel[$i-12]['tgl_pdl']);

			   				// $dataexcel[$i-12]['hpl'] = $data['cells'][$i][57];
			   			$tgl5 = $dataexcel[$i-12]['tgl_bayar'];
			   			$tgl6 = $dataexcel[$i-12]['tgl_pdl'];
			   			$selisih3 = strtotime($tgl6) -  strtotime($tgl5);
			   			if($tgl5=="")
			   			{
			   				$hari2="TANGGAL BAYAR BELUM ADA";
			   			}
			   			elseif($tgl6=="")
			   			{
			   				$hari2="TANGGAL PDL BELUM ADA";
			   			}
			   			else
			   			{
			   				$hari2 = floor(abs($selisih3/(60*60*24)))." hari";
			   			}

			   			$dataexcel[$i-12]['hpl'] = $hari2;

			   			$dataexcel[$i-12]['keterangan'] = $data['cells'][$i][58];
			   		}
			   		$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			   		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			   		Ada kesalahan saat memasukan data ke database !
			   		</div>";	       
			   		delete_files($upload_data['file_path']);
			   		$this->load->model('m_import');
			   		$this->m_import->tambah_ppareatr($dataexcel,$drop);
			   		// Sheet 2
			   		$data = $this->excel_reader->sheets[2] ;
			   		$dataexcel = Array();
			   		for ($i = 11; $i <= $data['numRows']; $i++) 
			   		{
			   			if($data['cells'][$i][1] == '') break;

			   			$dataexcel[$i-11]['no'] = $data['cells'][$i][1];
			   			$dataexcel[$i-11]['nama_pemohon'] = $data['cells'][$i][2];
			   				// $dataexcel[$i-11]['no_agenda'] = $data['cells'][$i][3];
			   			$dataexcel[$i-11]['no_agenda'] = $data['cells'][$i][3];
			   			$dataexcel[$i-11]['no_agenda'] = $this->explode($dataexcel[$i-11]['no_agenda']);

			   			$dataexcel[$i-11]['nama_pel'] = $data['cells'][$i][4];
			   			$dataexcel[$i-11]['alamat'] = $data['cells'][$i][5];
			   			$dataexcel[$i-11]['jml_calon'] = $data['cells'][$i][6];
			   			$dataexcel[$i-11]['total_va'] = $data['cells'][$i][7];

			   			$dataexcel[$i-11]['tgl_bayar'] = $data['cells'][$i][8];
			   			$dataexcel[$i-11]['tgl_bayar'] = $this->changedate($dataexcel[$i-11]['tgl_bayar']);

			   			$dataexcel[$i-11]['status_permohonan'] = $data['cells'][$i][9];

			   			$dataexcel[$i-11]['tgl_pk'] = $data['cells'][$i][10];
			   			$dataexcel[$i-11]['tgl_pk'] = $this->changedate($dataexcel[$i-11]['tgl_pk']);

			   			$dataexcel[$i-11]['rayon'] = $data['cells'][$i][12];
			   			$dataexcel[$i-11]['ket_perluasan'] = $data['cells'][$i][13];

			   			$dataexcel[$i-11]['tgl_rynkirim'] = $data['cells'][$i][14];
			   			$dataexcel[$i-11]['tgl_rynkirim'] = $this->changedate($dataexcel[$i-11]['tgl_rynkirim']);

			   			$dataexcel[$i-11]['jangka_surveypp'] = $data['cells'][$i][15];
			   			$dataexcel[$i-11]['a3cs_150'] = $data['cells'][$i][16];
			   			$dataexcel[$i-11]['a3cs240'] = $data['cells'][$i][17];
			   			$dataexcel[$i-11]['mvtic240'] = $data['cells'][$i][18];
			   			$dataexcel[$i-11]['sktm240'] = $data['cells'][$i][19];
			   			$dataexcel[$i-11]['cubicle'] = $data['cells'][$i][20];
			   			$dataexcel[$i-11]['trafo50'] = $data['cells'][$i][21];
			   			$dataexcel[$i-11]['trafo100'] = $data['cells'][$i][22];
			   			$dataexcel[$i-11]['trafo160'] = $data['cells'][$i][23];
			   			$dataexcel[$i-11]['trafo200'] = $data['cells'][$i][24];
			   			$dataexcel[$i-11]['trafo250'] = $data['cells'][$i][25];
			   			$dataexcel[$i-11]['lvpanel'] = $data['cells'][$i][26];
			   			$dataexcel[$i-11]['na2xseyb'] = $data['cells'][$i][27];
			   			$dataexcel[$i-11]['nyfgby'] = $data['cells'][$i][28];
			   			$dataexcel[$i-11]['bundled'] = $data['cells'][$i][29];

			   			$dataexcel[$i-11]['tgl_nodinppdariren'] = $data['cells'][$i][30];
			   			$dataexcel[$i-11]['tgl_nodinppdariren'] = $this->changedate($dataexcel[$i-11]['tgl_nodinppdariren']);

			   			$dataexcel[$i-11]['status_kelayakan'] = $data['cells'][$i][31];
			   			$dataexcel[$i-11]['tgl_nodinkekon'] = $data['cells'][$i][32];
			   			$dataexcel[$i-11]['tgl_nodinkekon'] = $this->changedate($dataexcel[$i-11]['tgl_nodinkekon']);

			   			$dataexcel[$i-11]['tgl_nodinkepeng'] = $data['cells'][$i][33];
			   			$dataexcel[$i-11]['tgl_nodinkepeng'] = $this->changedate($dataexcel[$i-12]['tgl_nodinkepeng']);

			   			$dataexcel[$i-11]['jangkabayar_nodin'] = $data['cells'][$i][34];
			   			$dataexcel[$i-11]['ket_angka'] = $data['cells'][$i][35];
			   			$dataexcel[$i-11]['ket_uraian'] = $data['cells'][$i][36];
			   			$dataexcel[$i-11]['no_notadinas'] = $data['cells'][$i][37];
			   			$dataexcel[$i-11]['no_wo_tiang'] = $data['cells'][$i][38];
			   			$dataexcel[$i-11]['nama_pabrikan_wo_tiang'] = $data['cells'][$i][39];

			   			$dataexcel[$i-11]['tgl_wo_tiang'] = $data['cells'][$i][40];
			   			$dataexcel[$i-11]['tgl_wo_tiang'] = $this->changedate($dataexcel[$i-12]['tgl_wo_tiang']);

			   			$dataexcel[$i-11]['tgl_notdinkevendor'] = $data['cells'][$i][41];
			   			$dataexcel[$i-11]['tgl_notdinkevendor'] = $this->changedate($dataexcel[$i-11]['tgl_notdinkevendor']);

			   			$dataexcel[$i-11]['nama_vendorpelak'] = $data['cells'][$i][42];
			   			$dataexcel[$i-11]['no_spk'] = $data['cells'][$i][43];

			   			$dataexcel[$i-11]['tgl_operasi'] = $data['cells'][$i][44];
			   			$dataexcel[$i-11]['tgl_operasi'] = $this->changedate($dataexcel[$i-11]['tgl_operasi']);

			   			$dataexcel[$i-11]['kon_a3cs'] = $data['cells'][$i][45];
			   			$dataexcel[$i-11]['pin_isolator'] = $data['cells'][$i][46];
			   			$dataexcel[$i-11]['hang_isolator'] = $data['cells'][$i][47];
			   			$dataexcel[$i-11]['kon_la'] = $data['cells'][$i][48];
			   			$dataexcel[$i-11]['kon_cubicle'] = $data['cells'][$i][49];
			   			$dataexcel[$i-11]['kon_trafo'] = $data['cells'][$i][50];
			   			$dataexcel[$i-11]['kon_lvpanel'] = $data['cells'][$i][51];
			   			$dataexcel[$i-11]['kon_bundled'] = $data['cells'][$i][52];

			   			$dataexcel[$i-11]['tgl_nyala'] = $data['cells'][$i][53];
			   			$dataexcel[$i-11]['tgl_nyala'] = $this->changedate($dataexcel[$i-11]['tgl_nyala']);

			   			$dataexcel[$i-11]['tgl_pdl'] = $data['cells'][$i][54];
			   			$dataexcel[$i-11]['tgl_pdl'] = $this->changedate($dataexcel[$i-11]['tgl_pdl']);

			   				// $dataexcel[$i-11]['hpl'] = $data['cells'][$i][55];
			   			$tgl5 = $dataexcel[$i-11]['tgl_bayar'];
			   			$tgl6 = $dataexcel[$i-11]['tgl_pdl'];
			   			$selisih3 = strtotime($tgl6) -  strtotime($tgl5);
			   			if($tgl5=="")
			   			{
			   				$hari2="TANGGAL BAYAR BELUM ADA";
			   			}
			   			elseif($tgl6=="")
			   			{
			   				$hari2="TANGGAL PDL BELUM ADA";
			   			}
			   			else
			   			{
			   				$hari2 = floor(abs($selisih3/(60*60*24)))." hari";
			   			}

			   			$dataexcel[$i-11]['hpl'] = $hari2;
			   			$dataexcel[$i-11]['keterangan'] = $data['cells'][$i][56];
			   		}
			   		$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			   		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			   		Ada kesalahan saat memasukan data ke database !
			   		</div>";	       
			   		delete_files($upload_data['file_path']);
			   		$this->load->model('m_import');
			   		$this->m_import->tambah_ppareakol($dataexcel,$drop);
			   		// Sheet 3
			   		$data = $this->excel_reader->sheets[3] ;
			   		$dataexcel = Array();
			   		for ($i = 10; $i <= $data['numRows']; $i++) 
			   		{
			   			if($data['cells'][$i][1] == '') break;

			   			$dataexcel[$i-10]['no'] = $data['cells'][$i][1];
			   				// $dataexcel[$i-10]['idpel'] = $data['cells'][$i][2];
			   				// $dataexcel[$i-10]['no_agenda'] = $data['cells'][$i][3];


			   			$dataexcel[$i-10]['idpel'] = $data['cells'][$i][2];
			   			$dataexcel[$i-10]['idpel'] = $this->explode($dataexcel[$i-10]['idpel']);

			   			$dataexcel[$i-10]['no_agenda'] = $data['cells'][$i][3];
			   			$dataexcel[$i-10]['no_agenda'] = $this->explode($dataexcel[$i-10]['no_agenda']);

			   			$dataexcel[$i-10]['nama_pel'] = $data['cells'][$i][4];
			   			$dataexcel[$i-10]['alamat_pel'] = $data['cells'][$i][5];
			   			$dataexcel[$i-10]['tarif_lama'] = $data['cells'][$i][6];
			   			$dataexcel[$i-10]['daya_lama'] = $data['cells'][$i][7];
			   			$dataexcel[$i-10]['tarif_baru'] = $data['cells'][$i][8];
			   			$dataexcel[$i-10]['daya_baru'] = $data['cells'][$i][9];
			   			$dataexcel[$i-10]['jns_transaksi'] = $data['cells'][$i][10];

			   			$dataexcel[$i-10]['tgl_bayar'] = $data['cells'][$i][11];
			   			$dataexcel[$i-10]['tgl_bayar'] = $this->changedate($dataexcel[$i-10]['tgl_bayar']);

			   			$dataexcel[$i-10]['status_permohonan'] = $data['cells'][$i][12];

			   			$dataexcel[$i-10]['tgl_pk'] = $data['cells'][$i][13];
			   			$dataexcel[$i-10]['tgl_pk'] = $this->changedate($dataexcel[$i-10]['tgl_pk']);

			   			$dataexcel[$i-10]['rayon'] = $data['cells'][$i][15];
			   			$dataexcel[$i-10]['ket_perluasan'] = $data['cells'][$i][16];

			   			$dataexcel[$i-10]['tgl_rynkirim'] = $data['cells'][$i][17];
			   			$dataexcel[$i-10]['tgl_rynkirim'] = $this->changedate($dataexcel[$i-10]['tgl_rynkirim']);

			   			$dataexcel[$i-10]['jangka_surveypp'] = $data['cells'][$i][18];

			   			$dataexcel[$i-10]['tgl_nodinppdariren']=$data['cells'][$i][19];
			   			$dataexcel[$i-10]['tgl_nodinppdariren'] = $this->changedate($dataexcel[$i-10]['tgl_nodinppdariren']);


			   			$dataexcel[$i-10]['status_kelayakan']=$data['cells'][$i][20];

			   			$dataexcel[$i-10]['tgl_nodinkekon']=$data['cells'][$i][21];
			   			$dataexcel[$i-10]['tgl_nodinkekon'] = $this->changedate($dataexcel[$i-10]['tgl_nodinkekon']);


			   			$dataexcel[$i-10]['jangka_bayar']=$data['cells'][$i][22];
			   			$dataexcel[$i-10]['ket_angka']=$data['cells'][$i][23];
			   			$dataexcel[$i-10]['ket_uraian']=$data['cells'][$i][24];
			   			$dataexcel[$i-10]['no_notadinas']=$data['cells'][$i][25];
			   			$dataexcel[$i-10]['no_wo_tiang'] = $data['cells'][$i][26];
			   			$dataexcel[$i-10]['nama_pabrikan_wo_tiang'] = $data['cells'][$i][27];

			   			$dataexcel[$i-10]['tgl_wo_tiang'] = $data['cells'][$i][28];
			   			$dataexcel[$i-10]['tgl_wo_tiang'] = $this->changedate($dataexcel[$i-12]['tgl_wo_tiang']);

			   			$dataexcel[$i-10]['tgl_nodinkevendor']=$data['cells'][$i][29];
			   			$dataexcel[$i-10]['tgl_nodinkevendor'] = $this->changedate($dataexcel[$i-10]['tgl_nodinkevendor']);


			   			$dataexcel[$i-10]['nama_vendorpelak']=$data['cells'][$i][30];
			   			$dataexcel[$i-10]['no_spk']=$data['cells'][$i][31];

			   			$dataexcel[$i-10]['tgl_operasi']=$data['cells'][$i][32];
			   			$dataexcel[$i-10]['tgl_operasi'] = $this->changedate($dataexcel[$i-10]['tgl_operasi']);


			   			$dataexcel[$i-10]['kon_a3cs']=$data['cells'][$i][33];
			   			$dataexcel[$i-10]['pin_isolator']=$data['cells'][$i][34];
			   			$dataexcel[$i-10]['hang_isolator']=$data['cells'][$i][35];
			   			$dataexcel[$i-10]['kon_cubicle']=$data['cells'][$i][36];
			   			$dataexcel[$i-10]['kon_trafo']=$data['cells'][$i][37];
			   			$dataexcel[$i-10]['kon_lvpanel']=$data['cells'][$i][38];
			   			$dataexcel[$i-10]['kon_sktm']=$data['cells'][$i][39];
			   			$dataexcel[$i-10]['bundled']=$data['cells'][$i][40];

			   			$dataexcel[$i-10]['tgl_nyala']=$data['cells'][$i][41];
			   			$dataexcel[$i-10]['tgl_nyala'] = $this->changedate($dataexcel[$i-10]['tgl_nyala']);

			   			$dataexcel[$i-10]['tgl_pdl']=$data['cells'][$i][42];
			   			$dataexcel[$i-10]['tgl_pdl'] = $this->changedate($dataexcel[$i-10]['tgl_pdl']);


			   				// $dataexcel[$i-10]['hpl']=$data['cells'][$i][43];
			   			$tgl5 = $dataexcel[$i-10]['tgl_bayar'];
			   			$tgl6 = $dataexcel[$i-10]['tgl_pdl'];
			   			$selisih3 = strtotime($tgl6) -  strtotime($tgl5);
			   			if($tgl5=="")
			   			{
			   				$hari2="TANGGAL BAYAR BELUM ADA";
			   			}
			   			elseif($tgl6=="")
			   			{
			   				$hari2="TANGGAL PDL BELUM ADA";
			   			}
			   			else
			   			{
			   				$hari2 = floor(abs($selisih3/(60*60*24)))." hari";
			   			}

			   			$dataexcel[$i-10]['hpl'] = $hari2;
			   			$dataexcel[$i-10]['keterangan']=$data['cells'][$i][44];
			   		}
			   		$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			   		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			   		Ada kesalahan saat memasukan data ke database !
			   		</div>";	       
			   		delete_files($upload_data['file_path']);
			   		$this->load->model('m_import');
			   		$this->m_import->tambah_ppareatm($dataexcel, $drop);
			   	}
			   	else
			   	{
			   		$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			   		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			   		Pilih Jenis Monitoring Dahulu
			   		</div>";
			   	}
			   }
			   redirect('c_import');
			}

		}