<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pelanggan_TR extends CI_Controller
{
	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation','upload'));
		if ( !isset($_SESSION['login_app']) ) {
			redirect('c_login');
		}
	}

	public function index()
	{
		$this->load->model('m_pelanggantr');
		$data['hasil']=$this->m_pelanggantr->showppareafromdb();
		$data['title']="Pelanggan TR";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="active";
		$data['side4']="";

		$this->template->display('pelanggan_tr/index',$data);
	}

	//CEK KATEGORI
	function cek_nama_rayon($id){
		if ($id == '51301') {
			return 'RAYON LAWANG';
		}elseif ($id == '51302') {
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
		$this->load->model('m_pelanggantr');
		$data['hasil']=$this->m_pelanggantr->get_data_filter_by_menu('survey');
		$data['title']="Pelanggan TR";
		$data['sub_title']="Belum Survey";
		$data['link']="belumSurvey";
		$data['code']="1";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="active";
		$data['side4']="";

		$this->template->display('dashboard_menu/v_peltr',$data);
	}

	public function belumBayar()
	{
		$this->load->model('m_pelanggantr');
		$data['hasil']=$this->m_pelanggantr->get_data_filter_by_menu('bayar');
		$data['title']="Pelanggan TR";
		$data['sub_title']="Belum Bayar";
		$data['link']="belumBayar";
		$data['code']="2";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="active";
		$data['side4']="";

		$this->template->display('dashboard_menu/v_peltr',$data);
	}

	public function belumRAB()
	{
		$this->load->model('m_pelanggantr');
		$data['hasil']=$this->m_pelanggantr->get_data_filter_by_menu('rab');
		$data['title']="Pelanggan TR";
		$data['sub_title']="Belum RAB";
		$data['link']="belumRAB";
		$data['code']="3";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="active";
		$data['side4']="";

		$this->template->display('dashboard_menu/v_peltr',$data);
	}

	public function belumPelaksanaan()
	{
		$this->load->model('m_pelanggantr');
		$data['hasil']=$this->m_pelanggantr->get_data_filter_by_menu('pel');
		$data['title']="Pelanggan TR";
		$data['sub_title']="Belum Pelaksanaan";
		$data['link']="belumPelaksanaan";
		$data['code']="4";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="active";
		$data['side4']="";

		$this->template->display('dashboard_menu/v_peltr',$data);
	}

	public function belumNyala()
	{
		$this->load->model('m_pelanggantr');
		$data['hasil']=$this->m_pelanggantr->get_data_filter_by_menu('nyala');
		$data['title']="Pelanggan TR";
		$data['sub_title']="Belum Nyala";
		$data['link']="belumNyala";
		$data['code']="5";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="active";
		$data['side4']="";

		$this->template->display('dashboard_menu/v_peltr',$data);
	}

	function filter_menu($code)
	{
			$this->load->library('form_validation'); //load library form_validation
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
				$this->load->model('m_pelanggantr');
				$data['hasil']=$this->m_pelanggantr->get_data_filter($data, $var);
				$data['title']="Pelanggan TR";
				$data['sub_title']=$sub_title;
				$data['link']=$link;
				$data['code']=$code;
				$data['side1']="";
				$data['side2']="active";
				$data['side3']="";
				$data['side4']="";
				$data['side5']="";
				$data['side6']="";
				$data['side7']="";

				$this->template->display('dashboard_menu/v_peltr',$data);
			}
			else
			{
				$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Data filter ".$data['d']." harus sesuai </b>
				</div>";
				redirect('pelanggan_TR');
			}
		}

		public function HPL($id){
			$this->load->model('m_pelanggantr');
			$data['hasil']=$this->m_pelanggantr->getRayon($id)->result();
			$data['title']="HPL";
			$data['sub_title']=$this->cek_nama_rayon($id);
			$data['ryn_code']=$id; 
			$data['side1']="";
			$data['side2']="";
			$data['side3']="active";
			$data['side4']="";
			$this->template->display('hpl/hpl_tr',$data);
		}

		function searching()
		{
			$this->load->library('form_validation'); //load library form_validation
			$this->form_validation->set_rules('field', 'Filter By', 'required');

			if ( $this->form_validation->run() == TRUE ) {
				$data['field']=$this->input->post('field');
				$data['key']=$this->input->post('datafilter');
				$this->load->model('m_pelanggantr');
				$data['hasil']=$this->m_pelanggantr->showfilter($data);
				$data['title']="Pelanggan TR";
				$data['side1']="";
				$data['side2']="";
				$data['side3']="active";
				$data['side4']="";

				$this->template->display('pelanggan_tr/index',$data);
			}
			else
			{
				$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Data filter ".$data['d']." harus sesuai </b>
				</div>";
				redirect('pelanggan_TR');
			}
		}
		//END CEK KATEGORI

		//OLAH DATA PELANGGAN TR
		function hapusdata()
		{
			$id=$this->uri->segment(3);
			$this->load->model('m_pelanggantr');
			$hasil=$this->m_pelanggantr->deletedatafromdb($id);
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
			redirect('pelanggan_TR');
		}

		function editdata()
		{
			$id=$this->uri->segment(3);
			$this->load->model('m_pelanggantr');
			$hasil=$this->m_pelanggantr->showdataedit($id);
			$data['hasil']=$hasil->result();
			$data['title']="Pelanggan TR";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="active";
			$data['side4']="";
			$status = array();
			for ($i=0; $i < 56; $i++) { 
				$status[$i] = "disabled";
			}
			
			if ($_SESSION['akses'] == "admin") {
				for ($i=0; $i < 56; $i++) { 
					$status[$i] = "";
				}
			}elseif ($_SESSION['akses'] == "rayon") {
				for ($i=0; $i < 18; $i++) { 
					$status[$i] = "";
				}
				for ($i=52; $i < 56; $i++) { 
					$status[$i] = "";
				}
			}elseif ($_SESSION['akses'] == "Perencanaan"){
				for ($i=18; $i < 39; $i++) { 
					$status[$i] = "";
				}
				for ($i=52; $i < 56; $i++) { 
					$status[$i] = "";
				}
			}elseif($_SESSION['akses'] == "Konstruksi"){
				for ($i=39; $i < 56; $i++) { 
					$status[$i] = "";
				}
			}
			$data['array_status'] = $status;
			$data['upload']=$this->m_pelanggantr->datauploadfromdb($id);
			$this->template->display('pelanggan_tr/edit',$data);
		}

		function viewdata()
		{
			$id=$this->uri->segment(3);
			$this->load->model('m_pelanggantr');
			$hasil=$this->m_pelanggantr->showdataedit($id);
			$data['hasil']=$hasil->result();
			$data['title']="Pelanggan TR";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="active";
			$data['side4']="";

			$data['upload']=$this->m_pelanggantr->datauploadfromdb($id);
			$this->template->display('pelanggan_tr/view',$data);
		}

		function dataupdate()
		{
		//PPArea
			$data['a']=$this->input->post('a');
			$data['b']=$this->input->post('b');
			$data['c']=$this->input->post('c');
			$data['d']=$this->input->post('d');
			$data['e']=$this->input->post('e');
			$data['f']=$this->input->post('f');
			$data['g']=$this->input->post('g');
			$data['h']=$this->input->post('h');
			$data['i']=$this->input->post('i');
			$data['j']=$this->input->post('j');
			$data['k']=$this->input->post('k');
			$data['l']=$this->input->post('l');
			$data['m']=$this->input->post('m');
			$data['n']=$this->input->post('n');
			$data['o']=$this->input->post('o');
			$data['p']=$this->input->post('p');
			$data['a1']=$this->input->post('a1');
			$data['b1']=$this->input->post('b1');
			$data['c1']=$this->input->post('c1');
			$data['d1']=$this->input->post('d1');
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
			$data['m3']=$this->input->post('m3');
			$this->load->model('m_pelanggantr');
			$status = $this->m_pelanggantr->showdataedit($data['a'])->row();
			$hasil=$this->m_pelanggantr->updatetrtodb($data);

			//SYARAT RAB
			if ($status->NO_NOTADINAS == "") {
				if ($data['p2'] != "" || $data['q2'] != "" || $data['u2'] != "") {
					if ($data['u2'] == "") {
						$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						Mohon input data No. Nota Dinas dan data tgl kirim NODIN ke KON atau data tgl kirim NODIN ke pengadaan bersamaan </b>
						</div>";
						redirect('pelanggan_tr/editdata/'.$data['a'].'');
					}else{
						if (($data['p2'] == "" && $data['q2'] == "")) {
							$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							Mohon input data No. Nota Dinas dan data tgl kirim NODIN ke KON atau data tgl kirim NODIN ke pengadaan bersamaan </b>
							</div>";
							redirect('pelanggan_tr/editdata/'.$data['a'].'');
						}else{
							$hasil=$this->m_pelanggantr->updatetrtodb($data);
							$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							Data pelanggan atas nama ".$data['d']." berhasil Diupdate </b>
							</div>";
							redirect('email/send_email_override/' .$data['a'] .'/RAB/TR');
						}

					}
				}else{
					$hasil=$this->m_pelanggantr->updatetrtodb($data);
					$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data pelanggan atas nama ".$data['d']." berhasil Diupdate, mohon input data rab </b>
					</div>";
					redirect('pelanggan_tr/editdata/'.$data['a'].'');
				}
			}
			//END SYARAT RAB
			
			//SYARAT PELAKSANAAN
			elseif ($status->NO_SPK == "" || $status->TGL_NOTDINKEVENDOR == "" || $status->NAMA_VENDORPELAK == "") {
				if ($data['a3'] == "" && $data['b3'] == "" && $data['c3'] == "") {
					$hasil=$this->m_pelanggantr->updatetrtodb($data);
					$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data pelanggan atas nama ".$data['d']." berhasil Diupdate, Mohon input data pelaksaaan </b>
					</div>";
					redirect('pelanggan_tr/editdata/'.$data['a'].'');
				}elseif($data['a3'] != "" && $data['b3'] != "" && $data['c3'] != ""){
					$hasil=$this->m_pelanggantr->updatetrtodb($data);
					$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data pelanggan atas nama ".$data['d']." berhasil Diupdate, mohon input data nyala</b>
					</div>";
					redirect('email/send_email_override/' .$data['a'] .'/Pelaksanaan/TR');
				}else{
					$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Mohon input data Pelaksanaan bersamaan</b>
					</div>";
					redirect('pelanggan_tr/editdata/'.$data['a'].'');
				}
			}
			//END SYARAT PELAKSANAAN
			
			//SYARAT NYALA
			elseif($status->TGL_NYALA == "" || $status->TGL_PDL == ""){
				if ($data['m'] == "" && $data['n'] == "") {
					$hasil=$this->m_pelanggantr->updatetrtodb($data);
					$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data pelanggan atas nama ".$data['d']." berhasil Diupdate, Mohon input data nyala </b>
					</div>";
					redirect('pelanggan_tr/editdata/'.$data['a'].'');
					
				}elseif ($data['m'] != "" && $data['n'] != "") {
					$hasil=$this->m_pelanggantr->updatetrtodb($data);
					$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data pelanggan atas nama ".$data['d']." berhasil Diupdate</b>
					</div>";
					redirect('email/send_email_override/' .$data['a'] .'/Nyala/TR');
				}else{
					$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Mohon input data Nyala bersamaan</b>
					</div>";
					redirect('pelanggan_tr/editdata/'.$data['a'].'');
				}
			}
			//END SYARAT NYALA
			
			else{
				$hasil=$this->m_pelanggantr->updatetrtodb($data);
				$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Data pelanggan atas nama ".$data['d']." berhasil Diupdate</b>
				</div>";
				redirect('pelanggan_tr/editdata/'.$data['a'].'');
			}
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
			$data['j']=$this->input->post('j');
			$data['k']=$this->input->post('k');
			$data['l']=$this->input->post('l');
			$data['m']=$this->input->post('m');

			$this->load->model('m_pelanggantr');
			$this->load->model('m_notifikasi');
			if($data['d']=="")
			{
				$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Nama Pelanggan Tidak Boleh Kosong
				</div>";
			}
			else
			{
				$hasil=$this->m_pelanggantr->tambahpeltrtodb($data);
				date_default_timezone_set('Asia/Jakarta');
				$tanggal = date('d-m-Y');
				$nama_rayon = $this->cek_nama_rayon($data['m']);
				$pesan_kesan = "Pelanggan TR atas nama " .$data['d'] ." dengan alamat " .$data['e'] ." pada " .$nama_rayon ." berhasil ditambahkan pada " .$tanggal;
				$subject = "Penambahan Pelanggan Baru";
				$redirect_next = 'pelanggan_TR';
				$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Data pelanggan atas nama ".$data['d']." berhasil Diinput </b>
				</div>";
				$notif['tanggal_second'] = date('d-m-Y H:i:s');
				$notif['jenis_pelanggan'] = "TR";
				$notif['waktu'] = $tanggal;
				$notif['nama'] = $data['d'];
				$notif['nama_rayon'] = $nama_rayon;
				$notif['alamat'] = $data['e'];
				$notif['keterangan'] = "Data Pelanggan Baru";
				$notif['jenis_transaksi'] = $data['j'];
				$notif['daya_baru'] = $data['i'];
				$this->m_notifikasi->insert_notif($notif);
				redirect('email/send_email/' .$subject .'/' .$pesan_kesan .'/' .$redirect_next);
			}
			redirect('pelanggan_TR');
		}

		function uploaddata()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('no','No Pelanggan','required');
			$this->form_validation->set_rules('jdu','Jenis Data','required');
			$nopel=$this->input->post('no');
			$nama=$this->input->post('nama_pel');
			$jns=$this->input->post('jdu');
			if($this->form_validation->run()==true)
			{
				$this->load->model('m_pelanggantr');
				$status_user = $this->m_pelanggantr->showdataedit($nopel)->row();
				if ($status_user->GMBR == "" && $jns == "Bukti Bayar") {
					$_SESSION['log']='<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Maaf!</strong> Data gambar survey tidak ditemukan, mohon upload terlebih dahulu
					</div>';
				}else{
					$config['upload_path']   = './assets/data_upload/PelangganTR/'.$nama.'';
					$config['allowed_types'] = '*';
					$this->upload->initialize($config);

					if (!is_dir('assets/data_upload/PelangganTR/'.$nama)) {
						mkdir('./assets/data_upload/PelangganTR/'.$nama, 0777, true);
					}

					if(!$this->upload->do_upload('gb')){
						$gambar="";
						$_SESSION['log']='<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Maaf!</strong> Tidak Dapat Menyimpan Data, Cek Pengisian Data ! Data tidak dapat diupload apabila Nama Pelanggan mengandung karakter : <b>\ / * : < > " ? |</b>
						</div>';
					}else{
						$query=$this->m_pelanggantr->cekdata($nopel,$jns);
						$cek=$query->row();
						if($cek->COUNT > 0)
						{
							$query1=$this->db->query("SELECT data_upload FROM uploadryntr WHERE no_pelanggan='".$nopel."' AND jenis_data='".$jns."'");
							$file=$query1->row();
							unlink("./assets/data_upload/PelangganTR/".$nama."/".$file->DATA_UPLOAD."");
							$gambar=$this->upload->file_name;
							$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							Data Telah Diupdate
							</div>";
							$data['no_pelanggan']=$nopel;
							$data['gb']=$gambar;
							$data['jdu']=$jns;
							// $this->m_pelanggantr->updatedataupload($data);
							if ($jns == "Gambar Hasil Survey") {
								redirect('email/send_email_override/' .$nopel .'/Survey/TR');
							}elseif ($jns == "Bukti Bayar") {
								redirect('email/send_email_override/' .$nopel .'/Bayar/TR');
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
							$this->m_pelanggantr->simpandataupload($data);
							if ($jns == "Gambar Hasil Survey") {
								redirect('email/send_email_override/' .$nopel .'/Survey/TR');
							}elseif ($jns == "Bukti Bayar") {
								redirect('email/send_email_override/' .$nopel .'/Bayar/TR');
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
			$red="pelanggan_TR/editdata/".$nopel."";
			redirect($red);
		}
		//END OLAH DATA PELANGGAN TR

		//EXTRA FITUR
		public function exporttoexcel()
		{
			$this->load->model('m_pelanggantr');
			$data['hasil']=$this->m_pelanggantr->showppareafromdb();
			
			// foreach ($data['hasil'] as $hehe) {
			// 	echo $hehe->NO_AGENDA.".";
			// }
			
			$this->load->view('pelanggan_tr/export',$data);
		}
		//END EXTRA FITUR
		
	}
