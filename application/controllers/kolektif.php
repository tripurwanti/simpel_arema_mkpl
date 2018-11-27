<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kolektif extends CI_Controller
{
	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->model('m_notifikasi');
		$this->load->library(array('template','pagination','form_validation','upload'));
		if ( !isset($_SESSION['login_app']) ) {
			redirect('c_login');
		}
	}

	public function index()
	{	
		$this->load->model('m_kolektif');
		$data['hasil']=$this->m_kolektif->showppareafromdb()->result();
		$data['hasil_row']=$this->m_kolektif->showppareafromdb()->row();
		$data['title']="Pelanggan Kolektif";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";

		$this->template->display('kolektif/index',$data);
	}

	//CEK KATEGORI
	function cek_nama_rayon($id){
		if ($id =='51301') {
			return 'RAYON LAWANG';
		}elseif ($id =='51302') {
			return 'RAYON BULULAWANG';
		}elseif ($id == '51303') {
			return 'RAYON BATU';
		}elseif ($id == '51304') {
			return 'RAYON SINGOSARI';
		}elseif ($id == '51305') {
			return 'RAYON KEPANJEN';
		}elseif ($id == '51306') {
			return 'RAYON TUMPANG';
		}elseif ($id == '51307') {
			return 'RAYON GONDANGLEGI';
		}elseif ($id == '51308') {
			return 'RAYON DAMPIT';
		}elseif ($id == '51309') {
			return 'RAYON NGANTANG';
		}elseif ($id == '51310') {
			return 'RAYON SUMBER PUCUNG';
		}elseif ($id == '51311') {
			return 'RAYON DINOYO';
		}elseif ($id == '51312') {
			return 'RAYON BLIMBING';
		}elseif ($id == '51313') {
			return 'RAYON MALANG KOTA';
		}elseif ($id == '51314') {
			return 'RAYON KEBON AGUNG';
		}else {
			return 'KOSONG';
		}
	}

	public function belumSurvey()
	{	
		$this->load->model('m_kolektif');
		$data['hasil']=$this->m_kolektif->get_data_filter_by_menu('survey');
		$data['title']="Pelanggan Kolektif";
		$data['sub_title']="Belum Survey";
		$data['link']="belumSurvey";
		$data['code']="1";
		$data['side1']="";
		$data['side2']="";
$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";


		$this->template->display('dashboard_menu/v_pelkol',$data);
	}

	public function belumBayar()
	{	
		$this->load->model('m_kolektif');
		$data['hasil']=$this->m_kolektif->get_data_filter_by_menu('bayar');
		$data['title']="Pelanggan Kolektif";
		$data['sub_title']="Belum Bayar";
		$data['link']="belumBayar";
		$data['code']="2";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";

		$this->template->display('dashboard_menu/v_pelkol',$data);
	}

	public function belumRAB()
	{	
		$this->load->model('m_kolektif');
		$data['hasil']=$this->m_kolektif->get_data_filter_by_menu('rab');
		$data['title']="Pelanggan Kolektif";
		$data['sub_title']="Belum RAB";
		$data['link']="belumRAB";
		$data['code']="3";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";

		$this->template->display('dashboard_menu/v_pelkol',$data);
	}

	public function belumPelaksanaan()
	{	
		$this->load->model('m_kolektif');
		$data['hasil']=$this->m_kolektif->get_data_filter_by_menu('pel');
		$data['title']="Pelanggan Kolektif";
		$data['sub_title']="Belum Pelaksanaan";
		$data['link']="belumPelaksanaan";
		$data['code']="4";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";

		$this->template->display('dashboard_menu/v_pelkol',$data);
	}

	public function belumNyala()
	{	
		$this->load->model('m_kolektif');
		$data['hasil']=$this->m_kolektif->get_data_filter_by_menu('nyala');
		$data['title']="Pelanggan Kolektif";
		$data['sub_title']="Belum Nyala";
		$data['link']="belumNyala";
		$data['code']="5";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";

		$this->template->display('dashboard_menu/v_pelkol',$data);
	}

	function filter_menu($code)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('field', 'Filter By', 'required');
		if ($code == "1") {
			$sub_title = "Belum Survey";
			$link = "belumSurvey";
			$var = 'GMBR';
		}else if ($code == "2") {
			$sub_title = "Belum Bayar";
			$link = "belumBayar";
			$var = 'BB';
		}else if ($code == "3") {
			$sub_title = "Belum RAB";
			$link = "belumRAB";
			$var = 'NO_NOTADINAS';
		}else if ($code == "4") {
			$sub_title = "Belum Pelaksanaan";
			$link = "belumPelaksanaan";
			$var = 'TGL_NOTDINKEVENDOR';
		}else if ($code == "5") {
			$sub_title = "Belum Nyala";
			$link = "belumNyala";
			$var = 'TGL_NYALA';
		}

		if ( $this->form_validation->run() == TRUE ) {
			$data['field']=$this->input->post('field');
			$data['key']=$this->input->post('datafilter');
			$this->load->model('m_kolektif');
			$data['hasil']=$this->m_kolektif->get_data_filter($data, $var);
			$data['title']="Pelanggan Kolektif";
			$data['sub_title']=$sub_title;
			$data['link']=$link;
			$data['code']=$code;
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";

			$this->template->display('dashboard_menu/v_pelkol',$data);
		}
		else
		{
			$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			Data filter ".$data['d']." harus sesuai </b>
			</div>";
			redirect('kolektif');
		}
	}

		
	function searching()
	{
			$this->load->library('form_validation'); //load library form_validation
			$this->form_validation->set_rules('field', 'Filter By', 'required');
			
			if ( $this->form_validation->run() == TRUE ) {
				$data['field']=$this->input->post('field');
				$data['key']=$this->input->post('datafilter');
				$this->load->model('m_kolektif');
				$data['hasil']=$this->m_kolektif->showfilter($data);
				$data['title']="Pelanggan Kolektif";
				$data['side1']="";
				$data['side2']="";
				$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";


				$this->template->display('kolektif/index',$data);
			}
			else
			{
				$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Data filter ".$data['d']." harus sesuai </b>
				</div>";
				redirect('kolektif');
			}
		}
		//END CEK KATEGORI

		//OLAH DATA PELANGGAN KOLEKTIF
		function hapusdata()
		{
			$id=$this->uri->segment(3);
			$this->load->model('m_kolektif');
			$hasil=$this->m_kolektif->deletedatafromdb($id);
			if($hasil==1)
			{
				$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<strong>Data!</strong> Telah Terhapus
				</div>";
			}
			else
			{
				$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<strong>Maaf!</strong> Data Gagal dihapus
				</div>";
			}
			redirect('kolektif');
		}
		
		function editdata()
		{
			$id=$this->uri->segment(3);
			$this->load->model('m_kolektif');
			$hasil=$this->m_kolektif->showdataedit($id);
			$data['hasil']=$hasil->result();
			$data['hasil_row']=$hasil->row();
			$data['title']="Pelanggan Kolektif";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
			$data['side4']="";
			$data['side5']="active";
			$data['side6']="";

			$status = array();
			for ($i=0; $i < 54; $i++) { 
				$status[$i] = "disabled";
			}
			
			if ($_SESSION['akses'] == "admin") {
				for ($i=0; $i < 54; $i++) { 
					$status[$i] = "";
				}
			}elseif ($_SESSION['akses'] == "Perencanaan") {
				for ($i=0; $i < 38; $i++) { 
					$status[$i] = "";
				}
				for ($i=50; $i < 54; $i++) { 
					$status[$i] = "";
				}
			}elseif ($_SESSION['akses'] == "rayon") {
				for ($i=0; $i < 15; $i++) { 
					$status[$i] = "";
				}
				for ($i=50; $i < 54; $i++) { 
					$status[$i] = "";
				}
			}elseif($_SESSION['akses'] == "Konstruksi"){
				for ($i=42; $i < 54; $i++) { 
					$status[$i] = "";
				}
			}
			$data['array_status'] = $status;
			
			$data['upload']=$this->m_kolektif->datauploadfromdb($id);
			$this->template->display('kolektif/edit',$data);
		}
		
		function viewdata()
		{
			$id=$this->uri->segment(3);
			$this->load->model('m_kolektif');
			$hasil=$this->m_kolektif->showdataedit($id);
			$data['hasil']=$hasil->result();
			$data['title']="Pelanggan Kolektif";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
		$data['side4']="";
		$data['side5']="active";
		$data['side6']="";

			
			$data['upload']=$this->m_kolektif->datauploadfromdb($id);
			$this->template->display('kolektif/view',$data);
		}
		
		function dataupdate()
		{
			//pparea
			$data['a']=$this->input->post('a');
			$data['b']=$this->input->post('b');
			$data['c']=$this->input->post('c');
			$data['d']=$this->input->post('d');
			$data['e']=$this->input->post('e');
			$data['f']=$this->input->post('f');
			$data['g']=$this->input->post('g');
			$data['h']=$this->input->post('h');
			$data['i']=$this->input->post('i');
			$data['m']=$this->input->post('m');
			$data['n']=$this->input->post('n');
			$data['o']=$this->input->post('o');
			$data['p']=$this->input->post('p');
			//rayon
			$data['a1']=$this->input->post('a1');
			$data['b1']=$this->input->post('b1');
			$data['c1']=$this->input->post('c1');
			$data['d1']=$this->input->post('d1');
			//perencanaan
			$data['a2']=$this->input->post('a2');
			$data['b2']=$this->input->post('b2');
			$data['c2']=$this->input->post('c2');
			$data['d2']=$this->input->post('d2');
			$data['e2']=$this->input->post('e2');
			$data['f2']=$this->input->post('f2');
			$data['g2']=$this->input->post('g2');
			$data['h2']=$this->input->post('h2');
			$data['i2']=$this->input->post('i2');
			$data['j2']=$this->input->post('j2');
			$data['k2']=$this->input->post('k2');
			$data['l2']=$this->input->post('l2');
			$data['m2']=$this->input->post('m2');
			$data['n2']=$this->input->post('n2');
			$data['o2']=$this->input->post('o2');
			$data['p2']=$this->input->post('p2');
			$data['q2']=$this->input->post('q2');
			$data['r2']=$this->input->post('r2');
			$data['s2']=$this->input->post('s2');
			$data['t2']=$this->input->post('t2');
			$data['u2']=$this->input->post('u2');
			$data['v2']=$this->input->post('v2');
			$data['w2']=$this->input->post('w2');
			$data['x2']=$this->input->post('x2');
			$data['y2']=$this->input->post('y2');
			$data['z2']=$this->input->post('z2');
			//konstruksi
			$data['a3']=$this->input->post('a3');
			$data['b3']=$this->input->post('b3');
			$data['c3']=$this->input->post('c3');
			$data['d3']=$this->input->post('d3');
			$data['e3']=$this->input->post('e3');
			$data['f3']=$this->input->post('f3');
			$data['g3']=$this->input->post('g3');
			$data['h3']=$this->input->post('h3');
			$data['i3']=$this->input->post('i3');
			$data['j3']=$this->input->post('j3');
			$data['k3']=$this->input->post('k3');
			$data['l3']=$this->input->post('l3');
			$this->load->model('m_kolektif');
			$status = $this->m_kolektif->showdataedit($data['a'])->row();
				$hasil=$this->m_kolektif->updatekoltodb($data);
				$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Data pelanggan atas nama ".$data['d']." berhasil Diupdate</b>
				</div>";
				redirect('kolektif/editdata/'.$data['a'].'');
		}
		
		function saveaddlokasi()
		{
			$data['a']=$this->input->post('a');
			$data['b']=$this->input->post('b');
			$data['c']=$this->input->post('c');
			$data['d']=$this->input->post('d');
			$data['e']=$this->input->post('e');
			$data['f']=$this->input->post('f');
			$data['g']=$this->input->post('g');
			$data['h']=$this->input->post('h');
			$data['i']=$this->input->post('i');
			$data['m']=$this->input->post('m');
			$this->load->model('m_kolektif');
			if($data['d']=="" OR $data['b']=="")
			{
				$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Nama Pemohon dan Nama Pelanggan Tidak Boleh Kosong
				</div>";
			}
			else
			{
				$hasil=$this->m_kolektif->tambahpelkoltodb($data);
				date_default_timezone_set('Asia/Jakarta');
				$tanggal = date('d-m-Y');
				$nama_rayon = $this->cek_nama_rayon($data['m']);
				$pesan_kesan = "Pelanggan KOLEKTIF atas nama " .$data['d'] ." dengan alamat " .$data['e'] ." pada " .$nama_rayon ." berhasil ditambahkan pada " .$tanggal;
				$subject = "Penambahan Pelanggan Baru";
				$redirect_next = 'kolektif';
				$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Data pelanggan atas nama ".$data['d']." berhasil Diinput </b>
				</div>";
				$notif['tanggal_second'] = date('d-m-Y H:i:s');
				$notif['jenis_pelanggan'] = "KOLEKTIF";
				$notif['jenis_transaksi'] = "-";
				$notif['daya_baru'] = "-";
				$notif['waktu'] = $tanggal;
				$notif['nama'] = $data['d'];
				$notif['nama_rayon'] = $nama_rayon;
				$notif['alamat'] = $data['e'];
				$notif['keterangan'] = "Data Pelanggan Baru";
				$this->m_notifikasi->insert_notif($notif);
				redirect('c_email/send_email/' .$subject .'/' .$pesan_kesan .'/' .$redirect_next);
			}
			redirect('kolektif');
		}
		
		function uploaddata()
		{
			$this->load->library('form_validation'); //load library form_validation
			$this->form_validation->set_rules('no','No Pelanggan','required');
			$this->form_validation->set_rules('jdu','Jenis Data','required');
			$nopel=$this->input->post('no');
			$nama=$this->input->post('nama_pel');
			$jns=$this->input->post('jdu');
			if($this->form_validation->run()==true)
			{
				$this->load->model('m_kolektif');
				$status_user = $this->m_kolektif->showdataedit($nopel)->row();

				//SYARAT BAYAR
				if ($status_user->GMBR == "" && $jns == "Bukti Bayar") {
					$_SESSION['log']='<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Maaf!</strong> Data gambar survey tidak ditemukan, mohon upload terlebih dahulu
					</div>';
				}
				else // jgmbr tdk kosong atau jng != bukti bayar
				{
					$config['upload_path']   = './assets/data_upload/PelangganKOL/'.$nama.'';
					$config['allowed_types'] = '*';
					// $config['file_name'] = $jns ." " .$nama;
					$this->upload->initialize($config);	

					if (!is_dir('assets/data_upload/PelangganKOL/'.$nama)) {
						mkdir('./assets/data_upload/PelangganKOL/'.$nama, 0777, true);
					}

					if(!$this->upload->do_upload('gb')){
						$gambar="";
						$_SESSION['log']='<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Maaf!</strong> Tidak Dapat Menyimpan Data, Cek Pengisian Data ! Data tidak dapat diupload apabila Nama Pelanggan mengandung karakter : <b>\ / * : < > " ? |</b>
						</div>';
					}else{
						$query=$this->m_kolektif->cekdata($nopel,$jns);
						$cek=$query->row();
						if($cek->COUNT > 0)
						{
							$query1=$this->db->query("SELECT data_upload FROM uploadrynkol WHERE no_pelanggan='".$nopel."' AND jenis_data='".$jns."'");
							$file=$query1->row();
							unlink("./assets/data_upload/PelangganKOL/".$nama."/".$file->DATA_UPLOAD."");
							$gambar=$this->upload->file_name;
							$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							Data Telah Diupdate
							</div>";
							$data['no_pelanggan']=$nopel;
							$data['gb']=$gambar;
							$data['jdu']=$jns;
							$this->m_kolektif->updatedataupload($data);
							if ($jns == "Gambar Hasil Survey") {
								redirect('c_email/send_email_override/' .$nopel .'/Survey/KOLEKTIF');
							}elseif ($jns == "Bukti Bayar") {
								redirect('c_email/send_email_override/' .$nopel .'/Bayar/KOLEKTIF');
							}
						}
						else
						{
							$gambar=$this->upload->file_name;
							$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							Data Telah Tersimpan
							</div>";
							$data['no_pelanggan']=$nopel;
							$data['gb']=$gambar;
							$data['jdu']=$jns;
							$this->m_kolektif->simpandataupload($data);	
							if ($jns == "Gambar Hasil Survey") {
								redirect('c_email/send_email_override/' .$nopel .'/Survey/KOLEKTIF');
							}elseif ($jns == "Bukti Bayar") {
								redirect('c_email/send_email_override/' .$nopel .'/Bayar/KOLEKTIF');
							}
						}							
					}
				}
				
			}
			else 
			{
				$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<strong>Maaf!</strong> Anda Belum Memilih Jenis Data!</div>";
			}
			$red="kolektif/editdata/".$nopel."";
			redirect($red);           
		}
		//END OLAH DATA PELANGGAN KOLEKTIF
		
		//EXTRA FITUR
		public function exporttoexcel()
		{
			$this->load->model('m_kolektif');
			$data['hasil']=$this->m_kolektif->showppareafromdb()->result();
			$this->load->view('kolektif/export', $data);
		}
		//END EXTRA FITUR
	}