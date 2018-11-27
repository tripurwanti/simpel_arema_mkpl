<?php  ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_login extends CI_Controller{
	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->library(array('form_validation','upload'));
		$this->load->model('m_captcha');
		$this->load->helper('captcha');
		if ( isset($_SESSION['login_app']) ) { 
			redirect('c_admin'); 
		}
		if ( !isset($_SESSION['log']) )
		{
			$_SESSION['log']="";
		}
	}

	public function index()
	{
		$this->load->model('m_captcha');
		$data['captcha'] = $this->m_captcha->setCaptcha();
		$data['log']=$_SESSION['log'];
		$this->load->view('v_login',$data);
	}

	public function send_notif_email(){
		$config = [
			'useragent' => 'CodeIgniter',
			'protocol'  => 'smtp',
			'mailpath'  => '/usr/sbin/sendmail',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'simpelarema@gmail.com',
			'smtp_pass' => 'plnmalang12345', 
			'smtp_port' => 465,
			'smtp_keepalive' => TRUE,
			'smtp_crypto' => 'SSL',
			'wordwrap'  => TRUE,
			'wrapchars' => 80,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'validate'  => TRUE,
			'crlf'      => "\r\n",
			'newline'   => "\r\n",
		];
		$this->load->library('email', $config);
		$this->load->model('m_user');
		$cek_user = FALSE; 
		$id_user = '';
		$data_all_user = $this->m_user->userfromdb();
		foreach ($data_all_user as $key) {
			if ($key->EMAIL == $this->input->post('email')) {
				$cek_user = TRUE;
				$id_user = $key->ID;
			}
		}
		if ($cek_user) {
			$this->email->to($this->input->post('email'));
			$this->email->from('simpelarema@gmail.com','SIMPEL');
			$this->email->subject('RESET PASSWORD');

			$pesan = 'SILAKAN KLIK LINK BERIKUT UNTUK RESET PASSWORD <br>' .site_url('c_login/show_form_forget_pass/' .$id_user);
			$this->email->message(rawurldecode($pesan));
			if ($this->email->send()) {
				echo "string";
			} else {
				show_error($this->email->print_debugger());
			}
			$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			Silahkan Cek Email Anda </b>
			</div>";
			redirect(site_url('c_login'));
		} else {
			$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<strong>Maaf !</strong> alamat email tidak ada, Mohon masukkan alamat email dengan benar </b>
			</div>";
			redirect(site_url('c_login'));
		}
	}

	public function show_form_forget_pass($id_user){
		$data['id_user'] = $id_user;
		$this->load->view('v_form_forget_password', $data);
	}

	public function forget_pass($id_user){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

		if ( $this->form_validation->run() == TRUE ) {
			$this->load->model('m_user');
			$data['id_user'] = $id_user;
			$data['password'] = md5($this->input->post('password'));
			$this->m_user->forget_pass($data);
			$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			Password baru tersimpan
			</div>";
			redirect(site_url('c_login'));
		}
		else
		{
			$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			isikan data password dengan benar
			</div>";
			redirect(site_url('c_login/show_form_forget_pass/' .$id_user));
		}
		
	}

	function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');


		if ( $this->form_validation->run() == TRUE ) {
			$this->load->model('m_user');
			$username = $this->input->post('username');
			$result = $this->m_user->cek_user_login(
				$username, 
				md5($this->input->post('password'))
			);
			$approve = $this->m_user->cek_approval(
				$this->input->post('username')
			);

			if ($approve) {
				if ($result == TRUE) {
					$_SESSION['login_app']=TRUE;
					$this->load->model('m_user');
					$data['hasil']=$this->m_user->adminfromdb($this->input->post('username'));
					$hasil=$data['hasil'];
					foreach($hasil as $listdata):
						$_SESSION['id']=$listdata->ID;
						$_SESSION['nama']=$listdata->NAMA;
						$_SESSION['user']=$listdata->USERNAME;
						$_SESSION['foto']=$listdata->FOTO;
						$_SESSION['akses']=$listdata->AKSES;
						$_SESSION['rayon']=$listdata->NAMA_RAYON;
					endforeach;
					$_SESSION['log']=$approve;
					redirect('c_admin');
				}else{
					$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Kombinasi <b>username</b>/<b>password</b> salah
					</div>";
				}
			}else{
				$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				Akun anda belum <b>Aktif</b>, silahkan hubungi admin.
				</div>";
			}
		}
		redirect('c_login');
	}
	
	function regis_admin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_valid_captcha');
		$this->form_validation->set_message('valid_captcha','%s tidak sama');

		if ( $this->form_validation->run() == TRUE ) {
			$config['upload_path']   = './assets/img/dp';
			$config['allowed_types'] = 'gif|jpg|png|bmp';
			$config['max_size']      = '1000000';
			$config['max_width']  = '1000';
			$config['max_height']  = '2000';

			$this->upload->initialize($config);
			if(!$this->upload->do_upload('foto')){
				$gambar="";
			}else{
				$gambar=$this->upload->file_name;
			}
			$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			Anda Telah Terdaftar, Silahkan tunggu verifikasi admin
			</div>";
			$this->load->model('m_user');
			$data['gambar']=$gambar;
			$data['nama']=$this->input->post('fullname');
			$data['email']=$this->input->post('email');
			$data['akses']=$this->input->post('akses');
			$data['user']=$this->input->post('username');
			$data['pass']=md5($this->input->post('password'));
			$data['approval']='N';
			$result = $this->m_user->daftartodb($data);
			redirect(site_url('c_admin/show_all_admin'));
		}
		else
		{
			$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<strong><font size='4'>Maaf!</font></strong> Ada kesalahan saat mendaftar
			</div>";
			redirect(site_url('c_login'));
		}
	}
}
?>